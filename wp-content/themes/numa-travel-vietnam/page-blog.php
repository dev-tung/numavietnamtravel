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

        <a href="#"
           class="text-decoration-none text-muted">

            Home

        </a>

        <span class="mx-2">

            ›

        </span>

        <span>

            Blog

        </span>

    </nav>



    <!-- Heading -->

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

            <select class="form-select rounded-1 shadow-sm">

                <option>

                    Sort by: Latest

                </option>

                <option>

                    Oldest

                </option>

                <option>

                    Most Viewed

                </option>

            </select>

        </div>

    </div>



    <!-- Layout -->

    <div class="row g-4">


        <!-- SIDEBAR -->

        <div class="col-12 col-lg-3">

            <div class="border rounded-1 p-4 filter-box">

                <h5 class="fw-bold mb-4">

                    SEARCH FILTERS

                </h5>


                <!-- Search -->

                <div class="mb-4">

                    <label class="form-label fw-semibold small">

                        Search Articles

                    </label>

                    <div class="input-group">

                        <input
                            type="text"
                            class="form-control border-end-0 rounded-start-3"
                            placeholder="Search article..."
                        >

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


                <!-- Categories -->

                <div class="mb-4">

                    <label class="form-label fw-semibold small">

                        Categories

                    </label>

                    <div class="d-flex flex-column gap-3 small">

                        <div class="form-check">

                            <input class="form-check-input"
                                   type="checkbox"
                                   id="c1">

                            <label class="form-check-label"
                                   for="c1">

                                Travel

                            </label>

                        </div>


                        <div class="form-check">

                            <input class="form-check-input"
                                   type="checkbox"
                                   id="c2">

                            <label class="form-check-label"
                                   for="c2">

                                Experience

                            </label>

                        </div>


                        <div class="form-check">

                            <input class="form-check-input"
                                   type="checkbox"
                                   id="c3">

                            <label class="form-check-label"
                                   for="c3">

                                Food

                            </label>

                        </div>


                        <div class="form-check">

                            <input class="form-check-input"
                                   type="checkbox"
                                   id="c4">

                            <label class="form-check-label"
                                   for="c4">

                                Destinations

                            </label>

                        </div>

                    </div>

                </div>


                <button class="btn btn-dark w-100 rounded-1">

                    Clear Filters

                </button>

            </div>

        </div>



        <!-- CONTENT -->

        <div class="col-12 col-lg-9">

            <div class="mb-4">

                <p class="text-muted small mb-0">

                    Showing 1 - 5 of 24 articles

                </p>

            </div>


            <div class="d-flex flex-column gap-4">

            <?php for($i=1;$i<=5;$i++) : ?>

            <article class="blog-card card border shadow-sm rounded-1 overflow-hidden">

                <div class="row g-0 h-100">


                    <!-- IMAGE -->

                    <div class="col-md-4">

                        <img
                            src="https://images.unsplash.com/photo-1507525428034-b723cf961d3e?auto=format&fit=crop&w=1200&q=80"
                            class="img-fluid w-100 h-100"
                            alt="Blog"
                        >

                    </div>



                    <!-- CONTENT -->

                    <div class="col-md-8">

                        <div class="card-body p-4 h-100 d-flex flex-column">

                            <div>

                                <div class="post-category mb-2">

                                    Travel

                                </div>


                                <h3 class="h4 fw-bold mb-3">

                                    Top 10 beautiful places in Da Nang
                                    you should not miss

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

                                            <path d="M8 3.5a.5.5 0 0 1 .5.5v4.25l3 
                                            1.8a.5.5 0 1 1-.5.86l-3.25-1.95A.5.5 
                                            0 0 1 7.5 8V4a.5.5 0 0 1 .5-.5z"/>

                                            <path d="M8 16A8 8 0 1 0 8 0a8 8 
                                            0 0 0 0 16zm0-1A7 7 0 1 1 
                                            8 1a7 7 0 0 1 0 14z"/>

                                        </svg>

                                        3 days ago

                                    </span>


                                    <span class="d-flex align-items-center gap-2">

                                        <svg xmlns="http://www.w3.org/2000/svg"
                                             width="16"
                                             height="16"
                                             fill="currentColor"
                                             class="bi bi-person"
                                             viewBox="0 0 16 16">

                                            <path d="M8 8a3 3 0 1 0 0-6 
                                            3 3 0 0 0 0 6"/>

                                            <path d="M14 14s-1-4-6-4-6 
                                            4-6 4 1 1 1 1h10s1 0 
                                            1-1"/>

                                        </svg>

                                        Admin

                                    </span>

                                </div>


                                <p class="text-muted mb-4">

                                    Da Nang is famous not only for beaches
                                    and blue sea but also many attractive
                                    destinations waiting to explore...

                                </p>

                            </div>


                            <div class="mt-auto">

                                <a href="#"
                                   class="btn btn-outline-primary rounded-1 px-4">

                                    Read More

                                </a>

                            </div>

                        </div>

                    </div>

                </div>

            </article>

            <?php endfor; ?>

            </div>



            <!-- PAGINATION -->

            <nav class="mt-5">

                <ul class="pagination justify-content-center">

                    <li class="page-item">

                        <a class="page-link rounded-1 mx-1"
                           href="#">

                            <svg xmlns="http://www.w3.org/2000/svg"
                                 width="14"
                                 height="14"
                                 fill="currentColor"
                                 class="bi bi-chevron-left"
                                 viewBox="0 0 16 16">

                                <path fill-rule="evenodd"
                                d="M11.354 1.646a.5.5 0 0 1 
                                0 .708L5.707 8l5.647 
                                5.646a.5.5 0 0 1-.708.708l-6-6a.5.5 
                                0 0 1 0-.708l6-6a.5.5 
                                0 0 1 .708 0"/>

                            </svg>

                        </a>

                    </li>


                    <li class="page-item active">

                        <a class="page-link rounded-1 mx-1"
                           href="#">

                            1

                        </a>

                    </li>


                    <li class="page-item">

                        <a class="page-link rounded-1 mx-1"
                           href="#">

                            2

                        </a>

                    </li>


                    <li class="page-item">

                        <a class="page-link rounded-1 mx-1"
                           href="#">

                            3

                        </a>

                    </li>


                    <li class="page-item">

                        <a class="page-link rounded-1 mx-1"
                           href="#">

                            <svg xmlns="http://www.w3.org/2000/svg"
                                 width="14"
                                 height="14"
                                 fill="currentColor"
                                 class="bi bi-chevron-right"
                                 viewBox="0 0 16 16">

                                <path fill-rule="evenodd"
                                d="M4.646 1.646a.5.5 
                                0 0 1 .708 0l6 6a.5.5 
                                0 0 1 0 .708l-6 6a.5.5 
                                0 1 1-.708-.708L10.293 
                                8 4.646 2.354a.5.5 
                                0 0 1 0-.708"/>

                            </svg>

                        </a>

                    </li>

                </ul>

            </nav>

        </div>

    </div>

</div>

</main>

<?php get_footer(); ?>