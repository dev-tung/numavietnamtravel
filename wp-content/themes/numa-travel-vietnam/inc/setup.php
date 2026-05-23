<?php

/*
|--------------------------------------------------------------------------
| THEME SETUP
|--------------------------------------------------------------------------
|
| Khởi tạo theme:
| - Title tag
| - Featured image
| - Navigation menu
|
*/

function numa_theme_setup() {

    /*
    |--------------------------------------------------------------------------
    | TITLE TAG
    |--------------------------------------------------------------------------
    |
    | Cho phép WordPress tự quản lý:
    | <title>
    |
    */

    add_theme_support('title-tag');


    /*
    |--------------------------------------------------------------------------
    | FEATURED IMAGE
    |--------------------------------------------------------------------------
    |
    | Enable thumbnail cho:
    | - Post
    | - Page
    | - Product
    |
    */

    add_theme_support('post-thumbnails');


    /*
    |--------------------------------------------------------------------------
    | REGISTER MENUS
    |--------------------------------------------------------------------------
    |
    | Appearance > Menus
    |
    */

    register_nav_menus([
        'primary' => 'Primary Menu',
    ]);
}

add_action(
    'after_setup_theme',
    'numa_theme_setup'
);


/*
|--------------------------------------------------------------------------
| WOOCOMMERCE SUPPORT
|--------------------------------------------------------------------------
|
| Enable WooCommerce support cho theme
|
*/

add_action('after_setup_theme', function () {

    add_theme_support('woocommerce');

});


/*
|--------------------------------------------------------------------------
| REDIRECT AFTER ADD TO CART
|--------------------------------------------------------------------------
|
| Khi add to cart:
| -> redirect thẳng checkout
|
*/

add_filter('woocommerce_add_to_cart_redirect', function ($url) {

    return wc_get_checkout_url();

});


/*
|--------------------------------------------------------------------------
| DISABLE BLOCK TEMPLATE PARTS
|--------------------------------------------------------------------------
|
| Tắt Gutenberg block template parts
|
*/

add_action('init', function () {

    remove_theme_support('block-template-parts');

}, 1);


/*
|--------------------------------------------------------------------------
| DISABLE WOOCOMMERCE BLOCK ATTRIBUTES
|--------------------------------------------------------------------------
|
| Tắt data attributes của WooCommerce blocks
|
*/

add_filter(
    '__experimental_woocommerce_blocks_add_data_attributes_to_block',
    '__return_false'
);


/*
|--------------------------------------------------------------------------
| DISABLE WOOCOMMERCE BLOCK TEMPLATES
|--------------------------------------------------------------------------
|
| Không load block templates của WooCommerce
|
*/

add_filter(
    'woocommerce_should_load_block_templates',
    '__return_false'
);


/*
|--------------------------------------------------------------------------
| REMOVE BLOCK TEMPLATES
|--------------------------------------------------------------------------
|
| Tắt hoàn toàn WordPress block templates
|
*/

add_action('after_setup_theme', function () {

    remove_theme_support('block-templates');

}, 20);

?>