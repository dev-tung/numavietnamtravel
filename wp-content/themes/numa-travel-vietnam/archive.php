<?php get_header(); ?>

<div class="container py-5">

<h1 class="mb-5"><?php the_archive_title(); ?></h1>

<div class="row g-4">

<?php if(have_posts()) : while(have_posts()) : the_post(); ?>

<div class="col-md-4">

  <div class="card border-0 shadow-sm h-100">

    <?php if(has_post_thumbnail()) : ?>
      <?php the_post_thumbnail('large', ['class' => 'card-img-top']); ?>
    <?php endif; ?>

    <div class="card-body">

      <h5><?php the_title(); ?></h5>

      <p><?php echo wp_trim_words(get_the_excerpt(), 15); ?></p>

      <a href="<?php the_permalink(); ?>" class="btn btn-primary">
        Xem thêm
      </a>

    </div>

  </div>

</div>

<?php endwhile; endif; ?>

</div>

</div>

<?php get_footer(); ?>
