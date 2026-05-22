<?php get_header(); ?>

<style>

.about-page .about-image{
    min-height:320px;
    object-fit:cover;
}

.about-page .feature-card{
    border:1px solid #e5e5e5;
    padding:32px 24px;
    text-align:center;
    height:100%;
    transition:.25s;
}

.about-page .feature-card:hover{
    transform:translateY(-4px);
}

.about-page .feature-icon{
    color:#8a8a8a;
    margin-bottom:20px;
}

.about-page .feature-icon svg{
    width:52px;
    height:52px;
}

.about-page .stats-box{
    border:1px solid #e5e5e5;
}

.about-page .stats-item{
    padding:32px 24px;
    text-align:center;
}

.about-page .stats-item:not(:last-child){
    border-right:1px solid #e5e5e5;
}

.about-page .stats-icon{
    color:#8a8a8a;
    margin-bottom:18px;
}

.about-page .stats-icon svg{
    width:42px;
    height:42px;
}

.about-page .cta-box{
    border:1px solid #e5e5e5;
    padding:40px;
}

@media(max-width:992px){

    .about-page .stats-item{
        border-right:none !important;
        border-bottom:1px solid #e5e5e5;
    }

}

</style>


<main class="container p-3 about-page">

<div class="bg-white rounded-1 shadow-sm p-4">


    <!-- Breadcrumb -->

    <nav class="mb-3 small text-muted">

        <a href="#"
           class="text-decoration-none text-muted">

            Trang chủ

        </a>

        <span class="mx-2">

            ›

        </span>

        <span>

            Giới thiệu

        </span>

    </nav>



    <!-- Heading -->

    <div class="mb-5">

        <h1 class="fw-bold mb-3">

            Giới thiệu

        </h1>

        <p class="text-muted mb-0">

            Numa Vietnam Travel – Đồng hành cùng bạn trên mọi hành trình

        </p>

    </div>



    <!-- ABOUT -->

    <section class="mb-5">

        <div class="row g-5 align-items-center">

            <div class="col-lg-6">

                <img
                    src="https://images.unsplash.com/photo-1507525428034-b723cf961d3e?auto=format&fit=crop&w=1200&q=80"
                    class="img-fluid w-100 border about-image"
                    alt="About"
                >

            </div>


            <div class="col-lg-6">

                <h2 class="fw-bold mb-4">

                    Về chúng tôi

                </h2>

                <p class="text-muted mb-4">

                    Numa Vietnam Travel là đơn vị chuyên cung cấp
                    các dịch vụ du lịch trong nước và quốc tế uy tín,
                    chất lượng. Với đội ngũ nhân viên chuyên nghiệp,
                    nhiệt tình và giàu kinh nghiệm, chúng tôi cam kết
                    mang đến những hành trình đáng nhớ.

                </p>

                <p class="text-muted mb-0">

                    Chúng tôi không ngừng nỗ lực nâng cao chất lượng
                    dịch vụ và mang đến giá trị tốt nhất cho khách hàng.

                </p>

            </div>

        </div>

    </section>



    <!-- FEATURES -->

    <section class="mb-5 border p-4">

        <h2 class="text-center fw-bold mb-5">

            Tại sao chọn chúng tôi?

        </h2>

        <div class="row g-4">


            <!-- Item -->

            <div class="col-md-6 col-lg-3">

                <div class="feature-card">

                    <div class="feature-icon">

                        <svg xmlns="http://www.w3.org/2000/svg"
                             fill="none"
                             stroke="currentColor"
                             stroke-width="1.8"
                             viewBox="0 0 24 24">

                        <path d="M12 3l7 3v5c0 5-3.5 8-7 10-3.5-2-7-5-7-10V6l7-3z"/>

                        </svg>

                    </div>

                    <h5 class="fw-bold">

                        Uy tín - Chất lượng

                    </h5>

                    <p class="small text-muted mb-0">

                        Cam kết dịch vụ chất lượng,
                        minh bạch và uy tín.

                    </p>

                </div>

            </div>



            <div class="col-md-6 col-lg-3">

                <div class="feature-card">

                    <div class="feature-icon">

                        <svg xmlns="http://www.w3.org/2000/svg"
                             fill="none"
                             stroke="currentColor"
                             stroke-width="1.8"
                             viewBox="0 0 24 24">

                        <path d="M20 12l-8 8-9-9V4h7l10 8z"/>
                        <circle cx="7"
                                cy="7"
                                r="1"/>

                        </svg>

                    </div>

                    <h5 class="fw-bold">

                        Giá tốt nhất

                    </h5>

                    <p class="small text-muted mb-0">

                        Mức giá cạnh tranh
                        cùng nhiều ưu đãi.

                    </p>

                </div>

            </div>



            <div class="col-md-6 col-lg-3">

                <div class="feature-card">

                    <div class="feature-icon">

                        <svg xmlns="http://www.w3.org/2000/svg"
                             fill="none"
                             stroke="currentColor"
                             stroke-width="1.8"
                             viewBox="0 0 24 24">

                        <path d="M4 12a8 8 0 0116 0"/>

                        <rect x="2"
                              y="12"
                              width="4"
                              height="7"
                              rx="2"/>

                        <rect x="18"
                              y="12"
                              width="4"
                              height="7"
                              rx="2"/>

                        </svg>

                    </div>

                    <h5 class="fw-bold">

                        Hỗ trợ 24/7

                    </h5>

                    <p class="small text-muted mb-0">

                        Luôn sẵn sàng hỗ trợ
                        khách hàng.

                    </p>

                </div>

            </div>



            <div class="col-md-6 col-lg-3">

                <div class="feature-card">

                    <div class="feature-icon">

                        <svg xmlns="http://www.w3.org/2000/svg"
                             fill="none"
                             stroke="currentColor"
                             stroke-width="1.8"
                             viewBox="0 0 24 24">

                        <path d="M3 6l6-2 6 2 6-2v14l-6 2-6-2-6 2V6z"/>

                        <circle cx="16"
                                cy="10"
                                r="2"/>

                        </svg>

                    </div>

                    <h5 class="fw-bold">

                        Đa dạng hành trình

                    </h5>

                    <p class="small text-muted mb-0">

                        Nhiều lựa chọn tour
                        phù hợp mọi nhu cầu.

                    </p>

                </div>

            </div>

        </div>

    </section>



    <!-- STATS -->

    <section class="mb-5 stats-box">

        <div class="row g-0">


            <div class="col-6 col-lg-3">

                <div class="stats-item">

                    <div class="stats-icon">

                        <svg xmlns="http://www.w3.org/2000/svg"
                             fill="none"
                             stroke="currentColor"
                             stroke-width="1.8"
                             viewBox="0 0 24 24">

                        <circle cx="9" cy="8" r="3"/>
                        <circle cx="17" cy="8" r="3"/>

                        <path d="M3 19c0-3 3-5 6-5"/>
                        <path d="M15 14c3 0 6 2 6 5"/>

                        </svg>

                    </div>

                    <h2 class="fw-bold">10+</h2>

                    <div class="text-muted">

                        Năm kinh nghiệm

                    </div>

                </div>

            </div>



            <div class="col-6 col-lg-3">

                <div class="stats-item">

                    <div class="stats-icon">

                        <svg xmlns="http://www.w3.org/2000/svg"
                             fill="none"
                             stroke="currentColor"
                             stroke-width="1.8"
                             viewBox="0 0 24 24">

                        <rect x="4"
                              y="7"
                              width="16"
                              height="13"
                              rx="2"/>

                        <path d="M9 7V5h6v2"/>

                        </svg>

                    </div>

                    <h2 class="fw-bold">5000+</h2>

                    <div class="text-muted">

                        Khách hàng

                    </div>

                </div>

            </div>



            <div class="col-6 col-lg-3">

                <div class="stats-item">

                    <div class="stats-icon">

                        <svg xmlns="http://www.w3.org/2000/svg"
                             fill="none"
                             stroke="currentColor"
                             stroke-width="1.8"
                             viewBox="0 0 24 24">

                        <path d="M12 21s-6-5-6-11a6 6 0 1112 0c0 6-6 11-6 11z"/>

                        <circle cx="12"
                                cy="10"
                                r="2"/>

                        </svg>

                    </div>

                    <h2 class="fw-bold">100+</h2>

                    <div class="text-muted">

                        Điểm đến hấp dẫn

                    </div>

                </div>

            </div>



            <div class="col-6 col-lg-3">

                <div class="stats-item">

                    <div class="stats-icon">

                        <svg xmlns="http://www.w3.org/2000/svg"
                             fill="none"
                             stroke="currentColor"
                             stroke-width="1.8"
                             viewBox="0 0 24 24">

                        <path d="M12 2l3 7h7l-5.5 4.5L18 21l-6-4-6 4 1.5-7.5L2 9h7z"/>

                        </svg>

                    </div>

                    <h2 class="fw-bold">99%</h2>

                    <div class="text-muted">

                        Khách hàng hài lòng

                    </div>

                </div>

            </div>

        </div>

    </section>



    <!-- CTA -->

    <section class="cta-box">

        <div class="row align-items-center g-4">

            <div class="col-lg-8">

                <h3 class="fw-bold mb-3">

                    Sẵn sàng cho chuyến đi tiếp theo?

                </h3>

                <p class="text-muted mb-0">

                    Khám phá các tour hấp dẫn dành cho bạn.

                </p>

            </div>


            <div class="col-lg-4 text-lg-end">

                <a href="#"
                   class="btn btn-outline-dark px-5 py-3">

                    Xem các tour nổi bật

                </a>

            </div>

        </div>

    </section>

</div>

</main>

<?php get_footer(); ?>