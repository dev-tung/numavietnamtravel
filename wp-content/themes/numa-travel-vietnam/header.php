<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8"/>

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0"/>

    <title>

        Numa Vietnam Travel

    </title>


    <link rel="stylesheet"
          href="<?php echo get_template_directory_uri(); ?>/assets/css/bootstrap.min.css">

    <link rel="stylesheet"
          href="<?php echo get_template_directory_uri(); ?>/assets/css/main.css">


    <style>

        /* =========================================
        SEARCH MODAL
        ========================================= */

        #searchModal .modal-content{
            border-radius:12px;
        }

        #searchModal .modal-header{
            border-bottom:none;
            padding-bottom:0;
        }

        #searchModal .form-control{
            height:56px;
            border-right:none;
        }

        #searchModal .form-control:focus{
            box-shadow:none;
        }

        #searchModal .btn{
            width:64px;
        }

        /* =========================================
        TOUR MENU 2 LEVEL
        ========================================= */

        .navbar .dropdown:hover > .dropdown-menu{
            display:block;
            margin-top:0;
        }

        /* MAIN DROPDOWN */

        .main-dropdown{
            min-width:260px;
            border-radius:12px;
            border:1px solid #eee;
            padding:10px 0;
        }

        /* SUBMENU WRAPPER */

        .dropdown-submenu{
            position:relative;
        }

        /* SUBMENU */

        .dropdown-submenu .submenu{
            position:absolute;
            top:-10px;
            left:100%;
            display:none;
            min-width:260px;
            border-radius:12px;
            border:1px solid #eee;
            padding:10px 0;
        }

        /* SHOW SUBMENU */

        .dropdown-submenu:hover > .submenu{
            display:block;
        }

        /* ITEM */

        .dropdown-item{
            padding:10px 18px;
            font-size:15px;
        }

        /* HOVER */

        .dropdown-item:hover{
            background:#f5f5f5;
        }

        /* ARROW */

        .submenu-toggle{
            display:flex !important;
            align-items:center;
            justify-content:space-between;
            width:100%;
        }

        .submenu-toggle::after{
            content:"›";
            font-size:18px;
            line-height:1;
            flex-shrink:0;
            margin-left:20px;
        }

    </style>

    <?php wp_head(); ?>

</head>


<body>


<header class="navbar navbar-expand-md navbar-light bg-white shadow-sm sticky-top">

    <div class="container">


        <a class="navbar-brand d-flex align-items-center gap-3"
           href="#">

            <span class="brand-icon d-flex align-items-center justify-content-center">

                NV

            </span>

            <div>

                <div class="fw-bold text-dark">

                    NUMA VIETNAM TRAVEL

                </div>

                <small class="text-muted">

                    Vietnam Journey

                </small>

            </div>

        </a>



        <button class="navbar-toggler"
                type="button"
                data-bs-toggle="collapse"
                data-bs-target="#mainNav">

            <span class="navbar-toggler-icon">

            </span>

        </button>



        <div class="collapse navbar-collapse"
            id="mainNav">

            <ul class="navbar-nav mx-auto mb-3 mb-md-0">


                <!-- HOME -->

                <li class="nav-item">

                    <a class="nav-link active"
                    href="<?php echo home_url('/'); ?>">

                        Home

                    </a>

                </li>

                <!-- TOUR -->

                <li class="nav-item dropdown">

                    <a class="nav-link dropdown-toggle"
                    href="#"
                    id="tourDropdown"
                    role="button">

                        Tour

                        <svg class="dropdown-icon ms-1"
                            width="14"
                            height="14"
                            viewBox="0 0 24 24"
                            fill="none"
                            stroke="currentColor"
                            stroke-width="2">

                            <polyline points="6 9 12 15 18 9"></polyline>

                        </svg>

                    </a>


                    <?php

                    /*
                    |--------------------------------------------------------------------------
                    | LEVEL 1
                    | REGION CATEGORIES
                    |--------------------------------------------------------------------------
                    */

                    $regions = get_terms([
                        'taxonomy'   => 'product_cat',
                        'parent'     => 0,
                        'hide_empty' => false,
                        'orderby'    => 'menu_order',
                        'order'      => 'ASC',
                    ]);

                    ?>


                    <ul class="dropdown-menu main-dropdown">

                        <?php foreach ($regions as $region): ?>

                            <?php

                            /*
                            |--------------------------------------------------------------------------
                            | SKIP WOOCOMMERCE DEFAULT CATEGORY
                            |--------------------------------------------------------------------------
                            */

                            if (
                                strtolower($region->slug) === 'uncategorized'
                            ) {
                                continue;
                            }

                            /*
                            |--------------------------------------------------------------------------
                            | LEVEL 2
                            | DESTINATION CATEGORIES
                            |--------------------------------------------------------------------------
                            */

                            $destinations = get_terms([
                                'taxonomy'   => 'product_cat',
                                'parent'     => $region->term_id,
                                'hide_empty' => false,
                                'orderby'    => 'menu_order',
                                'order'      => 'ASC',
                            ]);

                            ?>

                            <li class="dropdown-submenu">

                                <!-- REGION -->

                                <a class="dropdown-item submenu-toggle"
                                href="<?php echo esc_url(get_term_link($region)); ?>">

                                    <?php echo esc_html($region->name); ?>

                                </a>


                                <!-- LEVEL 2 -->

                                <?php if (!empty($destinations)): ?>

                                    <ul class="dropdown-menu submenu">

                                        <?php foreach ($destinations as $destination): ?>

                                            <?php

                                            /*
                                            |--------------------------------------------------------------------------
                                            | SKIP WOOCOMMERCE DEFAULT CATEGORY
                                            |--------------------------------------------------------------------------
                                            */

                                            if (
                                                strtolower($destination->slug) === 'uncategorized'
                                            ) {
                                                continue;
                                            }

                                            ?>

                                            <li>

                                                <a class="dropdown-item"
                                                href="<?php echo esc_url(get_term_link($destination)); ?>">

                                                    <?php echo esc_html($destination->name); ?>

                                                </a>

                                            </li>

                                        <?php endforeach; ?>

                                    </ul>

                                <?php endif; ?>

                            </li>

                        <?php endforeach; ?>

                    </ul>

                </li>



                <!-- BLOG -->

                <li class="nav-item">

                    <a class="nav-link"
                    href="<?php echo home_url('/blog/'); ?>">

                        Blog

                    </a>

                </li>



                <!-- ABOUT -->

                <li class="nav-item">

                    <a class="nav-link"
                    href="<?php echo home_url('/about/'); ?>">

                        About

                    </a>

                </li>



                <!-- CONTACT -->

                <li class="nav-item">

                    <a class="nav-link"
                    href="<?php echo home_url('/contact/'); ?>">

                        Contact

                    </a>

                </li>

            </ul>



            <div class="d-flex gap-2">


                <!-- SEARCH -->

                <button type="button"
                        class="icon-btn"
                        aria-label="Search"
                        data-bs-toggle="modal"
                        data-bs-target="#searchModal">

                    <svg class="icon-svg"
                        viewBox="0 0 24 24"
                        fill="none"
                        stroke="currentColor"
                        stroke-width="2">

                        <circle cx="11"
                                cy="11"
                                r="7">

                        </circle>

                        <line x1="16.5"
                            y1="16.5"
                            x2="21"
                            y2="21">

                        </line>

                    </svg>

                </button>



                <!-- PHONE -->

                <a href="tel:090171551"
                class="icon-btn"
                aria-label="Call">

                    <svg class="icon-svg"
                        viewBox="0 0 24 24"
                        fill="none"
                        stroke="currentColor"
                        stroke-width="2">

                        <path d="M22 16.92v3a2 2 0 0 1-2.18 2
                        A19.79 19.79 0 0 1 3 5.18
                        2 2 0 0 1 5 3h3
                        a2 2 0 0 1 2 1.72
                        12.13 12.13 0 0 0 .7 2.81
                        2 2 0 0 1-.45 2.11
                        L9.91 10.09a16 16 0 0 0 6 6
                        l1.45-1.45a2 2 0 0 1 2.11-.45
                        12.13 12.13 0 0 0 2.81.7
                        A2 2 0 0 1 22 16.92z">

                        </path>

                    </svg>

                </a>

            </div>

        </div>

    </div>

</header>



<!-- SEARCH MODAL -->

<div class="modal fade"
     id="searchModal"
     tabindex="-1"
     aria-hidden="true">

    <div class="modal-dialog modal-dialog-centered">

        <div class="modal-content border-0 shadow">

            <div class="modal-header">

                <h5 class="fw-bold">

                    Tìm kiếm

                </h5>

                <button type="button"
                        class="btn-close"
                        data-bs-dismiss="modal">

                </button>

            </div>



            <div class="modal-body">

                <form action="<?php echo home_url('/'); ?>"
                      method="GET">

                    <div class="input-group">

                        <input type="text"
                               name="s"
                               class="form-control form-control-lg"
                               placeholder="Nhập từ khóa tìm kiếm...">


                        <button class="btn btn-dark"
                                type="submit">

                            <svg xmlns="http://www.w3.org/2000/svg"
                                 width="18"
                                 height="18"
                                 fill="none"
                                 stroke="currentColor"
                                 stroke-width="2"
                                 viewBox="0 0 24 24">

                                <circle cx="11"
                                        cy="11"
                                        r="8">

                                </circle>

                                <path d="m21 21-4.3-4.3">

                                </path>

                            </svg>

                        </button>

                    </div>

                </form>

            </div>

        </div>

    </div>

</div>