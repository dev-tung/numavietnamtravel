<?php 
/* Template Name: Front Page */
get_header(); ?>

<?php
$hero = get_field('hero_slider');

if (!is_array($hero)) {
    $hero = [];
}
?>

<?php if ($hero): ?>
<section class="hero mb-5">

    <div id="heroCarousel"
         class="carousel slide carousel-fade"
         data-bs-ride="carousel">

        <!-- INDICATORS -->
        <div class="carousel-indicators">

            <?php for ($i = 1; $i <= 3; $i++): ?>

                <?php if (!empty($hero["slider_$i"]) && is_array($hero["slider_$i"])): ?>

                    <button type="button"
                            data-bs-target="#heroCarousel"
                            data-bs-slide-to="<?php echo $i - 1; ?>"
                            class="<?php echo $i === 1 ? 'active' : ''; ?>"
                            aria-label="Slide <?php echo $i; ?>">
                    </button>

                <?php endif; ?>

            <?php endfor; ?>

        </div>

        <!-- SLIDES -->
        <div class="carousel-inner overflow-hidden shadow-sm">

            <?php $first = true; ?>

            <?php for ($i = 1; $i <= 3; $i++): ?>

                <?php
                $slider = $hero["slider_$i"] ?? null;

                if (!is_array($slider)) continue;

                $image = $slider['image'] ?? null;
                ?>

                <div class="carousel-item <?php echo $first ? 'active' : ''; ?>">
                    <?php $first = false; ?>

                    <?php if (!empty($image['url'])): ?>
                        <img src="<?php echo esc_url($image['url']); ?>"
                             class="d-block w-100 hero-image"
                             alt="<?php echo esc_attr($image['alt'] ?? ''); ?>">
                    <?php endif; ?>

                    <div class="hero-overlay"></div>

                    <div class="carousel-caption text-start">
                        <div class="hero-content">

                            <?php if (!empty($slider['eyebrow'])): ?>
                                <span class="hero-eyebrow">
                                    <?php echo esc_html($slider['eyebrow']); ?>
                                </span>
                            <?php endif; ?>

                            <?php if (!empty($slider['title'])): ?>
                                <h1 class="hero-title">
                                    <?php echo esc_html($slider['title']); ?>
                                </h1>
                            <?php endif; ?>

                            <?php if (!empty($slider['description'])): ?>
                                <p class="hero-description">
                                    <?php echo esc_html($slider['description']); ?>
                                </p>
                            <?php endif; ?>

                            <?php if (!empty($slider['button_link'])): ?>
                                <a href="<?php echo esc_url($slider['button_link']); ?>"
                                   class="btn btn-primary btn-lg px-4">

                                    <?php echo esc_html($slider['button_text'] ?? 'Discover'); ?>

                                </a>
                            <?php endif; ?>

                        </div>
                    </div>

                </div>

            <?php endfor; ?>

        </div>

        <!-- CONTROLS -->
        <button class="carousel-control-prev"
                type="button"
                data-bs-target="#heroCarousel"
                data-bs-slide="prev">
            <span class="carousel-control-prev-icon"></span>
        </button>

        <button class="carousel-control-next"
                type="button"
                data-bs-target="#heroCarousel"
                data-bs-slide="next">
            <span class="carousel-control-next-icon"></span>
        </button>

    </div>

</section>
<?php endif; ?>


<style>

/* =========================================
HERO
========================================= */

.hero-image{
    height:720px;
    object-fit:cover;
}

/* OVERLAY */

.hero-overlay{
    position:absolute;
    inset:0;
    background:linear-gradient(
        to right,
        rgba(0,0,0,0.65) 0%,
        rgba(0,0,0,0.35) 45%,
        rgba(0,0,0,0.15) 100%
    );
    z-index:1;
}

/* CAPTION */

.carousel-caption{
    z-index:2;
    left:8%;
    right:auto;
    bottom:50%;
    transform:translateY(50%);
    text-align:left;
    max-width:720px;
}

/* CONTENT */

.hero-content{
    animation:fadeUp 0.8s ease;
}

/* =========================================
HERO BUTTON MOBILE FIX
========================================= */

@media (max-width: 768px) {

    .hero-content .btn {
        font-size: 14px;
        padding: 8px 14px !important;
        border-radius: 6px;
    }

    .hero-title {
        font-size: 22px;
        line-height: 1.3;
    }

    .hero-description {
        font-size: 13px;
    }

    .hero-eyebrow {
        font-size: 12px;
    }
}

/* EYEBROW */

.hero-eyebrow{
    display:inline-block;
    margin-bottom:18px;
    padding:8px 16px;
    border-radius:999px;
    background:rgba(255,255,255,0.12);
    backdrop-filter:blur(8px);
    color:#6FC0F7;
    font-size:13px;
    font-weight:700;
    letter-spacing:1px;
    text-transform:uppercase;
}

/* TITLE */

.hero-title{
    font-size:64px;
    line-height:1.1;
    font-weight:800;
    color:#fff;
    margin-bottom:24px;
}

/* DESCRIPTION */

.hero-description{
    font-size:20px;
    line-height:1.7;
    color:rgba(255,255,255,0.92);
    margin-bottom:36px;
    max-width:620px;
}

/* BUTTON */

.hero .btn-primary{
    background:#6FC0F7;
    border-color:#6FC0F7;
    padding-top:14px;
    padding-bottom:14px;
    font-weight:600;
    border-radius:999px;
}

.hero .btn-primary:hover{
    background:#58b3f1;
    border-color:#58b3f1;
}

/* CONTROLS */

.carousel-control-prev,
.carousel-control-next{
    width:70px;
}

.carousel-control-prev-icon,
.carousel-control-next-icon{
    width:48px;
    height:48px;
    border-radius:50%;
    background-color:rgba(255,255,255,0.18);
    backdrop-filter:blur(8px);
    background-size:50%;
}

/* INDICATORS */

.carousel-indicators{
    margin-bottom:28px;
}

.carousel-indicators button{
    width:12px !important;
    height:12px !important;
    border-radius:50%;
    border:none !important;
    background:#fff !important;
    opacity:0.5;
}

.carousel-indicators .active{
    opacity:1;
    background:#6FC0F7 !important;
}

/* ANIMATION */

@keyframes fadeUp{

    from{
        opacity:0;
        transform:translateY(24px);
    }

    to{
        opacity:1;
        transform:translateY(0);
    }

}

/* =========================================
RESPONSIVE
========================================= */

@media (max-width:991px){

    .hero-image{
        height:620px;
    }

    .carousel-caption{
        left:6%;
        right:6%;
        bottom:80px;
        transform:none;
        max-width:none;
    }

    .hero-title{
        font-size:44px;
    }

    .hero-description{
        font-size:18px;
    }

}

@media (max-width:767px){

    .hero-image{
        height:540px;
    }

    .hero-title{
        font-size:32px;
    }

    .hero-description{
        font-size:16px;
        line-height:1.6;
    }

    .hero-eyebrow{
        font-size:11px;
    }

    .carousel-control-prev,
    .carousel-control-next{
        display:none;
    }

}

</style>

  <main class="container py-4">
    <section class="mb-5">

        <div class="d-flex flex-column flex-md-row align-items-start align-items-md-center justify-content-between gap-3 mb-4">

            <div>
                <h2 class="h3 mb-1">Featured Tours</h2>
                <p class="text-muted mb-0">
                    Choose the perfect journey for every need.
                </p>
            </div>

            <a href="<?php echo esc_url(get_permalink(wc_get_page_id('shop'))); ?>"
              class="text-primary text-decoration-none fw-semibold">
                View all →
            </a>

        </div>

        <div class="row g-4">

            <?php

            $featuredTours = new WP_Query([
                'post_type'      => 'product',
                'posts_per_page' => 3,
                'post__not_in'   => [get_the_ID()],
                'orderby'        => 'rand',
                'post_status'    => 'publish'
            ]);

            if ($featuredTours->have_posts()) :

                while ($featuredTours->have_posts()) :

                    $featuredTours->the_post();

                    $tourDuration  = get_field('tour_duration');
                    $tourDeparture = get_field('tour_departure');
                    $tourPrice     = get_field('tour_price');

            ?>

            <div class="col-12 col-md-6 col-xl-4">

                <article class="card border-0 shadow-sm h-100">

                    <a href="<?php the_permalink(); ?>">

                        <?php if (has_post_thumbnail()) : ?>

                            <?php the_post_thumbnail(
                                'large',
                                [
                                    'class' => 'card-img-top rounded-top',
                                    'style' => 'height:220px;object-fit:cover;'
                                ]
                            ); ?>

                        <?php else : ?>

                            <img src="https://via.placeholder.com/800x500"
                                class="card-img-top rounded-top"
                                alt="<?php the_title_attribute(); ?>">

                        <?php endif; ?>

                    </a>

                    <div class="card-body">

                        <h5 class="card-title">

                            <a href="<?php the_permalink(); ?>"
                              class="text-decoration-none text-dark">

                                <?php the_title(); ?>

                            </a>

                        </h5>

                        <p class="card-text text-muted">

                            <?php echo wp_trim_words(
                                get_the_excerpt(),
                                15
                            ); ?>

                        </p>

                        <div class="d-flex flex-wrap gap-2 text-muted small">

                            <span class="meta-item">

                                <svg class="meta-icon"
                                    width="16"
                                    height="16"
                                    viewBox="0 0 24 24"
                                    fill="none"
                                    stroke="currentColor"
                                    stroke-width="2">

                                    <circle cx="12" cy="12" r="10"></circle>
                                    <polyline points="12 6 12 12 16 14"></polyline>

                                </svg>

                                <span>
                                    <?php echo esc_html(
                                        $tourDuration ?: '3 Days 2 Nights'
                                    ); ?>
                                </span>

                            </span>

                            <span class="meta-item">

                                <svg class="meta-icon"
                                    width="16"
                                    height="16"
                                    viewBox="0 0 24 24"
                                    fill="none"
                                    stroke="currentColor"
                                    stroke-width="2">

                                    <rect x="3"
                                          y="4"
                                          width="18"
                                          height="18"
                                          rx="2"></rect>

                                    <line x1="16" y1="2" x2="16" y2="6"></line>
                                    <line x1="8" y1="2" x2="8" y2="6"></line>
                                    <line x1="3" y1="10" x2="21" y2="10"></line>

                                </svg>

                                <span>
                                    <?php echo esc_html(
                                        $tourDeparture ?: 'Daily Departure'
                                    ); ?>
                                </span>

                            </span>

                        </div>

                    </div>

                    <div class="card-footer bg-white border-0 d-flex justify-content-between align-items-center gap-3">

                        <div class="fw-bold">

                            <?php echo esc_html(
                                $tourPrice ?: 'Contact Us'
                            ); ?>

                        </div>

                        <a href="<?php the_permalink(); ?>"
                          class="btn btn-outline-primary btn-sm">

                            View details

                        </a>

                    </div>

                </article>

            </div>

            <?php

                endwhile;

                wp_reset_postdata();

            endif;

            ?>

        </div>

    </section>

    <section class="mb-5 py-4 px-3 rounded-4"
            style="background: rgba(111,192,247,0.12);">

        <div class="d-flex flex-column flex-md-row align-items-start align-items-md-center justify-content-between gap-3 mb-4">

            <div>
                <h2 class="h3 mb-1">Top Destinations</h2>
                <p class="text-muted mb-0">
                    The most attractive places in Vietnam.
                </p>
            </div>

            <a href="<?php echo esc_url(get_permalink(wc_get_page_id('shop'))); ?>"
              class="text-primary text-decoration-none fw-semibold">

                View all →

            </a>

        </div>

        <div class="row g-3">

            <?php

            $categories = get_terms([
                'taxonomy'   => 'product_cat',
                'hide_empty' => true,
                'number'     => 6,
                'orderby'    => 'count',
                'order'      => 'DESC',
            ]);

            foreach ($categories as $category) :

                $thumbnailId = get_term_meta(
                    $category->term_id,
                    'thumbnail_id',
                    true
                );

                $image = $thumbnailId
                    ? wp_get_attachment_image_url(
                        $thumbnailId,
                        'medium'
                    )
                    : wc_placeholder_img_src();

            ?>

            <div class="col-6 col-md-4 col-xl-2">

                <a href="<?php echo esc_url(
                    get_term_link($category)
                ); ?>"
                  class="text-decoration-none text-dark">

                    <div class="destination-card rounded-4 bg-white shadow-sm p-3 text-center h-100">

                        <img src="<?php echo esc_url($image); ?>"
                            class="img-fluid rounded-4 mb-3"
                            alt="<?php echo esc_attr($category->name); ?>"
                            style="height:120px;width:100%;object-fit:cover;">

                        <h6 class="mb-1">

                            <?php echo esc_html(
                                $category->name
                            ); ?>

                        </h6>

                        <small class="text-muted">

                            <?php echo $category->count; ?>
                            Tours

                        </small>

                    </div>

                </a>

            </div>

            <?php endforeach; ?>

        </div>

    </section>

    <section class="mb-5">

        <div class="d-flex flex-column flex-md-row align-items-start align-items-md-center justify-content-between gap-3 mb-4">

            <div>
                <h2 class="h3 mb-1">Featured Blog</h2>
                <p class="text-muted mb-0">
                    Latest travel news and guides.
                </p>
            </div>

            <a href="<?php echo esc_url(get_permalink(get_option('page_for_posts'))); ?>"
              class="text-primary text-decoration-none fw-semibold">

                View all →

            </a>

        </div>

        <div class="row g-4">

            <?php

            $blogs = new WP_Query([
                'post_type'      => 'post',
                'posts_per_page' => 3,
                'post_status'    => 'publish',
                'orderby'        => 'date',
                'order'          => 'DESC'
            ]);

            if ($blogs->have_posts()) :

                while ($blogs->have_posts()) :

                    $blogs->the_post();

            ?>

            <div class="col-12 col-md-6 col-xl-4">

                <article class="card border-0 shadow-sm h-100 overflow-hidden">

                    <a href="<?php the_permalink(); ?>">

                        <?php if (has_post_thumbnail()) : ?>

                            <?php the_post_thumbnail(
                                'large',
                                [
                                    'class' => 'card-img-top blog-image',
                                    'style' => 'height:240px;object-fit:cover;'
                                ]
                            ); ?>

                        <?php else : ?>

                            <img src="<?php echo esc_url(
                                get_template_directory_uri() .
                                '/assets/images/blog-placeholder.jpg'
                            ); ?>"
                            class="card-img-top blog-image"
                            alt="<?php the_title_attribute(); ?>">

                        <?php endif; ?>

                    </a>

                    <div class="card-body p-4">

                        <small class="text-muted">

                            <?php echo get_the_date('d/m/Y'); ?>

                        </small>

                        <h5 class="mt-2">

                            <a href="<?php the_permalink(); ?>"
                              class="text-decoration-none text-dark">

                                <?php the_title(); ?>

                            </a>

                        </h5>

                        <p class="text-muted">

                            <?php
                            echo wp_trim_words(
                                get_the_excerpt(),
                                18
                            );
                            ?>

                        </p>

                    </div>

                    <div class="card-footer bg-white border-0 p-4 pt-0">

                        <a href="<?php the_permalink(); ?>"
                          class="text-primary text-decoration-none fw-semibold">

                            Read more →

                        </a>

                    </div>

                </article>

            </div>

            <?php

                endwhile;

                wp_reset_postdata();

            else :

            ?>

                <div class="col-12">

                    <div class="alert alert-light">

                        No blog posts found.

                    </div>

                </div>

            <?php endif; ?>

        </div>

    </section>
  </main>

<?php get_footer(); ?>