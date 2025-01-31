<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Trust CRM - Index</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

{{-- Favicons  --}}
  <link href="{{ asset('plugins/arshatemplate/img/favicon.png') }}" rel="icon">
  <link href="{{ asset('plugins/arshatemplate/img/apple-touch-icon.png') }}" rel="apple-touch-icon">

  {{-- Google Fonts --}}
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Jost:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  {{-- Vendor CSS Files --}}
  <link href="{{ asset('plugins/aos/aos.css') }}" rel="stylesheet">
  <link href="{{ asset('plugins/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
  <link href="{{ asset('plugins/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
  <link href="{{ asset('plugins/boxicons/css/boxicons.min.css') }}" rel="stylesheet">
  <link href="{{ asset('plugins/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
  <link href="{{ asset('plugins/remixicon/remixicon.css') }}" rel="stylesheet">
  <link href="{{ asset('plugins/swiper/swiper-bundle.css') }}" rel="stylesheet">
  {{-- Template Main CSS File  --}}
  <link href="{{ asset('plugins/arshatemplate/css/style.css') }}" rel="stylesheet">
</head>

<body>
  {{-- HEADER --}}
  <header id="header" class="fixed-top ">
    <div class="container d-flex align-items-center">
      <h1 class="logo me-auto"><a href="{{ url('/') }}">TRUST CRM</a></h1>
      <!-- Uncomment below if you prefer to use an image logo -->
      <!-- <a href="index.html" class="logo me-auto"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->
      <nav id="navbar" class="navbar">
        <ul>
          <li><a class="nav-link scrollto active" href="#hero">Home</a></li>
          <li><a class="nav-link scrollto" href="#about">About</a></li>
          <li><a class="nav-link scrollto" href="#services">Services</a></li>
          <li><a class="getstarted scrollto" href="{{ url('login') }}">Sign In</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav>
    </div>
  </header>

  <section id="hero" class="d-flex align-items-center">
    <div class="container">
      <div class="row">
        <div class="col-lg-6 d-flex flex-column justify-content-center pt-4 pt-lg-0 order-2 order-lg-1" data-aos="fade-up" data-aos-delay="200">
          <h1>Membangun Hubungan yang Kuat dengan Pelanggan Anda</h1>
          <div class="d-flex justify-content-center justify-content-lg-start">
            <a href="{{ url('login') }}" class="btn-get-started scrollto">Sign In</a>
          </div>
        </div>
        <div class="col-lg-6 order-1 order-lg-2 hero-img" data-aos="zoom-in" data-aos-delay="200">
          <img src="{{ asset('plugins/arshatemplate/img/hero-img.png') }}" class="img-fluid animated" alt="">
        </div>
      </div>
    </div>
  </section>

  <main id="main">
    <section id="about" class="about">
      <div class="container" data-aos="fade-up">
        <div class="section-title">
          <h2>About Us</h2>
        </div>
        <div class="row content">
          <div class="col-lg-12 mb-4">
            <p style="text-align: center;">
            Trust Unified System was founded 15 years ago by industry experts who saw a need in providing high level consulting on Security and Infrastructure to companies and organization. 
            Today we are one of the leading Consulting Companies in Indonesia
            </p>
          </div>
          <div class="col-lg-6">
            <h5>Our Mission</h5> 
            <ul>
              <li><i class="ri-check-double-line"></i> Become the Best Cloud & Security Consulting Firm </li>
              <li><i class="ri-check-double-line"></i> Committed to go above and beyond for our Customers </li>
              <li><i class="ri-check-double-line"></i> Company that employees are proud to be part of role Model and Inspiration for others </li>
            </ul>
          </div>
          <div class="col-lg-6">
            <h5>Our Mission</h5>
            <ul>
              <li><i class="ri-check-double-line"></i> Match the best quality products to our customers and help them run their business more effectively </li>
              <li><i class="ri-check-double-line"></i> Provide the highest Quality of Service and Accountability</li>
              <li><i class="ri-check-double-line"></i> Drive Innovations to Solve Real Problems</li>
              <li><i class="ri-check-double-line"></i> Build Team Excellence, Integrity, Accountability and Passion to serve customers and colleagues</li>
              <li><i class="ri-check-double-line"></i> Committed to highest standard of Integrity, Ethics and Compliance</li>
              <li><i class="ri-check-double-line"></i> Drive Team Excellence through learning and creativity</li>
            </ul>
          </div>
        </div>
      </div>
    </section>
    <section id="services" class="services section-bg">
      <div class="container" data-aos="fade-up">
        <div class="section-title">
          <h2>Features</h2>
          <p>Customer Relationship Management (CRM) adalah sebuah aplikasi yang dirancang untuk membantu perusahaan mengelola hubungan dengan pelanggan mereka. 
            Aplikasi ini menyediakan platform untuk mengatur dan menganalisis interaksi pelanggan dengan perusahaan, termasuk informasi tentang prospek dan pelanggan yang sudah ada, rencana pemasaran dan aktivitas penjualan, dan laporan prestasi</p>
        </div>
        <div class="row">
          <div class="col-xl-3 col-md-6 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="100">
            <div class="icon-box">
              <div class="icon"><i class="bx bxl-dribbble"></i></div>
              <h4><a href="">Database Pelanggan</a></h4>
              <p>Menyimpan dan mengelola informasi pelanggan seperti alamat email, nomor telepon, dan historis interaksi</p>
            </div>
          </div>
          <div class="col-xl-3 col-md-6 d-flex align-items-stretch mt-4 mt-md-0" data-aos="zoom-in" data-aos-delay="200">
            <div class="icon-box">
              <div class="icon"><i class="bx bx-file"></i></div>
              <h4><a href="">Automasi Pemasaran</a></h4>
              <p>Membantu perusahaan menargetkan prospek dan pelanggan dengan rencana pemasaran yang terkoordinasi dan terotomatisasi.</p>
            </div>
          </div>
          <div class="col-xl-3 col-md-6 d-flex align-items-stretch mt-4 mt-xl-0" data-aos="zoom-in" data-aos-delay="300">
            <div class="icon-box">
              <div class="icon"><i class="bx bx-tachometer"></i></div>
              <h4><a href="">Pelacakan Penjualan</a></h4>
              <p>Memantau dan mengelola proses penjualan dari prospek hingga pelanggan yang terkonfirmasi, termasuk pelacakan tawaran dan demonstrasi produk.</p>
            </div>
          </div>
          <div class="col-xl-3 col-md-6 d-flex align-items-stretch mt-4 mt-xl-0" data-aos="zoom-in" data-aos-delay="400">
            <div class="icon-box">
              <div class="icon"><i class="bx bx-layer"></i></div>
              <h4><a href="">Analisis Pelanggan</a></h4>
              <p>Membantu perusahaan menganalisis data pelanggan untuk memahami kebutuhan dan preferensi mereka, serta mengevaluasi efektivitas strategi pemasaran dan penjualan.</p>
            </div>
          </div>
        </div>
      </div>
    </section>
    <section id="cta" class="cta">
      <div class="container" data-aos="zoom-in">
        <div class="row">
          <div class="col-lg-9 text-center text-lg-start">
            <h3>Call To Action</h3>
            <p> Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
          </div>
          <div class="col-lg-3 cta-btn-container text-center">
            <a class="cta-btn align-middle" href="#">Call To Action</a>
          </div>
        </div>
      </div>
    </section>
  </main>
  <footer id="footer">
    <div class="footer-top">
      <div class="container">
        <div class="row">
          <div class="col-lg-3 col-md-6 footer-contact">
            <h3>Arsha</h3>
            <p>
            </p>
          </div>
          <div class="col-lg-3 col-md-6 footer-links">
            <h4>Useful Links</h4>
            <ul>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Home</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">About us</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Services</a></li>
            </ul>
          </div>
          <div class="col-lg-3 col-md-6 footer-links">
            <h4>Our Services</h4>
            <ul>
            </ul>
          </div>
          <div class="col-lg-3 col-md-6 footer-links">
            <h4>Our Social Networks</h4>
            <div class="social-links mt-3">
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="container footer-bottom clearfix">
      <div class="copyright">
        <!-- &copy; Copyright <strong><span>Arsha</span></strong>. All Rights Reserved -->
      </div>
      <div class="credits">
        <!-- Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a> -->
      </div>
    </div>
  </footer>
  <div id="preloader"></div>
  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>
  <script src="{{ asset('plugins/aos/aos.js') }}"></script>
  <script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('plugins/glightbox/js/glightbox.min.js') }}"></script>
  <script src="{{ asset('plugins/isotope-layout/isotope.pkgd.min.js') }}"></script>
  <script src="{{ asset('plugins/waypoints/noframework.waypoints.js') }}"></script>
  <script src="{{ asset('plugins/swiper/swiper-bundle.js') }}"></script>
  {{-- <script src="assets/vendor/php-email-form/validate.js"></script> --}}

  <script src="{{ asset('plugins/arshatemplate/js/main.js') }}"></script>
</body>

</html>