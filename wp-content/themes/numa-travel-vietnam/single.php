<?php get_header(); ?>

<div class="container py-5">

<?php if(have_posts()) : while(have_posts()) : the_post(); ?>

<h1><?php the_title(); ?></h1>

<?php if(has_post_thumbnail()) : ?>
  <?php the_post_thumbnail('full', ['class' => 'img-fluid rounded mb-4']); ?>
<?php endif; ?>

<?php the_content(); ?>

<?php endwhile; endif; ?>

</div>

<?php get_footer(); ?>
