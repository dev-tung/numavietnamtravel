<?php get_header(); ?>

<main class="container p-3">

  <div class="bg-white rounded-1 shadow-sm p-4">

    <!-- Breadcrumb -->
    <nav class="mb-3 small text-muted">
      <a href="#" class="text-decoration-none text-muted">
        Trang chủ
      </a>

      <span class="mx-2">›</span>

      <span>Tour</span>
    </nav>

    <!-- Heading -->
    <div class="d-flex flex-column flex-lg-row justify-content-between align-items-lg-center gap-3 mb-5">

      <div>

        <h1 class="fw-bold mb-2">
          Danh sách tour
        </h1>

        <p class="text-muted mb-0">
          Khám phá các tour du lịch hấp dẫn được thiết kế riêng cho bạn
        </p>

      </div>

      <div>

        <select class="form-select rounded-1 shadow-sm">
          <option>Sắp xếp: Mới nhất</option>
          <option>Giá tăng dần</option>
          <option>Giá giảm dần</option>
          <option>Tour nổi bật</option>
        </select>

      </div>

    </div>

    <!-- Layout -->
    <div class="row g-4">

      <!-- Sidebar -->
      <div class="col-12 col-lg-3">

        <div class="border rounded-1 p-4 h-100">

          <h5 class="fw-bold mb-4">
            BỘ LỌC TÌM KIẾM
          </h5>

          <!-- Search -->
          <div class="mb-4">

            <label class="form-label fw-semibold small">
              Tìm kiếm
            </label>

            <div class="input-group">

              <input type="text"
                     class="form-control border-end-0 rounded-start-3"
                     placeholder="Nhập tên tour, điểm đến...">

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

          <!-- Category -->
          <div class="mb-4">

            <label class="form-label fw-semibold small">
              Danh mục tour
            </label>

            <div class="d-flex flex-column gap-3 small">

              <div class="form-check">
                <input class="form-check-input" type="checkbox" id="tour1">
                <label class="form-check-label" for="tour1">
                  Tour ghép đoàn
                </label>
              </div>

              <div class="form-check">
                <input class="form-check-input" type="checkbox" id="tour2">
                <label class="form-check-label" for="tour2">
                  Tour riêng
                </label>
              </div>

              <div class="form-check">
                <input class="form-check-input" type="checkbox" id="tour3">
                <label class="form-check-label" for="tour3">
                  Tour trong nước
                </label>
              </div>

              <div class="form-check">
                <input class="form-check-input" type="checkbox" id="tour4">
                <label class="form-check-label" for="tour4">
                  Tour nước ngoài
                </label>
              </div>

            </div>

          </div>

          <button class="btn btn-dark w-100 rounded-1">
            Xóa bộ lọc
          </button>

        </div>

      </div>

      <!-- Content -->
      <div class="col-12 col-lg-9">

        <div class="mb-4">
          <p class="text-muted small mb-0">
            Hiển thị 1 - 5 trong tổng số 24 tour
          </p>
        </div>

        <!-- Tour List -->
        <div class="d-flex flex-column gap-4">

          <?php for($i = 1; $i <= 5; $i++) : ?>

          <article class="card border shadow-sm rounded-1 overflow-hidden h-100">

            <div class="row g-0 h-100">

              <!-- Image -->
              <div class="col-md-4 position-relative">

                <span class="badge bg-primary position-absolute top-0 start-0 m-3 px-3 py-2 rounded-pill">
                  Nổi bật
                </span>

                <img src="https://images.unsplash.com/photo-1507525428034-b723cf961d3e?auto=format&fit=crop&w=1200&q=80"
                     class="img-fluid w-100 h-100 object-fit-cover"
                     alt="Tour">

              </div>

              <!-- Content -->
              <div class="col-md-8">

                <div class="card-body p-4 h-100 d-flex flex-column">

                  <div>

                    <h3 class="h4 fw-bold mb-3">
                      Tour <?= $i ?>: Hà Nội – Hạ Long – Ninh Bình 3N2Đ
                    </h3>

                    <!-- Meta -->
                    <div class="d-flex flex-wrap gap-4 text-muted small mb-3">

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

                        3 ngày 2 đêm

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

                        Khởi hành: Hàng ngày

                      </span>

                    </div>

                    <p class="text-muted mb-4">
                      Khám phá vẻ đẹp thiên nhiên kỳ vĩ của Hạ Long,
                      cố đô Hoa Lư Ninh Bình và những nét văn hóa đặc sắc miền Bắc.
                    </p>

                    <!-- Features -->
                    <div class="d-flex flex-wrap gap-4 text-muted small mb-4">

                      <span class="d-flex align-items-center gap-2">

                        <svg xmlns="http://www.w3.org/2000/svg"
                             width="16"
                             height="16"
                             fill="currentColor"
                             class="bi bi-bus-front"
                             viewBox="0 0 16 16">

                          <path d="M4 0a2 2 0 0 0-2 2v9a2 2 0 0 0 1 1.732V14a1 1 0 0 0 2 0v-1h6v1a1 1 0 1 0 2 0v-1.268A2 2 0 0 0 14 11V2a2 2 0 0 0-2-2H4zm0 1h8a1 1 0 0 1 1 1v4H3V2a1 1 0 0 1 1-1z"/>
                          <path d="M3 7h10v4a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V7zm1.5 3a.5.5 0 1 0 0-1 .5.5 0 0 0 0 1zm7 0a.5.5 0 1 0 0-1 .5.5 0 0 0 0 1z"/>

                        </svg>

                        Xe du lịch

                      </span>

                      <span class="d-flex align-items-center gap-2">

                        <svg xmlns="http://www.w3.org/2000/svg"
                             width="16"
                             height="16"
                             fill="currentColor"
                             class="bi bi-building"
                             viewBox="0 0 16 16">

                          <path d="M6.5 15V1h3v14h5V0H1v15h5zm1-13h1v1h-1V2zm0 2h1v1h-1V4zm0 2h1v1h-1V6zm0 2h1v1h-1V8z"/>

                        </svg>

                        Khách sạn 3-4 sao

                      </span>

                      <span class="d-flex align-items-center gap-2">

                        <svg xmlns="http://www.w3.org/2000/svg"
                             width="16"
                             height="16"
                             fill="currentColor"
                             class="bi bi-cup-hot"
                             viewBox="0 0 16 16">

                          <path d="M2 2h11v5a4 4 0 0 1-8 0V2z"/>
                          <path d="M0 13h14v1H0z"/>

                        </svg>

                        Ăn uống

                      </span>

                    </div>

                  </div>

                  <!-- Bottom -->
                  <div class="d-flex flex-column flex-sm-row justify-content-between align-items-sm-center gap-3 mt-auto">

                    <div class="fw-bold fs-3">
                      2.990.000 VND
                    </div>

                    <a href="#"
                       class="btn btn-outline-primary rounded-1 px-4">
                      Xem chi tiết
                    </a>

                  </div>

                </div>

              </div>

            </div>

          </article>

          <?php endfor; ?>

        </div>

        <!-- Pagination -->
        <nav class="mt-5">

          <ul class="pagination justify-content-center">

            <li class="page-item">
              <a class="page-link rounded-1 mx-1" href="#">‹</a>
            </li>

            <li class="page-item active">
              <a class="page-link rounded-1 mx-1" href="#">1</a>
            </li>

            <li class="page-item">
              <a class="page-link rounded-1 mx-1" href="#">2</a>
            </li>

            <li class="page-item">
              <a class="page-link rounded-1 mx-1" href="#">3</a>
            </li>

            <li class="page-item">
              <a class="page-link rounded-1 mx-1" href="#">›</a>
            </li>

          </ul>

        </nav>

      </div>

    </div>

  </div>

</main>

<?php get_footer(); ?>