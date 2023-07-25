<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Rating</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Jost:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: Arsha - v4.9.1
  * Template URL: https://bootstrapmade.com/arsha-free-bootstrap-html-template-corporate/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top header-inner-pages">
    <div class="container d-flex align-items-center">

      <h1 class="logo me-auto"><a href="/">Arsha</a></h1>
      <!-- Uncomment below if you prefer to use an image logo -->
      <!-- <a href="index.html" class="logo me-auto"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->

      <nav id="navbar" class="navbar">
        <ul>
          <!-- <li><a class="nav-link scrollto " href="#hero">Home</a></li> -->
          <!-- <li><a class="nav-link scrollto" href="#about">About</a></li>
          <li><a class="nav-link scrollto" href="#services">Services</a></li>
          <li><a class="nav-link   scrollto" href="#portfolio">Portfolio</a></li>
          <li><a class="nav-link scrollto" href="#team">Team</a></li>
          <li class="dropdown"><a href="#"><span>Drop Down</span> <i class="bi bi-chevron-down"></i></a>
            <ul>
              <li><a href="#">Drop Down 1</a></li>
              <li class="dropdown"><a href="#"><span>Deep Drop Down</span> <i class="bi bi-chevron-right"></i></a>
                <ul>
                  <li><a href="#">Deep Drop Down 1</a></li>
                  <li><a href="#">Deep Drop Down 2</a></li>
                  <li><a href="#">Deep Drop Down 3</a></li>
                  <li><a href="#">Deep Drop Down 4</a></li>
                  <li><a href="#">Deep Drop Down 5</a></li>
                </ul>
              </li>
              <li><a href="#">Drop Down 2</a></li>
              <li><a href="#">Drop Down 3</a></li>
              <li><a href="#">Drop Down 4</a></li>
            </ul>
          </li>
          <li><a class="nav-link scrollto" href="#contact">Contact</a></li>
          <li><a class="getstarted scrollto" href="#about">Get Started</a></li> -->
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->

  <main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <section id="breadcrumbs" class="breadcrumbs">
      <div class="container">

        <ol>
          <li><a href="/">Home</a></li>
          <li>Rating</li>
   
        </ol>
        <h2>Reting Wahana</h2>

      </div>
    </section><!-- End Breadcrumbs -->

      <!-- ======= Pricing Section ======= -->
      <section id="pricing" class="pricing">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
        <h2>Wahana D'Mangku Farm</h2>
      <p>Kegembiraan menyatu dalam satu pengalaman yang menggetarkan dan menguji adrenalin</p>
        </div>

        <div class="row">
    @foreach ($wahana as $wahanas)
        <div class="col-lg-4 mt-4 mt-lg-4" data-aos="fade-up" data-aos-delay="200">
            <div class="box featured">
                <div class="icon">
                    <img class="img-fluid" src="data:image/jpg;base64,{{ $wahanas->foto_wahana }}" alt="Fasilitas Picture">
                </div>
                <br>
                <form class="rating-form" action="{{route('rating.store') }}" data-fasilitas-id="{{ $wahanas->id }}" method="post">
                    @csrf
                    <div class="rate">
                        <input type="radio" name="rating" value="5" id="5_{{ $wahanas->id }}" /><label for="5_{{ $wahanas->id }}" title="5 stars"></label>
                        <input type="radio" name="rating" value="4" id="4_{{ $wahanas->id }}" /><label for="4_{{ $wahanas->id }}" title="4 stars"></label>
                        <input type="radio" name="rating" value="3" id="3_{{ $wahanas->id }}" /><label for="3_{{ $wahanas->id }}" title="3 stars"></label>
                        <input type="radio" name="rating" value="2" id="2_{{ $wahanas->id }}" /><label for="2_{{ $wahanas->id }}" title="2 stars"></label>
                        <input type="radio" name="rating" value="1" id="1_{{ $wahanas->id }}" /><label for="1_{{ $wahanas->id }}" title="1 star"></label>
                    </div>
                    <input type="hidden" name="wahana_id" value="{{ $wahanas->id }}">
                    <br>
                    <br>
                    <h3>{{ $wahanas->nama_wahana }}</h3>
                    <p>{{ $wahanas->deskripsi }}</p>

                    <!-- Form Rating -->
                    <div class="form-group text-center">
                        <button type="submit" style="background: #E19C1C; border: 0; padding: 12px 34px; color: #fff; transition: 0.4s; border-radius: 50px;">Submit Rating</button>
                    </div>
                </form>
            </div>
        </div>
    @endforeach
</div>


      </div>
    </section><!-- End Pricing Section -->
  </main><!-- End #main -->


  <!-- ======= Footer ======= -->
  <footer id="footer">
    <div class="footer-top">
      <div class="container">
        <div class="row">

        <div class="col-lg-3 col-md-6 footer-contact order-md-last">
    <h3>Arsha</h3>
    <p>
      Jl. Raya Mancak, Angsana, kec. Mancak, Kabupaten Serang, Banten 42165 <br><br>
      <strong>Tlpn/Whatsapp:</strong> +62 877 9898 8889<br>
      <strong>Email:</strong> kontak@dmangkufarm.com<br>
    </p>
    <div class="social-links mt-3">
      <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
      <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
      <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
      <a href="#" class="google-plus"><i class="bx bxl-skype"></i></a>
      <a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a>
    </div>
    </div>

            </div>
          </div>
        </div>

        <div class="container footer-bottom clearfix">
          <div class="copyright">
            &copy; Copyright <strong><span>Arsha</span></strong>. All Rights Reserved
          </div>
          
        </div>
  </footer><!-- End Footer -->
  <div id="preloader"></div>
  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets/vendor/waypoints/noframework.waypoints.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>
<style>
  .rate {
    float: left;
    height: 46px;
    padding: 0 10px;
  }

  .rate:not(:checked) > input {
    display: none;
  }

  .rate:not(:checked) > label {
    float: right;
    width: 1em;
    overflow: hidden;
    white-space: nowrap;
    cursor: pointer;
    font-size: 30px;
    color: #ccc;
  }

  /* Tambahkan pseudo-element :before pada label untuk menampilkan bintang kosong ★ */
  .rate:not(:checked) > label:before {
    content: '★ ';
  }

  .rate > input:checked ~ label {
    color: #ffc700;
  }

  .rate:not(:checked) > label:hover,
  .rate:not(:checked) > label:hover ~ label {
    color: #deb217;
  }

  .rate > input:checked + label:hover,
  .rate > input:checked + label:hover ~ label,
  .rate > input:checked ~ label:hover,
  .rate > input:checked ~ label:hover ~ label,
  .rate > label:hover ~ input:checked ~ label {
    color: #c59b08;
  }

/* Modified from: https://github.com/mukulkant/Star-rating-using-pure-css */
</style>

</body>

</html>