<?php
function numa_theme_setup() {

    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');

    register_nav_menus([
        'primary' => 'Primary Menu',
    ]);
}

add_action('after_setup_theme', 'numa_theme_setup');


add_action('after_setup_theme', function () {
    add_theme_support('woocommerce');
});

add_filter('woocommerce_add_to_cart_redirect', function ($url) {

    return wc_get_checkout_url();

});

add_action('init', function () {

    // Disable cart & checkout blocks
    remove_theme_support('block-template-parts');

}, 1);


add_filter('__experimental_woocommerce_blocks_add_data_attributes_to_block', '__return_false');

add_filter('woocommerce_should_load_block_templates', '__return_false');

add_action('after_setup_theme', function () {

    remove_theme_support('block-templates');

}, 20);
?>
