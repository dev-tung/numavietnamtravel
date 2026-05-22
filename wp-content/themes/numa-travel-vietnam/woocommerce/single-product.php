<?php get_header(); ?>

<style>

/* =========================================
   TOUR DETAIL
========================================= */

.TourDetail {
  background: #f5f5f5;
}

/* =========================================
   GALLERY
========================================= */

.TourGallery {
  position: relative;
  background: #f8f9fa;
}

.TourGallery__main {
  position: relative;
  height: 520px;
  overflow: hidden;
}

.TourGallery__image {
  position: absolute;
  inset: 0;

  width: 100%;
  height: 100%;

  object-fit: cover;

  opacity: 0;
  visibility: hidden;

  transition: all .4s ease;
}

.TourGallery__image.active {
  opacity: 1;
  visibility: visible;
}

/* NAV */

.TourGallery__nav {
  position: absolute;
  top: 50%;
  transform: translateY(-50%);

  width: 52px;
  height: 52px;

  border: none;
  border-radius: 999px;

  background: rgba(255,255,255,.95);
  backdrop-filter: blur(10px);

  display: flex;
  align-items: center;
  justify-content: center;

  cursor: pointer;

  transition: all .25s ease;

  z-index: 10;

  box-shadow:
    0 10px 30px rgba(0,0,0,.12);
}

.TourGallery__nav:hover {
  background: #000;
  color: #fff;
  transform: translateY(-50%) scale(1.05);
}

.TourGallery__prev {
  left: 20px;
}

.TourGallery__next {
  right: 20px;
}

/* THUMBS */

.TourGallery__thumbs {
  display: flex;
  gap: 12px;

  overflow-x: auto;
}

.TourGallery__thumb {
  width: 120px;
  height: 80px;

  object-fit: cover;

  border-radius: 6px;

  border: 2px solid transparent;

  cursor: pointer;

  flex-shrink: 0;

  transition: all .25s ease;
}

.TourGallery__thumb:hover {
  transform: translateY(-2px);
}

.TourGallery__thumb.active {
  border-color: #000;
}

/* =========================================
TABS
========================================= */

.TourTabs .nav-link {
  color: #6b7280;
  font-weight: 500;
  padding-left: 0;
  padding-right: 0;
}

.TourTabs .nav-link.active {
  color: #000;
  border-bottom: 2px solid #000 !important;
}

.TourTabPane {
  display: none;
}

.TourTabPane.active {
  display: block;
  animation: fadeTab .25s ease;
}

@keyframes fadeTab {

  from {
    opacity: 0;
    transform: translateY(8px);
  }

  to {
    opacity: 1;
    transform: translateY(0);
  }

}

/* =========================================
   FEATURED TOUR
========================================= */

.FeaturedTour__card {
  transition: all .25s ease;
}

.FeaturedTour__card:hover {
  transform: translateY(-4px);
  box-shadow: 0 15px 35px rgba(0,0,0,.08);
}

/* =========================================
   MOBILE
========================================= */

@media (max-width: 991px) {

  .TourGallery__main {
    height: 320px;
  }

  .TourGallery__nav {
    width: 42px;
    height: 42px;
  }

}

/* =========================================
MODAL GALLERY
========================================= */

.TourGalleryModal {
  position: fixed;
  inset: 0;
  z-index: 9999;
}

.TourGalleryModal__overlay {
  position: absolute;
  inset: 0;
  background: rgba(0,0,0,.85);
}

.TourGalleryModal__content {
  position: relative;
  z-index: 2;

  width: 95%;
  max-width: 1400px;

  margin: 40px auto;

  background: #fff;
  border-radius: 10px;

  padding: 24px;

  max-height: calc(100vh - 80px);
  overflow: auto;
}

.TourGalleryModal__close {
  position: sticky;
  top: 0;

  margin-left: auto;

  width: 42px;
  height: 42px;

  border: none;
  border-radius: 999px;

  background: #000;
  color: #fff;

  display: flex;
  align-items: center;
  justify-content: center;

  cursor: pointer;

  margin-bottom: 20px;
}

.TourGalleryModal__grid {
  display: grid;
  grid-template-columns: repeat(3, 1fr);
  gap: 20px;
}

.TourGalleryModal__grid img {
  width: 100%;
  height: 280px;

  object-fit: cover;

  border-radius: 8px;
}

@media (max-width: 991px) {

  .TourGalleryModal__grid {
    grid-template-columns: repeat(2, 1fr);
  }

}

@media (max-width: 576px) {

  .TourGalleryModal__grid {
    grid-template-columns: 1fr;
  }

}

</style>

<main class="TourDetail py-4">

  <div class="container">

    <!-- Breadcrumb -->
    <nav class="small text-muted mb-3">

      <a href="#" class="text-decoration-none text-muted">
        Home
      </a>

      <span class="mx-2">›</span>

      <a href="#" class="text-decoration-none text-muted">
        Tours
      </a>

      <span class="mx-2">›</span>

      <span>
        Tour Detail
      </span>

    </nav>

    <!-- Heading -->
    <div class="d-flex flex-column flex-xl-row justify-content-between gap-3 mb-4">

      <div>

        <h1 class="fw-bold mb-3">
          Ha Noi – Ha Long – Ninh Binh 3D2N
        </h1>

        <div class="d-flex flex-wrap gap-4 text-muted small">

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

            3 Days 2 Nights

          </span>

          <span class="d-flex align-items-center gap-2">

            <svg xmlns="http://www.w3.org/2000/svg"
                 width="16"
                 height="16"
                 fill="currentColor"
                 class="bi bi-calendar-event"
                 viewBox="0 0 16 16">

              <path d="M11 6.5a.5.5 0 0 1 .5.5v1h1a.5.5 0 0 1 0 1h-1v1a.5.5 0 0 1-1 0V9h-1a.5.5 0 0 1 0-1h1V7a.5.5 0 0 1 .5-.5z"/>
              <path d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5zM1 5v8a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V5H1z"/>

            </svg>

            Departure: Daily

          </span>

          <span class="d-flex align-items-center gap-2">

            <svg xmlns="http://www.w3.org/2000/svg"
                 width="16"
                 height="16"
                 fill="currentColor"
                 class="bi bi-star"
                 viewBox="0 0 16 16">

              <path d="M2.866 14.85c-.078.444.36.791.746.593l4.39-2.256 4.389 2.256c.386.198.824-.149.746-.592l-.83-4.73 3.523-3.356c.33-.314.158-.888-.283-.95l-4.898-.696-2.174-4.468a.513.513 0 0 0-.927 0L5.354 5.12l-4.898.696c-.441.062-.612.636-.282.95l3.523 3.356-.83 4.73z"/>

            </svg>

            4.8 (120 reviews)

          </span>

        </div>

      </div>

      <div class="d-flex align-items-start gap-4 small text-muted">

        <a href="#" class="text-decoration-none text-muted">
          ♡ Wishlist
        </a>

        <a href="#" class="text-decoration-none text-muted">
          ↗ Share
        </a>

      </div>

    </div>

    <!-- Layout -->
    <div class="row g-4">

      <!-- LEFT -->
      <div class="col-12 col-xl-8">

        <!-- Gallery -->
        <div class="border rounded-1 overflow-hidden mb-3 bg-white">

          <!-- Main -->
          <div class="TourGallery position-relative">

            <div class="TourGallery__main">

              <img src="https://images.unsplash.com/photo-1507525428034-b723cf961d3e?auto=format&fit=crop&w=1400&q=80"
                   class="TourGallery__image active"
                   alt="Tour">

              <img src="https://images.unsplash.com/photo-1528127269322-539801943592?auto=format&fit=crop&w=1400&q=80"
                   class="TourGallery__image"
                   alt="Tour">

              <img src="https://images.unsplash.com/photo-1506744038136-46273834b3fb?auto=format&fit=crop&w=1400&q=80"
                   class="TourGallery__image"
                   alt="Tour">

              <img src="https://images.unsplash.com/photo-1493558103817-58b2924bce98?auto=format&fit=crop&w=1400&q=80"
                   class="TourGallery__image"
                   alt="Tour">

            </div>

            <!-- Prev -->
            <button class="TourGallery__nav TourGallery__prev"
                    type="button">

              <svg xmlns="http://www.w3.org/2000/svg"
                   width="22"
                   height="22"
                   fill="currentColor"
                   viewBox="0 0 16 16">

                <path fill-rule="evenodd"
                      d="M11.354 1.646a.5.5 0 0 1 0 .708L5.707 8l5.647 5.646a.5.5 0 0 1-.708.708l-6-6a.5.5 0 0 1 0-.708l6-6a.5.5 0 0 1 .708 0"/>

              </svg>

            </button>

            <!-- Next -->
            <button class="TourGallery__nav TourGallery__next"
                    type="button">

              <svg xmlns="http://www.w3.org/2000/svg"
                   width="22"
                   height="22"
                   fill="currentColor"
                   viewBox="0 0 16 16">

                <path fill-rule="evenodd"
                      d="M4.646 1.646a.5.5 0 0 0 0 .708L10.293 8l-5.647 5.646a.5.5 0 0 0 .708.708l6-6a.5.5 0 0 0 0-.708l-6-6a.5.5 0 0 0-.708 0"/>

              </svg>

            </button>

            <button class="btn btn-dark position-absolute bottom-0 end-0 m-3 small rounded-1 px-3 py-2">
              View all photos (18)
            </button>

          </div>

          <!-- Thumbs -->
          <div class="TourGallery__thumbs p-3">

            <img src="https://images.unsplash.com/photo-1507525428034-b723cf961d3e?auto=format&fit=crop&w=600&q=80"
                 class="TourGallery__thumb active"
                 alt="Thumb">

            <img src="https://images.unsplash.com/photo-1528127269322-539801943592?auto=format&fit=crop&w=600&q=80"
                 class="TourGallery__thumb"
                 alt="Thumb">

            <img src="https://images.unsplash.com/photo-1506744038136-46273834b3fb?auto=format&fit=crop&w=600&q=80"
                 class="TourGallery__thumb"
                 alt="Thumb">

            <img src="https://images.unsplash.com/photo-1493558103817-58b2924bce98?auto=format&fit=crop&w=600&q=80"
                 class="TourGallery__thumb"
                 alt="Thumb">

          </div>

        </div>

        <!-- =========================================
        TABS
        ========================================= -->

        <div class="border rounded-1 bg-white TourTabs">

          <!-- Nav -->
          <ul class="nav nav-tabs px-3 pt-3 border-0 gap-4">

            <li class="nav-item">
              <button class="nav-link active border-0 rounded-0 bg-transparent"
                      data-tab="info">

                Tour Info

              </button>
            </li>

            <li class="nav-item">
              <button class="nav-link border-0 bg-transparent"
                      data-tab="itinerary">

                Itinerary

              </button>
            </li>

            <li class="nav-item">
              <button class="nav-link border-0 bg-transparent"
                      data-tab="map">

                Map

              </button>
            </li>

            <li class="nav-item">
              <button class="nav-link border-0 bg-transparent"
                      data-tab="review">

                Review

              </button>
            </li>

          </ul>

          <!-- CONTENT -->
          <div class="border-top p-4">

            <!-- TOUR INFO -->
            <div class="TourTabPane active"
                id="tab-info">

              <p class="text-muted mb-4">
                This 3 days 2 nights journey takes you to the most beautiful destinations in Northern Vietnam:
                Ha Long Bay, Ninh Binh ancient capital, and unique cultural experiences.
              </p>

              <!-- Highlight -->
              <div class="row row-cols-2 row-cols-lg-4 g-3 mb-5">

                <div class="col">
                  <div class="border rounded-1 p-3 h-100 small">
                    Visit Ha Long Bay
                  </div>
                </div>

                <div class="col">
                  <div class="border rounded-1 p-3 h-100 small">
                    Trang An Boat Tour
                  </div>
                </div>

                <div class="col">
                  <div class="border rounded-1 p-3 h-100 small">
                    Explore Hoa Lu
                  </div>
                </div>

                <div class="col">
                  <div class="border rounded-1 p-3 h-100 small">
                    Local Cuisine
                  </div>
                </div>

              </div>

              <!-- Info -->
              <div class="row gy-3 small">

                <div class="col-12 col-md-6">
                  <strong>Duration</strong><br>
                  3 Days 2 Nights
                </div>

                <div class="col-12 col-md-6">
                  <strong>Departure</strong><br>
                  Daily
                </div>

                <div class="col-12 col-md-6">
                  <strong>Transportation</strong><br>
                  Modern Tourist Bus
                </div>

                <div class="col-12 col-md-6">
                  <strong>Accommodation</strong><br>
                  3-4 Star Hotel
                </div>

              </div>

            </div>

            <!-- ITINERARY -->
            <div class="TourTabPane"
                id="tab-itinerary">

              <div class="d-flex flex-column gap-4">

                <div class="border rounded-1 p-4">

                  <div class="fw-bold mb-2">
                    Day 1: Ha Noi → Ha Long
                  </div>

                  <p class="text-muted mb-0">
                    Pick up at hotel, transfer to Ha Long Bay,
                    cruise experience and overnight stay.
                  </p>

                </div>

                <div class="border rounded-1 p-4">

                  <div class="fw-bold mb-2">
                    Day 2: Ha Long → Ninh Binh
                  </div>

                  <p class="text-muted mb-0">
                    Visit caves, transfer to Ninh Binh,
                    discover Trang An and Hoa Lu ancient capital.
                  </p>

                </div>

                <div class="border rounded-1 p-4">

                  <div class="fw-bold mb-2">
                    Day 3: Ninh Binh → Ha Noi
                  </div>

                  <p class="text-muted mb-0">
                    Free morning activities, local specialties,
                    return to Ha Noi city center.
                  </p>

                </div>

              </div>

            </div>

            <!-- MAP -->
            <div class="TourTabPane"
                id="tab-map">

              <div class="ratio ratio-16x9 overflow-hidden rounded-1">

                <iframe
                  src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3724.036341277607!2d105.8341597751075!3d21.028511180622996!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3135ab9901d5d8b5%3A0x6f7d0f4d9a8f4e2!2sHanoi!5e0!3m2!1sen!2s!4v1710000000000!5m2!1sen!2s"
                  style="border:0;"
                  allowfullscreen=""
                  loading="lazy">

                </iframe>

              </div>

            </div>

            <!-- REVIEW -->
            <div class="TourTabPane"
                id="tab-review">

              <div class="d-flex flex-column gap-4">

                <div class="border rounded-1 p-4">

                  <div class="d-flex justify-content-between mb-2">

                    <div class="fw-bold">
                      John Smith
                    </div>

                    <div class="text-warning">
                      ★★★★★
                    </div>

                  </div>

                  <p class="text-muted mb-0">
                    Amazing experience! The itinerary was very well organized
                    and the tour guide was extremely friendly.
                  </p>

                </div>

                <div class="border rounded-1 p-4">

                  <div class="d-flex justify-content-between mb-2">

                    <div class="fw-bold">
                      Emily Johnson
                    </div>

                    <div class="text-warning">
                      ★★★★★
                    </div>

                  </div>

                  <p class="text-muted mb-0">
                    Beautiful destinations, delicious food and comfortable hotels.
                    Highly recommended.
                  </p>

                </div>

              </div>

            </div>

          </div>

        </div>

      </div>

      <!-- RIGHT -->
      <div class="col-12 col-xl-4">

        <div class="border rounded-1 p-4 mb-4 sticky-top bg-white"
             style="top: 100px;">

          <h4 class="fw-bold mb-4">
            Tour Price
          </h4>

          <div class="mb-4">

            <div class="fw-bold fs-2">
              2,990,000 VND
            </div>

            <p class="small text-muted mb-0">
              Applicable for groups from 2 guests
            </p>

          </div>

          <div class="border-top border-bottom py-4 mb-4 d-flex flex-column gap-3 small">

            <div>✓ Departure: Daily</div>
            <div>✓ Transportation: Tourist Bus</div>
            <div>✓ Hotel: 3-4 Star</div>
            <div>✓ Meals Included</div>

          </div>

          <div class="d-grid gap-3">

            <a href="#" class="btn btn-dark rounded-1 py-3">
              Book Now
            </a>

            <a href="#" class="btn btn-outline-dark rounded-1 py-3">
              Contact Consultant
            </a>

          </div>

        </div>

      </div>

    </div>

    <!-- Featured -->
    <section class="mt-5 border rounded-1 p-4 bg-white">

      <div class="d-flex justify-content-between align-items-center mb-4">

        <h3 class="fw-bold mb-0">
          Featured Tours
        </h3>

        <a href="#" class="text-decoration-none small text-dark">
          View All →
        </a>

      </div>

      <div class="row g-4">

        <?php for($i = 1; $i <= 3; $i++) : ?>

        <div class="col-12 col-md-6 col-lg-4">

          <article class="card border rounded-1 h-100 overflow-hidden FeaturedTour__card">

            <img src="https://images.unsplash.com/photo-1528127269322-539801943592?auto=format&fit=crop&w=900&q=80"
                 class="card-img-top object-fit-cover"
                 style="height: 220px;"
                 alt="Tour">

            <div class="card-body d-flex flex-column">

              <h4 class="h6 fw-bold mb-2">
                Tour <?= $i ?>
              </h4>

              <p class="small text-muted mb-3">
                Ha Noi – Ha Long – Ninh Binh 3D2N
              </p>

              <!-- Meta -->
              <div class="d-flex flex-wrap gap-3 small text-muted mb-4">

                <span class="d-flex align-items-center gap-2">

                  <svg xmlns="http://www.w3.org/2000/svg"
                       width="14"
                       height="14"
                       fill="currentColor"
                       class="bi bi-clock"
                       viewBox="0 0 16 16">

                    <path d="M8 3.5a.5.5 0 0 1 .5.5v4.25l3 1.8a.5.5 0 1 1-.5.86l-3.25-1.95A.5.5 0 0 1 7.5 8V4a.5.5 0 0 1 .5-.5z"/>
                    <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm0-1A7 7 0 1 1 8 1a7 7 0 0 1 0 14z"/>

                  </svg>

                  3 Days 2 Nights

                </span>

                <span class="d-flex align-items-center gap-2">

                  <svg xmlns="http://www.w3.org/2000/svg"
                       width="14"
                       height="14"
                       fill="currentColor"
                       class="bi bi-calendar-event"
                       viewBox="0 0 16 16">

                    <path d="M11 6.5a.5.5 0 0 1 .5.5v1h1a.5.5 0 0 1 0 1h-1v1a.5.5 0 0 1-1 0V9h-1a.5.5 0 0 1 0-1h1V7a.5.5 0 0 1 .5-.5z"/>
                    <path d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5zM1 5v8a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V5H1z"/>

                  </svg>

                  Daily Departure

                </span>

              </div>

              <div class="mt-auto d-flex justify-content-between align-items-center">

                <div class="fw-bold">
                  2,990,000 VND
                </div>

                <a href="#" class="btn btn-outline-dark btn-sm rounded-1">
                  View Details
                </a>

              </div>

            </div>

          </article>

        </div>

        <?php endfor; ?>

      </div>

    </section>

  </div>

</main>

<script>

document.addEventListener('DOMContentLoaded', function () {

  const images = document.querySelectorAll('.TourGallery__image');
  const thumbs = document.querySelectorAll('.TourGallery__thumb');

  const prevBtn = document.querySelector('.TourGallery__prev');
  const nextBtn = document.querySelector('.TourGallery__next');

  let current = 0;

  function showSlide(index) {

    images.forEach((img) => {
      img.classList.remove('active');
    });

    thumbs.forEach((thumb) => {
      thumb.classList.remove('active');
    });

    images[index].classList.add('active');
    thumbs[index].classList.add('active');

    current = index;
  }

  nextBtn.addEventListener('click', function () {

    let next = current + 1;

    if (next >= images.length) {
      next = 0;
    }

    showSlide(next);

  });

  prevBtn.addEventListener('click', function () {

    let prev = current - 1;

    if (prev < 0) {
      prev = images.length - 1;
    }

    showSlide(prev);

  });

  thumbs.forEach((thumb, index) => {

    thumb.addEventListener('click', function () {
      showSlide(index);
    });

  });

});

/* =========================================
GALLERY
========================================= */

document.addEventListener('DOMContentLoaded', function () {

  const images = document.querySelectorAll('.TourGallery__image');
  const thumbs = document.querySelectorAll('.TourGallery__thumb');

  const prevBtn = document.querySelector('.TourGallery__prev');
  const nextBtn = document.querySelector('.TourGallery__next');

  const viewAllBtn = document.querySelector('.TourGallery .btn-dark');

  let current = 0;

  function showSlide(index) {

    images.forEach((img) => {
      img.classList.remove('active');
    });

    thumbs.forEach((thumb) => {
      thumb.classList.remove('active');
    });

    images[index].classList.add('active');
    thumbs[index].classList.add('active');

    current = index;
  }

  nextBtn.addEventListener('click', function () {

    let next = current + 1;

    if (next >= images.length) {
      next = 0;
    }

    showSlide(next);

  });

  prevBtn.addEventListener('click', function () {

    let prev = current - 1;

    if (prev < 0) {
      prev = images.length - 1;
    }

    showSlide(prev);

  });

  thumbs.forEach((thumb, index) => {

    thumb.addEventListener('click', function () {
      showSlide(index);
    });

  });

  /* AUTO SLIDE */

  setInterval(function () {

    let next = current + 1;

    if (next >= images.length) {
      next = 0;
    }

    showSlide(next);

  }, 5000);

  /* VIEW ALL */

  viewAllBtn.addEventListener('click', function () {

    const gallery = document.createElement('div');

    gallery.classList.add('TourGalleryModal');

    gallery.innerHTML = `
      <div class="TourGalleryModal__overlay"></div>

      <div class="TourGalleryModal__content">

        <button class="TourGalleryModal__close">
          ✕
        </button>

        <div class="TourGalleryModal__grid">

          ${Array.from(images).map(img => `
            <img src="${img.src}" alt="">
          `).join('')}

        </div>

      </div>
    `;

    document.body.appendChild(gallery);

    document.body.style.overflow = 'hidden';

    gallery
      .querySelector('.TourGalleryModal__close')
      .addEventListener('click', function () {

        gallery.remove();
        document.body.style.overflow = '';

      });

  });

});

/* =========================================
TABS
========================================= */

const tabButtons = document.querySelectorAll('.TourTabs .nav-link');
const tabPanes   = document.querySelectorAll('.TourTabPane');

tabButtons.forEach((button) => {

  button.addEventListener('click', function () {

    const target = this.dataset.tab;

    tabButtons.forEach((btn) => {
      btn.classList.remove('active');
    });

    tabPanes.forEach((pane) => {
      pane.classList.remove('active');
    });

    this.classList.add('active');

    document
      .querySelector(`#tab-${target}`)
      .classList.add('active');

  });

});

</script>

<?php get_footer(); ?>