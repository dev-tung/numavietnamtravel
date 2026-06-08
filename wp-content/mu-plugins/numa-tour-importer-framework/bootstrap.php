<?php
if (!defined('ABSPATH')) {
    exit;
}

require_once __DIR__ . '/crawlers/BaseCrawler.php';
require_once __DIR__ . '/crawlers/WordPressTourCrawler.php';
require_once __DIR__ . '/crawlers/CruiseCrawler.php';
require_once __DIR__ . '/crawlers/GenericCrawler.php';
require_once __DIR__ . '/crawlers/CrawlerFactory.php';

require_once __DIR__ . '/sources/SourceProvider.php';

require_once __DIR__ . '/services/CrawlService.php';

require_once __DIR__ . '/downloaders/ImageDownloader.php';

require_once __DIR__ . '/woocommerce/ProductCreator.php';
require_once __DIR__ . '/woocommerce/ProductCategories.php';
require_once __DIR__ . '/woocommerce/ProductGallery.php';
require_once __DIR__ . '/woocommerce/ProductMeta.php';
require_once __DIR__ . '/woocommerce/ProductImporter.php';

add_action('admin_init', function () {
    if (!current_user_can('administrator')) {
        return;
    }

    if (isset($_GET['numa_sources'])) {

        

        echo '<pre>';

        print_r(
            SourceProvider::all()
        );

        echo '</pre>';

        exit;
    }

    if (isset($_GET['numa_crawl'])) {

        $service = new CrawlService();

        $results = $service->getResults();

        echo '<pre>';
        print_r($results);
        echo '</pre>';

        exit;
    }

    if (isset($_GET['numa_export'])) {

        
        $service = new CrawlService();

        $results = $service->getResults();

        $storageDir = __DIR__ . '/storage';

        $jsonDir  = $storageDir . '/json';
        $imageDir = $storageDir . '/images';

        if (!is_dir($jsonDir)) {
            mkdir($jsonDir, 0755, true);
        }

        if (!is_dir($imageDir)) {
            mkdir($imageDir, 0755, true);
        }

        $downloader = new ImageDownloader();

        $downloader->downloadImagesRecursively(
            $results,
            $imageDir
        );

        file_put_contents(
            $jsonDir . '/tours.json',
            json_encode(
                $results,
                JSON_PRETTY_PRINT |
                JSON_UNESCAPED_UNICODE |
                JSON_UNESCAPED_SLASHES
            )
        );

        echo 'Export completed';

        exit;
    }

    // ?numa_import=1&limit=20
    if (isset($_GET['numa_import'])) {

        $offset = isset($_GET['offset'])
            ? (int) $_GET['offset']
            : 0;

        $limit = isset($_GET['limit'])
            ? (int) $_GET['limit']
            : 20;

        $importer = new ProductImporter();

        $importer->import(
            $limit,
            $offset
        );

        exit;
    }

    if (isset($_GET['numa_cleanup'])) {

        if (!current_user_can('administrator')) {
            wp_die('Permission denied');
        }

        // Xóa tất cả products
        $products = get_posts([
            'post_type'      => 'product',
            'posts_per_page' => -1,
            'fields'         => 'ids',
        ]);

        foreach ($products as $productId) {

            // Ảnh gallery
            $galleryIds = get_post_meta(
                $productId,
                '_product_image_gallery',
                true
            );

            if (!empty($galleryIds)) {

                foreach (explode(',', $galleryIds) as $attachmentId) {

                    wp_delete_attachment(
                        (int) $attachmentId,
                        true
                    );
                }
            }

            // Ảnh đại diện
            $thumbnailId = get_post_thumbnail_id(
                $productId
            );

            if ($thumbnailId) {

                wp_delete_attachment(
                    $thumbnailId,
                    true
                );
            }

            // Ảnh đính kèm khác
            $attachments = get_attached_media(
                '',
                $productId
            );

            foreach ($attachments as $attachment) {

                wp_delete_attachment(
                    $attachment->ID,
                    true
                );
            }

            // Xóa product
            wp_delete_post(
                $productId,
                true
            );
        }

        // Xóa tất cả product categories
        $terms = get_terms([
            'taxonomy'   => 'product_cat',
            'hide_empty' => false,
        ]);

        foreach ($terms as $term) {

            // Không xóa category mặc định "Uncategorized"
            if ($term->slug === 'uncategorized') {
                continue;
            }

            wp_delete_term(
                $term->term_id,
                'product_cat'
            );
        }

        // Xóa product tags
        $tags = get_terms([
            'taxonomy'   => 'product_tag',
            'hide_empty' => false,
        ]);

        foreach ($tags as $tag) {

            wp_delete_term(
                $tag->term_id,
                'product_tag'
            );
        }

        echo 'Products, categories, tags and images deleted successfully';

        exit;
    }
});