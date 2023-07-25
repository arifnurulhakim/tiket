<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Pembayaran</title>
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
          <li>Pembayaran</li>
   
        </ol>
        <h2>Pembayaran Tiket</h2>

      </div>
    </section><!-- End Breadcrumbs -->

       <!-- ======= Contact Section ======= -->
        <section id="contact" class="contact">
        <div class="section-title">
          <h2>Pembayaran Tiket</h2>
          <p>Silahkan masukan bukti transfernya</p>
          <br>
          <h3>Transfer ke :</h3>
          <h5>Rekening BCA : 123123123</h5>
          <h5>Atas Nama : john </h5>
        </div>

        <center>
            <div class="container" data-aos="fade-up">
                <div class="col-lg-7 mt-5 mt-lg-0 d-flex align-items-stretch">
                    <form action="{{route('pemesanan.store') }}" method="POST" role="form" class="php-email-form" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                          <div class="form-group  col-md-3">
                              <label for="tanggal">Tanggal Kunjungan</label>
                              <input type="text" class="form-control" id="tanggal" name="tanggal" value="{{ $tanggal }}" disabled>
                              <input type="hidden" name="tanggal" value="{{ $tanggal }}">
                          </div>
                          <div class="form-group col-md-5">
                          <label for="nomor_tlpn">Nama</label>
                              <input type="text" class="form-control" id="nama" name="nama" value="{{ $nama }}" disabled>
                              <input type="hidden" name="nama" value="{{ $nama }}">
                          </div>
                          <div class="form-group col-md-4">
                              <label for="nomor_tlpn">Nomor Whatsapp</label>
                              <input type="text" class="form-control" id="nomor_tlpn" name="nomor_tlpn" value="{{ $nomor_tlpn }}" disabled>
                              <input type="hidden" name="nomor_tlpn" value="{{ $nomor_tlpn }}">
                          </div>
                        </div>
                        <div class="row">
                          <div class="form-group col-md-4">
                              <label for="nama_kupon">Kupon Wahana</label>
                              <input type="text" class="form-control" id="nama_kupon" name="nama_kupon" value="{{ $nama_kupon }}" disabled>
                              <input type="hidden" name="kupon_id" value="{{ $kupon_id }}">
                          </div>

                          <div class="form-group col-md-4">
                              <label for="quantity">quantity</label>
                              <input type="text" class="form-control" id="quantity" name="quantity" value="{{ $quantity }}" disabled>
                              <input type="hidden" name="quantity" value="{{ $quantity }}">
                          </div>

                          <div class="form-group col-md-4">
                              <label for="total">Total Harga</label>
                              <input type="text" class="form-control" id="total" name="total" value="{{ $total }}" disabled>
                              <input type="hidden" name="total" value="{{ $total }}">
                          </div>
                        </div>
                        <div class="form-group">
                            <label for="bukti_pembayaran">Bukti transfer</label>
                            <input type="file" class="form-control" id="bukti_pembayaran" name="bukti_pembayaran" required>
                        </div>
                      
                        <div class="form-group text-center">
                           <button type="submit" href="{{ route('index') }}">pesan tiket</button>
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

  <!-- The success modal -->
<!-- <div class="modal fade" id="successModal" tabindex="-1" role="dialog" aria-labelledby="successModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="successModalLabel">Pemesanan Berhasil</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Pemesanan tiket berhasil! Terima kasih telah menggunakan layanan kami.</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Oke</button>
            </div>
        </div>
    </div>
</div> -->

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
<!-- Place these scripts at the bottom of your Blade view -->


  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>


 

</body>

</html>

