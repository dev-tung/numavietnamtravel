<?php get_header(); ?>

<style>

.blog-single .sidebar-box{
    border:1px solid #e5e5e5;
    padding:24px;
    margin-bottom:24px;
}

.blog-single .sidebar-title{
    font-size:18px;
    font-weight:700;
    margin-bottom:20px;
}

.blog-single .category-item{
    display:flex;
    justify-content:space-between;
    padding:12px 0;
    border-bottom:1px solid #eee;
}

.blog-single .post-mini{
    display:flex;
    gap:12px;
    margin-bottom:18px;
}

.blog-single .post-mini img{
    width:70px;
    height:70px;
    object-fit:cover;
}

.blog-single .related-box{
    border:1px solid #e5e5e5;
    padding:24px;
}

.blog-single .related-box img{
    height:120px;
    object-fit:cover;
}

.blog-single .article-meta{
    display:flex;
    gap:28px;
    color:#777;
    margin-bottom:24px;
}

.blog-single .meta-item{
    display:flex;
    gap:8px;
    align-items:center;
}

.blog-single .meta-item svg{
    width:18px;
    height:18px;
}

.blog-single .article-cover{
    width:100%;
    height:360px;
    object-fit:cover;
    margin-bottom:28px;
}

.blog-single .article-image{
    width:100%;
    height:240px;
    object-fit:cover;
}

</style>

<main class="container p-3 blog-single">
   <div class="bg-white shadow-sm p-4">

   <!-- Breadcrumb -->
    <nav class="small text-muted mb-4">

        <a href="<?php echo esc_url(home_url('/')); ?>"
        class="text-decoration-none text-muted">
            Trang chủ
        </a>

        <span class="mx-2">›</span>

        <a href="<?php echo esc_url(get_permalink(get_option('page_for_posts'))); ?>"
        class="text-decoration-none text-muted">
            Blog
        </a>

        <?php
        $categories = get_the_category();

        if (!empty($categories)) :
        ?>

            <span class="mx-2">›</span>

            <a href="<?php echo esc_url(
                get_category_link($categories[0]->term_id)
            ); ?>"
            class="text-decoration-none text-muted">

                <?php echo esc_html($categories[0]->name); ?>

            </a>

        <?php endif; ?>

        <span class="mx-2">›</span>

        <span>
            <?php the_title(); ?>
        </span>

    </nav>
      
      <div class="row g-4">
        
        <!-- CONTENT -->
        <div class="col-lg-8">

            <!-- Category -->
            <div class="text-uppercase small fw-semibold mb-2">

                <?php
                $categories = get_the_category();

                if (!empty($categories)) {
                    echo esc_html($categories[0]->name);
                }
                ?>

            </div>

            <!-- Title -->
            <h1 class="fw-bold mb-4">
                <?php the_title(); ?>
            </h1>

            <!-- Meta -->
            <div class="article-meta">

                <div class="meta-item">

                    <svg xmlns="http://www.w3.org/2000/svg"
                        fill="none"
                        stroke="currentColor"
                        stroke-width="1.8"
                        viewBox="0 0 24 24">

                        <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"/>
                        <circle cx="12"
                                cy="7"
                                r="4"/>

                    </svg>

                    <?php the_author(); ?>

                </div>

                <div class="meta-item">

                    <svg xmlns="http://www.w3.org/2000/svg"
                        fill="none"
                        stroke="currentColor"
                        stroke-width="1.8"
                        viewBox="0 0 24 24">

                        <circle cx="12"
                                cy="12"
                                r="9"/>

                        <path d="M12 7v5l3 2"/>

                    </svg>

                    <?php echo get_the_date(); ?>

                </div>

            </div>

            <!-- Featured Image -->
            <?php
            $image = get_the_post_thumbnail_url(
                get_the_ID(),
                'full'
            );

            if (!$image) {
                $image = 'https://placehold.co/1200x700?text=Blog+Image';
            }
            ?>

            <img src="<?php echo esc_url($image); ?>"
                class="article-cover"
                alt="<?php the_title_attribute(); ?>"
                loading="lazy"
                decoding="async"
                onerror="this.onerror=null;this.src='https://placehold.co/1200x700?text=Blog+Image';">

            <!-- Content -->
            <div class="article-content">

                <?php the_content(); ?>

            </div>

            <!-- Related Posts -->
            <?php

            $relatedPosts = new WP_Query([
                'post_type'      => 'post',
                'posts_per_page' => 3,
                'post__not_in'   => [get_the_ID()],
                'category__in'   => wp_get_post_categories(get_the_ID())
            ]);

            if ($relatedPosts->have_posts()) :
            ?>

                <div class="related-box">

                    <h4 class="fw-bold mb-4">
                        Bài viết liên quan
                    </h4>

                    <div class="row g-4">

                        <?php while ($relatedPosts->have_posts()) : ?>

                            <?php $relatedPosts->the_post(); ?>

                            <div class="col-md-4">

                                <a href="<?php the_permalink(); ?>"
                                class="text-decoration-none text-dark">

                                    <?php
                                    $relatedImage = get_the_post_thumbnail_url(
                                        get_the_ID(),
                                        'medium'
                                    );

                                    if (!$relatedImage) {
                                        $relatedImage = 'https://placehold.co/800x500?text=Blog+Image';
                                    }
                                    ?>

                                    <img src="<?php echo esc_url($relatedImage); ?>"
                                        class="img-fluid mb-3 rounded"
                                        alt="<?php the_title_attribute(); ?>"
                                        loading="lazy"
                                        decoding="async"
                                        onerror="this.onerror=null;this.src='https://placehold.co/800x500?text=Blog+Image';">

                                    <div>

                                        <?php the_title(); ?>

                                    </div>

                                </a>

                            </div>

                        <?php endwhile; ?>

                    </div>

                </div>

                <?php wp_reset_postdata(); ?>

            <?php endif; ?>

        </div>

        <!-- SIDEBAR -->
        <div class="col-lg-4">

            <!-- Search -->
            <div class="sidebar-box">

                <div class="sidebar-title">
                    Tìm kiếm
                </div>

                <form role="search"
                    method="get"
                    action="<?php echo esc_url(home_url('/')); ?>">

                    <div class="input-group">

                        <input type="search"
                            name="s"
                            class="form-control border-end-0"
                            placeholder="Nhập từ khóa..."
                            value="<?php echo get_search_query(); ?>">

                        <button type="submit"
                                class="input-group-text bg-white border-start-0">

                            <svg xmlns="http://www.w3.org/2000/svg"
                                width="18"
                                height="18"
                                fill="none"
                                stroke="currentColor"
                                stroke-width="2"
                                viewBox="0 0 24 24">

                                <circle cx="11"
                                        cy="11"
                                        r="8"/>

                                <path d="m21 21-4.3-4.3"/>

                            </svg>

                        </button>

                    </div>

                </form>

            </div>

            <!-- Categories -->
            <div class="sidebar-box">

                <div class="sidebar-title">
                    Danh mục
                </div>

                <?php
                $categories = get_categories([
                    'hide_empty' => true,
                ]);

                foreach ($categories as $category) :
                ?>

                    <a href="<?php echo esc_url(
                        get_category_link($category->term_id)
                    ); ?>"
                    class="category-item d-flex justify-content-between text-decoration-none text-dark">

                        <span>
                            <?php echo esc_html($category->name); ?>
                        </span>

                        <span>
                            <?php echo $category->count; ?>
                        </span>

                    </a>

                <?php endforeach; ?>

            </div>

            <!-- Featured Posts -->
            <div class="sidebar-box">

                <div class="sidebar-title">
                    Bài viết mới nhất
                </div>

                <?php

                $latestPosts = new WP_Query([
                    'post_type'      => 'post',
                    'posts_per_page' => 4,
                    'post_status'    => 'publish'
                ]);

                while ($latestPosts->have_posts()) :

                    $latestPosts->the_post();

                    $image = get_the_post_thumbnail_url(
                        get_the_ID(),
                        'thumbnail'
                    );

                    if (!$image) {
                        $image = 'https://placehold.co/400x300?text=Blog';
                    }

                ?>

                    <a href="<?php the_permalink(); ?>"
                    class="post-mini text-decoration-none text-dark">

                        <img src="<?php echo esc_url($image); ?>"
                            alt="<?php the_title_attribute(); ?>"
                            loading="lazy"
                            decoding="async"
                            onerror="this.onerror=null;this.src='https://placehold.co/400x300?text=Blog';">

                        <div>

                            <?php the_title(); ?>

                        </div>

                    </a>

                <?php endwhile; ?>

                <?php wp_reset_postdata(); ?>

            </div>

            <!-- Related Posts -->
            <div class="sidebar-box">

                <div class="sidebar-title">
                    Bài viết liên quan
                </div>

                <?php

                $relatedPosts = new WP_Query([
                    'post_type'      => 'post',
                    'posts_per_page' => 3,
                    'post__not_in'   => [get_the_ID()],
                    'category__in'   => wp_get_post_categories(get_the_ID()),
                    'post_status'    => 'publish'
                ]);

                while ($relatedPosts->have_posts()) :

                    $relatedPosts->the_post();

                    $image = get_the_post_thumbnail_url(
                        get_the_ID(),
                        'thumbnail'
                    );

                    if (!$image) {
                        $image = 'https://placehold.co/400x300?text=Blog';
                    }

                ?>

                    <a href="<?php the_permalink(); ?>"
                    class="post-mini text-decoration-none text-dark">

                        <img src="<?php echo esc_url($image); ?>"
                            alt="<?php the_title_attribute(); ?>"
                            loading="lazy"
                            decoding="async"
                            onerror="this.onerror=null;this.src='https://placehold.co/400x300?text=Blog';">

                        <div>

                            <?php the_title(); ?>

                        </div>

                    </a>

                <?php endwhile; ?>

                <?php wp_reset_postdata(); ?>

            </div>

        </div>

      </div>
   </div>
</main>

<?php get_footer(); ?>