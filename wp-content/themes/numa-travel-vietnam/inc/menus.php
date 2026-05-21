<?php
function numa_register_menus() {

    register_nav_menus([
        'primary' => __('Primary Menu'),
    ]);
}

add_action('init', 'numa_register_menus');
?>
