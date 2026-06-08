<?php

class ProductMeta
{
    public function save(
        int $productId,
        array $tour
    ): void {

        update_post_meta(
            $productId,
            '_source_url',
            $tour['source_url'] ?? ''
        );

        // ACF field
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

        update_post_meta(
            $productId,
            '_virtual',
            'yes'
        );

        update_post_meta(
            $productId,
            '_visibility',
            'visible'
        );

        update_post_meta(
            $productId,
            '_numa_imported',
            1
        );
    }
}