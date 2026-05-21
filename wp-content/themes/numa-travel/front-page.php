<?php get_header(); ?>
<section class="home-hero">
    <h1><?php esc_html_e('Đặt tour du lịch Việt Nam cùng Numa', 'numa-vietnam-travel'); ?></h1>
    <p><?php esc_html_e('Khám phá các tour trọn gói, địa điểm nổi bật và dịch vụ đặt phòng với WooCommerce.', 'numa-vietnam-travel'); ?></p>
    <a class="button-primary" href="<?php echo esc_url(home_url('/shop/')); ?>"><?php esc_html_e('Xem tour nổi bật', 'numa-vietnam-travel'); ?></a>
</section>
<section class="main-content">
    <h2><?php esc_html_e('Tour hot nhất', 'numa-vietnam-travel'); ?></h2>
    <?php echo do_shortcode('[numa_tour_list count="6" category="tour"]'); ?>
</section>
<?php get_footer(); ?>
