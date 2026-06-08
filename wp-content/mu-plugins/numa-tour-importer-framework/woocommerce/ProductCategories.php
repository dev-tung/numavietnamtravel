<?php

class ProductCategories
{
    public function assign(
        int $productId,
        array $categories
    ): void {

        $termIds = [];

        $parentId = 0;

        foreach ($categories as $categoryName) {

            $existing = term_exists(
                $categoryName,
                'product_cat',
                $parentId
            );

            if ($existing) {

                $termId = (int) $existing['term_id'];

            } else {

                $term = wp_insert_term(
                    $categoryName,
                    'product_cat',
                    [
                        'parent' => $parentId,
                    ]
                );

                if (is_wp_error($term)) {
                    continue;
                }

                $termId = (int) $term['term_id'];
            }

            $termIds[] = $termId;

            $parentId = $termId;
        }

        wp_set_object_terms(
            $productId,
            $termIds,
            'product_cat'
        );
    }
}