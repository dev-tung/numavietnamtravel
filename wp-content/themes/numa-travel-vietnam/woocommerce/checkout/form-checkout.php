<?php
/**
 * Template Name: Tour Booking
 */

get_header();
?>

<style>

/* =========================================
BOOKING PAGE
========================================= */

/* .BookingPage {
  background: #f5f5f5;
} */

.BookingCard {
  background: #fff;
  border: 1px solid #e5e7eb;
  border-radius: 6px;
}

.BookingSectionTitle {
  font-size: 20px;
  font-weight: 700;
  margin-bottom: 24px;
}

.BookingLabel {
  font-size: 14px;
  font-weight: 600;
  margin-bottom: 8px;
  display: block;
}

.BookingLabel span {
  color: red;
}

.BookingInput,
.BookingTextarea,
.BookingSelect {
  width: 100%;
  height: 48px;

  border: 1px solid #d1d5db;
  border-radius: 4px;

  padding: 0 14px;

  outline: none;

  transition: all .2s ease;
}

.BookingTextarea {
  height: 140px;
  padding: 14px;
  resize: none;
}

.BookingInput:focus,
.BookingTextarea:focus,
.BookingSelect:focus {
  border-color: #000;
}

.BookingOptionGroup {
  display: flex;
  flex-wrap: wrap;
  gap: 12px;
}

.BookingOption {
  position: relative;
}

.BookingOption input {
  display: none;
}

.BookingOption label {
  min-width: 110px;
  height: 44px;

  border: 1px solid #d1d5db;
  border-radius: 4px;

  display: flex;
  align-items: center;
  justify-content: center;

  cursor: pointer;

  padding: 0 18px;

  font-size: 14px;
  font-weight: 500;

  transition: all .2s ease;
}

.BookingOption input:checked + label {
  background: #000;
  color: #fff;
  border-color: #000;
}

/* =========================================
SIDEBAR
========================================= */

.BookingSidebarCard {
  background: #fff;
  border: 1px solid #e5e7eb;
  border-radius: 6px;
  padding: 24px;
}

.BookingTourImage {
  width: 120px;
  height: 140px;

  object-fit: cover;

  border-radius: 4px;
}

.BookingFeatureList {
  display: flex;
  flex-direction: column;
  gap: 16px;
}

.BookingFeatureItem {
  display: flex;
  align-items: center;
  gap: 12px;

  font-size: 15px;
}

/* =========================================
BUTTON
========================================= */

.BookingSubmit {
  width: 100%;
  height: 52px;

  border: none;
  border-radius: 4px;

  background: #000;
  color: #fff;

  font-weight: 600;

  transition: all .2s ease;
}

.BookingSubmit:hover {
  opacity: .9;
}

/* =========================================
TEXTAREA COUNT
========================================= */

.BookingTextareaWrap {
  position: relative;
}

.BookingTextareaCount {
  position: absolute;
  right: 14px;
  bottom: 14px;

  font-size: 12px;
  color: #9ca3af;
}

/* =========================================
MOBILE
========================================= */

@media (max-width: 991px) {

  .BookingTourImage {
    width: 100%;
    height: 220px;
  }

}

</style>

<main class="BookingPage py-4">

  <div class="container">

    <!-- Breadcrumb -->
    <nav class="small text-muted mb-3">

      <a href="#" class="text-decoration-none text-muted">
        Home
      </a>

      <span class="mx-2">›</span>

      <a href="#" class="text-decoration-none text-muted">
        Tour
      </a>

      <span class="mx-2">›</span>

      <a href="#" class="text-decoration-none text-muted">
        Tour Detail
      </a>

      <span class="mx-2">›</span>

      <span>
        Booking
      </span>

    </nav>

    <!-- Heading -->
    <h1 class="fw-bold mb-4">
      Book Tour
    </h1>

    <div class="row g-4">

      <!-- LEFT -->
      <div class="col-12 col-xl-8 order-2 order-xl-1">

        <div class="BookingCard p-4">

          <h2 class="BookingSectionTitle">
            Contact Information
          </h2>

          <form action="">

            <div class="row g-4">

              <!-- Name -->
              <div class="col-md-6">

                <label class="BookingLabel">
                  Name <span>*</span>
                </label>

                <input type="text"
                       class="BookingInput"
                       placeholder="Enter your full name">

              </div>

              <!-- Email -->
              <div class="col-md-6">

                <label class="BookingLabel">
                  Email <span>*</span>
                </label>

                <input type="email"
                       class="BookingInput"
                       placeholder="Enter email">

              </div>

              <!-- Whatsapp -->
              <div class="col-12">

                <label class="BookingLabel">
                  WhatsApp Phone Number <span>*</span>
                </label>

                <input type="text"
                       class="BookingInput"
                       placeholder="Enter WhatsApp phone number">

              </div>

              <!-- Country -->
              <div class="col-md-6">

                <label class="BookingLabel">
                  Where are you from? <span>*</span>
                </label>

                <input type="text"
                       class="BookingInput"
                       placeholder="Enter country / city">

              </div>

              <!-- Date -->
              <div class="col-md-6">

                <label class="BookingLabel">
                  Dates of Travel (if known)
                </label>

                <input type="date"
                       class="BookingInput">

              </div>

              <!-- Stay -->
              <div class="col-12">

                <label class="BookingLabel">
                  Length of stay in Vietnam? <span>*</span>
                </label>

                <div class="BookingOptionGroup">

                  <div class="BookingOption">
                    <input type="radio" name="stay" id="stay1">
                    <label for="stay1">1 - 3 days</label>
                  </div>

                  <div class="BookingOption">
                    <input type="radio" name="stay" id="stay2">
                    <label for="stay2">3 - 5 days</label>
                  </div>

                  <div class="BookingOption">
                    <input type="radio" name="stay" id="stay3">
                    <label for="stay3">1 week</label>
                  </div>

                  <div class="BookingOption">
                    <input type="radio" name="stay" id="stay4">
                    <label for="stay4">More than 2 weeks</label>
                  </div>

                  <div class="BookingOption">
                    <input type="radio" name="stay" id="stay5">
                    <label for="stay5">Not Sure</label>
                  </div>

                </div>

              </div>

              <!-- Adults -->
              <div class="col-md-6">

                <label class="BookingLabel">
                  Number of Adults Travelling <span>*</span>
                </label>

                <select class="BookingSelect">

                  <option>Select number of adults</option>

                  <?php for($i = 1; $i <= 20; $i++) : ?>

                    <option><?= $i ?> Adult<?= $i > 1 ? 's' : '' ?></option>

                  <?php endfor; ?>

                </select>

              </div>

              <!-- Children -->
              <div class="col-md-6">

                <label class="BookingLabel">
                  Number of Children Travelling <span>*</span>
                </label>

                <select class="BookingSelect">

                  <option>Select number of children</option>

                  <?php for($i = 0; $i <= 10; $i++) : ?>

                    <option><?= $i ?> Children</option>

                  <?php endfor; ?>

                </select>

              </div>

              <!-- Budget -->
              <div class="col-12">

                <label class="BookingLabel">
                  What kind of your budget
                </label>

                <div class="BookingOptionGroup">

                  <div class="BookingOption">
                    <input type="radio" name="budget" id="budget1">
                    <label for="budget1">2 Stars</label>
                  </div>

                  <div class="BookingOption">
                    <input type="radio" name="budget" id="budget2">
                    <label for="budget2">3 Stars</label>
                  </div>

                  <div class="BookingOption">
                    <input type="radio" name="budget" id="budget3">
                    <label for="budget3">4 Stars</label>
                  </div>

                  <div class="BookingOption">
                    <input type="radio" name="budget" id="budget4">
                    <label for="budget4">5 Stars</label>
                  </div>

                </div>

              </div>

              <!-- Message -->
              <div class="col-12">

                <label class="BookingLabel">
                  Tell us about your travel style, yourself <span>*</span>
                </label>

                <div class="BookingTextareaWrap">

                  <textarea class="BookingTextarea"
                            maxlength="500"
                            id="bookingMessage"
                            placeholder="Example: vegetarian meals, honeymoon trip, private car..."></textarea>

                  <div class="BookingTextareaCount">
                    <span id="bookingCount">0</span>/500
                  </div>

                </div>

              </div>

              <!-- Submit -->
              <div class="col-12">

                <button type="submit"
                        class="BookingSubmit">

                  Submit

                </button>

              </div>

            </div>

          </form>

        </div>

      </div>

      <!-- RIGHT -->
      <div class="col-12 col-xl-4 order-1 order-xl-2">

        <!-- Tour Info -->
        <div class="BookingSidebarCard mb-4">

          <h3 class="fw-bold fs-5 mb-4">
            Tour Information
          </h3>

          <div>

            <h4 class="fw-bold fs-6 mb-4">
              Ha Noi – Ha Long – Ninh Binh 3D2N
            </h4>

            <div class="d-flex flex-column gap-3 small text-muted">

              <!-- Duration -->
              <div class="d-flex align-items-center gap-3">

                <svg xmlns="http://www.w3.org/2000/svg"
                    width="18"
                    height="18"
                    fill="currentColor"
                    class="bi bi-clock"
                    viewBox="0 0 16 16">

                  <path d="M8 3.5a.5.5 0 0 1 .5.5v4.25l3 1.8a.5.5 0 1 1-.5.86l-3.25-1.95A.5.5 0 0 1 7.5 8V4a.5.5 0 0 1 .5-.5z"/>
                  <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm0-1A7 7 0 1 1 8 1a7 7 0 0 1 0 14z"/>

                </svg>

                <span>
                  3 Days 2 Nights
                </span>

              </div>

              <!-- Departure -->
              <div class="d-flex align-items-center gap-3">

                <svg xmlns="http://www.w3.org/2000/svg"
                    width="18"
                    height="18"
                    fill="currentColor"
                    class="bi bi-calendar-event"
                    viewBox="0 0 16 16">

                  <path d="M11 6.5a.5.5 0 0 1 .5.5v1h1a.5.5 0 0 1 0 1h-1v1a.5.5 0 0 1-1 0V9h-1a.5.5 0 0 1 0-1h1V7a.5.5 0 0 1 .5-.5z"/>
                  <path d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5zM1 5v8a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V5H1z"/>

                </svg>

                <span>
                  Departure: Daily
                </span>

              </div>

              <!-- Transport -->
              <div class="d-flex align-items-center gap-3">

                <svg xmlns="http://www.w3.org/2000/svg"
                    width="18"
                    height="18"
                    fill="currentColor"
                    class="bi bi-bus-front"
                    viewBox="0 0 16 16">

                  <path d="M4 0a2 2 0 0 0-2 2v9a2 2 0 0 0 1 1.732V14a1 1 0 0 0 2 0v-1h6v1a1 1 0 1 0 2 0v-1.268A2 2 0 0 0 14 11V2a2 2 0 0 0-2-2H4zm0 1h8a1 1 0 0 1 1 1v4H3V2a1 1 0 0 1 1-1z"/>
                  <path d="M3 7h10v4a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V7zm1.5 3a.5.5 0 1 0 0-1 .5.5 0 0 0 0 1zm7 0a.5.5 0 1 0 0-1 .5.5 0 0 0 0 1z"/>

                </svg>

                <span>
                  Tourist Bus
                </span>

              </div>

              <!-- Hotel -->
              <div class="d-flex align-items-center gap-3">

                <svg xmlns="http://www.w3.org/2000/svg"
                    width="18"
                    height="18"
                    fill="currentColor"
                    class="bi bi-building"
                    viewBox="0 0 16 16">

                  <path d="M6.5 15V1h3v14h5V0H1v15h5zm1-13h1v1h-1V2zm0 2h1v1h-1V4zm0 2h1v1h-1V6zm0 2h1v1h-1V8z"/>

                </svg>

                <span>
                  3-4 Star Hotel
                </span>

              </div>

            </div>

          </div>

          <a href="#"
            class="small text-dark d-inline-flex align-items-center gap-2 mt-4 text-decoration-none fw-semibold">

            View Tour Detail

            <svg xmlns="http://www.w3.org/2000/svg"
                width="14"
                height="14"
                fill="currentColor"
                class="bi bi-arrow-right"
                viewBox="0 0 16 16">

              <path fill-rule="evenodd"
                    d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 1 1 .708-.708l4 
                    4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 
                    8.5H1.5A.5.5 0 0 1 1 8"/>

            </svg>

          </a>

        </div>

        <!-- Features -->
        <div class="BookingSidebarCard mb-4">

          <div class="BookingFeatureList">

            <!-- Item -->
            <div class="BookingFeatureItem">

              <svg xmlns="http://www.w3.org/2000/svg"
                  width="18"
                  height="18"
                  fill="currentColor"
                  class="bi bi-geo-alt"
                  viewBox="0 0 16 16">

                <path d="M12.166 8.94c-.524 1.062-1.234 2.12-1.96 3.07A31.493 31.493 0 0 1 8 
                14.58a31.481 31.481 0 0 1-2.206-2.57c-.726-.95-1.436-2.008-1.96-3.07C3.304 
                7.862 3 6.848 3 6a5 5 0 0 1 10 0c0 .848-.304 1.862-.834 2.94"/>

                <path d="M8 8a2 2 0 1 0 0-4 2 2 0 0 0 0 4"/>

              </svg>

              <span>
                Best Price Guarantee
              </span>

            </div>

            <!-- Item -->
            <div class="BookingFeatureItem">

              <svg xmlns="http://www.w3.org/2000/svg"
                  width="18"
                  height="18"
                  fill="currentColor"
                  class="bi bi-headset"
                  viewBox="0 0 16 16">

                <path d="M8 1a5 5 0 0 0-5 5v1H2a1 1 0 0 0-1 1v3a1 1 0 0 0 1 
                1h1v1a2 2 0 0 0 2 2h1v-5H4V6a4 4 0 1 1 8 0v4h-2v5h1a2 2 0 0 0 
                2-2v-1h1a1 1 0 0 0 1-1V8a1 1 0 0 0-1-1h-1V6a5 5 0 0 0-5-5"/>

              </svg>

              <span>
                24/7 Support
              </span>

            </div>

            <!-- Item -->
            <div class="BookingFeatureItem">

              <svg xmlns="http://www.w3.org/2000/svg"
                  width="18"
                  height="18"
                  fill="currentColor"
                  class="bi bi-check2-square"
                  viewBox="0 0 16 16">

                <path d="M14 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 
                1H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1zM2 
                0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 
                2 0 0 0 2-2V2a2 2 0 0 0-2-2z"/>

                <path d="M10.854 5.146a.5.5 0 0 1 0 
                .708l-3.5 3.5a.5.5 0 0 1-.708 
                0l-1.5-1.5a.5.5 0 1 1 .708-.708L7 
                8.293l3.146-3.147a.5.5 0 0 1 .708 0"/>

              </svg>

              <span>
                Fast Confirmation
              </span>

            </div>

            <!-- Item -->
            <div class="BookingFeatureItem">

              <svg xmlns="http://www.w3.org/2000/svg"
                  width="18"
                  height="18"
                  fill="currentColor"
                  class="bi bi-credit-card"
                  viewBox="0 0 16 16">

                <path d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 
                2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2zm2-1a1 
                1 0 0 0-1 1v1h14V4a1 1 0 0 0-1-1zm13 
                3H1v6a1 1 0 0 0 1 1h12a1 1 0 0 0 
                1-1z"/>

                <path d="M2 10a.5.5 0 0 1 .5-.5h2a.5.5 
                0 0 1 0 1h-2A.5.5 0 0 1 2 10"/>

              </svg>

              <span>
                Flexible Payment
              </span>

            </div>

          </div>

        </div>

      </div>

    </div>

  </div>

</main>

<script>

  const textarea = document.getElementById('bookingMessage');
  const counter  = document.getElementById('bookingCount');

  if (textarea) {

    textarea.addEventListener('input', function () {
      counter.innerText = this.value.length;
    });

  }

</script>

<?php get_footer(); ?>