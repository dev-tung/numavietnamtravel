<?php get_header(); ?>

<style>

.blog-page .blog-card{
    transition:.25s;
}

.blog-page .blog-card:hover{
    transform:translateY(-3px);
}

.blog-page .blog-card img{
    min-height:260px;
    object-fit:cover;
}

.blog-page .filter-box{
    position:sticky;
    top:100px;
}

.blog-page .post-category{
    font-size:12px;
    font-weight:700;
    letter-spacing:.5px;
    text-transform:uppercase;
    color:#6c757d;
}

.blog-page .post-meta{
    font-size:14px;
    color:#6c757d;
}

.blog-page .pagination .page-link{
    margin:0 4px;
}

@media(max-width:992px){

    .blog-page .filter-box{
        position:static;
    }

    .blog-page .blog-card img{
        min-height:220px;
    }

}

</style>

<main class="container p-3 blog-page">

<div class="bg-white rounded-1 shadow-sm p-4">


    <!-- Breadcrumb -->

    <nav class="mb-3 small text-muted">

        <a href="<?php echo esc_url(home_url()); ?>"
        class="text-decoration-none text-muted">

            Home

        </a>

        <span class="mx-2">›</span>

        <a href="<?php echo esc_url(get_permalink(get_option('page_for_posts'))); ?>"
        class="text-decoration-none text-muted">

            Blog

        </a>

        <span class="mx-2">›</span>

        <span>

            <?php the_title(); ?>

        </span>

    </nav>



    <!-- Heading -->

    <?php

    $currentSort = $_GET['sort'] ?? 'latest';

    ?>

    <div class="d-flex flex-column flex-lg-row justify-content-between align-items-lg-center gap-3 mb-5">

        <div>

            <h1 class="fw-bold mb-2">

                Blog / News

            </h1>

            <p class="text-muted mb-0">

                Discover travel experiences and useful tips

            </p>

        </div>

        <div>

            <form method="get">

                <select name="sort"
                        class="form-select rounded-1 shadow-sm"
                        onchange="this.form.submit()">

                    <option value="latest"
                        <?php selected($currentSort, 'latest'); ?>>

                        Sort by: Latest

                    </option>

                    <option value="oldest"
                        <?php selected($currentSort, 'oldest'); ?>>

                        Oldest

                    </option>

                    <option value="title"
                        <?php selected($currentSort, 'title'); ?>>

                        A → Z

                    </option>

                </select>

            </form>

        </div>

    </div>



    <!-- Layout -->

    <div class="row g-4">


        <!-- SIDEBAR -->

        <?php

        $currentSearch = $_GET['s'] ?? '';
        $currentCat    = $_GET['cat'] ?? '';

        $categories = get_categories([
            'hide_empty' => true
        ]);

        ?>

        <div class="col-12 col-lg-3">

            <div class="border rounded-1 p-4 filter-box">

                <h5 class="fw-bold mb-4">
                    SEARCH FILTERS
                </h5>

                <form method="get">

                    <!-- Search -->

                    <div class="mb-4">

                        <label class="form-label fw-semibold small">
                            Search Articles
                        </label>

                        <div class="input-group">

                            <input
                                type="text"
                                name="s"
                                value="<?php echo esc_attr($currentSearch); ?>"
                                class="form-control border-end-0 rounded-start-3"
                                placeholder="Search article..."
                            >

                            <button
                                type="submit"
                                class="input-group-text bg-white border-start-0 rounded-end-3"
                            >

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

                            </button>

                        </div>

                    </div>

                    <!-- Categories -->

                    <div class="mb-4">

                        <label class="form-label fw-semibold small">
                            Categories
                        </label>

                        <div class="d-flex flex-column gap-3 small">

                            <?php foreach ($categories as $category) : ?>

                                <div class="form-check">

                                    <input
                                        class="form-check-input"
                                        type="radio"
                                        name="cat"
                                        value="<?php echo $category->term_id; ?>"
                                        id="cat_<?php echo $category->term_id; ?>"
                                        <?php checked($currentCat, $category->term_id); ?>
                                    >

                                    <label
                                        class="form-check-label"
                                        for="cat_<?php echo $category->term_id; ?>"
                                    >

                                        <?php echo esc_html($category->name); ?>

                                        <span class="text-muted">
                                            (<?php echo $category->count; ?>)
                                        </span>

                                    </label>

                                </div>

                            <?php endforeach; ?>

                        </div>

                    </div>

                    <div class="d-grid gap-2">

                        <button
                            type="submit"
                            class="btn btn-dark rounded-1"
                        >
                            Apply Filters
                        </button>

                        <a href="<?php echo esc_url(get_permalink(get_option('page_for_posts'))); ?>"
                        class="btn btn-outline-secondary rounded-1">

                            Clear Filters

                        </a>

                    </div>

                </form>

            </div>

        </div>



        <!-- CONTENT -->

        <?php

        $paged = max(1, get_query_var('paged'));

        $args = [
            'post_type'      => 'post',
            'post_status'    => 'publish',
            'posts_per_page' => 5,
            'paged'          => $paged,
        ];

        if (!empty($_GET['s'])) {
            $args['s'] = sanitize_text_field($_GET['s']);
        }

        if (!empty($_GET['cat'])) {
            $args['cat'] = (int) $_GET['cat'];
        }

        $blogQuery = new WP_Query($args);

        $totalPosts = $blogQuery->found_posts;
        $from       = (($paged - 1) * 5) + 1;
        $to         = min($paged * 5, $totalPosts);

        ?>

        <div class="col-12 col-lg-9">

            <div class="mb-4">

                <p class="text-muted small mb-0">

                    Showing <?php echo $from; ?>
                    - <?php echo $to; ?>
                    of <?php echo $totalPosts; ?> articles

                </p>

            </div>

            <div class="d-flex flex-column gap-4">

                <?php if ($blogQuery->have_posts()) : ?>

                    <?php while ($blogQuery->have_posts()) : $blogQuery->the_post(); ?>

                        <article class="blog-card card border shadow-sm rounded-1 overflow-hidden">

                            <div class="row g-0 h-100">

                                <!-- IMAGE -->

                                <div class="col-md-4">

                                    <a href="<?php the_permalink(); ?>">

                                        <?php
                                        $image = get_the_post_thumbnail_url(
                                            get_the_ID(),
                                            'large'
                                        );

                                        if (!$image) {
                                            $image = 'https://placehold.co/800x500?text=Post+Image';
                                        }
                                        ?>

                                        <img src="<?php echo esc_url($image); ?>"
                                            class="img-fluid w-100 h-100 object-fit-cover"
                                            alt="<?php echo esc_attr(get_the_title()); ?>"
                                            loading="lazy"
                                            decoding="async"
                                            onerror="this.onerror=null;this.src='https://placehold.co/800x500?text=Post+Image';">

                                    </a>

                                </div>

                                <!-- CONTENT -->

                                <div class="col-md-8">

                                    <div class="card-body p-4 h-100 d-flex flex-column">

                                        <div>

                                            <!-- Category -->

                                            <div class="post-category mb-2">

                                                <?php

                                                $categories = get_the_category();

                                                if (!empty($categories)) {
                                                    echo esc_html($categories[0]->name);
                                                } else {
                                                    echo 'News';
                                                }

                                                ?>

                                            </div>

                                            <h3 class="h4 fw-bold mb-3">

                                                <a href="<?php the_permalink(); ?>"
                                                class="text-decoration-none text-dark">

                                                    <?php the_title(); ?>

                                                </a>

                                            </h3>

                                            <!-- META -->

                                            <div class="d-flex flex-wrap gap-4 post-meta mb-3">

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

                                                    <?php echo human_time_diff(
                                                        get_the_time('U'),
                                                        current_time('timestamp')
                                                    ); ?> ago

                                                </span>

                                                <span class="d-flex align-items-center gap-2">

                                                    <svg xmlns="http://www.w3.org/2000/svg"
                                                        width="16"
                                                        height="16"
                                                        fill="currentColor"
                                                        class="bi bi-person"
                                                        viewBox="0 0 16 16">

                                                        <path d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6"/>
                                                        <path d="M14 14s-1-4-6-4-6 4-6 4 1 1 1 1h10s1 0 1-1"/>

                                                    </svg>

                                                    <?php the_author(); ?>

                                                </span>

                                            </div>

                                            <p class="text-muted mb-4">

                                                <?php echo wp_trim_words(
                                                    get_the_excerpt(),
                                                    30
                                                ); ?>

                                            </p>

                                        </div>

                                        <div class="mt-auto">

                                            <a href="<?php the_permalink(); ?>"
                                            class="btn btn-outline-primary rounded-1 px-4">

                                                Read More

                                            </a>

                                        </div>

                                    </div>

                                </div>

                            </div>

                        </article>

                    <?php endwhile; ?>

                    <?php wp_reset_postdata(); ?>

                <?php else : ?>

                    <div class="alert alert-light">

                        No articles found.

                    </div>

                <?php endif; ?>

            </div>

            <!-- PAGINATION -->

            <nav class="mt-5">

                <?php

                echo paginate_links([
                    'total'     => $blogQuery->max_num_pages,
                    'current'   => $paged,
                    'mid_size'  => 2,
                    'prev_text' => '‹',
                    'next_text' => '›',
                    'type'      => 'list',
                ]);

                ?>

            </nav>

        </div>

    </div>

</div>

</main>

<?php get_footer(); ?>