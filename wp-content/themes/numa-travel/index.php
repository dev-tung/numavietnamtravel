<?php get_header(); ?>
<div class="main-content">
    <?php if (have_posts()) : ?>
        <?php while (have_posts()) : the_post(); ?>
            <article id="post-<?php the_ID(); ?>" <?php post_class(); ?> >
                <h2><?php the_title(); ?></h2>
                <div><?php the_content(); ?></div>
            </article>
        <?php endwhile; ?>
    <?php else : ?>
        <p><?php esc_html_e('Không có nội dung để hiển thị.', 'numa-vietnam-travel'); ?></p>
    <?php endif; ?>
</div>
<?php get_footer(); ?>
