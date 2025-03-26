<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <title>Ez Gaming</title>
    <meta name="description" content="" />
    <meta name="keywords" content="" />

    <!-- Favicons -->
    <link href="{{ asset('assets/landing/img/favicon.png" rel="icon')}}" />
    <link href="{{ asset('assets/landing/img/apple-touch-icon.png')}}" rel="apple-touch-icon" />

    <!-- Fonts -->
    <link href="{{ asset('https://fonts.googleapis.com')}}" rel="preconnect" />
    <link href="{{ asset('https://fonts.gstatic.com')}}" rel="preconnect" crossorigin />
    <link
      href="{{ asset('https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Raleway:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap')}}"
      rel="stylesheet"
    />

    <!-- Vendor CSS Files -->
    <link
      href="{{ asset('assets/landing/vendor/bootstrap/css/bootstrap.min.css')}}"
      rel="stylesheet"
    />
    <link
      href="{{ asset('assets/landing/vendor/bootstrap-icons/bootstrap-icons.css')}}"
      rel="stylesheet"
    />
    <link href="{{ asset('assets/landing/vendor/aos/aos.css')}}" rel="stylesheet" />
    <link
      href="{{ asset('assets/landing/vendor/glightbox/css/glightbox.min.css')}}"
      rel="stylesheet"
    />
    <link href="{{ asset('assets/landing/vendor/swiper/swiper-bundle.min.css')}}" rel="stylesheet" />

    <!-- Main CSS File -->
    <link href="{{ asset('assets/landing/css/main.css') }}" rel="stylesheet" />
    <!-- Tambahkan di bagian <head> -->
      <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- =======================================================
  * Template Name: Bootslander
  * Template URL: https://bootstrapmade.com/bootslander-free-bootstrap-landing-page-template/
  * Updated: Aug 07 2024 with Bootstrap v5.3.3
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
  </head>

  <body class="index-page">

    {{-- Navbar start --}}
    @include('landing/partials/navbar')
    {{-- navbar end --}}

    <main class="main">
      <!-- Hero Section -->
      <section id="hero" class="hero section dark-background">
        <img
          src="{{ asset('assets/landing/img/mlbb/benedetta_mpl_render_png_by_wolvesdzn_dh26ss9.png')}}"
          alt=""
          class="hero-bg"
        />

        <div class="container">
          <div class="row gy-4 justify-content-between">
            <div
              class="col-lg-6 order-lg-last hero-img"
              data-aos="zoom-out"
              data-aos-delay="100"
            >
              <img
                src="{{ asset('assets/landing/img/mlbb/nolan_the_navigator_11_11__render_png_by_wolvesdzn_di8i8ac.png')}}"
                class="img-fluid animated"
                alt=""
              />
            </div>

            <div
              class="col-lg-6 d-flex flex-column justify-content-center"
              data-aos="fade-in"
            >
              <h1>Mau joki ML tapi takut akun <span>ilang?</span></h1>
              <p>
                Tenang kuy kirim email dan biarkan tim joki kami yang mengurus
                sisanya
              </p>
              <div class="d-flex">
                <a href="#features" class="btn-get-started">Beli Sekarang</a>
              </div>
            </div>
          </div>
        </div>

        <svg
          class="hero-waves"
          xmlns="http://www.w3.org/2000/svg"
          xmlns:xlink="{{ asset('http://www.w3.org/1999/xlink')}}"
          viewBox="0 24 150 28 "
          preserveAspectRatio="none"
        >
          <defs>
            <path
              id="wave-path"
              d="M-160 44c30 0 58-18 88-18s 58 18 88 18 58-18 88-18 58 18 88 18 v44h-352z"
            ></path>
          </defs>
          <g class="wave1">
            <use xlink:href="{{ asset('#wave-path')}}" x="50" y="3"></use>
          </g>
          <g class="wave2">
            <use xlink:href="{{ asset('#wave-path')}}" x="50" y="0"></use>
          </g>
          <g class="wave3">
            <use xlink:href="{{ asset('#wave-path')}}" x="50" y="9"></use>
          </g>
        </svg>
      </section>
      <!-- /Hero Section -->

      <!-- About Section -->
      <section id="about" class="about section">
        <div class="container" data-aos="fade-up" data-aos-delay="100">
          <div class="row align-items-xl-center gy-5">
            <div class="col-xl-5 content">
              <h2>Kenapa harus joki di kami?</h2>
              <p>
                Dari kecepatan, keamanan, hingga kepercayaan, layanan joki kami
                menawarkan semuanya. Kami bekerja dengan profesionalisme tinggi
                untuk memastikan akun Anda aman, dan rank Anda naik dengan
                cepat. Cukup kirimkan email, dan prosesnya akan selesai dalam
                waktu singkat!
              </p>
              <a href="#features" class="read-more"
                ><span>Cek harga paket</span><i class="bi bi-arrow-right"></i
              ></a>
            </div>
          </div>
        </div>
      </section>
      <!-- /About Section -->
{{-- ---------------------------------------------------------- --}}
      <!-- detail akun start -->
      @include('landing/partials/form')
       <!-- Keranjang end -->
{{-- --------------------------------------------}}
      {{-- History Transaksi Start --}}
      @include('landing/partials/history')
      {{-- History Transaksi End --}}
      
      <!-- Faq Section -->
      <section id="faq" class="faq section light-background">
        <div class="container-fluid">
          <div class="row gy-4">

            <div
              class="col-lg-7 d-flex flex-column justify-content-center order-2 order-lg-1"
            >
              <div
                class="content px-xl-5"
                data-aos="fade-up"
                data-aos-delay="100"
              >
                <h3>
                  <span>Beberapa pertanyaan yang sering</span><strong> Ditanyakan</strong>
                </h3>
                <p>
                  kami telah merangkum beberapa pertanyaan yang sering ditanyakan
                </p>
              </div>

              <div
                class="faq-container px-xl-5"
                data-aos="fade-up"
                data-aos-delay="200"
              >
                <div class="faq-item faq-active">
                  <i class="faq-icon bi bi-question-circle"></i>
                  <h3>Apakah saya akan memiliki akses ke akun saya saat Anda bermain?</h3>
                  <div class="faq-content">
                    <p>
                      Jawabannya adalah iya, anda bisa mengakses akun anda diluar jam operasional yang telah ditentukan oleh pihak kami, saat jam kerja (joki sedang berlangsung), anda diharapkan untuk tidak mengakses akun anda karna itu dapat menyebabkan masalah yang akan mempengaruhi kinerja tim joki kami, dan itu akan menggangu kedua nbelah pihak dari segi waktu maupun hasil yang kurang maksimal, maka dari itu pastikan anda tidak mengakses akun anda saat jam joki akun anda sedang berlangsung, anda juga bisa mengabari customer service untuk menanyakan jadwal waktu senggang akun anda untuk menghindari hal yang tidak diinginkan.
                    </p>
                  </div>
                  <i class="faq-toggle bi bi-chevron-right"></i>
                </div>
                <!-- End Faq item-->

                <div class="faq-item">
                  <i class="faq-icon bi bi-question-circle"></i>
                  <h3>
                    Bagaimana jika saya tidak puas dengan hasilnya?
                  </h3>
                  <div class="faq-content">
                    <p>
                      kami memberikan anda sebuah kolom pesan untuk anda berinteraksi dengan tim kami, dan jika hasil yang kami berikan tidak seperti yang anda inginkan kami akan memberikan gratis free star tergantung seberapa besar kesalahan kami, apabila kesalahan yang kami lakukan benar benar diluar batas atau sangat parah kami akan memberikan uang anda kembali sebagai bentuk rasa tanggung jawab kami atas ketidak nyamanan yang anda alami.
                    </p>
                  </div>
                  <i class="faq-toggle bi bi-chevron-right"></i>
                </div>
                <!-- End Faq item-->

                <div class="faq-item">
                  <i class="faq-icon bi bi-question-circle"></i>
                  <h3>
                    Apakah Anda menggunakan bot atau cheat dalam permainan?
                  </h3>
                  <div class="faq-content">
                    <p>
                      Kami tidak pernah menggunakan metode curang seperti cheat ataupun bentuk kecurangan yang lainnya, kami bekerja berdasarkan tim yang sudah berpengalaman dan memiliki keahlian yang akan kami percayakan memegang akun anda.
                    </p>
                  </div>
                  <i class="faq-toggle bi bi-chevron-right"></i>
                </div>
                <!-- End Faq item-->
              </div>
            </div>

            <div class="col-lg-5 order-1 order-lg-2">
              <img
                src="{{ asset('assets/landing/img/faq.jpg')}}"
                class="img-fluid"
                alt=""
                data-aos="zoom-in"
                data-aos-delay="100"
              />
            </div>
          </div>
        </div>
      </section>
      <!-- /Faq Section -->

      <!-- Contact Section -->
      <section id="contact" class="contact section">
        <!-- Section Title -->
        <div class="container section-title" data-aos="fade-up">
          <h2>Bandings</h2>
          <div>
            <span>Tentang</span>
            <span class="description-title">Kami</span>
          </div>
        </div>
        <!-- End Section Title -->
        @include('landing/partials/pertanyaan')
            <!-- End Contact Form -->
          </div>
        </div>
      </section>
      <!-- /Contact Section -->
    </main>

    <footer id="footer" class="footer dark-background">
      <div class="container footer-top">
        <div class="row gy-4">
          <div class="col-lg-4 col-md-6 footer-about">
            <a href="{{ asset('index.html ')}}" class="logo d-flex align-items-center">
              <span class="sitename">EZ Gaming</span>
            </a>
            <div class="footer-contact pt-3">
              <p>Indonesia</p>
              <p>Jawa Tengah</p>
              <p class="mt-3">
                <strong>Whatsapp:</strong> <span>+62 896-7633-3539</span>
              </p>
              <p><strong>Email:</strong> <span>ezz.gamingjokimlbb@gmail.com</span></p>
            </div>
            
          </div>

          <div class="col-lg-2 col-md-3 footer-links">
            <h4>Useful Links</h4>
            <ul>
              <li><a href="#hero" class="active">Home</a></li>
              <li><a href="#about">Tutorial</a></li>
              <li><a href="#form-akun">Form Akun</a></li>
              <li><a href="#faq">Q&A</a></li>
              <li><a href="#contact">Contact</a></li>
            </ul>
          </div>

          <div class="col-lg-4 col-md-12 footer-newsletter">
            <h4>Ikuti Kami</h4>
            <p>
              Ikuti kami untuk info promo dan lain lainnya!!!
            </p>
            <div class="social-links d-flex mt-4">
              <a href="https://www.instagram.com/ezz.gamingjokimlbb/profilecard/?igsh=N2tpbDByd2xjc3Ni"><i class="bi bi-instagram"></i></a>
            </div>


          </div>
        </div>
      </div>

      <div class="container copyright text-center mt-4">
        <p>
          © <span>Copyright</span>
          <strong class="px-1 sitename">EZ Gaming</strong>
          <span>All Rights Reserved</span>
        </p>
        <div class="credits">
          <!-- All the links in the footer should remain intact. -->
          <!-- You can delete the links only if you've purchased the pro version. -->
          <!-- Licensing information: https://bootstrapmade.com/license/ -->
          <!-- Purchase the pro version with working PHP/AJAX contact form: [buy-url] -->
          Designed by
          <a href="{{ asset('https://bootstrapmade.com/')}}">BootstrapMade</a> Distributed By
          <a href="{{ asset('https://themewagon.com')}}">IDOY</a>
        </div>
      </div>
    </footer>

    <!-- Scroll Top -->
    <a
      href="#"
      id="scroll-top"
      class="scroll-top d-flex align-items-center justify-content-center"
      ><i class="bi bi-arrow-up-short"></i
    ></a>

     <!-- Preloader -->
     <div id="preloader"></div>

    
    

    <!-- Vendor JS Files -->
    <script src="{{ asset('assets/landing/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{ asset('assets/landing/vendor/php-email-form/validate.js')}}"></script>
    <script src="{{ asset('assets/landing/vendor/aos/aos.js')}}"></script>
    <script src="{{ asset('assets/landing/vendor/glightbox/js/glightbox.min.js')}}"></script>
    <script src="{{ asset('assets/landing/vendor/purecounter/purecounter_vanilla.js')}}"></script>
    <script src="{{ asset('assets/landing/vendor/swiper/swiper-bundle.min.js')}}"></script>

    <!-- Main JS File -->
    <script src="{{ asset('assets/landing/js/main.js')}}"></script>
    <script src="{{ asset('assets/landing/js/pelengkap.js')}}"></script>


    <!-- Inisialisasi AOS setelah file JS dimuat -->
<script>
  AOS.init({
      duration: 1000,  // Durasi animasi
      delay: 200,      // Penundaan animasi
      once: true       // Animasi hanya sekali
  });
</script>
  </body>
</html>
