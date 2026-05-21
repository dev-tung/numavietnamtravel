<!DOCTYPE html>
<html lang="vi">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Numa Vietnam Travel - Bootstrap Wireframe</title>
  <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/assets/css/bootstrap.min.css">
  <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/assets/css/main.css">

  <?php wp_head(); ?>
</head>
<body>
  <header class="navbar navbar-expand-md navbar-light bg-white shadow-sm sticky-top">
    <div class="container">
      <a class="navbar-brand d-flex align-items-center gap-3" href="#">
        <span class="brand-icon d-flex align-items-center justify-content-center">NV</span>
        <div>
          <div class="fw-bold text-dark">NUMA VIETNAM TRAVEL</div>
          <small class="text-muted">Hành trình Việt Nam</small>
        </div>
      </a>

      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mainNav" aria-controls="mainNav" aria-expanded="false" aria-label="Mở menu">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="mainNav">
        <ul class="navbar-nav mx-auto mb-3 mb-md-0">
          <li class="nav-item"><a class="nav-link active" href="#">Trang chủ</a></li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="tourDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Tour
              <svg class="dropdown-icon ms-1" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                <polyline points="6 9 12 15 18 9"></polyline>
              </svg>
            </a>
            <ul class="dropdown-menu" aria-labelledby="tourDropdown">
              <li><a class="dropdown-item" href="#">Tour 1</a></li>
              <li><a class="dropdown-item" href="#">Tour 2</a></li>
              <li><a class="dropdown-item" href="#">Tour 3</a></li>
            </ul>
          </li>
          <li class="nav-item"><a class="nav-link" href="#">Điểm đến</a></li>
          <li class="nav-item"><a class="nav-link" href="#">Blog</a></li>
          <li class="nav-item"><a class="nav-link" href="#">Giới thiệu</a></li>
          <li class="nav-item"><a class="nav-link" href="#">Liên hệ</a></li>
        </ul>
        <div class="d-flex gap-2">
          <button type="button" class="icon-btn" aria-label="Tìm kiếm">
            <svg class="icon-svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
              <circle cx="11" cy="11" r="7"></circle>
              <line x1="16.5" y1="16.5" x2="21" y2="21"></line>
            </svg>
          </button>
          <button type="button" class="icon-btn" aria-label="Gọi điện">
            <svg class="icon-svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
              <path d="M22 16.92v3a2 2 0 0 1-2.18 2A19.79 19.79 0 0 1 3 5.18 2 2 0 0 1 5 3h3a2 2 0 0 1 2 1.72 12.13 12.13 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L9.91 10.09a16 16 0 0 0 6 6l1.45-1.45a2 2 0 0 1 2.11-.45 12.13 12.13 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"></path>
            </svg>
          </button>
        </div>
      </div>
    </div>
  </header>
