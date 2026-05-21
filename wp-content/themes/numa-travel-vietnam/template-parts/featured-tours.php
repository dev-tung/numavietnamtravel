<section class="container py-5">

<h2 class="mb-4">Tour nổi bật</h2>

<div class="row g-4">

<?php
$tours = new WP_Query([
    'post_type' => 'post',
    'posts_per_page' => 3
]);

if($tours->have_posts()) :
while($tours->have_posts()) :
$tours->the_post();
?>

<div class="col-md-4">

  <div class="card border-0 shadow-sm h-100">

    <?php if(has_post_thumbnail()) : ?>
      <?php the_post_thumbnail('large', ['class' => 'card-img-top']); ?>
    <?php endif; ?>

    <div class="card-body">

      <h5><?php the_title(); ?></h5>

      <p><?php echo wp_trim_words(get_the_excerpt(), 15); ?></p>

      <a href="<?php the_permalink(); ?>" class="btn btn-primary">
        Xem chi tiết
      </a>

    </div>

  </div>

</div>

<?php
endwhile;
wp_reset_postdata();
endif;
?>

</div>

</section>
