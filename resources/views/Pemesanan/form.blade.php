<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Pemensanan</title>
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
          <li>Pemesanan Tiket</li>
   
        </ol>
        <h2>Pemesanan Tiket</h2>

      </div>
    </section><!-- End Breadcrumbs -->

       <!-- ======= Contact Section ======= -->
        <section id="contact" class="contact">
        <div class="section-title">
          <h2>Pesan Tiket dan Klaim Voucher Masuk</h2>
          <p>Silahkan Isi Formulir dibawah dan dapatkan Voucher Potongan di D’Mangku Farm</p>
          <br>
          <h3>HARGA TIKET MASUK</h3>
          <h5>Senin – jum’at : 25.000/orang</h5>
          <h5>Sabtu – Minggu : 35.000/orang</h5>
        </div>

        <center>
            <div class="container" data-aos="fade-up">
                <div class="col-lg-7 mt-5 mt-lg-0 d-flex align-items-stretch">
                    <form action="{{route('pemesanan.tiket') }}" method="POST" role="form" class="php-email-form" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group">
                            <label for="tanggalMulai">Tanggal Kunjungan</label>
                            <input type="date" class="form-control @error('tanggal') is-invalid @enderror" id="tanggalMulai" name="tanggal" value="{{ old('tanggal') }}" required>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-6">
                                <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" name="nama" value="{{ old('nama') }}" placeholder="Nama" required>
                            </div>
                            <div class="form-group col-md-6">
                                <input type="text" class="form-control @error('nomor_tlpn') is-invalid @enderror" id="nomor_tlpn" name="nomor_tlpn" value="{{ old('nomor_tlpn') }}" placeholder="Nomor Whatsapp" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-9">
                                <select id="kupon_id" name="kupon_id" class="form-control" required>
                                    <option selected="" disabled="">-- Pilih Kupon Wahana --</option>
                                    @foreach ($kupon as $item)
                                    <option value="{{ $item->id }}">{{ $item->nama_kupon }} ({{ $item->nama_wahana }}) </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group col-md-3">
                                <input type="number" class="form-control" name="quantity" id="quantity" placeholder="Jumlah Tiket" required>
                            </div>
                        </div>
                        <div class="form-group text-center">
                           <button type="submit">pesan tiket</button>
                        </div>
                    </form>
                </div>
            </div>
           
        </center>

        </section><!-- End Contact Section -->

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

</body>

</html>