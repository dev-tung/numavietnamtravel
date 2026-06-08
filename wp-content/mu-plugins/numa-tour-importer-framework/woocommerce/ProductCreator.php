<?php

class ProductCreator
{
    public function create(array $tour): int
    {
        $existing = get_posts([
            'post_type'   => 'product',
            'numberposts' => 1,
            'meta_key'    => '_source_url',
            'meta_value'  => $tour['source_url'] ?? '',
            'fields'      => 'ids',
        ]);

        if (!empty($existing)) {
            return (int) $existing[0];
        }

        $productId = wp_insert_post([
            'post_type'   => 'product',
            'post_status' => 'publish',
            'post_title'  => $tour['title'] ?? '',
        ]);

        if (
            $productId &&
            !is_wp_error($productId)
        ) {

            if (function_exists('update_field')) {

                update_field(
                    'tour_itinerary',
                    $tour['itinerary'] ?? '',
                    $productId
                );

            } else {

                update_post_meta(
                    $productId,
                    'tour_itinerary',
                    $tour['itinerary'] ?? ''
                );
            }
        }

        return (int) $productId;
    }
}