<?php

if (!defined('ABSPATH')) {
    exit;
}

/*
|--------------------------------------------------------------------------
| QUICK LINKS
|--------------------------------------------------------------------------
|
| IMPORT:
| https://yourdomain.com/?import_tours=1
|
| ROLLBACK:
| https://yourdomain.com/?rollback_tours=1
|
*/

/*
|--------------------------------------------------------------------------
| OPTION KEYS
|--------------------------------------------------------------------------
*/

define(
    'NUMA_TOUR_IMPORT_PRODUCT_CAT_OPTION',
    'numa_wc_imported_product_cat_ids'
);

define(
    'NUMA_TOUR_IMPORT_PRODUCT_OPTION',
    'numa_wc_imported_product_ids'
);

/*
|--------------------------------------------------------------------------
| TOUR DATA
|--------------------------------------------------------------------------
|
| LEVEL 1:
| Region
|
| LEVEL 2:
| Destination / Tour Group
|
| LEVEL 3:
| Actual WooCommerce Products
|
*/

function numa_get_tour_categories_data()
{
    return [

        'Northern Vietnam Tours' => [

            'Hanoi Tours' => [
                'Hanoi Tours - Hanoi City Tour',
                'Hanoi Tours - Street Food Tour',
                'Hanoi Tours - Motorbike Tour',
                'Hanoi Tours - Handicraft Village Tour',
            ],

            'Ha Long Bay Cruises' => [
                'Ha Long Bay Cruises - 1 Day Cruise',
                'Ha Long Bay Cruises - 2 Days / 1 Night Cruise',
                'Ha Long Bay Cruises - 3 Days / 2 Nights Cruise',
            ],

            'Lan Ha Bay Cruises' => [
                'Lan Ha Bay Cruises - 1 Day Cruise',
                'Lan Ha Bay Cruises - 2 Days / 1 Night Cruise',
                'Lan Ha Bay Cruises - 3 Days / 2 Nights Cruise',
            ],

            'Bai Tu Long Bay Cruises' => [
                'Bai Tu Long Bay Cruises - 1 Day Cruise',
                'Bai Tu Long Bay Cruises - 2 Days / 1 Night Cruise',
                'Bai Tu Long Bay Cruises - 3 Days / 2 Nights Cruise',
            ],

            'Ha Giang Loop Tours' => [
                'Ha Giang Loop Tours - 2 Days / 1 Night Easy Rider',
                'Ha Giang Loop Tours - 3 Days / 2 Nights Easy Rider',
                'Ha Giang Loop Tours - 4 Days / 3 Nights Easy Rider',
            ],

            'Cao Bang Loop Tours' => [
                'Cao Bang Loop Tours - 2 Days / 1 Night Tour',
                'Cao Bang Loop Tours - 3 Days / 2 Nights Tour',
            ],

            'Sapa Tours' => [
                'Sapa Tours - 1 Day Trekking Tour',
                'Sapa Tours - 2 Days / 1 Night Trekking Tour',
                'Sapa Tours - 3 Days / 2 Nights Trekking Tour',
            ],

            'Ninh Binh Tours' => [
                'Ninh Binh Tours - 1 Day Tour',
                'Ninh Binh Tours - 2 Days / 1 Night Tour',
            ],

            'Mai Chau Tours' => [
                'Mai Chau Tours - 1 Day Tour',
                'Mai Chau Tours - 2 Days / 1 Night Tour',
                'Mai Chau Tours - 3 Days / 2 Nights Tour',
                'Mai Chau Tours - 4 Days / 3 Nights Tour',
            ],

            'Pu Luong Tours' => [
                'Pu Luong Tours - 1 Day Tour',
                'Pu Luong Tours - 2 Days / 1 Night Tour',
                'Pu Luong Tours - 3 Days / 2 Nights Tour',
                'Pu Luong Tours - 4 Days / 3 Nights Tour',
            ],
        ],

        'Central Vietnam Tours' => [

            'Phong Nha National Park Tours' => [],
            'Da Nang Tours' => [],
            'Hoi An Tours' => [],
        ],

        'Southern Vietnam Tours' => [

            'Ho Chi Minh City Tours' => [],
            'Cu Chi Tunnel Tours' => [],
            'Mekong Delta Tours' => [],
        ],
    ];
}

/*
|--------------------------------------------------------------------------
| IMPORT
|--------------------------------------------------------------------------
*/

function numa_import_tours()
{
    $data = numa_get_tour_categories_data();

    $inserted_product_cat_ids = [];
    $inserted_product_ids     = [];

    foreach ($data as $region_name => $destinations) {

        /*
        |--------------------------------------------------------------------------
        | LEVEL 1
        | REGION CATEGORY
        |--------------------------------------------------------------------------
        */

        $region = term_exists(
            $region_name,
            'product_cat'
        );

        if (!$region) {

            $region = wp_insert_term(
                $region_name,
                'product_cat',
                [
                    'slug' => sanitize_title($region_name),
                ]
            );

            if (is_wp_error($region)) {
                continue;
            }

            $inserted_product_cat_ids[] = $region['term_id'];

            echo '<p>Created Region: ' . esc_html($region_name) . '</p>';
        }

        $region_id = is_array($region)
            ? $region['term_id']
            : $region;

        /*
        |--------------------------------------------------------------------------
        | LEVEL 2
        | DESTINATION CATEGORY
        |--------------------------------------------------------------------------
        */

        foreach ($destinations as $destination_name => $products) {

            $destination = term_exists(
                $destination_name,
                'product_cat'
            );

            if (!$destination) {

                $destination = wp_insert_term(
                    $destination_name,
                    'product_cat',
                    [
                        'parent' => $region_id,
                        'slug'   => sanitize_title($destination_name),
                    ]
                );

                if (is_wp_error($destination)) {
                    continue;
                }

                $inserted_product_cat_ids[] = $destination['term_id'];

                echo '<p>Created Destination: ' . esc_html($destination_name) . '</p>';
            }

            $destination_id = is_array($destination)
                ? $destination['term_id']
                : $destination;

            /*
            |--------------------------------------------------------------------------
            | LEVEL 3
            | PRODUCTS
            |--------------------------------------------------------------------------
            */

            foreach ($products as $product_name) {

                $existing_product = get_page_by_title(
                    $product_name,
                    OBJECT,
                    'product'
                );

                if ($existing_product) {
                    continue;
                }

                /*
                |--------------------------------------------------------------------------
                | CREATE PRODUCT
                |--------------------------------------------------------------------------
                */

                $product = new WC_Product_Simple();

                $product->set_name($product_name);

                $product->set_status('publish');

                $product->set_catalog_visibility('visible');

                $product->set_description('');

                $product->set_short_description('');

                $product->set_slug(
                    sanitize_title($product_name)
                );

                /*
                |--------------------------------------------------------------------------
                | ASSIGN CATEGORIES
                |--------------------------------------------------------------------------
                */

                $product->set_category_ids([
                    $region_id,
                    $destination_id,
                ]);

                /*
                |--------------------------------------------------------------------------
                | SAVE PRODUCT
                |--------------------------------------------------------------------------
                */

                $product_id = $product->save();

                if (!$product_id) {
                    continue;
                }

                $inserted_product_ids[] = $product_id;

                echo '<p>Created Product: ' . esc_html($product_name) . '</p>';
            }
        }
    }

    /*
    |--------------------------------------------------------------------------
    | SAVE IMPORTED IDS
    |--------------------------------------------------------------------------
    */

    update_option(
        NUMA_TOUR_IMPORT_PRODUCT_CAT_OPTION,
        $inserted_product_cat_ids
    );

    update_option(
        NUMA_TOUR_IMPORT_PRODUCT_OPTION,
        $inserted_product_ids
    );

    echo '<h2>WooCommerce tours imported successfully.</h2>';
}

/*
|--------------------------------------------------------------------------
| ROLLBACK
|--------------------------------------------------------------------------
*/

function numa_rollback_tours()
{
    /*
    |--------------------------------------------------------------------------
    | DELETE PRODUCTS
    |--------------------------------------------------------------------------
    */

    $product_ids = get_option(
        NUMA_TOUR_IMPORT_PRODUCT_OPTION,
        []
    );

    if (!empty($product_ids)) {

        foreach ($product_ids as $product_id) {

            wp_delete_post(
                $product_id,
                true
            );

            echo '<p>Deleted Product ID: ' . esc_html($product_id) . '</p>';
        }

        delete_option(
            NUMA_TOUR_IMPORT_PRODUCT_OPTION
        );
    }

    /*
    |--------------------------------------------------------------------------
    | DELETE PRODUCT CATEGORIES
    |--------------------------------------------------------------------------
    */

    $term_ids = get_option(
        NUMA_TOUR_IMPORT_PRODUCT_CAT_OPTION,
        []
    );

    if (!empty($term_ids)) {

        /*
        |--------------------------------------------------------------------------
        | DELETE CHILD FIRST
        |--------------------------------------------------------------------------
        */

        rsort($term_ids);

        foreach ($term_ids as $term_id) {

            wp_delete_term(
                $term_id,
                'product_cat'
            );

            echo '<p>Deleted Product Category ID: ' . esc_html($term_id) . '</p>';
        }

        delete_option(
            NUMA_TOUR_IMPORT_PRODUCT_CAT_OPTION
        );
    }

    echo '<h2>Rollback completed successfully.</h2>';
}

/*
|--------------------------------------------------------------------------
| INIT
|--------------------------------------------------------------------------
*/

add_action('init', function () {

    /*
    |--------------------------------------------------------------------------
    | ADMIN ONLY
    |--------------------------------------------------------------------------
    */

    if (!current_user_can('administrator')) {
        return;
    }

    /*
    |--------------------------------------------------------------------------
    | IMPORT
    |--------------------------------------------------------------------------
    */

    if (isset($_GET['import_tours'])) {

        numa_import_tours();

        exit;
    }

    /*
    |--------------------------------------------------------------------------
    | ROLLBACK
    |--------------------------------------------------------------------------
    */

    if (isset($_GET['rollback_tours'])) {

        numa_rollback_tours();

        exit;
    }
});