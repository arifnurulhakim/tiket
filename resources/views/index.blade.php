<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>d'mangku farm</title>
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
  <header id="header" class="fixed-top ">
    <div class="container d-flex align-items-center">

      <h1 class="logo me-auto"><a href="/">Arsha</a></h1>
      <!-- Uncomment below if you prefer to use an image logo -->
      <!-- <a href="index.html" class="logo me-auto"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->

      <nav id="navbar" class="navbar">
        <ul>
          <li><a class="nav-link scrollto active" href="#hero">Beranda</a></li>
          <li><a class="nav-link scrollto" href="#about">Tentang Kami</a></li>
          <li><a class="nav-link scrollto" href="#services">Fasilitas</a></li>
          <li><a class="nav-link   scrollto" href="#portfolio">Galeri</a></li>
          <li><a class="nav-link scrollto" href="#team">Wahana</a></li>
          <li><a class="nav-link scrollto" href="#pricing">Kamar</a></li>
          <li><a class="nav-link scrollto"href="{{route('rating.index')}}">Rating</a></li>
          <li><a class="nav-link scrollto"href="{{route('pemesanan.form')}}">Pesan tiket</a></li>
          <li><a class="getstarted scrollto" href="{{route('login')}}">Login</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->

  <!-- ======= Hero Section ======= -->
  <section id="hero" class="d-flex align-items-center">

    <div class="container">
      <div class="row">
        <div class="col-lg-6 d-flex flex-column justify-content-center pt-4 pt-lg-0 order-2 order-lg-1" data-aos="fade-up" data-aos-delay="200">
          <h1>WELCOME TO DMANGKUFARM</h1>
          <h2>BEST WAY TO FIND YOUR DREAM PLACE</h2>
          <div class="d-flex justify-content-center justify-content-lg-start">
            <a href="{{route('pemesanan.form')}}" class="btn-get-started scrollto">Pesan Tiket</a>
            <a href="https://www.youtube.com/watch?v=ONtr35PFbws" class="glightbox btn-watch-video"><i class="bi bi-play-circle"></i><span>Nonton Review</span></a>
          </div>
        </div>
 
      </div>
    </div>

  </section><!-- End Hero -->

  <main id="main">

    <!-- ======= About Us Section ======= -->
    <section id="about" class="about">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Tentang Kami</h2>
        </div>

        <div class="row content">
          <center>
            <p>
              D‟mangku farm merupakan objek wisata baru yang terletak di kawasan kecamatan mancak – kabupaten serang. D’mangku farm berdiri dibawah naungan pt mangku putra farm luas tanah sekitar 4 hektar dan diresmikan pada tanggal 27 November 2022.
              D‟mangku farm, di dalamnya terdapat banyak sekali tempat-tempat yang bisa dikunjungi seperti wahana flying fox, spot selfie becak, spot selfie sepeda, high group, glamping, dan café & resto.
            </p>
          </center>
        </div>
    </section><!-- End About Us Section -->


    <!-- ======= Services Section ======= -->
    <section id="services" class="services section-bg">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Fasilitas D'Mangku Farm</h2>
          <p>Fasilitas wisata yang natural dan lengkap, menciptakan pengalaman yang tak terlupakan bagi para pengunjung dari segala usia.</p>
        </div>

        <div class="row">
          @foreach ($fasilitas as $fasilitass)
            <div class="col-xl-3 col-md-6 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="100">
              <div class="icon-box">
                <div class="icon">
                <img class="img-fluid" src="data:image/jpg;base64,{{ $fasilitass->foto_fasilitas }}" alt="Fasilitas Picture">
                </div>
                <h4><a href="">{{ $fasilitass->nama_fasilitas }}</a></h4>
                <p>{{ $fasilitass->deskripsi }}</p>
              </div>
            </div>
          @endforeach
        </div>
      </div>
    </section><!-- End Services Section -->
<!-- End Services Section -->

    <!-- ======= Portfolio Section ======= -->
    <section id="portfolio" class="portfolio">
  <div class="container" data-aos="fade-up">
    <div class="section-title">
      <h2>Galeri</h2>
      <p>Bergabunglah dengan kami dan jadilah bagian dari kisah petualangan tak terlupakan yang akan Anda ceritakan selamanya!</p>
    </div>
    <div class="row portfolio-container" data-aos="fade-up" data-aos-delay="200">
      @foreach ($galeri as $galeris)
        <div class="col-lg-4 col-md-6 portfolio-item filter-app">
          <div class="portfolio-img">
            <img class="img-fluid" src="data:image/jpg;base64,{{ $galeris->foto_galeri }}" alt="Galeri Picture">
          </div>
          <div class="portfolio-info">
            <h4>{{ $galeris->nama_foto }}</h4>
            <p>{{ $galeris->deskripsi }}</p>
            <a href="data:image/jpg;base64,{{ $galeris->foto_galeri }}" data-gallery="portfolioGallery" class="portfolio-lightbox preview-link">
              <i class="bx bx-plus"></i>
            </a>
          </div>
        </div>
      @endforeach
    </div>
  </div>
</section>
<!-- End Portfolio Section -->

    <!-- ======= Team Section ======= -->
    <section id="team" class="team section-bg">
  <div class="container" data-aos="fade-up">

    <div class="section-title">
      <h2>Wahana D'Mangku Farm</h2>
      <p>Kegembiraan menyatu dalam satu pengalaman yang menggetarkan dan menguji adrenalin</p>
    </div>

    <div class="row">
  @foreach ($wahana as $wahanas)
    <div class="col-lg-6 mt-4 mt-lg-0">
      <div class="member d-flex align-items-start mt-4" data-aos="zoom-in" data-aos-delay="200">
        <div class="pic">
          <img class="img-fluid" src="data:image/jpg;base64,{{ $wahanas->foto_wahana }}" />
        </div>
        <div class="member-info">
          <h4>{{ $wahanas->nama_wahana }}</h4>
          <div class="rating">
            @php
              $rating = $wahanas->avg_rating; // Use the alias 'avg_rating' for the average rating
              $stars = min(5, max(0, round($rating))); // Ensure the rating is between 0 and 5
            @endphp
            @for ($i = 1; $i <= 5; $i++)
            @if ($i <= $stars)
                <i class="fas fa-star" style="color: #E19C1C;"></i> <!-- Use Font Awesome or any other icon library for stars -->
              @else
                <i class="far fa-star" style="color: #E19C1C;"></i>
              @endif
            @endfor
          </div>
          <span>Harga Weekday : Rp.{{ $wahanas->harga_weekday }}</span>
          <span>Harga Weekend : Rp.{{ $wahanas->harga_weekend }}</span>
          <p>{{ $wahanas->deskripsi }}</p>
         
        </div>
      </div>
    </div>
    <br>
  @endforeach
</div>



  </div>
</section><!-- End Team Section -->
<!-- End Team Section -->

    <!-- ======= Pricing Section ======= -->
    <section id="pricing" class="pricing">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Kamar Villa D'Mangku Farm</h2>
          <p> kenikmatan dan kemewahan menyatu dalam suasana yang memukau, menciptakan tempat istimewa untuk pelarian yang tak terlupakan</p>
        </div>

        <div class="row">

          <div class="col-lg-4" data-aos="fade-up" data-aos-delay="100">
            <div class="box">
            <div class="icon">
            <img class="img-fluid" src="assets/img/kamar/kamar1.jpeg" alt="Fasilitas Picture">
            </div>
            <br>
              <h3>Safari Suite</h3>
              <h4><span>Mulai dari</span><sup>Rp.</sup>450.000</h4>
              <ul>
                <li><i class="bx bx-check"></i> AC dengan remote control individu</li>
                <li><i class="bx bx-check"></i> Flat TV dengan saluran digital TV, NETFLIX, dan saluran lokal & internasional lainnya</li>
                <li><i class="bx bx-check"></i> Wifi gratis</li>
                <li><i class="bx bx-check"></i> Fasilitas Kopi & Teh dengan air mineral kemasan setiap hari</li>
                <li><i class="bx bx-check"></i> Kendi air</li>
                <li><i class="bx bx-check"></i> Handuk mandi dan peralatan mandi</li>
                <li><i class="bx bx-check"></i> Sandal</li>
                <li><i class="bx bx-check"></i> Lemari es</li>
                <li><i class="bx bx-check"></i> Pancuran air panas & dingin</li>
              </ul>
             
            </div>
          </div>

          <div class="col-lg-4 mt-4 mt-lg-0" data-aos="fade-up" data-aos-delay="200">
            <div class="box featured">
            <div class="icon">
            <img class="img-fluid" src="assets/img/kamar/kamar2.jpeg" alt="Fasilitas Picture">
            </div>
            <br>
              <h3>Geodesic Suite</h3>
              <h4><span>Mulai dari</span><sup>Rp.</sup>650.000</h4>
              <ul>
              <li><i class="bx bx-check"></i> AC dengan remote control individu</li>
                <li><i class="bx bx-check"></i> Flat TV dengan saluran digital TV, NETFLIX, dan saluran lokal & internasional lainnya</li>
                <li><i class="bx bx-check"></i> Wifi gratis</li>
                <li><i class="bx bx-check"></i> Fasilitas Kopi & Teh dengan air mineral kemasan setiap hari</li>
                <li><i class="bx bx-check"></i> Kendi air</li>
                <li><i class="bx bx-check"></i> Handuk mandi dan peralatan mandi</li>
                <li><i class="bx bx-check"></i> Sandal</li>
                <li><i class="bx bx-check"></i> Lemari es</li>
                <li><i class="bx bx-check"></i> Pancuran air panas & dingin</li>
              </ul>
             
            </div>
          </div>

          <div class="col-lg-4 mt-4 mt-lg-0" data-aos="fade-up" data-aos-delay="300">
            <div class="box">
            <div class="icon">
            <img class="img-fluid" src="assets/img/kamar/kamar3.jpeg" alt="Fasilitas Picture">
            </div>
            <br>
              <h3>Siput Suite</h3>
              <h4><span>Mulai dari</span><sup>Rp.</sup>850.000</h4>
              <ul>
              <li><i class="bx bx-check"></i> AC dengan remote control individu</li>
                <li><i class="bx bx-check"></i> Flat TV dengan saluran digital TV, NETFLIX, dan saluran lokal & internasional lainnya</li>
                <li><i class="bx bx-check"></i> Wifi gratis</li>
                <li><i class="bx bx-check"></i> Fasilitas Kopi & Teh dengan air mineral kemasan setiap hari</li>
                <li><i class="bx bx-check"></i> Kendi air</li>
                <li><i class="bx bx-check"></i> Handuk mandi dan peralatan mandi</li>
                <li><i class="bx bx-check"></i> Sandal</li>
                <li><i class="bx bx-check"></i> Lemari es</li>
                <li><i class="bx bx-check"></i> Pancuran air panas & dingin</li>
              </ul>
             
            </div>
          </div>

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
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>
  @if (session()->has('success'))
    <script>
      Swal.fire(
      'Success!',
      '{{session()->get('success')}}',
      'success'
      )
    </script>

    @endif
</body>

</html>