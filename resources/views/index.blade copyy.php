<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>SIAP</title>
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
  <link href="assets/vendor/sweetalert2/sweetalert2.min.css">
  <script src="assets/vendor/sweetalert2/sweetalert2.all.min.js"></script>
  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top ">
    <div class="container d-flex align-items-center">

      <h1 class="logo me-auto"><a href="{{route('index')}}"><img src="assets/img/dpmtelu.png" class="img-fluid" alt=""></a></h1>
      <nav id="navbar" class="navbar">
        <ul>
          <li><a class="nav-link scrollto active" href="#hero">Beranda</a></li>
          <li><a class="nav-link scrollto" href="#about">Tentang Kami</a></li>
          <li><a class="nav-link scrollto" href="#form-aspirasi">Form Aspirasi</a></li>
          <li><a class="nav-link scrollto" href="#list-aspirasi">List Aspirasi</a></li>
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
          <h1>Sistem Aspirasi Cepat Tanggap</h1>
          <h2>Sampaikan Aspirasimu Sekarang!</h2>

          <div class="d-flex justify-content-center justify-content-lg-start mb-4">
            <a href="#form-aspirasi" class="btn-get-started scrollto">Buat Aspirasi</a>
            <!-- <a href="https://www.youtube.com/watch?v=jDDaplaOz7Q" class="glightbox btn-watch-video"><i class="bi bi-play-circle"></i><span>Watch Video</span></a> -->
          </div>
        </div>
        <div class="col-lg-6 order-1 order-lg-2 hero-img" data-aos="zoom-in" data-aos-delay="200">
          <img src="assets/img/hero-img.png" class="img-fluid animated" alt="">
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
          <div class="col-lg-6 pt-4 pt-lg-0">
            <p>
            Deskripsi singkat website SIAP:<br>
Website SIAP ( Sistem Aspirasi Cepat Tanggap) merupakan wadah bagi mahasiswa Fakultas Ekonomi dan Bisnis untuk menyalurkan aspirasinya melalui website. Website SIAP lebih fleksibel karena mahasiswa dapat menyalurkan aspirasinya kapanpun dan dimanapun. Adanya website SIAP dapat mempermudah dalam menampung dan mengeksekusi aspirasi mahasiswa Fakultas Ekonomi dan Bisnis.
            </p>
          </div>
          <div class="col-lg-6 pt-4 pt-lg-0">
            <p>
            Deskripsi singkat DPM FEB TELU:<br>
Dewan Perwakilan Mahasiswa (DPM) Fakultas Ekonomi dan Bisnis Universitas Telkom adalah organisasi legislatif mahasiswa yang menjalankan 4 fungsi yaitu Legislasi, Aspirasi, Pengganggaran dan Pengawasan
            </p>
          </div>
        </div>

      </div>
    </section><!-- End About Us Section -->


    <!-- ======= form-aspirasi Section ======= -->
   
   <!-- ======= Cta Section ======= -->
   <section id="cta" class="cta">
     <section id="form-aspirasi" class="form-aspirasi">
      <div class="container" data-aos="zoom-in">
        <div class="section-title">
        <h2 style="color: white;">ASPIRASI</h2>
<!-- 
          <p>Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit sint consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias ea. Quia fugiat sit in iste officiis commodi quidem hic quas.</p> -->
        </div>
          <div class="col-lg mt-5 mt-lg-0">
            @if (session()->has('success'))
            <script>
              Swal.fire(
              'Success!',
              '{{session()->get('success')}}',
              'success'
              )
            </script>
            </div>
            @endif
            <form action="{{route('aspirasi.store')}}" method="post" role="form" class="col-lg mt-5 mt-lg-0" enctype="multipart/form-data" style="opacity: 0.95;">

            @csrf
          
              <div class="form-group">
               
                  <input type="text" class="form-control @error('nim') is-invalid  @enderror" id="nim" placeholder="NIM" name="nim" value="{{old('nim')}}" >
                  @error('nim')
                      <div class="invalid-feedback">
                        {{$message}}
                      </div>
                  @enderror
              </div>
          
              <div class="form-group">
               
                  <input type="text" class="form-control @error('nama') is-invalid  @enderror" id="nama" placeholder="Nama" name="nama" value="{{old('nama')}}">
                  @error('nama')
                      <div class="invalid-feedback">
                        {{$message}}
                      </div>
                  @enderror
              </div>
              <div class="form-group">
               
                <select id="kategori" name="kategori" value="{{old('kategori')}}" placeholder="kategori" class="form-select @error('kategori') is-invalid  @enderror" >
                  <option selected="" disabled="">-- Pilih Kategori --</option>
                  <option value="akademik" @if (old('kategori') == 'akademik') selected="selected" @endif>Akademik
                  </option>
                  <option value="minat bakat" @if (old('kategori') == 'minat bakat') selected="selected" @endif>Minat Bakat
                  <option value="fasilitas" @if (old('kategori') == 'fasilitas') selected="selected" @endif>Fasilitas
                  </option>
                  <option value="ormawa" @if (old('kategori') == 'ormawa') selected="selected" @endif>Ormawa
                  </option>
                  <option value="dll" @if (old('kategori') == 'dll') selected="selected" @endif>Dll
                  </option>

                </select>
                @error('kategori')
                      <div class="invalid-feedback">
                        {{$message}}
                      </div>
                @enderror
              </div>
              <div class="form-group">
                <select id="status" name="status" value="{{old('status')}}" placeholder="status" class="form-select " hidden required>
                  <option value="pending" @if (old('status') == 'pending') selected="selected" @endif>pending
                  </option>
                </select>
                
              </div>
              <div class="form-group">
              
                  <textarea class="form-control @error('aspirasi') is-invalid  @enderror" id="aspirasi" placeholder="Ketik aspirasi anda disini.." name="aspirasi" value="{{old('aspirasi')}}" rows="10" ></textarea>
                  @error('aspirasi')
                  <div class="invalid-feedback">
                    {{$message}}
                  </div>
                  @enderror
                </div>

                <div class="form-group">
                <label for="image" style="color: white;">Masukan Gambar</label>
  <input type="file" name="image" accept="image/*" class="form-control border-input @error('image') is-invalid  @enderror" data-browse="Masukkan gambar">
  @error('image')
    <div class="invalid-feedback">
      {{$message}}
    </div>
  @enderror
</div>
              <div class="text-center">
                <button type="submit"  class="btn btn-primary" style="background: #47b2e4;"><b>Kirim Aspirasi</b></button>
                <a href="{{route('index')}}"></a>
              </div>
     

         
            </form>
            
            
          </div>
      </div>
    </section>
    <!-- End form-aspirasi Section -->
    </section><!-- End Cta Section -->
    <section id="list-aspirasi" class="list-aspirasi">
    <div class="container" data-aos="fade-up">
        <div class="section-title">
        <h2 >LIST ASPIRASI</h2>
<!-- 
          <p>Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit sint consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias ea. Quia fugiat sit in iste officiis commodi quidem hic quas.</p> -->
        </div>
      <div class="container" >
      <div class="row">
        <div class="col-12">
                <div class="card-body">
                    <table class="table table-bordered table-stripped" id="example2">    
                        <thead>
                        <tr class="text-center">
                            <th>No.</th>
                            <th>NIM</th>
                            <th>Nama</th>
                            <th>Kategori</th>
                            <th>Aspirasi</th>
                            <th>Status</th>

                            
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($aspirasi as $key => $aspirasi)
                            <tr class="text-center">
                                <td>{{$key+1}}</td>
                                <td>{{$aspirasi->nim}}</td>
                                <td>{{$aspirasi->nama}}</td>
                                <td>{{$aspirasi->kategori}}</td>
                                <td>{{$aspirasi->aspirasi}}</td>
                                <!-- jika status aprov maka tampil aspirasi -->
                                <td>@if($aspirasi->status == "pending") 
                                    <i class='ri-time-line' class="text-warning"></i> 
                                    @elseif ($aspirasi->status == "review")
                                    <i class="ri-draft-line" class="text-info"></i>
                                    @elseif ($aspirasi->status == "accept")
                                    <i class="ri-checkbox-circle-line text-success" data-toggle="tooltip" data-placement="top" title="Aspirasi diterima"></i>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
        </div>
    </div>

      </div>
    </section>

    <!-- list-aspirasi Section  -->


    <!-- end list-aspirasi Section  -->
  </main><!-- End #main -->


  <!-- ======= Footer ======= -->
  <!-- <footer id="footer">
    <div class="footer-top">
      <div class="container">
        <div class="row">
          <div class="col-lg col-md footer-links">
              <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
              <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
              <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
          </div>

        </div>
      </div>
    </div>

    <div class="container footer-bottom clearfix">
    <div class="copyright">
        &copy; Copyright <strong><span>DPM TELKOM UNIVERSITY</span></strong>. All Rights Reserved
      </div>
      <div class="credits">
        develop by <a href="https://www.instagram.com/mrfnrlhkm/">mrfnrlhkm</a>
      </div>
    </div>

    
  </footer> -->
  <!-- End Footer -->

  <!-- ======= Footer ======= -->
  <footer id="footer">


    <div class="footer-top">
      <div class="container">
        <div class="row">
          <div class="col-lg-3 col-md-6 footer-links">
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
        &copy; Copyright <strong><span>DPM TELKOM UNIVERSITY</span></strong>. All Rights Reserved
      </div>
      <div class="credits">
        develop by <a href="https://www.instagram.com/tukangketik.php/">tukangketik.php</a>
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
  <script>
    $(function () {
  $('[data-toggle="tooltip"]').tooltip()
})
  </script>
</body>

</html>