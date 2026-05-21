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

?>
