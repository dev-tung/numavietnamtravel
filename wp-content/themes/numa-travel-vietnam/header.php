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


                <li class="nav-item">

                    <a class="nav-link active"
                       href="/">

                        Home

                    </a>

                </li>



                <li class="nav-item dropdown">

                    <a class="nav-link dropdown-toggle"
                       href="/tour"
                       id="tourDropdown"
                       role="button"
                       data-bs-toggle="dropdown">

                        Tour

                        <svg class="dropdown-icon ms-1"
                             width="14"
                             height="14"
                             viewBox="0 0 24 24"
                             fill="none"
                             stroke="currentColor"
                             stroke-width="2">

                            <polyline points="6 9 12 15 18 9">

                            </polyline>

                        </svg>

                    </a>


                    <ul class="dropdown-menu">

                        <li>

                            <a class="dropdown-item"
                               href="/tour">

                                Hanoi Tours

                            </a>

                        </li>

                        <li>

                            <a class="dropdown-item"
                               href="/tour">

                                Cao Bang Loop Tours

                            </a>

                        </li>

                        <li>

                            <a class="dropdown-item"
                               href="/tour">

                                Ha Giang Loop Tours

                            </a>

                        </li>

                    </ul>

                </li>



                <li class="nav-item dropdown">

                    <a class="nav-link dropdown-toggle"
                       href="/destination"
                       id="destinationDropdown"
                       role="button"
                       data-bs-toggle="dropdown">

                        Destination

                        <svg class="dropdown-icon ms-1"
                             width="14"
                             height="14"
                             viewBox="0 0 24 24"
                             fill="none"
                             stroke="currentColor"
                             stroke-width="2">

                            <polyline points="6 9 12 15 18 9">

                            </polyline>

                        </svg>

                    </a>


                    <ul class="dropdown-menu">

                        <li>

                            <a class="dropdown-item"
                               href="/hello-world/">

                                Northern Vietnam

                            </a>

                        </li>

                        <li>

                            <a class="dropdown-item"
                               href="/hello-world/">

                                Central Vietnam

                            </a>

                        </li>

                        <li>

                            <a class="dropdown-item"
                               href="/hello-world/">

                                Southern Vietnam

                            </a>

                        </li>

                    </ul>

                </li>


                <li class="nav-item">

                    <a class="nav-link"
                       href="/blog">

                        Blog

                    </a>

                </li>


                <li class="nav-item">

                    <a class="nav-link"
                       href="/about">

                        About

                    </a>

                </li>


                <li class="nav-item">

                    <a class="nav-link"
                       href="/contact">

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

                <button type="button"
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

                </button>

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