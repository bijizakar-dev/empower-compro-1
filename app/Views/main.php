
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title><?= $setting->site_name ?></title>
  <meta name="description" content="">
  <meta name="keywords" content="">

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
        <img src="assets/landing-page/img/<?= $setting->logo; ?>" alt="">
      </a>

      <nav id="navmenu" class="navmenu">
        <ul>
          <li><a href="#hero" class="active">Beranda</a></li>
          <li><a href="#about">Tentang Kami</a></li>
          <li><a href="#services">Layanan</a></li>
          <li><a href="#portfolio">Projects</a></li>
          <li><a href="#team">Tim</a></li>
          <li><a href="#contact">Kontak</a></li>
        </ul>
        <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
      </nav>

      <a class="btn-getstarted" href="https://wa.me/6285190447515?text=Halo%20kak,%20saya%20ingin%20tanya-tanya%20tentang%20jasa%20videonya" target="_blank">Hubungi Kami</a>

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
            <img src="assets/landing-page/img/png-22.png" class="img-fluid rounded" alt="">
          </h1>

          <div class="cta-wrapper">
            <a href="#about " class="btn btn-primary">Read More</a>
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
            <p class="who-we-are mb-auto">Tentang Kami</p>
            <div class="block-desc">
              <h3>We Are Magvis. The Visionaries Behind Your Story.</h3>
              <p class="fst-italic">
                Kami fokus pada Digitalisasi, Visual Inovatif, 
                Teknologi Imersif, Modern Game dan Kualitas Kelas Dunia.
              </p>
            </div>
            <!-- <ul>
              <li><i class="bi bi-check-circle"></i> <span>Adventure.</span></li>
              <li><i class="bi bi-check-circle"></i> <span>Event.</span></li>
              <li><i class="bi bi-check-circle"></i> <span>Video Profile.</span></li>
              <li><i class="bi bi-check-circle"></i> <span>Dokumenter.</span>
            </ul> -->
            <!-- <a href="#services-alt" class="read-more"><span>Tampilkan Lebih Banyak</span><i class="bi bi-arrow-right"></i></a> -->
          </div>

          <div class="col-lg-6 about-images" data-aos="fade-up" data-aos-delay="200">
            <h3 class="mb-4 fs-3 fw-medium text-center text-body-secondary">
              <span class="fw-bold text-black">Magvis</span> adalah <span class="fw-bold text-black">Production House</span> yang berfokus menghidupkan ide-ide tak terbatas melalui teknologi dan seni visual. 
              Kami menggabungkan keahlian dalam 
              <span class="fw-bold text-black"">Animasi, Video Produksi, Desain, Game, dan Digital Reality (AR/VR)</span> untuk menciptakan pengalaman yang unik dan mengesankan.
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
        <h2>Bagaimana Kami Bekerja?</h2>
        <p>Kami mengubah ide menjadi realitas melalui proses yang terstruktur dan kreatif.</p>
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
                    <h3>Diskusi dengan Klien</h3>
                    <p>Kami memulai dengan sesi konsultasi mendalam untuk menggali visi, tujuan, target pasar, dan spesifikasi teknis proyek Anda. Pemahaman yang akurat di tahap ini adalah kunci keberhasilan kolaborasi kita.</p>
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
                    <h3>Pra-Produksi (Perencanaan)</h3>
                    <p>Tim kami menyusun kerangka teknis dan kreatif proyek, termasuk <span class="fst-italic">concept art, storyboard, script, wireframe</span>, penentuan <span class="fst-italic">asset</span>, jadwal kerja, dan alokasi tim. Setiap detail dipersiapkan matang sebelum eksekusi.</p>
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
                    <h3>Produksi (Eksekusi Inti)</h3>
                    <p>Ini adalah tahap eksekusi kreatif. Tim kami terjun langsung, baik itu proses <span class="fst-italic">shooting</span> video, pemodelan 3D, <span class="fst-italic">coding</span> untuk AR/VR, atau desain UI/UX. Kami menjamin kualitas teknis tertinggi sesuai rencana</p>
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
                    <h3>Pasca-Produksi (Penyempurnaan)</h3>
                    <p>Hasil mentah diolah menjadi karya jadi. Tahap ini mencakup <span class="fst-italic">editing</span> video, <span class="fst-italic">color grading</span>, VFX, <span class="fst-italic">rendering</span> animasi, <span class="fst-italic">debugging</span> game, atau penyesuaian desain akhir, memastikan output visual dan fungsional yang sempurna.</p>
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
                    <h3>Finish (Serah Terima Akhir)</h3>
                    <p>Setelah melalui tahap peninjauan dan revisi akhir oleh klien, produk diserahterimakan dalam format siap pakai dan didistribusikan. Proyek Anda kini siap diluncurkan dan memberikan dampak maksimal.</p>
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
        <h2>Services</h2>
        <p>Layanan Inti untuk Ide Tanpa Batas.</p>
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
              <h6 class="subtitle">Layanan Inovatif Kami</h6>
              <h2 class="title">Wujudkan Imajinasi Menjadi Visual yang Hidup.</h2>
              <p class="description">
                Magvis Studio hadir sebagai mitra kreatif yang membantu kamu menceritakan ide, brand, maupun momen penting melalui visual yang kuat, modern, dan bermakna. Mulai dari animasi 3D, produksi video sinematik, identitas visual, hingga pengalaman imersif berbasis teknologi, kami mengerjakan semuanya dengan pendekatan yang detail dan penuh rasa.<br>
                <br>
                Kami percaya setiap proyek memiliki cerita dan tujuan yang berbeda. Karena itu, proses kami selalu dimulai dari memahami kebutuhanmu—apa pesan yang ingin disampaikan, gaya visual yang diinginkan, dan pengalaman seperti apa yang ingin dihadirkan kepada audiens. Dengan kolaborasi yang menyenangkan dan tim yang berpengalaman, kami memastikan setiap hasil akhirnya bukan hanya indah, tetapi juga efektif menyampaikan nilai dan karakter yang kamu bawa.
                <br>
                Apapun idenya, kami siap membantu kamu menghadirkannya ke dunia visual yang lebih hidup, lebih kuat, dan lebih berkesan.
              </p>
              <div class="button-wrapper">
                <a class="btn" href="#services"><span>Telusuri Semua Layanan</span></a>
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
                  <h4><a href="">Menciptakan Dunia Bergerak</a></h4>
                  <p>Animasi 3D, Animasi 2D, Motion Graphics, Frame by Frame.</p>
                </div>
              </div><!-- End Service Item -->

              <div class="service-item d-flex align-items-center" data-aos="fade-up" data-aos-delay="300">
                <div class="service-icon">
                  <i class="bi bi-film"></i>
                </div>
                <div class="service-content">
                  <h4><a href="">Kisah Anda, dalam Kualitas Sinema</a></h4>
                  <p>Advertisement, Company Profile, Broadcasting, Music Video, Movies, Event Documentation.</p>
                </div>
              </div><!-- End Service Item -->

              <div class="service-item d-flex align-items-center" data-aos="fade-up" data-aos-delay="400">
                <div class="service-icon">
                  <i class="bi bi-person-video3"></i>
                </div>
                <div class="service-content">
                  <h4><a href="">Identitas Visual yang Kuat</a></h4>
                  <p>Brand (Product, Logo, Social Media), UI/UX, Illustration.</p>
                </div>
              </div><!-- End Service Item -->

              <div class="service-item d-flex align-items-center" data-aos="fade-up" data-aos-delay="400">
                <div class="service-icon">
                  <i class="bi bi-badge-vr-fill"></i>
                </div>
                <div class="service-content">
                  <h4><a href="">Pengalaman Imersif Masa Depan</a></h4>
                  <p>Augmented Reality, Virtual Reality, Interactive Media, Games, 3D Mapping.</p>
                </div>
              </div><!-- End Service Item -->

              <div class="service-item d-flex align-items-center" data-aos="fade-up" data-aos-delay="400">
                <div class="service-icon">
                  <i class="bi bi-camera-reels"></i>
                </div>
                <div class="service-content">
                  <h4><a href="">Momen Abadi, Visual Tajam</a></h4>
                  <p>Product, Event Documentation, Company Profile, Fashion.</p>
                </div>
              </div><!-- End Service Item -->

              <div class="service-item d-flex align-items-center" data-aos="fade-up" data-aos-delay="400">
                <div class="service-icon">
                  <i class="bi bi-book-half"></i>
                </div>
                <div class="service-content">
                  <h4><a href="">Tumbuh Bersama Magvis</a></h4>
                  <p>Program Pelatihan Khusus dari Magvis untuk Mengasah Keahlian Kreatif Anda.</p>
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
        <h2>Our Works</h2>
        <p>Karya-Karya yang Kami Hidupkan.</p>
      </div><!-- End Section Title -->

      <div class="container" data-aos="fade-up" data-aos-delay="100">

        <div class="isotope-layout" data-default-filter="*" data-layout="masonry" data-sort="original-order">

          <!-- FILTER DINAMIS -->
          <div class="portfolio-filters-container" data-aos="fade-up" data-aos-delay="200">
            <ul class="portfolio-filters isotope-filters">
              

              <?php foreach ($categories as $cat): ?>
                <?php 
                  // ubah nama kategori jadi slug untuk class isotope
                  $slug = 'filter-' . strtolower(str_replace(' ', '', $cat->name));
                ?>
                <li data-filter=".<?= $slug ?>"><?= esc($cat->name) ?></li>
              <?php endforeach; ?>
              <li data-filter="*" class="filter-active">All Projects</li>
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
                <h3>Let's Talk.</h3>
                <p>Wujudkan Ide Anda Bersama Magvis.</p>

                <div class="contact-options">
                  <a href="mailto:<?= esc($setting->contact_email ?? '') ?>" class="contact-option">
                    <i class="bi bi-envelope"></i>
                    <span>Email Kami</span>
                  </a>

                  <!-- REGEX NOMOR HP -->
                  <a href="https://wa.me/<?= preg_replace('/[^0-9]+/', '', $setting->contact_phone ?? '') ?>?text=Halo%20kak,%20saya%20ingin%20tanya%20tentang%20layanannya"
                    class="contact-option" target="_blank">
                    <i class="bi bi-chat-dots"></i>
                    <span>Chat Langsung</span>
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
        <h2>The Magvis Minds.</h2>
        <p><b>Meet Our Creative Superstars.</b></p>
        <p class="mt-2"><i>"Kami adalah tim multidisiplin yang bersemangat, dipimpin oleh para ahli yang berkomitmen untuk mengubah imajinasi Anda menjadi kenyataan visual."</i></p>
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
        <h2>Testimoni</h2>
        <p>Feedback dari pelanggan terhormat.</p>
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
        <h2>Let's Talk</h2>
        <p>Wujudkan Ide Anda Bersama Magvis.</p>
      </div><!-- End Section Title -->

      <div class="container" data-aos="fade-up" data-aos-delay="100">

        <div class="row gy-4 mb-5">

          <div class="col-lg-4" data-aos="fade-up" data-aos-delay="100">
            <div class="info-card">
              <div class="icon-box"><i class="bi bi-geo-alt"></i></div>
              <h3>Alamat</h3>
              <p><?= nl2br($setting->address) ?></p>
            </div>
          </div>

          <div class="col-lg-4" data-aos="fade-up" data-aos-delay="200">
            <div class="info-card">
              <div class="icon-box"><i class="bi bi-telephone"></i></div>
              <h3>No. Kontak</h3>
              <p>
                <?= $setting->contact_phone ?><br>
              </p>
            </div>
          </div>

          <div class="col-lg-4" data-aos="fade-up" data-aos-delay="300">
            <div class="info-card">
              <div class="icon-box"><i class="bi bi-mailbox"></i></div>
              <h3>Email</h3>
              <p>
                <?= $setting->contact_email ?>
              </p>
            </div>
          </div>

        </div>

        <div class="row">
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
        </div>
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
          <h4>Halaman Web</h4>
          <ul>
            <li><a href="#hero">Beranda</a></li>
            <li><a href="#about">Tentang Kami</a></li>
            <li><a href="#services">Layanan</a></li>
            <li><a href="#faq">Pertanyaan Umum</a></li>
            <li><a href="#testimonials">Testimoni Klien</a></li>

            <li><a href="#contact">Hubungi Kami</a></li>

          </ul>
        </div>

        <div class="col-lg-2 col-md-3 footer-links">
          <h4>Layanan Kami</h4>
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
