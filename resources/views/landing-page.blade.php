<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>{{ config('app.name') }}</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="landing-page/assets/img/favicon.png" rel="icon">
  <link href="landing-page/assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Montserrat:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="landing-page/assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="landing-page/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="landing-page/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="landing-page/assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="landing-page/assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="landing-page/assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="landing-page/assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="landing-page/assets/css/style.css" rel="stylesheet">

  <script src="https://www.google.com/recaptcha/api.js" async defer></script>
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top d-flex align-items-center header-transparent">
    <div class="container d-flex align-items-center justify-content-between">

      <div class="logo">
        <h1><a href="/"><span>{{ config('app.name') }}</span></a></h1>
      </div>

      <nav id="navbar" class="navbar">
        <ul>
          <li><a class="nav-link scrollto active">Login with</a></li>
          <li><a href="{{ route('google.login') }}">Google</a></li>
          <li><a href="{{ route('facebook.login') }}">Facebook</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->

  <!-- ======= Hero Section ======= -->
  <section id="hero">

    <div class="container">
      <div class="row justify-content-between">
        <div class="col-lg-7 pt-5 pt-lg-0 order-2 order-lg-1 d-flex align-items-center">
          <div data-aos="zoom-out">
            <h1>Welcome to {{ config('app.agencyAbbr') }} <br> {{ config('app.sdo') }} <br> <span style="font-size: 27pt;">{{ config('app.name') }}</span></h1>
            <h2>{{ config('app.description') }}</h2>
          </div>
        </div>
        <div class="col-lg-4 order-1 order-lg-2 hero-img" data-aos="zoom-out" data-aos-delay="300">
          <img src="landing-page/assets/img/hero-img.png" class="img-fluid animated" alt="">
        </div>
      </div>
    </div>

    <svg class="hero-waves" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 24 150 28 " preserveAspectRatio="none">
      <defs>
        <path id="wave-path" d="M-160 44c30 0 58-18 88-18s 58 18 88 18 58-18 88-18 58 18 88 18 v44h-352z">
      </defs>
      <g class="wave1">
        <use xlink:href="#wave-path" x="50" y="3" fill="rgba(255,255,255, .1)">
      </g>
      <g class="wave2">
        <use xlink:href="#wave-path" x="50" y="0" fill="rgba(255,255,255, .2)">
      </g>
      <g class="wave3">
        <use xlink:href="#wave-path" x="50" y="9" fill="#fff">
      </g>
    </svg>

  </section><!-- End Hero -->

  <main id="main">

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer">
    <div class="container">
      <div class="copyright">
        &copy; Copyright <strong><span>{{ config('app.agencyFull') }} - {{ config('app.sdo') }} {{ config('app.name') }}</span></strong>. All Rights Reserved
      </div>
      <div class="credits">
        Developed by <a href="https://www.facebook.com/bobby.y.corpuz" target="_blank">Bobby Corpuz</a>
      </div>
    </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>
  <div id="preloader"></div>

  <!-- Vendor JS Files -->
  <script src="landing-page/assets/vendor/aos/aos.js"></script>
  <script src="landing-page/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="landing-page/assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="landing-page/assets/vendor/purecounter/purecounter.js"></script>
  <script src="landing-page/assets/vendor/swiper/swiper-bundle.min.js"></script>

  <!-- Template Main JS File -->
  <script src="landing-page/assets/js/main.js"></script>

  <script src="{{ asset('/js/libs/jquery-3.2.1.min.js') }}"></script>
  <script src="{{ asset('/js/libs/jquery-ui.min.js') }}"></script>
  <script src="{{ asset('/js/sweetalert2.all.min.js') }}"></script>
  
  <script src="landing-page/assets/js/send-message.js"></script>

</body>

</html>