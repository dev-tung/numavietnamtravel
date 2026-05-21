<header class="navbar navbar-expand-lg navbar-light bg-white shadow-sm sticky-top">
  <div class="container">

    <a class="navbar-brand fw-bold" href="<?php echo home_url(); ?>">
      <?php bloginfo('name'); ?>
    </a>

    <button class="navbar-toggler"
            type="button"
            data-bs-toggle="collapse"
            data-bs-target="#mainNav">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="mainNav">

      <?php
      wp_nav_menu([
        'theme_location' => 'primary',
        'container' => false,
        'menu_class' => 'navbar-nav ms-auto gap-3',
      ]);
      ?>

    </div>

  </div>
</header>
