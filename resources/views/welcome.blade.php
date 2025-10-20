<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>Klinik Dr. Rusdi Sulan</title>
  <meta name="description" content="">
  <meta name="keywords" content="">

  <!-- Favicons -->
  <link href="{{ asset('template/landing-page/img/favicon.png') }}" rel="icon">
  <link href="{{ asset('template/landing-page/img/apple-touch-icon.png') }}" rel="apple-touch-icon">

  <!-- Fonts -->
  <link href="https://fonts.googleapis.com" rel="preconnect">
  <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Raleway:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{ asset('template/landing-page/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
  <link href="{{ asset('template/landing-page/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
  <link href="{{ asset('template/landing-page/vendor/aos/aos.css') }}" rel="stylesheet">
  <link href="{{ asset('template/landing-page/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet">
  <link href="{{ asset('template/landing-page/vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
  <link href="{{ asset('template/landing-page/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">

  <!-- Main CSS File -->
  <link href="{{ asset('template/landing-page/css/main.css') }}" rel="stylesheet">
</head>

<body class="index-page">

  <header id="header" class="header sticky-top">

    <div class="branding d-flex align-items-center">

      <div class="container position-relative d-flex align-items-center justify-content-between">
        <a href="index.html" class="logo d-flex align-items-center me-auto">
          <h1 class="sitename">Klinik Dr. Rusdi Sulan</h1>
        </a>

        <nav id="navmenu" class="navmenu">
          <ul>
            <li><a href="#tentang-kami">Tentang Kami</a></li>
            <li><a href="#pelayanan">Pelayanan</a></li>
            <li><a href="#jadwal-dokter">Jadwal Dokter</a></li>
            <li><a href="#kontak">Kontak</a></li>
          </ul>
          <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
        </nav>

        @if (Route::has('login'))
            @auth
              <a class="cta-btn d-none d-sm-block" href="{{ route('beranda') }}">Beranda</a>
            @else
            <a class="cta-btn d-none d-sm-block" href="{{ route('register') }}">Daftar</a>
            @endauth
        @endif

      </div>

    </div>

  </header>

  <main class="main">

    <!-- About Section -->
    <section id="tentang-kami" class="about section">

      <div class="container">

        <div class="row gy-4 gx-5">

          <div class="col-lg-6 position-relative align-self-start" data-aos="fade-up" data-aos-delay="200">
            <img src="{{ asset('template/landing-page/img/about.jpg') }}" class="img-fluid" alt="">
            <a href="https://www.youtube.com/watch?v=Y7f98aduVJ8" class="glightbox pulsating-play-btn"></a>
          </div>

          <div class="col-lg-6 content" data-aos="fade-up" data-aos-delay="100">
            <h3>Tentang Kami</h3>
            <p>
              Klinik Dr. Rusdi Sulan menawarkan pelayanan medis berupa konsultasi dengan  dokter spesialis, dokter umum, psikolog, bidan, ahli gizi, pemeriksaan laboratorium, layanan vaksinasi, khitanan, dan homevisit ke rumah. Kami juga rutin membuat konten edukasi di bidang kesehatan yang dapat diakses di kanal media sosial kami. Dengan dukungan tim medis yang terampil dan berpengalaman, kami siap memberikan perawatan kesehatan yang berkualitas untuk Anda.
            </p>
            <p>
              Kami berkomitmen untuk selalu berusaha memberikan pelayanan yang ramah dan profesional, sehingga Anda merasa nyaman dan tenang selama menjalani perawatan di Klinik Dr. Rusdi Sulan. Selain itu, kami juga terus berinovasi dan mengembangkan layanan kesehatan kami agar selalu dapat memenuhi kebutuhan kesehatan Anda. Harapan kami klinik ini dapat menjadi mitra yang dapat diandalkan dan menjadi solusi keluarga anda menuju sehat.
            </p>
          </div>

        </div>

      </div>

    </section><!-- /About Section -->

    <!-- Services Section -->
    <section id="pelayanan" class="services section">

      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <h2>Pelayanan</h2>
        <p>Klinik Dr. Rusdi Sulan menyediakan berbagai pelayanan yang membuat Anda merasa nyaman dan tenang</p>
      </div><!-- End Section Title -->

      <div class="container">

        <div class="row gy-4">

          <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
            <div class="service-item  position-relative">
              <div class="icon">
                <i class="fas fa-heartbeat"></i>
              </div>
              <a href="#" class="stretched-link">
                <h3>Pemeriksaan Umum</h3>
              </a>
              <p>Mendiagnosis keluhan pasien, memberikan pengobatan, atau rujukan ke spesialis.</p>
            </div>
          </div><!-- End Service Item -->

          <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="200">
            <div class="service-item position-relative">
              <div class="icon">
                <i class="fas fa-pills"></i>
              </div>
              <a href="#" class="stretched-link">
                <h3>Imunisasi Anak</h3>
              </a>
              <p>Memberikan imunisasi untuk mencegah penyakit seperti polio dan campak.</p>
            </div>
          </div><!-- End Service Item -->

          <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="300">
            <div class="service-item position-relative">
              <div class="icon">
                <i class="fas fa-hospital-user"></i>
              </div>
              <a href="#" class="stretched-link">
                <h3>Konsultasi Gizi</h3>
              </a>
              <p>Menyusun pola makan sehat sesuai kebutuhan kesehatan pasien.</p>
            </div>
          </div><!-- End Service Item -->

        </div>

      </div>

    </section><!-- /Services Section -->

    <!-- Departments Section -->
    <section id="jadwal-dokter" class="departments section">

      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <h2>Jadwal Dokter</h2>
        <p>Dibawah ini merupakan jadwal dokter yang tersedia</p>
      </div><!-- End Section Title -->

      <div class="container" data-aos="fade-up" data-aos-delay="100">

        <div class="row">
          <div class="col-lg-3">
            <ul class="nav nav-tabs flex-column">
              @foreach ($jadwals as $jadwal)
                  <li class="nav-item">
                      <a 
                          class="nav-link {{ $loop->first ? 'active show' : '' }}" 
                          data-bs-toggle="tab" 
                          href="#jadwal-tab-{{ $jadwal->id }}"
                      >
                        {{ $jadwal->dokter->nama_dokter }}
                      </a>
                  </li>
              @endforeach
            </ul>
          </div>
          <div class="col-lg-9 mt-4 mt-lg-0">
            <div class="tab-content">
              @foreach ($jadwals as $jadwal)
                  <div 
                      class="tab-pane {{ $loop->first ? 'active show' : '' }}" 
                      id="jadwal-tab-{{ $jadwal->id }}"
                  >
                    <div class="row">
                      <div class="col-lg-12 details order-2 order-lg-1">
                          <h3>{{ $jadwal->dokter->nama_dokter }}</h3>
                          <p class="fst-italic">
                              Jadwal Dokter {{ $jadwal->dokter->nama_dokter }} adalah 
                              dari jam {{ $jadwal->jadwal_mulai }} hingga {{ $jadwal->jadwal_berakhir }}.
                          </p>
                          <p>
                              Dokter ini memiliki spesialisasi dalam bidang {{ $jadwal->dokter->spesialis->nama_spesialis ?? 'Spesialisasi tidak tersedia' }} 
                              dan dapat dihubungi melalui nomor {{ $jadwal->dokter->nomor_telepon ?? 'Nomor telepon tidak tersedia' }}.
                          </p>
                      </div>
                    </div>
                  </div>
              @endforeach
            </div>
          </div>
        </div>

      </div>

    </section><!-- /Departments Section -->

    <!-- Contact Section -->
    <section id="kontak" class="contact section">

      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <h2>Kontak</h2>
        <p>Dibawah ini merupakan lokasi serta kontak yang bisa dihubungi</p>
      </div><!-- End Section Title -->

      <div class="mb-5" data-aos="fade-up" data-aos-delay="200">
        <iframe style="border:0; width: 100%; height: 270px;" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3963.6971935438214!2d107.77456237441466!3d-6.559855164125589!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e693b78ec0838c1%3A0xeeeb5d004e6334cc!2sKlinik%20Jantung%20Hasna%20Medika%20Subang!5e0!3m2!1sid!2sid!4v1733995724381!5m2!1sid!2sid" width="600" height="270" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
      </div><!-- End Google Maps -->

    </section><!-- /Contact Section -->

  </main>

  <footer id="footer" class="footer light-background">

    <div class="container footer-top">
      <div class="row gy-4 justify-content-between">
        <div class="col-lg-4 col-md-6 footer-about">
          <a href="index.html" class="logo d-flex align-items-center">
            <span class="sitename">Klinik Dr. Rusdi Sulan</span>
          </a>
          <div class="footer-contact pt-3">
            <p>Jl. Ottoiskandardinata, Kec. Kebayoran Baru, Kota Jakarta Barat, Daerah Khusus Ibukota Jakarta</p>
            <p class="mt-3"><strong>Telepon:</strong> <span>+62 5589 55488 55</span></p>
            <p><strong>Email:</strong> <span>info@mail.com</span></p>
          </div>
        </div>

        <div class="col-lg-2 col-md-3 footer-links">
          <h4>Halaman</h4>
          <ul>
            <li><a href="#">Tentang Kami</a></li>
            <li><a href="#">Pelayanan</a></li>
            <li><a href="#">Jadwal Dokter</a></li>
            <li><a href="#">Pendaftaran Antrian</a></li>
          </ul>
        </div>

        <div class="col-lg-2 col-md-3 footer-links">
          <h4>Sosial Media</h4>
          <ul>
            <li><a href="#">Instagram</a></li>
            <li><a href="#">Facebook</a></li>
            <li><a href="#">Tiktok</a></li>
            <li><a href="#">Youtube</a></li>
          </ul>
        </div>

      </div>
    </div>

    <div class="container copyright text-center mt-4">
      <p>© <span>Copyright</span> <strong class="px-1 sitename">Klinik Dr. Rusdi Sulan</strong> <span>All Rights Reserved</span></p>
    </div>

  </footer>

  <!-- Scroll Top -->
  <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Preloader -->
  <div id="preloader"></div>

  <!-- Vendor JS Files -->
  <script src="{{ asset('template/landing-page/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('template/landing-page/vendor/php-email-form/validate.js') }}"></script>
  <script src="{{ asset('template/landing-page/vendor/aos/aos.js') }}"></script>
  <script src="{{ asset('template/landing-page/vendor/glightbox/js/glightbox.min.js') }}"></script>
  <script src="{{ asset('template/landing-page/vendor/purecounter/purecounter_vanilla.js') }}"></script>
  <script src="{{ asset('template/landing-page/vendor/swiper/swiper-bundle.min.js') }}"></script>

  <!-- Main JS File -->
  <script src="{{ asset('template/landing-page/js/main.js') }}"></script>

</body>

</html>