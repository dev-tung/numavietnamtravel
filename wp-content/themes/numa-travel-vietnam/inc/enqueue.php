<?php
function numa_enqueue_assets() {

    wp_enqueue_style(
        'bootstrap',
        get_template_directory_uri() . '/assets/css/bootstrap.min.css'
    );

    wp_enqueue_style(
        'main-style',
        get_template_directory_uri() . '/assets/css/main.css'
    );

    wp_enqueue_script(
        'bootstrap-js',
        get_template_directory_uri() . '/assets/js/bootstrap.bundle.min.js',
        [],
        null,
        true
    );
}

add_action('wp_enqueue_scripts', 'numa_enqueue_assets');
?>
