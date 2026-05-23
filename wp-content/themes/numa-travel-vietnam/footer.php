<footer class="bg-white py-5 border-top">

    <div class="container px-4">

        <div class="row justify-content-between gy-4">


            <!-- COMPANY -->

            <div class="col-12 col-md-6 col-xl-3 ps-0">

                <h5 class="fw-bold mb-3">

                    NUMA VIETNAM TRAVEL

                </h5>

                <p class="text-muted mb-0">

                    A perfect journey with professional and dedicated service.

                </p>

            </div>


            <!-- ABOUT -->

            <div class="col-6 col-md-3 col-xl-auto">

                <h6 class="fw-bold mb-3">

                    About Us

                </h6>

                <ul class="list-unstyled small footer-links">

                    <li>
                        <a href="<?php echo home_url('/about'); ?>">
                            About
                        </a>
                    </li>

                    <li>
                        <a href="<?php echo home_url('/terms-conditions'); ?>">
                            Terms
                        </a>
                    </li>

                    <li>
                        <a href="<?php echo home_url('/privacy-policy'); ?>">
                            Privacy Policy
                        </a>
                    </li>

                    <li>
                        <a href="<?php echo home_url('/faq'); ?>">
                            FAQ
                        </a>
                    </li>

                </ul>

            </div>


            <!-- SUPPORT -->

            <div class="col-6 col-md-3 col-xl-auto">

                <h6 class="fw-bold mb-3">

                    Support

                </h6>

                <ul class="list-unstyled small footer-links">

                    <li>
                        <a href="<?php echo home_url('/tour'); ?>">
                            Book Tour
                        </a>
                    </li>

                    <li>
                        <a href="<?php echo home_url('/payment'); ?>">
                            Payment
                        </a>
                    </li>

                    <li>
                        <a href="<?php echo home_url('/cancellation-policy'); ?>">
                            Cancellation
                        </a>
                    </li>

                    <li>
                        <a href="<?php echo home_url('/contact'); ?>">
                            Contact
                        </a>
                    </li>

                </ul>

            </div>


            <!-- CONTACT -->

            <div class="col-12 col-md-6 col-xl-3">

                <h6 class="fw-bold mb-3">

                    Contact

                </h6>

                <div class="small text-muted footer-contact">

                    <p class="mb-2">

                        <strong>Phone</strong>
                        090171551

                    </p>

                    <p class="mb-2">

                        <strong>Email</strong>
                        viethung1588@gmail.com

                    </p>

                    <p class="mb-0">

                        <strong>Address</strong>
                        15 Ngõ 175 Đường Bát Khối, Tư Đình, Long Biên, Hà Nội, Việt Nam

                    </p>

                </div>

            </div>


            <!-- MAP -->

            <div class="col-12 col-md-6 col-xl-3 pe-0">

                <div class="footer-map rounded-4 overflow-hidden border">

                    <iframe
                        width="100%"
                        height="100%"
                        loading="lazy"
                        allowfullscreen
                        referrerpolicy="no-referrer-when-downgrade"
                        src="https://maps.google.com/maps?q=15%20Ng%C3%B5%20175%20%C4%90%C6%B0%E1%BB%9Dng%20B%C3%A1t%20Kh%E1%BB%91i%2C%20Long%20Bi%C3%AAn%2C%20H%C3%A0%20N%E1%BB%99i&t=&z=15&ie=UTF8&iwloc=&output=embed">

                    </iframe>

                </div>

            </div>

        </div>


        <!-- COPYRIGHT -->

        <div class="text-center text-muted small mt-5 pt-4 border-top">

            © <?php echo date('Y'); ?> Numa Vietnam Travel.
            All rights reserved.

        </div>

    </div>

</footer>


<style>

    /* =========================================
    FOOTER
    ========================================= */

    .footer-links li{
        margin-bottom:10px;
    }

    .footer-links a{
        color:#6c757d;
        text-decoration:none;
        transition:0.2s ease;
    }

    .footer-links a:hover{
        color:#000;
    }

    .footer-contact p{
        line-height:1.7;
    }

    .footer-map{
        height:220px;
        background:#f5f5f5;
    }

    .footer-map iframe{
        border:0;
    }

</style>


<script src="<?php echo get_template_directory_uri(); ?>/assets/js/bootstrap.bundle.min.js"></script>

<?php wp_footer(); ?>

</body>
</html>