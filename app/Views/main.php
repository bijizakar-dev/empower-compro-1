
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title><?= esc($setting->site_name) ?></title>

  <meta name="description" content="We Are Magvis. The Visionaries Behind Your Story.">
  <meta name="keywords" content="Production House">

  <!-- Favicon -->
  <link rel="icon" href="<?= base_url('storage/setting/logo/' . $setting->logo) ?>" type="image/png">

  <!-- Open Graph (for WhatsApp, Facebook, LinkedIn) -->
  <meta property="og:title" content="<?= esc($setting->site_name) ?>">
  <meta property="og:description" content="We Are Magvis. The Visionaries Behind Your Story.">
  <meta property="og:image" content="<?= base_url('storage/setting/logo/' . $setting->logo) ?>">
  <meta property="og:url" content="<?= current_url() ?>">
  <meta property="og:type" content="website">
  <meta property="og:site_name" content="<?= esc($setting->site_name) ?>">

  <!-- Favicons -->
  <link href="assets/img/icon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Fonts -->
  <link href="https://fonts.googleapis.com" rel="preconnect">
  <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Raleway:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.css">
  <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/glightbox/dist/css/glightbox.min.css" rel="stylesheet"/>
  <link href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" rel="stylesheet"  />

  <!-- Main CSS File -->
  <link href="assets/landing-page/css/main.css" rel="stylesheet">
</head>

<body class="index-page">

  <header id="header" class="header d-flex align-items-center fixed-top">
    <div class="container position-relative d-flex align-items-center justify-content-between">

      <a href="#about" class="logo d-flex align-items-center me-auto me-xl-0">
        <img src="<?= base_url('storage/setting/logo/' . $setting->logo) ?>" alt="">
      </a>

      <nav id="navmenu" class="navmenu">
        <ul>
          <li><a href="#hero" class="active"><?= lang('App.menu_home'); ?></a></li>
          <li><a href="#about"><?= lang('App.menu_about'); ?></a></li>
          <li><a href="#services"><?= lang('App.menu_services'); ?></a></li>
          <li><a href="#portfolio"><?= lang('App.menu_projects'); ?></a></li>
          <li><a href="#team"><?= lang('App.menu_teams'); ?></a></li>
          <li><a href="#contact"><?= lang('App.menu_contact'); ?></a></li>
        </ul>
        <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
      </nav>

      <a class="btn-getstarted ms-auto me-3" 
      href="https://wa.me/6285190447515?text=Halo%20kak,%20saya%20ingin%20tanya-tanya%20tentang%20jasa%20videonya" target="_blank">
      <?= lang('App.contact_us'); ?>
      </a>
      <div class="lang-switcher d-flex align-items-center ms-3 me-1 bg-white rounded-pill px-3 py-1">
        <a href="<?= base_url('id'); ?>"
          class="mx-1 <?= $locale === 'id' ? 'fw-bold text-primary' : 'text-muted'; ?>">
          ID
        </a>
        <span class="text-muted">|</span>
        <a href="<?= base_url('en'); ?>"
          class="mx-1 <?= $locale === 'en' ? 'fw-bold text-primary' : 'text-muted'; ?>">
          EN
        </a>
      </div>

    </div>
  </header>

  <main class="main">
    <!-- Hero Section -->
    <section id="hero" class="hero section position-relative" style="height: 100vh; overflow: hidden;">
      <!-- Video Background -->
      <video autoplay muted loop playsinline
        style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; object-fit: cover; z-index: 1;">
        <source src="assets/video/Comp_Showreels_Magvis_2025_Fix.mp4" type="video/mp4">
      </video>

      <!-- Overlay -->
      <div style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; 
                  background: rgba(24, 24, 24, 0); z-index: 2;"></div>

      <!-- Wrapper agar konten ada di tengah layar -->
      <div class="d-flex align-items-center justify-content-center text-center" style="min-height: 55vh; padding-top: 50px;">
          <!-- Content -->
          <div class="container position-relative text-white d-flex flex-column justify-content-center align-items-center" style="z-index: 3;">
          <div class="row justify-content-center">
            <div class="col-lg-6 col-md-10 col-12">
              <div class="badge-wrapper mb-3">
                <!-- <div class="d-inline-flex align-items-center rounded-pill border border-light px-3 py-1 text-white"> -->
                  <!-- <div class="icon-circle me-2 text-white">
                    <i class="bi bi-bell"></i>
                  </div> -->
                  <!-- <span class="badge-text me-2 text-white">Turn on your notifications</span> -->
                <!-- </div> -->
              </div>

              <div class="d-flex flex-column align-items-center text-center p-4  bg-opacity-75 rounded-4">
          
                <h1 class="mb-3 fs-1 fw-bold text-dark">
                  <img src="assets/landing-page/img/png-22.png" class="img-fluid rounded" alt="" width="55%">
                </h1>

                <div class="cta-wrapper">
                  <a href="#about " class="btn btn-primary btn-xs">
                    <?= lang('App.read_more'); ?>
                  </a>
                </div>
              </div> 
            </div>
          </div>
          </div>
      </div>
    </section>

    <!-- About Section -->
    <section id="about" class="about section">

      <div class="container">

        <div class="row gy-4">

          <div class="col-lg-6 content d-flex flex-column" data-aos="fade-up" data-aos-delay="150">
            <p class="who-we-are mb-auto"><?= lang('App.about_us_title'); ?></p>
            <div class="block-desc">
              <h3><?= lang('App.about_us_desc'); ?></h3>
              <p class="fst-italic">
                <?= lang('App.about_us_desc2'); ?>
              </p>
            </div>
            <!-- <ul>
              <li><i class="bi bi-check-circle"></i> <span>Adventure.</span></li>
              <li><i class="bi bi-check-circle"></i> <span>Event.</span></li>
              <li><i class="bi bi-check-circle"></i> <span>Video Profile.</span></li>
              <li><i class="bi bi-check-circle"></i> <span>Dokumenter.</span>
            </ul> -->
            
            <div class="row gy-4">
              <div class="d-flex flex-column align-items-center text-center p-4 bg-opacity-75 rounded-4">
                <div class="cta-wrapper">
                  <a href="https://drive.google.com/file/d/14o_ccbqq6rUdz04v2ISfmhobUwo-eSsZ/preview" class="glightbox btn btn-about-us btn-xs "><span><?= lang('App.about_us_btn1'); ?></span> </a>
                  <a href="https://drive.google.com/file/d/16NQTW9dn4cczv-ehjar8463oVl1g9uEH/preview" class="glightbox btn btn-about-us btn-xs "><span><?= lang('App.about_us_btn2'); ?></span> </a>
                </div>
              </div>
            </div>
          </div>

          <div class="col-lg-6 about-images" data-aos="fade-up" data-aos-delay="200">
            <h3 class="mb-4 fs-3 fw-medium text-center text-body-secondary">
              <?= lang('App.about_us_desc3'); ?>
            <!-- <span class="fw-bold text-black">Magvis</span> adalah <span class="fw-bold text-black">Production House</span> yang berfokus menghidupkan ide-ide tak terbatas melalui teknologi dan seni visual. 
              Kami menggabungkan keahlian dalam 
              <span class="fw-bold text-black"">Animasi, Video Produksi, Desain, Game, dan Digital Reality (AR/VR)</span> untuk menciptakan pengalaman yang unik dan mengesankan. -->
            </h3>
          </div>        
        </div>
      </div>
    </section>
    <!-- /About Section -->

    <!-- <div class="row gy-4">
              <!-- Gambar kiri atas -->
               <!-- <div class="col-6">
                <img src="assets/img/about/1.jpg" class="img-fluid rounded" alt="">
              </div> -->
              <!-- Gambar kanan atas -->
               <!-- <div class="col-6">
                <img src="assets/img/about/2.jpg" class="img-fluid rounded" alt="">
              </div> -->
              <!-- Gambar kiri bawah -->
               <!-- <div class="col-6">
                <img src="assets/img/about/3.jpg" class="img-fluid rounded" alt="">
              </div> -->
              <!-- Gambar kanan bawah BARU -->
               <!-- <div class="col-6">
                <img src="assets/img/about/4.jpg" class="img-fluid rounded" alt="">
              </div> -->
            <!-- </div> -->

    <!-- How We Work Section -->
    <section id="how-we-work" class="how-we-work section">

      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <h2><?= lang('App.how_we_work_title'); ?></h2>
        <p><?= lang('App.how_we_work_subtitle'); ?></p>
      </div><!-- End Section Title -->

      <div class="container" data-aos="fade-up" data-aos-delay="100">

        <div class="steps-5">
          <div class="process-container">

            <div class="process-item" data-aos="fade-up" data-aos-delay="200">
              <div class="content">
                <span class="step-number">01</span>
                <div class="card-body">
                  <div class="step-icon">
                    <i class="bi bi-chat-square-dots-fill"></i>
                  </div>
                  <div class="step-content">
                    <h3><?= lang('App.how_we_work_step_01_title'); ?></h3>
                    <p><?= lang('App.how_we_work_step_01_desc'); ?></p>
                  </div>
                </div>
              </div>
            </div><!-- End Process Item -->

            <div class="process-item" data-aos="fade-up" data-aos-delay="300">
              <div class="content">
                <span class="step-number">02</span>
                <div class="card-body">
                  <div class="step-icon">
                    <i class="bi bi-clipboard2-check-fill"></i>
                  </div>
                  <div class="step-content">
                    <h3><?= lang('App.how_we_work_step_02_title'); ?></h3>
                    <p><?= lang('App.how_we_work_step_02_desc'); ?></p>
                  </div>
                </div>
              </div>
            </div><!-- End Process Item -->

            <div class="process-item" data-aos="fade-up" data-aos-delay="400">
              <div class="content">
                <span class="step-number">03</span>
                <div class="card-body">
                  <div class="step-icon">
                    <i class="bi bi-pc-display"></i>
                  </div>
                  <div class="step-content">
                    <h3><?= lang('App.how_we_work_step_03_title'); ?></h3>
                    <p><?= lang('App.how_we_work_step_03_desc'); ?></p>
                  </div>
                </div>
              </div>
            </div><!-- End Process Item -->

            <div class="process-item" data-aos="fade-up" data-aos-delay="500">
              <div class="content">
                <span class="step-number">04</span>
                <div class="card-body">
                  <div class="step-icon">
                    <i class="bi bi-sliders"></i>
                  </div>
                  <div class="step-content">
                    <h3><?= lang('App.how_we_work_step_04_title'); ?></h3>
                    <p><?= lang('App.how_we_work_step_04_desc'); ?></p>
                  </div>
                </div>
              </div>
            </div><!-- End Process Item -->

            <div class="process-item" data-aos="fade-up" data-aos-delay="600">
              <div class="content">
                <span class="step-number">05</span>
                <div class="card-body">
                  <div class="step-icon">
                    <i class="bi bi-gift-fill"></i>
                  </div>
                  <div class="step-content">
                    <h3><?= lang('App.how_we_work_step_05_title'); ?></h3>
                    <p><?= lang('App.how_we_work_step_05_desc'); ?></p>
                  </div>
                </div>
              </div>
            </div><!-- End Process Item -->
          </div>
        </div>

      </div>

    </section><!-- /How We Work Section -->

    <!-- Services Section -->
    <section id="services" class="services section">

      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <h2><?= lang('App.services_title'); ?></h2>
        <p><?= lang('App.services_desc'); ?></p>
      </div><!-- End Section Title -->

      <div class="container" data-aos="fade-up" data-aos-delay="100">

        <div class="row justify-content-center g-5">

          <?php foreach ($services as $index => $row): ?>
          
          <div class="col-md-6" data-aos="<?= $index % 2 === 0 ? 'fade-right' : 'fade-left' ?>" data-aos-delay="200">
              <div class="service-item position-relative">
                  <!-- Coming Soon Label -->
                  <?php if (strpos($row->title, '(TBA)')): ?>
                  <div class="position-absolute top-0 end-0 mt-2 me-2 px-3 py-1 small fw-semibold rounded-pill text-white"
                      style="background: rgba(0, 0, 0, 0.35); backdrop-filter: blur(6px);">
                      Coming Soon
                  </div>
                  <?php endif; ?>

                  <div class="service-icon">
                     <i class="<?= $row->icon ?>"></i>
                  </div>

                  <div class="service-content">
                      <h3><?= esc($row->title) ?></h3>
                      <p><?= strip_tags($row->description) ?></p>
                      <a href="#portfolio" class="service-link go-filter" data-category="filter-<?= strtolower(str_replace(' ', '', $row->title)) ?>">
                          <span>Learn More</span>
                          <i class="bi bi-arrow-right"></i>
                      </a>
                  </div>
              </div>
          </div>
          <?php endforeach; ?>
          <!-- End Service Item -->
        
        </div>
      </div>

    </section><!-- /Services Section -->

    <!-- Services Alt Section -->
    <section id="services-alt" class="services-alt section">

      <div class="container" data-aos="fade-up" data-aos-delay="100">

        <div class="row">
          <div class="col-lg-6" data-aos="fade-up" data-aos-delay="100">
            <div class="content-block">
              <h6 class="subtitle"><?= lang('App.our_services_title'); ?></h6>
              <h2 class="title"><?= lang('App.our_services_subtitle'); ?></h2>
              <p class="description">
                <?= lang('App.our_services_intro_1'); ?>
                <?= lang('App.our_services_intro_2'); ?>
                <?= lang('App.our_services_intro_3'); ?>
                <br>
                <br>
              </p>
              <p class="description">
                <?= lang('App.our_services_intro_4'); ?>
                <?= lang('App.our_services_intro_5'); ?>
                <br>
              </p>
              <div class="button-wrapper">
                <a class="btn" href="#services"><span><?= lang('App.our_services_explore'); ?></span</span></a>
              </div>
            </div>
          </div>
          <div class="col-lg-6">
            <div class="services-list">
              <div class="service-item d-flex align-items-center" data-aos="fade-up" data-aos-delay="200">
                <div class="service-icon">
                  <i class="bi bi-badge-3d-fill"></i>
                </div>
                <div class="service-content">
                  <h4><a href=""><?= lang('App.service_motion_title'); ?></a></h4>
                  <p><?= lang('App.service_motion_desc'); ?></p>
                </div>
              </div><!-- End Service Item -->

              <div class="service-item d-flex align-items-center" data-aos="fade-up" data-aos-delay="300">
                <div class="service-icon">
                  <i class="bi bi-film"></i>
                </div>
                <div class="service-content">
                  <h4><a href=""><?= lang('App.service_cinematic_title'); ?></a></h4>
                  <p><?= lang('App.service_cinematic_desc'); ?></p>
                </div>
              </div><!-- End Service Item -->

              <div class="service-item d-flex align-items-center" data-aos="fade-up" data-aos-delay="400">
                <div class="service-icon">
                  <i class="bi bi-person-video3"></i>
                </div>
                <div class="service-content">
                  <h4><a href=""><?= lang('App.service_branding_title'); ?></a></h4>
                  <p><?= lang('App.service_branding_desc'); ?></p>
                </div>
              </div><!-- End Service Item -->

              <div class="service-item d-flex align-items-center" data-aos="fade-up" data-aos-delay="400">
                <div class="service-icon">
                  <i class="bi bi-badge-vr-fill"></i>
                </div>
                <div class="service-content">
                  <h4><a href=""><?= lang('App.service_immersive_title'); ?></a></h4>
                  <p><?= lang('App.service_immersive_desc'); ?></p>
                </div>
              </div><!-- End Service Item -->

              <div class="service-item d-flex align-items-center" data-aos="fade-up" data-aos-delay="400">
                <div class="service-icon">
                  <i class="bi bi-camera-reels"></i>
                </div>
                <div class="service-content">
                  <h4><a href=""><?= lang('App.service_photography_title'); ?></a></h4>
                  <p><?= lang('App.service_photography_desc'); ?></p>
                </div>
              </div><!-- End Service Item -->

              <div class="service-item d-flex align-items-center" data-aos="fade-up" data-aos-delay="400">
                <div class="service-icon">
                  <i class="bi bi-book-half"></i>
                </div>
                <div class="service-content">
                  <h4><a href=""><?= lang('App.service_training_title'); ?></a></h4>
                  <p><?= lang('App.service_training_desc'); ?></p>
                </div>
              </div><!-- End Service Item -->
            </div>
          </div>
        </div>
      </div>

    </section>
    
    <!-- /Services Alt Section -->

    <!-- Portfolio Section -->
    <section id="portfolio" class="portfolio section">

      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <h2><?= lang('App.our_works_title'); ?></h2>
        <p><?= lang('App.our_works_subtitle'); ?></p>
      </div><!-- End Section Title -->

      <div class="container" data-aos="fade-up" data-aos-delay="100">

        <div class="isotope-layout" data-default-filter="*" data-layout="masonry" data-sort="original-order">

          <!-- FILTER DINAMIS -->
          <div class="portfolio-filters-container" data-aos="fade-up" data-aos-delay="200">
            <ul class="portfolio-filters isotope-filters">
              

              <?php foreach ($categories as $index => $cat): ?>
                <?php 
                  // ubah nama kategori jadi slug untuk class isotope
                  $slug = 'filter-' . strtolower(str_replace(' ', '', $cat->name));
                ?>
                <li <?php if ($index == 0) { ?>class="filter-active"<?php } ?> data-filter=".<?= $slug ?>"><?= esc($cat->name) ?></li>
              <?php endforeach; ?>
              <li data-filter="*">All Projects</li>
            </ul>
          </div>

          <!-- PORTFOLIO ITEMS -->
          <div class="row g-4 isotope-container" data-aos="fade-up" data-aos-delay="300">

            <?php foreach ($portfolios as $p): ?>
              <?php
                $catSlug  = 'filter-' . strtolower(str_replace(' ', '', $p->category_name));
                $galleryId = 'portfolio-gallery-' . $p->id;

                // Thumbnail default
                $thumb = base_url('storage/portfolio/thumbnail/' . $p->thumbnail);

                // Media
                $mediaList = $p->media ?? [];

                // Ambil media pertama utk preview
                $preview = !empty($mediaList)
                    ? $mediaList[0]->file_url
                    : $thumb;
              ?>

              <div class="col-lg-4 col-md-6 portfolio-item isotope-item <?= $catSlug ?>">
                <div class="portfolio-card">

                  <div class="portfolio-image">
                    <img src="<?= $thumb ?>" class="img-fluid" alt="" loading="lazy">

                    <div class="portfolio-overlay">
                      <div class="portfolio-actions">

                        <!-- Tombol preview utama -->
                        <a href="<?= $preview ?>"
                          class="glightbox preview-link"
                          data-gallery="<?= $galleryId ?>">
                          <i class="bi bi-eye"></i>
                        </a>

                        <!-- Link ke Instagram / detail -->
                        <a href="<?= $p->client_name ?: '#' ?>" 
                          class="details-link" target="_blank">
                          <i class="bi bi-arrow-right"></i>
                        </a>

                        <!-- Semua media tambahan (hidden) -->
                        <?php if (!empty($mediaList)): ?>
                          <?php foreach ($mediaList as $index => $m): ?>
                            <?php if ($index > 0): ?>
                              <a href="<?= $m->file_url ?>"
                                class="glightbox d-none"
                                data-gallery="<?= $galleryId ?>"></a>
                            <?php endif; ?>
                          <?php endforeach; ?>
                        <?php endif; ?>

                      </div>
                    </div>
                  </div>

                  <div class="portfolio-content">
                    <span class="category"><?= esc($p->category_name) ?></span>
                    <h3><?= esc($p->title) ?></h3>
                    <p><?= esc($p->client_name ?: 'Magvis Client') ?></p>
                  </div>

                </div>
              </div>

            <?php endforeach; ?>

          </div><!-- End Portfolio Container -->

        </div>
      </div>

    </section><!-- /Portfolio Section -->

    <!-- Pricing Section -->
    <?php
        // Hitung jumlah data
        $totalItems = count($pricelists);
        $useCarousel = $totalItems > 4;

        if ($totalItems !== 0) {
    ?>
    <section id="pricing" class="pricing section light-background">

      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <h2>Paket Jasa</h2>
        <p>Paket Jasa Kami Meliputi:</p>
      </div><!-- End Section Title -->

      <div class="container" data-aos="fade-up" data-aos-delay="100">

        

        <?php if ($useCarousel): ?>
          <!-- data > 4: gunakan carousel seperti testimonials -->
          <div class="pricing-slider swiper init-swiper pt-4" style="margin-top: calc(-1 * var(--bs-gutter-y)); --bs-gutter-x: 1.5rem; --bs-gutter-y: 0;">
            <script type="application/json" class="swiper-config">
              {
                "loop": false,
                "speed": 800,
                "autoplay": false,
                "slidesPerView": 1,
                "spaceBetween": 24,
                "pagination": {
                  "el": ".swiper-pagination",
                  "type": "bullets",
                  "clickable": true
                },
                "navigation": {
                  "nextEl": ".swiper-button-next",
                  "prevEl": ".swiper-button-prev"
                },
                "breakpoints": {
                  "768": {
                    "slidesPerView": 2,
                    "spaceBetween": 24
                  },
                  "1200": {
                    "slidesPerView": 4,
                    "spaceBetween": 24
                  }
                }
              }
            </script>
            <div class="swiper-wrapper">
              <?php foreach ($pricelists as $i => $item): ?>
                <?php
                  $priceK = number_format($item->price / 1000, 0) . ' K';
                  $description = strip_tags($item->description);
                  
                  if (is_array($item->features)) {
                      $features = $item->features;
                  } else {
                      if (str_starts_with(trim($item->features), '[')) {
                          $features = json_decode($item->features, true);
                      } else {
                          $features = preg_split('/\r\n|\r|\n/', trim($item->features));
                      }
                  }
                ?>
                    
                <div class="swiper-slide">
                  <div class="pricing-card h-100 <?= $item->popular ? 'popular' : '' ?>"
                    data-aos="fade-up"
                    data-aos-delay="<?= ($i + 1) * 100 ?>">
                            
                    <?php if ($item->popular): ?>
                        <div class="popular-badge">Banyak Diminati</div>
                    <?php endif; ?>

                    <h3><?= esc($item->package_name) ?></h3>
                    <p class="start-from">Start From</p>

                    <div class="price">
                        <span class="currency">Rp.</span>
                        <span class="amount"><?= $priceK ?></span>
                        <span class="period">/ paket</span>
                    </div>

                    <p class="description"><?= esc($description) ?></p>

                    <h4>Sudah Termasuk:</h4>
                    <ul class="features-list">
                        <?php foreach ($features as $f): ?>
                            <?php if (trim($f) !== ''): ?>
                                <li>
                                    <i class="bi bi-check-circle-fill"></i>
                                    <?= esc(str_replace(['- ', '• '], '', $f)) ?>
                                </li>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    </ul>

                    <a href="#" class="btn <?= $item->popular ? 'btn-light' : 'btn-primary' ?>">
                        Beli Sekarang!
                        <i class="bi bi-arrow-right"></i>
                    </a>
                  </div>
                </div>

              <?php endforeach; ?>
            </div>
                    
            <!-- Navigation buttons -->
            
            <!-- Pagination -->
            <div class="swiper-pagination"></div>
          </div>

        <?php else: ?>
          <!-- data <= 4: tampilkan centered grid dengan ukuran asli -->
          <div class="row row-cols-1 row-cols-md-2 row-cols-lg-4 g-4 justify-content-center">
            <?php foreach ($pricelists as $i => $item): ?>
              <?php
                $priceK = number_format($item->price / 1000, 0) . ' K';
                $description = strip_tags($item->description);
                
                if (is_array($item->features)) {
                    $features = $item->features;
                } else {
                    if (str_starts_with(trim($item->features), '[')) {
                        $features = json_decode($item->features, true);
                    } else {
                        $features = preg_split('/\r\n|\r|\n/', trim($item->features));
                    }
                }
              ?>
              
              <div class="col-12 col-md-6 col-lg-3 d-flex"
                data-aos="fade-up"
                data-aos-delay="<?= ($i + 1) * 100 ?>">
                  
                <div class="pricing-card w-100 <?= $item->popular ? 'popular' : '' ?>">
                    
                  <?php if ($item->popular): ?>
                      <div class="popular-badge">Banyak Diminati</div>
                  <?php endif; ?>

                  <h3><?= esc($item->package_name) ?></h3>
                  <p class="start-from">Start From</p>

                  <div class="price">
                      <span class="currency">Rp.</span>
                      <span class="amount"><?= $priceK ?></span>
                      <span class="period">/ paket</span>
                  </div>

                  <p class="description"><?= esc($description) ?></p>

                  <h4>Sudah Termasuk:</h4>
                  <ul class="features-list">
                      <?php foreach ($features as $f): ?>
                          <?php if (trim($f) !== ''): ?>
                              <li>
                                  <i class="bi bi-check-circle-fill"></i>
                                  <?= esc(str_replace(['- ', '• '], '', $f)) ?>
                              </li>
                          <?php endif; ?>
                      <?php endforeach; ?>
                  </ul>

                  <a href="#" class="btn <?= $item->popular ? 'btn-light' : 'btn-primary' ?>">
                      Beli Sekarang!
                      <i class="bi bi-arrow-right"></i>
                  </a>
                </div>
              </div>
            <?php endforeach; ?>
          </div>
        <?php endif; ?>
      </div>

    </section>
    <?php } ?>

    <!-- /Pricing Section -->



    <!-- Faq Section -->
    <section id="faq" class="faq section">
      <div class="container" data-aos="fade-up" data-aos-delay="100">
        <div class="row gy-5">
          <!-- Kanan: FAQ Loop -->
          <div class="col-lg-6" data-aos="fade-up" data-aos-delay="300">
            <div class="faq-accordion">

              <?php $i = 0; foreach ($faqs as $faq): ?>
                  <div class="faq-item <?= $i == 0 ? 'faq-active' : '' ?>">
                    <div class="faq-header">
                      <h3><?= esc($faq['question']) ?></h3>
                      <i class="bi bi-chevron-down faq-toggle"></i>
                    </div>

                    <div class="faq-content">
                      <p><?= esc($faq['answer']) ?></p>
                    </div>
                  </div><!-- End FAQ Item-->
              <?php $i++; endforeach; ?>
            </div>
          </div>
          
          <!-- Kiri: Contact Card -->
          <div class="col-lg-6" data-aos="zoom-out" data-aos-delay="200">
            <div class="faq-contact-card">
              <div class="card-icon">
                <i class="bi bi-question-circle"></i>
              </div>
              <div class="card-content">
                <h3><?= lang('App.faq_title'); ?></h3>
                <p><?= lang('App.faq_subtitle'); ?></p>

                <div class="contact-options">
                  <a href="mailto:<?= esc($setting->contact_email ?? '') ?>" class="contact-option">
                    <i class="bi bi-envelope"></i>
                    <span><?= lang('App.faq_email'); ?></span>
                  </a>

                  <!-- REGEX NOMOR HP -->
                  <a href="https://wa.me/<?= preg_replace('/[^0-9]+/', '', $setting->contact_phone ?? '') ?>?text=Halo%20kak,%20saya%20ingin%20tanya%20tentang%20layanannya"
                    class="contact-option" target="_blank">
                    <i class="bi bi-chat-dots"></i>
                    <span><?= lang('App.faq_chat'); ?></span>
                  </a>
<!-- 
                  <a href="https://wa.me/<?= esc($setting->contact_phone ?? '') ?>" class="contact-option">
                    <i class="bi bi-telephone"></i>
                    <span>Telepon Kami Dulu, Yuk!</span>
                  </a> -->
                </div>

              </div>
            </div>
          </div>
        </div>
      </div>

  </section><!-- /Faq Section -->

    
    <!-- Team Section -->
    <section id="team" class="team section light-background">

      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <h2><?= lang('App.team_title'); ?></h2>
        <p><b><?= lang('App.team_subtitle'); ?></b></p>
        <p class="mt-2"><i>"<?= lang('App.team_desc'); ?>"</i></p>
      </div><!-- End Section Title -->

      <div class="container" data-aos="fade-up" data-aos-delay="100">

          <?php 
            $delay = 100;
            $priority_positions = ['Executive Director', 'CEO', 'Chairman of the Board'];

            // Pisahkan tim prioritas dan tim lainnya
            $priority_teams = array_filter($teams, fn($t) => in_array($t->position, $priority_positions));
            $other_teams = array_filter($teams, fn($t) => !in_array($t->position, $priority_positions));
          ?>

          <!-- Row 1: Leadership -->
          <?php if (!empty($priority_teams)): ?>
            <div class="row g-4 justify-content-center mb-4">
              <?php foreach ($priority_teams as $t): ?>
              <div class="col-6 col-md-4 col-lg-2" data-aos="zoom-in" data-aos-delay="<?= $delay ?>">
                <div class="team-card">

                  <div class="team-image">
                      <?php if ($t->photo): ?>
                        <img src="<?= base_url('uploads/team/' . $t->photo) ?>" class="img-fluid" alt="<?= esc($t->name) ?>">
                      <?php else: ?>
                        <img src="<?=base_url()?>/template/assets/img/illustrations/profiles/profile-5.png" class="img-fluid" alt="No Image">
                      <?php endif; ?>

                      <div class="team-overlay">
                        <p><?= $t->bio ? esc($t->bio) : 'No Description.' ?></p>
                        <div class="team-social">
                          <?php if ($t->instagram_url): ?>
                            <a href="<?= esc($t->instagram_url) ?>" target="_blank"><i class="bi bi-instagram"></i></a>
                          <?php endif; ?>
                          <?php if ($t->linkedin_url): ?>
                            <a href="<?= esc($t->linkedin_url) ?>" target="_blank"><i class="bi bi-linkedin"></i></a>
                          <?php endif; ?>
                          <?php if ($t->twitter_url): ?>
                            <a href="<?= esc($t->twitter_url) ?>" target="_blank"><i class="bi bi-tiktok"></i></a>
                          <?php endif; ?>
                        </div>
                      </div>
                  </div>

                  <div class="team-content">
                    <h4><?= esc($t->name) ?></h4>
                    <span class="position"><?= esc($t->position) ?></span>
                  </div>
                </div>
              </div>
              <?php $delay += 100; ?>
              <?php endforeach; ?>
            </div>
          <?php endif; ?>

          <!-- Row 2: Other Team Members -->
          <?php if (!empty($other_teams)): ?>
          <div class="row g-4 justify-content-center">
              <?php foreach ($other_teams as $t): ?>
              <div class="col-6 col-md-4 col-lg-2" data-aos="zoom-in" data-aos-delay="<?= $delay ?>">
                  <div class="team-card">

                      <div class="team-image">
                          <?php if ($t->photo): ?>
                              <img src="<?= base_url('uploads/team/' . $t->photo) ?>" class="img-fluid" alt="<?= esc($t->name) ?>">
                          <?php else: ?>
                              <img src="<?=base_url()?>/template/assets/img/illustrations/profiles/profile-5.png" class="img-fluid" alt="No Image">
                          <?php endif; ?>

                          <div class="team-overlay">
                              <p><?= $t->bio ? esc($t->bio) : 'No Description.' ?></p>
                              <div class="team-social">
                                  <?php if ($t->instagram_url): ?>
                                      <a href="<?= esc($t->instagram_url) ?>" target="_blank"><i class="bi bi-instagram"></i></a>
                                  <?php endif; ?>
                                  <?php if ($t->linkedin_url): ?>
                                      <a href="<?= esc($t->linkedin_url) ?>" target="_blank"><i class="bi bi-linkedin"></i></a>
                                  <?php endif; ?>
                                  <?php if ($t->twitter_url): ?>
                                      <a href="<?= esc($t->twitter_url) ?>" target="_blank"><i class="bi bi-tiktok"></i></a>
                                  <?php endif; ?>
                              </div>
                          </div>
                      </div>

                      <div class="team-content">
                          <h4><?= esc($t->name) ?></h4>
                          <span class="position"><?= esc($t->position) ?></span>
                      </div>

                  </div>
              </div>
              <?php $delay += 100; ?>
              <?php endforeach; ?>
          </div>
          <?php endif; ?>
      </div>
    </section>

    
    <!-- Testimonials Section -->
    <section id="testimonials" class="testimonials section">

      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <h2><?= lang('App.testimonial_title'); ?></h2>
        <p><?= lang('App.testimonial_subtitle'); ?></p>
      </div><!-- End Section Title -->

      <div class="container" data-aos="fade-up" data-aos-delay="100">

        <div class="testimonials-slider swiper init-swiper">
          <script type="application/json" class="swiper-config">
            {
              "loop": true,
              "speed": 800,
              "autoplay": {
                "delay": 5000
              },
              "slidesPerView": 1,
              "spaceBetween": 30,
              "pagination": {
                "el": ".swiper-pagination",
                "type": "bullets",
                "clickable": true
              },
              "breakpoints": {
                "768": {
                  "slidesPerView": 2
                },
                "1200": {
                  "slidesPerView": 3
                }
              }
            }
          </script>
          <div class="swiper-wrapper">
            <?php for($i = 1; $i <= 5; $i++): ?>
              <div class="swiper-slide">
                <div class="testimonial-wrapper">
                  <div class="testimonial-card container">
                    <div class="row align-items-center g-4">
                      <div class="text-center">
                        <div class="testimonial-img">
                          <img src="https://images.unsplash.com/photo-1529626455594-4ff0802cfb7e?w=400" alt="Testimonial" />
                        </div>
                      </div>
                      <div class="col-12">
                        <div class="stars mb-2">★★★★★</div>
                        <p class="fs-6 fw-bold">
                          "Kerja bareng tim Magvis Studio itu sangat menyenangkan. Mereka paham dengan kebutuhan event besar, sigap di lapangan, dan hasilnya sinematik banget. Klien dan sponsor sangat puas dengan dokumentasi dari mereka."
                        </p>
                        <p class="mb-0">— <strong>Vermillion D. White</strong></p>
                        <small class="text-muted">CEO, planetX.ai</small>
                      </div>
                    </div>
                  </div>
                </div>
              </div><!-- End testimonial item -->
            <?php endfor; ?>
           

            <!-- <div class="swiper-slide">
              <div class="testimonial-card">
                <div class="testimonial-content">
                  <p>
                    <i class="bi bi-quote quote-icon"></i>
                    "Kami memakai jasa dokumentasi event untuk acara komunitas di Jogja, dan hasilnya luar biasa! Setiap momen penting berhasil ditangkap dengan rapi. Editingnya juga cepat dan profesional."
                  </p>
                </div>
                <div class="testimonial-profile">
                  <div class="rating">
                    <i class="bi bi-star-fill"></i>
                    <i class="bi bi-star-fill"></i>
                    <i class="bi bi-star-fill"></i>
                    <i class="bi bi-star-fill"></i>
                    <i class="bi bi-star-fill"></i>
                  </div>
                  <div class="profile-info">
                    <img src="<?=base_url()?>/template/assets/img/illustrations/profiles/profile-1.png" alt="Profile Image">
                    <div>
                      <h3>Klien 2</h3>
                      <h4>No description.</h4>
                    </div>
                  </div>
                </div>
              </div>
            </div> -->
            <!-- End testimonial item -->

            <!-- <div class="swiper-slide">
              <div class="testimonial-card">
                <div class="testimonial-content">
                  <p>
                    <i class="bi bi-quote quote-icon"></i>
                    "Butuh video profil buat portofolio, dan hasil kerja dari Magvis Studio benar-benar melebihi ekspektasi. Lighting, angle, sampai storytellingnya rapi banget. Recommended buat content creator yang pengen tampil beda."
                  </p>
                </div>
                <div class="testimonial-profile">
                  <div class="rating">
                    <i class="bi bi-star-fill"></i>
                    <i class="bi bi-star-fill"></i>
                    <i class="bi bi-star-fill"></i>
                    <i class="bi bi-star-fill"></i>
                    <i class="bi bi-star-fill"></i>
                  </div>
                  <div class="profile-info">
                    <img src="<?=base_url()?>/template/assets/img/illustrations/profiles/profile-1.png" alt="Profile Image">
                    <div>
                      <h3>Klien 3</h3>
                      <h4>No description.</h4>
                    </div>
                  </div>
                </div>
              </div>
            </div> -->
            <!-- End testimonial item -->

            <!-- <div class="swiper-slide">
              <div class="testimonial-card">
                <div class="testimonial-content">
                  <p>
                    <i class="bi bi-quote quote-icon"></i>
                    "Saya memakai jasa Magvis Studio buat bikin video promosi brand clothing. Mereka ngerti banget cara menyesuaikan visual dengan identitas brand kami. Proses kerjanya cepat dan sangat berkualitas!"
                  </p>
                </div>
                <div class="testimonial-profile">
                  <div class="rating">
                    <i class="bi bi-star-fill"></i>
                    <i class="bi bi-star-fill"></i>
                    <i class="bi bi-star-fill"></i>
                    <i class="bi bi-star-fill"></i>
                    <i class="bi bi-star-fill"></i>
                  </div>
                  <div class="profile-info">
                    <img src="<?=base_url()?>/template/assets/img/illustrations/profiles/profile-1.png" alt="Profile Image">
                    <div>
                      <h3>Klien 4</h3>
                      <h4>No description.</h4>
                    </div>
                  </div>
                </div>
              </div>
            </div> -->
            <!-- End testimonial item -->

            <!-- <div class="swiper-slide">
              <div class="testimonial-card">
                <div class="testimonial-content">
                  <p>
                    <i class="bi bi-quote quote-icon"></i>
                    "Wedding kami menjadi lebih berkesan karena video dari Magvis Studio. Setiap momen terasa megah saat ditonton ulang. Terima kasih sudah bikin dokumentasi pernikahan kami menjadi seindah itu."
                  </p>
                </div>
                <div class="testimonial-profile">
                  <div class="rating">
                    <i class="bi bi-star-fill"></i>
                    <i class="bi bi-star-fill"></i>
                    <i class="bi bi-star-fill"></i>
                    <i class="bi bi-star-fill"></i>
                    <i class="bi bi-star-fill"></i>
                  </div>
                  <div class="profile-info">
                    <img src="<?=base_url()?>/template/assets/img/illustrations/profiles/profile-1.png" alt="Profile Image">
                    <div>
                      <h3>Klien 5</h3>
                      <h4>No description.</h4>
                    </div>
                  </div>
                </div>
              </div>
            </div> -->
            <!-- End testimonial item -->

            <!-- <div class="swiper-slide">
              <div class="testimonial-card">
                <div class="testimonial-content">
                  <p>
                    <i class="bi bi-quote quote-icon"></i>
                    "Saya kerja bareng Magvis Studio untuk proyek dokumenter sosial. Mereka sangat detail dalam riset dan storytelling, jadi pesannya tersampaikan dengan baik. Bukan cuma videografer, mereka juga partner yang high thinking."
                  </p>
                </div>
                <div class="testimonial-profile">
                  <div class="rating">
                    <i class="bi bi-star-fill"></i>
                    <i class="bi bi-star-fill"></i>
                    <i class="bi bi-star-fill"></i>
                    <i class="bi bi-star-fill"></i>
                    <i class="bi bi-star-fill"></i>
                  </div>
                  <div class="profile-info">
                    <img src="<?=base_url()?>/template/assets/img/illustrations/profiles/profile-1.png" alt="Profile Image">
                    <div>
                      <h3>Klien 6</h3>
                      <h4>No description.</h4>
                    </div>
                  </div>
                </div>
              </div>
            </div> -->
            <!-- End testimonial item -->

            <!-- <div class="swiper-slide">
              <div class="testimonial-card">
                <div class="testimonial-content">
                  <p>
                    <i class="bi bi-quote quote-icon"></i>
                    
                  </p>
                </div>
                <div class="testimonial-profile">
                  <div class="rating">
                    <i class="bi bi-star-fill"></i>
                    <i class="bi bi-star-fill"></i>
                    <i class="bi bi-star-fill"></i>
                    <i class="bi bi-star-fill"></i>
                    <i class="bi bi-star-fill"></i>
                  </div>
                  <div class="profile-info">
                    <img src="<?=base_url()?>/template/assets/img/illustrations/profiles/profile-1.png" alt="Profile Image">
                    <div>
                      <h3>Klien 7</h3>
                      <h4>No description.</h4>
                    </div>
                  </div>
                </div>
              </div>
            </div> -->
            <!-- End testimonial item -->
          </div>
          <div class="swiper-pagination"></div>
        </div>
      </div>
    </section><!-- /Testimonials Section -->

    <!-- Contact Section -->
    <section id="contact" class="contact section">

      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <h2><?= lang('App.talk_title') ?></h2>
        <p><?= lang('App.talk_subtitle') ?></p>
      </div><!-- End Section Title -->

      <div class="container" data-aos="fade-up" data-aos-delay="100">

        <div class="row gy-4 mb-5">

          <div class="col-lg-4" data-aos="fade-up" data-aos-delay="100">
            <div class="info-card">
              <div class="icon-box"><i class="bi bi-geo-alt"></i></div>
              <h3><?= lang('App.talk_address') ?></h3>
              <p><?= nl2br($setting->address) ?></p>
            </div>
          </div>

          <div class="col-lg-4" data-aos="fade-up" data-aos-delay="200">
            <div class="info-card">
              <div class="icon-box"><i class="bi bi-telephone"></i></div>
              <h3><?= lang('App.talk_phone') ?></h3>
              <p>
                <?= $setting->contact_phone ?><br>
              </p>
            </div>
          </div>

          <div class="col-lg-4" data-aos="fade-up" data-aos-delay="300">
            <div class="info-card">
              <div class="icon-box"><i class="bi bi-mailbox"></i></div>
              <h3><?= lang('App.talk_email') ?></h3>
              <p>
                <?= $setting->contact_email ?>
              </p>
            </div>
          </div>

        </div>

        <!-- <div class="row">
          <div class="col-lg-12">
            <div class="form-wrapper" data-aos="fade-up" data-aos-delay="400">
              <form action="<?= base_url('contact/send') ?>" method="post" role="form" class="php-email-form">
                <div class="row">
                  <div class="col-md-6 form-group">
                    <div class="input-group">
                      <span class="input-group-text"><i class="bi bi-person"></i></span>
                      <input type="text" name="name" class="form-control" placeholder="Nama" required="">
                    </div>
                  </div>
                  <div class="col-md-6 form-group">
                    <div class="input-group">
                      <span class="input-group-text"><i class="bi bi-envelope"></i></span>
                      <input type="email" class="form-control" name="email" placeholder="Email" required="">
                    </div>
                  </div>
                </div>
                <div class="row mt-3">
                  <div class="col-md-6 form-group">
                    <div class="input-group">
                      <span class="input-group-text"><i class="bi bi-phone"></i></span>
                      <input type="text" class="form-control" name="phone" placeholder="No. Telp" required="">
                    </div>
                  </div>
                  <div class="col-md-6 form-group">
                    <div class="input-group">
                      <span class="input-group-text"><i class="bi bi-list"></i></span>
                      <select name="service_id" class="form-control" required="">
                        <?php foreach ($services as $s): ?>
                          <option value="<?= $s->id ?>"><?= $s->title ?></option>
                        <?php endforeach ?>
                      </select>
                    </div>
                  </div>
                  <div class="form-group mt-3">
                    <div class="input-group">
                      <span class="input-group-text"><i class="bi bi-chat-dots"></i></span>
                      <textarea class="form-control" name="message" rows="6" placeholder="Tulis Pesan Disini.." required=""></textarea>
                    </div>
                  </div>
                  <div class="my-3">
                    <div class="loading">Loading</div>
                    <div class="error-message"></div>
                    <div class="sent-message">Pesan Anda telah terkirim. Terima kasih!</div>
                  </div>
                  <div class="text-center">
                    <button type="submit">Kirim Pesan</button>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div> -->
      </div>
    </section><!-- /Contact Section -->

  </main>

  <footer id="footer" class="footer light-background">

    <div class="container footer-top">
      <div class="row gy-4">
        <div class="col-lg-4 col-md-6 footer-about me-auto">
          <a href="index.html" class="logo d-flex align-items-center">
            <span class="sitename"><?= $setting->site_name ?></span>
          </a>
          <div class="footer-contact pt-3">
            <p><?= nl2br($setting->address) ?></p>
            <p class="mt-3"><strong>Phone:</strong> <span><?= $setting->contact_phone ?></span></p>
            <p><strong>Email:</strong> <span><?= $setting->contact_email ?></span></p>
          </div>
          <div class="social-links d-flex mt-4">
            <a href="<?= $setting->social_instagram ?>"><i class="bi bi-instagram"></i></a>
            <a href="<?= $setting->social_youtube ?>"><i class="bi bi-youtube"></i></a>
          </div>
        </div>

        <div class="col-lg-2 col-md-3 footer-links">
          <h4><?= lang('App.footer_title1') ?></h4>
          <ul>
            <li><a href="#hero"><?= lang('App.footer_home') ?></a></li>
            <li><a href="#about"><?= lang('App.footer_about') ?></a></li>
            <li><a href="#services"><?= lang('App.footer_services') ?></a></li>
            <li><a href="#faq"><?= lang('App.footer_faq') ?> </a></li>
            <li><a href="#testimonials"><?= lang('App.footer_testimonial') ?></a></li>

            <li><a href="#contact"><?= lang('App.footer_contact') ?></a></li>

          </ul>
        </div>

        <div class="col-lg-2 col-md-3 footer-links">
          <h4><?= lang('App.footer_contact') ?></h4>
          <ul>
            <?php foreach ($categories as $cat): ?>
              <li><a href="#services"><?= esc($cat->name) ?></a></li>
            <?php endforeach; ?>
          </ul>
        </div>

        <!-- <div class="col-lg-2 col-md-3 footer-links">
          <h4>Informasi</h4>
          <ul>
            
          </ul>
        </div> -->
      </div>
    </div>

    <div class="container copyright text-center mt-4">
      <p>© <span>Copyright</span> <strong class="px-1 sitename"><?= $setting->site_name ?> | </strong> <span>All Rights Reserved.</span></p>
      <div class="credits">
      </div>
    </div>
  </footer>

  <!-- Scroll Top -->
  <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Preloader -->
  <div id="preloader"></div>

  <!-- Vendor JS Files -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>
  <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
  <script src="https://cdn.jsdelivr.net/gh/mcstudios/glightbox/dist/js/glightbox.min.js"></script>
  <script src="https://unpkg.com/imagesloaded@5/imagesloaded.pkgd.min.js"></script>
  <script src="https://unpkg.com/isotope-layout@3/dist/isotope.pkgd.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

  <!-- Main JS File -->
  <script src="assets/landing-page/js/main.js"></script>

</body>

</html>
