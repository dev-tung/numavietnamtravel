<?php
function numa_theme_setup() {
    add_theme_support('title-tag');
    add_theme_support('woocommerce');
    add_theme_support('post-thumbnails');
    register_nav_menu('primary', __('Primary Menu', 'numa-vietnam-travel'));
}
add_action('after_setup_theme', 'numa_theme_setup');

function numa_theme_styles() {
    wp_enqueue_style('numa-style', get_stylesheet_uri(), array(), '1.0.0');
}
add_action('wp_enqueue_scripts', 'numa_theme_styles');

function numa_tour_list_shortcode($atts) {
    $atts = shortcode_atts(array(
        'count' => 6,
        'category' => 'tour',
    ), $atts, 'numa_tour_list');

    $args = array(
        'post_type' => 'product',
        'posts_per_page' => intval($atts['count']),
        'tax_query' => array(
            array(
                'taxonomy' => 'product_cat',
                'field' => 'slug',
                'terms' => sanitize_text_field($atts['category']),
            ),
        ),
    );

    $products = new WP_Query($args);
    if (!$products->have_posts()) {
        return '<p>' . __('Chưa có tour nào. Vui lòng kiểm tra lại sau.', 'numa-vietnam-travel') . '</p>';
    }

    ob_start();
    echo '<div class="tour-grid">';
    while ($products->have_posts()) {
        $products->the_post();
        $price = get_post_meta(get_the_ID(), '_price', true);
        $permalink = get_permalink();
        echo '<article class="tour-card">';
        echo '<h3>' . get_the_title() . '</h3>';
        echo '<div class="tour-card-body">';
        echo '<p>' . wp_trim_words(get_the_excerpt(), 22, '...') . '</p>';
        if (!empty($price)) {
            echo '<p><strong>' . __('Giá từ:', 'numa-vietnam-travel') . ' ' . wc_price($price) . '</strong></p>';
        }
        echo '<a class="tour-card-button" href="' . esc_url($permalink) . '">' . __('Xem chi tiết', 'numa-vietnam-travel') . '</a>';
        echo '</div>';
        echo '</article>';
    }
    echo '</div>';
    wp_reset_postdata();
    return ob_get_clean();
}
add_shortcode('numa_tour_list', 'numa_tour_list_shortcode');

function numa_custom_theme_support() {
    add_theme_support('woocommerce', array(
        'thumbnail_image_width' => 400,
        'single_image_width' => 700,
    ));
}
add_action('after_setup_theme', 'numa_custom_theme_support');
