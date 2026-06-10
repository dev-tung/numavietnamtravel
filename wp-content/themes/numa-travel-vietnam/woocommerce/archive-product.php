<?php get_header(); ?>
<style>
/* CARD luôn đều nhau */
.d-flex.flex-column.gap-4 article.card {
  height: 100%;
}

/* IMAGE luôn đồng đều */
.card .col-md-4 {
  aspect-ratio: 4 / 3;
  overflow: hidden;
}

.card .col-md-4 img {
  width: 100%;
  height: 100%;
  object-fit: cover;
  display: block;
}

/* TITLE + TEXT không làm vỡ card */
.card h3 {
  display: -webkit-box;
  -webkit-line-clamp: 2;
  -webkit-box-orient: vertical;
  overflow: hidden;
}

.card p {
  display: -webkit-box;
  -webkit-line-clamp: 3;
  -webkit-box-orient: vertical;
  overflow: hidden;
}

/* đảm bảo bottom luôn xuống đáy */
.card .card-body {
  display: flex;
  flex-direction: column;
  height: 100%;
}

.card .mt-auto {
  margin-top: auto !important;
}
</style>
<main class="container p-3">

  <div class="bg-white rounded-1 shadow-sm p-4">

    <!-- Breadcrumb -->
    <nav class="small text-muted mb-3">

        <a href="<?php echo esc_url(home_url('/')); ?>"
          class="text-decoration-none text-muted">
            Home
        </a>

        <?php
        // Lấy category hiện tại nếu đang ở trang taxonomy product_cat
        if (is_product_category()) :

            $term = get_queried_object();
        ?>

            <span class="mx-2">›</span>

            <a href="<?php echo esc_url(get_term_link($term)); ?>"
              class="text-decoration-none text-muted">

                <?php echo esc_html($term->name); ?>

            </a>

        <?php elseif (is_shop()) : ?>

            <span class="mx-2">›</span>

            <span>Shop</span>

        <?php endif; ?>

    </nav>

    <!-- Heading -->
    <div class="d-flex flex-column flex-lg-row justify-content-between align-items-lg-center gap-3 mb-5">

      <div>

        <h1 class="fw-bold mb-2">
          <?php woocommerce_page_title(); ?>
        </h1>

        <p class="text-muted mb-0">
          <?php
            global $wp_query;
            $count = $wp_query->found_posts;
            echo "Discover exciting travel tours specially designed for you ({$count} tours)";
          ?>
        </p>

      </div>

      <div>

        <form method="get">

          <select class="form-select rounded-1 shadow-sm"
                  name="orderby"
                  onchange="this.form.submit()">

            <?php
              $orderby = isset($_GET['orderby']) ? $_GET['orderby'] : 'date';
            ?>

            <option value="date" <?php selected($orderby, 'date'); ?>>
              Sort by: Latest
            </option>

            <option value="price" <?php selected($orderby, 'price'); ?>>
              Price: Low to High
            </option>

            <option value="price-desc" <?php selected($orderby, 'price-desc'); ?>>
              Price: High to Low
            </option>

            <option value="featured" <?php selected($orderby, 'featured'); ?>>
              Featured Tours
            </option>

          </select>

        </form>

      </div>

    </div>

    <!-- Layout -->
    <div class="row g-4">

      <!-- Sidebar -->
      <div class="col-12 col-lg-3">

          <div class="border rounded-1 p-4 h-100">

              <h5 class="fw-bold mb-4">
                  SEARCH FILTERS
              </h5>

              <form method="get"
                    action="<?php echo esc_url(wc_get_page_permalink('shop')); ?>">

                  <!-- Search -->
                  <div class="mb-4">

                      <label class="form-label fw-semibold small">
                          Search
                      </label>

                      <div class="input-group">

                          <input type="text"
                                name="s"
                                value="<?php echo esc_attr(get_search_query()); ?>"
                                class="form-control border-end-0 rounded-start-3"
                                placeholder="Enter tour name, destination...">

                          <span class="input-group-text bg-white border-start-0 rounded-end-3">

                              <svg xmlns="http://www.w3.org/2000/svg"
                                  width="18"
                                  height="18"
                                  fill="currentColor"
                                  class="bi bi-search text-muted"
                                  viewBox="0 0 16 16">

                                  <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397
                                  1.398h-.001q.044.06.098.115l3.85
                                  3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1
                                  1 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1
                                  1-11 0 5.5 5.5 0 0 1 11 0"/>

                              </svg>

                          </span>

                      </div>

                  </div>

                  <!-- Category -->
                  <div class="mb-4">

                      <label class="form-label fw-semibold small">
                          Tour Categories
                      </label>

                      <div class="d-flex flex-column gap-2 small">

                          <?php

                          $selected = isset($_GET['product_cat'])
                              ? (array) $_GET['product_cat']
                              : [];

                          $uncategorized = get_term_by(
                              'slug',
                              'uncategorized',
                              'product_cat'
                          );

                          $exclude_ids = [];

                          if ($uncategorized) {
                              $exclude_ids[] = $uncategorized->term_id;
                          }

                          $parents = get_terms([
                              'taxonomy'   => 'product_cat',
                              'hide_empty' => true,
                              'parent'     => 0,
                              'exclude'    => $exclude_ids
                          ]);

                          if (!empty($parents) && !is_wp_error($parents)) :

                              foreach ($parents as $parent) :

                          ?>

                              <!-- Parent Category -->

                              <div class="form-check">

                                  <input class="form-check-input"
                                        type="checkbox"
                                        name="product_cat[]"
                                        value="<?php echo esc_attr($parent->slug); ?>"
                                        id="cat-<?php echo esc_attr($parent->term_id); ?>"
                                        <?php checked(in_array($parent->slug, $selected)); ?>>

                                  <label class="form-check-label fw-semibold"
                                        for="cat-<?php echo esc_attr($parent->term_id); ?>">

                                      <?php echo esc_html($parent->name); ?>

                                  </label>

                              </div>

                              <?php

                              $children = get_terms([
                                  'taxonomy'   => 'product_cat',
                                  'hide_empty' => true,
                                  'parent'     => $parent->term_id
                              ]);

                              if (!empty($children) && !is_wp_error($children)) :

                                  foreach ($children as $child) :

                              ?>

                                  <!-- Child Category -->

                                  <div class="form-check ms-4">

                                      <input class="form-check-input"
                                            type="checkbox"
                                            name="product_cat[]"
                                            value="<?php echo esc_attr($child->slug); ?>"
                                            id="cat-<?php echo esc_attr($child->term_id); ?>"
                                            <?php checked(in_array($child->slug, $selected)); ?>>

                                      <label class="form-check-label"
                                            for="cat-<?php echo esc_attr($child->term_id); ?>">

                                          └ <?php echo esc_html($child->name); ?>

                                      </label>

                                  </div>

                              <?php

                                  endforeach;

                              endif;

                              ?>

                          <?php

                              endforeach;

                          endif;

                          ?>

                      </div>

                  </div>

                  <div class="d-grid gap-2">

                      <button type="submit"
                              class="btn btn-primary rounded-1">

                          Search Tours

                      </button>

                      <a href="<?php echo esc_url(
                          wc_get_page_permalink('shop')
                      ); ?>"
                        class="btn btn-outline-secondary rounded-1">

                          Clear Filters

                      </a>

                  </div>

              </form>

          </div>

      </div>

      <!-- Content -->
      <div class="col-12 col-lg-9">

        <div class="mb-4">
          <p class="text-muted small mb-0">
            <?php
              global $wp_query;
              $count = $wp_query->found_posts;
              $paged = max(1, get_query_var('paged'));
              $per_page = get_query_var('posts_per_page') ?: 5;

              $from = ($paged - 1) * $per_page + 1;
              $to = min($paged * $per_page, $count);

              echo "Showing {$from} - {$to} of {$count} tours";
            ?>
          </p>
        </div>

        <!-- Tour List -->
        <div class="d-flex flex-column gap-4">

          <?php if (woocommerce_product_loop()) : ?>
          <?php while (have_posts()) : the_post(); global $product; ?>

          <?php
            $tourDuration       = get_field('tour_duration');
            $tourDeparture      = get_field('tour_departure');
            $tourPrice          = get_field('tour_price');
            $tourTransportation = get_field('tour_transportation');
            $tourAccommodation  = get_field('tour_accommodation');
            $tourMeal           = get_field('tour_meal');
          ?>

          <article class="card border shadow-sm rounded-1 overflow-hidden h-100">

            <div class="row g-0 h-100">

              <!-- Image -->
              <div class="col-md-4 position-relative">

                <?php if ($product->is_featured()) : ?>
                  <span class="badge bg-primary position-absolute top-0 start-0 m-3 px-3 py-2 rounded-pill">
                    Featured
                  </span>
                <?php endif; ?>

                <a href="<?php the_permalink(); ?>">

                <?php
                $image = get_the_post_thumbnail_url(
                    get_the_ID(),
                    'large'
                );

                if (!$image) {
                    $image = 'https://placehold.co/800x600?text=Tour+Image';
                }
                ?>

                <img src="<?php echo esc_url($image); ?>"
                    class="img-fluid w-100 h-100 object-fit-cover"
                    alt="<?php echo esc_attr(get_the_title()); ?>"
                    loading="lazy"
                    decoding="async"
                    onerror="this.onerror=null;this.src='https://placehold.co/800x600?text=Tour+Image';">

                </a>

              </div>

              <!-- Content -->
              <div class="col-md-8">

                <div class="card-body p-4 h-100 d-flex flex-column">

                  <div>

                    <h3 class="h4 fw-bold mb-3">
                      <a href="<?php the_permalink(); ?>" class="text-decoration-none text-dark">
                        <?php the_title(); ?>
                      </a>
                    </h3>

                    <!-- Meta -->
                    <div class="d-flex flex-wrap gap-4 text-muted small mb-3">

                      <span class="d-flex align-items-center gap-2">

                        <svg xmlns="http://www.w3.org/2000/svg"
                            width="16"
                            height="16"
                            fill="currentColor"
                            class="bi bi-clock"
                            viewBox="0 0 16 16">

                          <path d="M8 3.5a.5.5 0 0 1 .5.5v4.25l3 1.8a.5.5 0 1 1-.5.86l-3.25-1.95A.5.5 0 0 1 7.5 8V4a.5.5 0 0 1 .5-.5z"/>
                          <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm0-1A7 7 0 1 1 8 1a7 7 0 0 1 0 14z"/>

                        </svg>

                        <?php echo esc_html($tourDuration ?: '3 Days 2 Nights'); ?>

                      </span>

                      <span class="d-flex align-items-center gap-2">

                        <svg xmlns="http://www.w3.org/2000/svg"
                            width="16"
                            height="16"
                            fill="currentColor"
                            class="bi bi-calendar-event"
                            viewBox="0 0 16 16">

                          <path d="M11 6.5a.5.5 0 0 1 .5.5v1h1a.5.5 0 0 1 0 1h-1v1a.5.5 0 0 1-1 0V9h-1a.5.5 0 0 1 0-1h1V7a.5.5 0 0 1 .5-.5z"/>
                          <path d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5zM1 5v8a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V5H1z"/>

                        </svg>

                        Departure:
                        <?php echo esc_html($tourDeparture ?: 'Daily'); ?>

                      </span>

                    </div>

                    <p class="text-muted mb-4">
                      <?php echo wp_trim_words(get_the_excerpt(), 25); ?>
                    </p>

                    <!-- Features -->
                    <div class="d-flex flex-wrap gap-4 text-muted small mb-4">

                      <span class="d-flex align-items-center gap-2">

                        <svg xmlns="http://www.w3.org/2000/svg"
                            width="16"
                            height="16"
                            fill="currentColor"
                            class="bi bi-bus-front"
                            viewBox="0 0 16 16">

                          <path d="M4 0a2 2 0 0 0-2 2v9a2 2 0 0 0 1 1.732V14a1 1 0 0 0 2 0v-1h6v1a1 1 0 1 0 2 0v-1.268A2 2 0 0 0 14 11V2a2 2 0 0 0-2-2H4zm0 1h8a1 1 0 0 1 1 1v4H3V2a1 1 0 0 1 1-1z"/>
                          <path d="M3 7h10v4a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V7zm1.5 3a.5.5 0 1 0 0-1 .5.5 0 0 0 0 1zm7 0a.5.5 0 1 0 0-1 .5.5 0 0 0 0 1z"/>

                        </svg>

                        <?php echo esc_html($tourTransportation ?: 'Tourist Bus'); ?>

                      </span>

                      <span class="d-flex align-items-center gap-2">

                        <svg xmlns="http://www.w3.org/2000/svg"
                            width="16"
                            height="16"
                            fill="currentColor"
                            class="bi bi-building"
                            viewBox="0 0 16 16">

                          <path d="M6.5 15V1h3v14h5V0H1v15h5zm1-13h1v1h-1V2zm0 2h1v1h-1V4zm0 2h1v1h-1V6zm0 2h1v1h-1V8z"/>

                        </svg>

                        <?php echo esc_html($tourAccommodation ?: '3-4 Star Hotel'); ?>

                      </span>

                      <span class="d-flex align-items-center gap-2">

                        <svg xmlns="http://www.w3.org/2000/svg"
                            width="16"
                            height="16"
                            fill="currentColor"
                            class="bi bi-cup-hot"
                            viewBox="0 0 16 16">

                          <path d="M2 2h11v5a4 4 0 0 1-8 0V2z"/>
                          <path d="M0 13h14v1H0z"/>

                        </svg>

                        <?php echo esc_html($tourMeal ?: 'Meals Included'); ?>

                      </span>

                    </div>

                  </div>

                  <!-- Bottom -->
                  <div class="d-flex flex-column flex-sm-row justify-content-between align-items-sm-center gap-3 mt-auto">

                    <div class="fw-bold fs-3">

                      <?php echo esc_html($tourPrice ?: 'Contact Us'); ?>

                    </div>

                    <a href="<?php the_permalink(); ?>"
                      class="btn btn-outline-primary rounded-1 px-4">
                      View Details
                    </a>

                  </div>

                </div>

              </div>

            </div>

          </article>

          <?php endwhile; ?>
          <?php else : ?>

          <p class="text-muted">No tours found.</p>

          <?php endif; ?>

        </div>

        <!-- Pagination -->
        <?php
        $links = paginate_links([
            'type'      => 'array',
            'prev_text' => '&laquo;',
            'next_text' => '&raquo;',
            'mid_size'  => 2,
        ]);

        if ($links) :
        ?>

        <nav class="mt-5">

            <ul class="pagination justify-content-center">

                <?php foreach ($links as $link) : ?>

                    <li class="page-item">

                        <?php
                        echo str_replace(
                            'page-numbers',
                            'page-link',
                            $link
                        );
                        ?>

                    </li>

                <?php endforeach; ?>

            </ul>

        </nav>

        <?php endif; ?>

      </div>

    </div>

  </div>

</main>

<?php get_footer(); ?>