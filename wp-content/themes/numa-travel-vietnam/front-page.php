<?php get_header(); ?>

<section class="hero mb-5">

    <div id="heroCarousel"
         class="carousel slide carousel-fade"
         data-bs-ride="carousel">

        <!-- INDICATORS -->

        <div class="carousel-indicators">

            <button type="button"
                    data-bs-target="#heroCarousel"
                    data-bs-slide-to="0"
                    class="active"></button>

            <button type="button"
                    data-bs-target="#heroCarousel"
                    data-bs-slide-to="1"></button>

            <button type="button"
                    data-bs-target="#heroCarousel"
                    data-bs-slide-to="2"></button>

        </div>


        <!-- SLIDES -->

        <div class="carousel-inner overflow-hidden shadow-sm">


          <!-- SLIDE 1 -->

          <div class="carousel-item active">

              <img src="https://images.unsplash.com/photo-1507525428034-b723cf961d3e?auto=format&fit=crop&w=1600&q=80"
                  class="d-block w-100 hero-image"
                  alt="Ha Long Bay Cruises" />

              <div class="hero-overlay"></div>

              <div class="carousel-caption text-start">

                  <div class="hero-content">

                      <span class="hero-eyebrow">

                          Ha Long Bay Cruises

                      </span>

                      <h1 class="hero-title">

                          Amazing Ha Long Bay Cruise Experiences

                      </h1>

                      <p class="hero-description">

                          Explore Ha Long Bay, Lan Ha Bay,
                          and Bai Tu Long Bay with premium cruises.

                      </p>

                      <a href="<?php echo home_url('/product-category/northern-vietnam-tours/ha-long-bay-cruises/'); ?>"
                        class="btn btn-primary btn-lg px-4">

                          Discover Now

                      </a>

                  </div>

              </div>

          </div>



          <!-- SLIDE 2 -->

          <div class="carousel-item">

              <img src="https://images.unsplash.com/photo-1512453979798-5ea266f8880c?auto=format&fit=crop&w=1600&q=80"
                  class="d-block w-100 hero-image"
                  alt="Hanoi Tours" />

              <div class="hero-overlay"></div>

              <div class="carousel-caption text-start">

                  <div class="hero-content">

                      <span class="hero-eyebrow">

                          Hanoi Tours

                      </span>

                      <h2 class="hero-title">

                          Discover Hanoi Capital Journey

                      </h2>

                      <p class="hero-description">

                          Experience Hanoi street food,
                          culture, and local lifestyle.

                      </p>

                      <a href="<?php echo home_url('/product-category/northern-vietnam-tours/hanoi-tours/'); ?>"
                        class="btn btn-primary btn-lg px-4">

                          View Tours

                      </a>

                  </div>

              </div>

          </div>



          <!-- SLIDE 3 -->

          <div class="carousel-item">

              <img src="https://images.unsplash.com/photo-1500534314209-a25ddb2bd429?auto=format&fit=crop&w=1600&q=80"
                  class="d-block w-100 hero-image"
                  alt="Central Vietnam Tours" />

              <div class="hero-overlay"></div>

              <div class="carousel-caption text-start">

                  <div class="hero-content">

                      <span class="hero-eyebrow">

                          Central Vietnam Tours

                      </span>

                      <h2 class="hero-title">

                          Explore Da Nang & Hoi An

                      </h2>

                      <p class="hero-description">

                          Enjoy beaches, local food,
                          and ancient towns in Central Vietnam.

                      </p>

                      <a href="<?php echo home_url('/product-category/central-vietnam-tours/'); ?>"
                        class="btn btn-primary btn-lg px-4">

                          View Tours

                      </a>

                  </div>

              </div>

          </div>

        </div>


        <!-- PREV -->

        <button class="carousel-control-prev"
                type="button"
                data-bs-target="#heroCarousel"
                data-bs-slide="prev">

            <span class="carousel-control-prev-icon"></span>

        </button>


        <!-- NEXT -->

        <button class="carousel-control-next"
                type="button"
                data-bs-target="#heroCarousel"
                data-bs-slide="next">

            <span class="carousel-control-next-icon"></span>

        </button>

    </div>

</section>



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
          <p class="text-muted mb-0">Choose the perfect journey for every need.</p>
        </div>
        <a href="#" class="text-primary text-decoration-none fw-semibold">View all →</a>
      </div>

      <div class="row g-4">
        <div class="col-12 col-md-6 col-xl-4">
          <article class="card border-0 shadow-sm h-100">
            <img src="https://images.unsplash.com/photo-1500530855697-b586d89ba3ee?auto=format&fit=crop&w=1200&q=80" class="card-img-top rounded-top" alt="Hanoi - Halong Tour" />
            <div class="card-body">
              <h5 class="card-title">Hanoi - Halong Tour</h5>
              <p class="card-text text-muted">3 days 2 nights exploring Hanoi, Halong Bay, and Ninh Binh.</p>
              <div class="d-flex flex-wrap gap-2 text-muted small">
                <span class="meta-item"><svg class="meta-icon" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><circle cx="12" cy="12" r="10"></circle><polyline points="12 6 12 12 16 14"></polyline></svg><span>3 days 2 nights</span></span>
                <span class="meta-item"><svg class="meta-icon" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><rect x="3" y="4" width="18" height="18" rx="2"></rect><line x1="16" y1="2" x2="16" y2="6"></line><line x1="8" y1="2" x2="8" y2="6"></line><line x1="3" y1="10" x2="21" y2="10"></line></svg><span>Daily departures</span></span>
              </div>
            </div>
            <div class="card-footer bg-white border-0 d-flex justify-content-between align-items-center gap-3">
              <div class="fw-bold">2,990,000 VND</div>
              <a href="#" class="btn btn-outline-primary btn-sm">View details</a>
            </div>
          </article>
        </div>

        <div class="col-12 col-md-6 col-xl-4">
          <article class="card border-0 shadow-sm h-100">
            <img src="https://images.unsplash.com/photo-1500534314209-a25ddb2bd429?auto=format&fit=crop&w=1200&q=80" class="card-img-top rounded-top" alt="Da Nang - Hoi An Tour" />
            <div class="card-body">
              <h5 class="card-title">Da Nang - Hoi An Tour</h5>
              <p class="card-text text-muted">4 days 3 nights exploring the coastal city and ancient town.</p>
              <div class="d-flex flex-wrap gap-2 text-muted small">
                <span class="meta-item"><svg class="meta-icon" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><circle cx="12" cy="12" r="10"></circle><polyline points="12 6 12 12 16 14"></polyline></svg><span>4 days 3 nights</span></span>
                <span class="meta-item"><svg class="meta-icon" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><rect x="3" y="4" width="18" height="18" rx="2"></rect><line x1="16" y1="2" x2="16" y2="6"></line><line x1="8" y1="2" x2="8" y2="6"></line><line x1="3" y1="10" x2="21" y2="10"></line></svg><span>Daily departures</span></span>
              </div>
            </div>
            <div class="card-footer bg-white border-0 d-flex justify-content-between align-items-center gap-3">
              <div class="fw-bold">3,990,000 VND</div>
              <a href="#" class="btn btn-outline-primary btn-sm">View details</a>
            </div>
          </article>
        </div>

        <div class="col-12 col-md-6 col-xl-4">
          <article class="card border-0 shadow-sm h-100">
            <img src="https://images.unsplash.com/photo-1549880338-65ddcdfd017b?auto=format&fit=crop&w=1200&q=80" class="card-img-top rounded-top" alt="Nha Trang Tour" />
            <div class="card-body">
              <h5 class="card-title">Nha Trang Tour</h5>
              <p class="card-text text-muted">3 days 2 nights experiencing beaches and islands.</p>
              <div class="d-flex flex-wrap gap-2 text-muted small">
                <span class="meta-item"><svg class="meta-icon" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><circle cx="12" cy="12" r="10"></circle><polyline points="12 6 12 12 16 14"></polyline></svg><span>3 days 2 nights</span></span>
                <span class="meta-item"><svg class="meta-icon" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><rect x="3" y="4" width="18" height="18" rx="2"></rect><line x1="16" y1="2" x2="16" y2="6"></line><line x1="8" y1="2" x2="8" y2="6"></line><line x1="3" y1="10" x2="21" y2="10"></line></svg><span>Daily departures</span></span>
              </div>
            </div>
            <div class="card-footer bg-white border-0 d-flex justify-content-between align-items-center gap-3">
              <div class="fw-bold">2,690,000 VND</div>
              <a href="#" class="btn btn-outline-primary btn-sm">View details</a>
            </div>
          </article>
        </div>
      </div>
    </section>

    <section class="mb-5 py-4 px-3 rounded-4" style="background: rgba(111,192,247,0.12);">
      <div class="d-flex flex-column flex-md-row align-items-start align-items-md-center justify-content-between gap-3 mb-4">
        <div>
          <h2 class="h3 mb-1">Top Destinations</h2>
          <p class="text-muted mb-0">The most attractive places in Vietnam.</p>
        </div>
        <a href="#" class="text-primary text-decoration-none fw-semibold">View all →</a>
      </div>

      <div class="row g-3">
        <div class="col-6 col-md-4 col-xl-2">
          <div class="destination-card rounded-4 bg-white shadow-sm p-3 text-center h-100">
            <img src="https://images.unsplash.com/photo-1512453979798-5ea266f8880c?auto=format&fit=crop&w=600&q=80" class="img-fluid rounded-4 mb-3" alt="Hanoi" />
            <h6 class="mb-0">Hanoi</h6>
          </div>
        </div>
        <div class="col-6 col-md-4 col-xl-2">
          <div class="destination-card rounded-4 bg-white shadow-sm p-3 text-center h-100">
            <img src="https://images.unsplash.com/photo-1505761671935-60b3a7427bad?auto=format&fit=crop&w=600&q=80" class="img-fluid rounded-4 mb-3" alt="Da Nang" />
            <h6 class="mb-0">Da Nang</h6>
          </div>
        </div>
        <div class="col-6 col-md-4 col-xl-2">
          <div class="destination-card rounded-4 bg-white shadow-sm p-3 text-center h-100">
            <img src="https://images.unsplash.com/photo-1507525428034-b723cf961d3e?auto=format&fit=crop&w=600&q=80" class="img-fluid rounded-4 mb-3" alt="Nha Trang" />
            <h6 class="mb-0">Nha Trang</h6>
          </div>
        </div>
        <div class="col-6 col-md-4 col-xl-2">
          <div class="destination-card rounded-4 bg-white shadow-sm p-3 text-center h-100">
            <img src="https://images.unsplash.com/photo-1500534314209-a25ddb2bd429?auto=format&fit=crop&w=600&q=80" class="img-fluid rounded-4 mb-3" alt="Da Lat" />
            <h6 class="mb-0">Da Lat</h6>
          </div>
        </div>
        <div class="col-6 col-md-4 col-xl-2">
          <div class="destination-card rounded-4 bg-white shadow-sm p-3 text-center h-100">
            <img src="https://images.unsplash.com/photo-1507525428034-b723cf961d3e?auto=format&fit=crop&w=600&q=80" class="img-fluid rounded-4 mb-3" alt="Phu Quoc" />
            <h6 class="mb-0">Phu Quoc</h6>
          </div>
        </div>
        <div class="col-6 col-md-4 col-xl-2">
          <div class="destination-card rounded-4 bg-white shadow-sm p-3 text-center h-100">
            <img src="https://images.unsplash.com/photo-1500534314209-a25ddb2bd429?auto=format&fit=crop&w=600&q=80" class="img-fluid rounded-4 mb-3" alt="Sapa" />
            <h6 class="mb-0">Sapa</h6>
          </div>
        </div>
      </div>
    </section>

    <section class="mb-5">
      <div class="d-flex flex-column flex-md-row align-items-start align-items-md-center justify-content-between gap-3 mb-4">
        <div>
          <h2 class="h3 mb-1">Featured Blog</h2>
          <p class="text-muted mb-0">Latest travel news and guides.</p>
        </div>
        <a href="#" class="text-primary text-decoration-none fw-semibold">View all →</a>
      </div>

      <div class="row g-4">
        <div class="col-12 col-md-6 col-xl-4">
          <article class="card border-0 shadow-sm h-100 overflow-hidden">
            <img src="https://images.unsplash.com/photo-1493558103817-58b2924bce98?auto=format&fit=crop&w=1200&q=80" class="card-img-top blog-image" alt="Halong Blog" />
            <div class="card-body p-4">
              <small class="text-muted">20/05/2024</small>
              <h5>Self-guided Halong Bay Travel</h5>
              <p class="text-muted">Detailed tips on food, accommodation, sightseeing, and activities.</p>
            </div>
            <div class="card-footer bg-white border-0 p-4 pt-0">
              <a href="#" class="text-primary text-decoration-none fw-semibold">Read more →</a>
            </div>
          </article>
        </div>

        <div class="col-12 col-md-6 col-xl-4">
          <article class="card border-0 shadow-sm h-100 overflow-hidden">
            <img src="https://images.unsplash.com/photo-1500530855697-b586d89ba3ee?auto=format&fit=crop&w=1200&q=80" class="card-img-top blog-image" alt="Beach Blog" />
            <div class="card-body p-4">
              <small class="text-muted">15/05/2024</small>
              <h5>Top 10 Most Beautiful Beaches in Vietnam</h5>
              <p class="text-muted">Must-visit destinations for your beach vacation.</p>
            </div>
            <div class="card-footer bg-white border-0 p-4 pt-0">
              <a href="#" class="text-primary text-decoration-none fw-semibold">Read more →</a>
            </div>
          </article>
        </div>

        <div class="col-12 col-md-6 col-xl-4">
          <article class="card border-0 shadow-sm h-100 overflow-hidden">
            <img src="https://images.unsplash.com/photo-1494256997604-768d1f608cac?auto=format&fit=crop&w=1200&q=80" class="card-img-top blog-image" alt="Da Lat Blog" />
            <div class="card-body p-4">
              <small class="text-muted">10/05/2024</small>
              <h5>When is the best time to visit Da Lat?</h5>
              <p class="text-muted">Choose the right season for the best experience in Da Lat.</p>
            </div>
            <div class="card-footer bg-white border-0 p-4 pt-0">
              <a href="#" class="text-primary text-decoration-none fw-semibold">Read more →</a>
            </div>
          </article>
        </div>
      </div>
    </section>
  </main>

<?php get_footer(); ?>