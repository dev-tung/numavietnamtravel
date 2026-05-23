<?php get_header(); ?>

<style>

.contact-page .contact-card{
    border:1px solid #e5e5e5;
    padding:32px;
    height:100%;
}

.contact-page .contact-info-item{
    display:flex;
    gap:18px;
    margin-bottom:28px;
    align-items:flex-start;
}

.contact-page .contact-info-icon{
    width:24px;
    color:#7d7d7d;
    flex-shrink:0;
}

.contact-page .contact-info-icon svg{
    width:22px;
    height:22px;
}

.contact-page textarea{
    min-height:140px;
    resize:none;
}

.contact-page .map-section{
    border:1px solid #e5e5e5;
    padding:32px;
}

.contact-page .map-box iframe{
    width:100%;
    height:360px;
    border:0;
}

.contact-page .bottom-card{
    border:1px solid #e5e5e5;
    padding:28px 20px;
    text-align:center;
    height:100%;
}

.contact-page .bottom-icon{
    color:#7d7d7d;
    margin-bottom:16px;
}

.contact-page .bottom-icon svg{
    width:28px;
    height:28px;
}

</style>


<main class="container p-3 contact-page">

<div class="bg-white rounded-1 shadow-sm p-4">


    <!-- Breadcrumb -->

    <nav class="mb-3 small text-muted">

        <a href="<?php echo home_url('/'); ?>"
           class="text-decoration-none text-muted">

            Home

        </a>

        <span class="mx-2">

            ›

        </span>

        <span>

            Contact

        </span>

    </nav>



    <!-- Heading -->

    <div class="mb-5">

        <h1 class="fw-bold mb-3">

            Contact Us

        </h1>

        <p class="text-muted mb-0">

            We are always ready to support and assist you

        </p>

    </div>



    <!-- TOP -->

    <div class="row g-4">


        <!-- FORM -->

        <div class="col-lg-7">

            <div class="contact-card">

                <h3 class="fw-bold mb-4">

                    Send Us A Message

                </h3>

                <form>

                    <div class="mb-3">

                        <input type="text"
                               class="form-control"
                               placeholder="Full Name *">

                    </div>


                    <div class="mb-3">

                        <input type="email"
                               class="form-control"
                               placeholder="Email *">

                    </div>


                    <div class="mb-3">

                        <input type="text"
                               class="form-control"
                               placeholder="Phone Number *">

                    </div>


                    <div class="mb-3">

                        <select class="form-select">

                            <option>

                                Subject *

                            </option>

                            <option>

                                Tour Consultation

                            </option>

                            <option>

                                Tour Booking

                            </option>

                            <option>

                                Customer Support

                            </option>

                        </select>

                    </div>


                    <div class="mb-4">

                        <textarea class="form-control"
                                  placeholder="Message *"></textarea>

                    </div>


                    <button class="btn btn-outline-dark px-5">

                        Send Message

                    </button>

                </form>

            </div>

        </div>



        <!-- INFO -->

        <div class="col-lg-5">

            <div class="contact-card">

                <h3 class="fw-bold mb-5">

                    Company Information

                </h3>



                <!-- COMPANY -->

                <div class="contact-info-item">

                    <div class="contact-info-icon">

                        <svg xmlns="http://www.w3.org/2000/svg"
                             fill="none"
                             stroke="currentColor"
                             stroke-width="1.8"
                             viewBox="0 0 24 24">

                            <rect x="4"
                                  y="3"
                                  width="16"
                                  height="18"/>

                            <path d="M8 7h2M14 7h2M8 11h2M14 11h2M8 15h2M14 15h2"/>

                        </svg>

                    </div>

                    <div>

                        NUMA VIETNAM TRAVEL CO., LTD

                    </div>

                </div>



                <!-- PHONE -->

                <div class="contact-info-item">

                    <div class="contact-info-icon">

                        <svg xmlns="http://www.w3.org/2000/svg"
                             fill="none"
                             stroke="currentColor"
                             stroke-width="1.8"
                             viewBox="0 0 24 24">

                            <path d="M22 16.9v3a2 2 0 0 1-2.2 2
                            c-9-1-16-8-17-17A2 2 0 0 1 4.9 2h3
                            a2 2 0 0 1 2 1.7l.5 3a2 2 0 0 1-.6 1.8
                            L8 10a16 16 0 0 0 6 6l1.5-1.8
                            a2 2 0 0 1 1.8-.6l3 .5
                            A2 2 0 0 1 22 16.9z"/>

                        </svg>

                    </div>

                    <div>

                        090171551

                    </div>

                </div>



                <!-- EMAIL -->

                <div class="contact-info-item">

                    <div class="contact-info-icon">

                        <svg xmlns="http://www.w3.org/2000/svg"
                             fill="none"
                             stroke="currentColor"
                             stroke-width="1.8"
                             viewBox="0 0 24 24">

                            <rect x="3"
                                  y="5"
                                  width="18"
                                  height="14"/>

                            <path d="M3 7l9 7 9-7"/>

                        </svg>

                    </div>

                    <div>

                        viethung1588@gmail.com

                    </div>

                </div>



                <!-- WEBSITE -->

                <div class="contact-info-item">

                    <div class="contact-info-icon">

                        <svg xmlns="http://www.w3.org/2000/svg"
                             fill="none"
                             stroke="currentColor"
                             stroke-width="1.8"
                             viewBox="0 0 24 24">

                            <circle cx="12"
                                    cy="12"
                                    r="9"/>

                            <path d="M3 12h18"/>
                            <path d="M12 3a15 15 0 0 1 0 18"/>
                            <path d="M12 3a15 15 0 0 0 0 18"/>

                        </svg>

                    </div>

                    <div>

                        www.numavietnamtravel.com

                    </div>

                </div>



                <!-- ADDRESS -->

                <div class="contact-info-item">

                    <div class="contact-info-icon">

                        <svg xmlns="http://www.w3.org/2000/svg"
                             fill="none"
                             stroke="currentColor"
                             stroke-width="1.8"
                             viewBox="0 0 24 24">

                            <path d="M12 21s-6-5-6-11
                            a6 6 0 1 1 12 0
                            c0 6-6 11-6 11z"/>

                            <circle cx="12"
                                    cy="10"
                                    r="2"/>

                        </svg>

                    </div>

                    <div>

                        15 Ngõ 175 Đường Bát Khối,
                        Tư Đình, Long Biên,
                        Hà Nội, Việt Nam

                    </div>

                </div>



                <!-- WORKING HOURS -->

                <div class="contact-info-item mb-0">

                    <div class="contact-info-icon">

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

                    </div>

                    <div>

                        Monday - Sunday:
                        08:00 - 20:00

                    </div>

                </div>

            </div>

        </div>

    </div>



    <!-- MAP -->

    <section class="map-section my-4">

        <h3 class="fw-bold mb-4">

            Google Maps

        </h3>

        <div class="map-box">

            <iframe
                loading="lazy"
                allowfullscreen
                referrerpolicy="no-referrer-when-downgrade"
                src="https://maps.google.com/maps?q=15%20Ng%C3%B5%20175%20%C4%90%C6%B0%E1%BB%9Dng%20B%C3%A1t%20Kh%E1%BB%91i%2C%20Long%20Bi%C3%AAn%2C%20H%C3%A0%20N%E1%BB%99i&t=&z=15&ie=UTF8&iwloc=&output=embed">

            </iframe>

        </div>

    </section>



    <!-- BOTTOM -->

    <div class="row g-4">


        <!-- CALL -->

        <div class="col-md-6 col-lg-3">

            <div class="bottom-card">

                <div class="bottom-icon">

                    <svg xmlns="http://www.w3.org/2000/svg"
                         fill="none"
                         stroke="currentColor"
                         stroke-width="1.8"
                         viewBox="0 0 24 24">

                        <path d="M22 16.9v3a2 2 0 0 1-2.2 2
                        c-9-1-16-8-17-17A2 2 0 0 1 4.9 2h3"/>

                    </svg>

                </div>

                <h6 class="fw-bold">

                    Call Us

                </h6>

                <div class="text-muted">

                    090171551

                </div>

            </div>

        </div>



        <!-- EMAIL -->

        <div class="col-md-6 col-lg-3">

            <div class="bottom-card">

                <div class="bottom-icon">

                    <svg xmlns="http://www.w3.org/2000/svg"
                         fill="none"
                         stroke="currentColor"
                         stroke-width="1.8"
                         viewBox="0 0 24 24">

                        <rect x="3"
                              y="5"
                              width="18"
                              height="14"/>

                        <path d="M3 7l9 7 9-7"/>

                    </svg>

                </div>

                <h6 class="fw-bold">

                    Email

                </h6>

                <div class="text-muted">

                    viethung1588@gmail.com

                </div>

            </div>

        </div>



        <!-- SUPPORT -->

        <div class="col-md-6 col-lg-3">

            <div class="bottom-card">

                <div class="bottom-icon">

                    <svg xmlns="http://www.w3.org/2000/svg"
                         fill="none"
                         stroke="currentColor"
                         stroke-width="1.8"
                         viewBox="0 0 24 24">

                        <path d="M21 11a8 8 0 0 1-8 8
                        H7l-4 3v-7
                        a8 8 0 1 1 18-4z"/>

                    </svg>

                </div>

                <h6 class="fw-bold">

                    Live Chat

                </h6>

                <div class="text-muted">

                    24/7 Support

                </div>

            </div>

        </div>



        <!-- FANPAGE -->

        <div class="col-md-6 col-lg-3">

            <div class="bottom-card">

                <div class="bottom-icon">

                    <svg xmlns="http://www.w3.org/2000/svg"
                         fill="none"
                         stroke="currentColor"
                         stroke-width="1.8"
                         viewBox="0 0 24 24">

                        <circle cx="12"
                                cy="12"
                                r="9"/>

                        <path d="M13 8h2V5h-2
                        c-2 0-3 1-3 3v2H8v3h2v6h3v-6h2l1-3h-3V8z"/>

                    </svg>

                </div>

                <h6 class="fw-bold">

                    Fanpage

                </h6>

                <div class="text-muted">

                    Numa Vietnam Travel

                </div>

            </div>

        </div>

    </div>

</div>

</main>

<?php get_footer(); ?>