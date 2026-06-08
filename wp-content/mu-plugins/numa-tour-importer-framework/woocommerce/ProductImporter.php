<?php

class ProductImporter
{
    protected ProductCreator $creator;

    protected ProductCategories $categories;

    protected ProductGallery $gallery;

    protected ProductMeta $meta;

    public function __construct()
    {
        $this->creator = new ProductCreator();

        $this->categories = new ProductCategories();

        $this->gallery = new ProductGallery();

        $this->meta = new ProductMeta();

        @set_time_limit(0);

        @ini_set('memory_limit', '1024M');
    }

    public function import(
        int $limit = 20,
        int $offset = 0
    ): void {

        $jsonFile = dirname(__DIR__) . '/storage/json/tours.json';

        if (!file_exists($jsonFile)) {
            wp_die('tours.json not found');
        }

        $data = json_decode(
            file_get_contents($jsonFile),
            true
        );

        if (!is_array($data)) {
            wp_die('Invalid tours.json');
        }

        $tours = [];

        $this->collectTours(
            $data,
            [],
            $tours
        );

        $total = count($tours);

        $batch = array_slice(
            $tours,
            $offset,
            $limit
        );

        if (empty($batch)) {

            echo sprintf(
                '<h3>Import completed. Total: %d tours</h3>',
                $total
            );

            return;
        }

        $counter = 0;

        foreach ($batch as $item) {

            $counter++;

            $this->importTour(
                $item['tour'],
                $item['categories']
            );

            unset($item);

            if ($counter % 10 === 0) {

                wp_cache_flush();

                if (function_exists('gc_collect_cycles')) {
                    gc_collect_cycles();
                }
            }
        }

        $nextOffset = $offset + $limit;

        echo '<hr>';

        echo sprintf(
            'Processed: %d / %d',
            min($nextOffset, $total),
            $total
        );

        if ($nextOffset < $total) {

            $nextUrl = add_query_arg(
                [
                    'offset' => $nextOffset
                ]
            );

            echo sprintf(
                '<script>
                    setTimeout(function(){
                        location.href="%s";
                    },1000);
                </script>',
                esc_url($nextUrl)
            );

            echo '<br>Loading next batch...';
        } else {

            echo '<h3>Import completed.</h3>';
        }
    }

    protected function collectTours(
        array $node,
        array $parents,
        array &$result
    ): void {

        foreach ($node as $key => $value) {

            if (!is_array($value)) {
                continue;
            }

            $first = reset($value);

            if (
                is_array($first)
                && isset($first['title'])
            ) {

                foreach ($value as $tour) {

                    $result[] = [
                        'tour' => $tour,
                        'categories' => array_merge(
                            $parents,
                            [$key]
                        )
                    ];
                }

                continue;
            }

            $this->collectTours(
                $value,
                array_merge(
                    $parents,
                    [$key]
                ),
                $result
            );
        }
    }

    protected function importTour(
        array $tour,
        array $categories
    ): void {

        $sourceUrl = trim(
            $tour['source_url'] ?? ''
        );

        if (!$sourceUrl) {

            echo sprintf(
                'Skipped (empty source_url): %s<br>',
                esc_html($tour['title'] ?? '')
            );

            return;
        }

        $sourceUrl = strtok($sourceUrl, '?');
        $sourceUrl = strtok($sourceUrl, '#');
        $sourceUrl = rtrim($sourceUrl, '/');
        $sourceUrl = strtolower($sourceUrl);

        global $wpdb;

        $existingId = (int) $wpdb->get_var(
            $wpdb->prepare(
                "
                SELECT p.ID
                FROM {$wpdb->posts} p
                INNER JOIN {$wpdb->postmeta} pm
                    ON pm.post_id = p.ID
                WHERE p.post_type = 'product'
                AND p.post_status NOT IN ('trash','auto-draft')
                AND pm.meta_key = '_source_url'
                AND pm.meta_value = %s
                LIMIT 1
                ",
                $sourceUrl
            )
        );

        if ($existingId > 0) {

            echo sprintf(
                'Skipped: %s (#%d)<br>',
                esc_html($tour['title'] ?? ''),
                $existingId
            );

            return;
        }

        $productId = $this->creator->create(
            $tour
        );

        if (
            !$productId ||
            is_wp_error($productId)
        ) {
            return;
        }

        update_post_meta(
            $productId,
            '_source_url',
            $sourceUrl
        );

        if (!empty($categories)) {

            $this->categories->assign(
                $productId,
                $categories
            );
        }

        if (
            !empty($tour['local_images'])
            && is_array($tour['local_images'])
        ) {

            $images = array_filter(
                array_unique(
                    $tour['local_images']
                )
            );

            if (!empty($images)) {

                $this->gallery->import(
                    $productId,
                    $images
                );
            }

            unset($images);
        }

        $this->meta->save(
            $productId,
            $tour
        );

        clean_post_cache(
            $productId
        );

        echo sprintf(
            'Imported: %s (#%d)<br>',
            esc_html($tour['title'] ?? ''),
            $productId
        );
    }
}