<form action="{{ route('post.session')}}" method="POST">    
  @csrf
      <div class="container mt-5">
        <!-- Card container for form -->
        <div class="card" id="form-akun" data-aos="fade-up" data-aos-delay="100">
            <div class="card-header d-flex align-items-center">
                <div class="bg-brown-500 text-white rounded-circle d-flex justify-content-center align-items-center" style="width: 40px; height: 40px; margin-right: 10px;">1</div>
                <h2 class="mb-0"><b>Masukkan Data Akun</b></h2>
            </div>
            <div class="card-body">
                <!-- Form Grid -->
                <div class="row g-4">
                    <div class="col-12 col-md-6">
                        <label for="name" class="form-label">Ketikkan Nama Anda</label>
                        <input type="text" id="name" name="nama" class="form-control" placeholder="Ketikkan Nama" required>
                        <div id="name-comment" style="display:none; color:red;">Nama tidak boleh kosong</div>
                    </div>
                    <div class="col-12 col-md-6">
                        <label for="whatsapp" class="form-label">No WhatsApp</label>
                        <input type="tel" id="whatsapp" name="wa" class="form-control" placeholder="Ketikkan No WhatsApp" required pattern="^\+?[1-9]\d{1,14}$">
                        <!-- Komentar validasi -->
                        <div id="whatsapp-comment" style="display:none; color:red;"></div>
                    </div>

                    <div class="col-12 col-md-6">
                        <label for="email" class="form-label">Email akun yang akan di joki</label>
                        <input type="email" id="email" name="email_game" class="form-control" placeholder="Ketikan Email" required>
                        <div id="email-comment" style="display:none; color:red;">Email tidak boleh kosong</div>
                    </div>
                    <div class="col-12 col-md-6">
                        <label for="password" class="form-label">Password akun yang akan di joki</label>
                        <input type="password" id="password" name="password_game" class="form-control" placeholder="Ketikan Password" required>
                        <div id="password-comment" style="display:none; color:red;">Password tidak boleh kosong</div>
                    </div>
                    <div class="col-12 col-md-6">
                        <label for="loginVia" class="form-label">Login Via</label>
                        <select id="loginVia" name="login_via" class="form-select">
                            <option selected>Pilih Login Via</option>
                            <option value="monton">moonton (rekomendasi)</option>
                            <option value="vk">vk</option>
                            <option value="tiktok">tiktok</option>
                            <!-- Add options here -->
                        </select>
                        <div id="loginVia-comment" style="display:none; color:red;">Pilih Login Via</div>
                    </div>
                    <div class="col-12">
                        <label for="catatan" class="form-label">Catatan untuk Penjoki</label>
                        <input type="text" id="catatan" name="catatan" class="form-control" placeholder="Ketikan Catatan untuk Penjoki" required>
                        <div id="catatan-comment" style="display:none; color:red;">Catatan tidak boleh kosong</div>
                    </div>
            </div>

                    <style>
                      #name-comment {
                          font-size: 14px;
                          color: red;
                          margin-top: 5px;
                      }
    
                      #name-comment.valid {
                          color: green;
                          font-size: 14px;
                      }
                      
                      #whatsapp-comment {
                          font-size: 14px;
                          color: red;
                          margin-top: 5px;
                      }
    
                      #whatsapp-comment.valid {
                          color: green;
                          font-size: 14px;
                      }
    
                      #email-comment {
                          font-size: 14px;
                          color: red;
                          margin-top: 5px;
                      }
    
                      #email-comment.valid {
                          color: green;
                          font-size: 14px;
                      }

                      #password-comment {
                          font-size: 14px;
                          color: red;
                          margin-top: 5px;
                      }
    
                      #password-comment.valid {
                          color: green;
                          font-size: 14px;
                      }

                      #login_via-comment {
                          font-size: 14px;
                          color: red;
                          margin-top: 5px;
                      }
    
                      #login_via-comment.valid {
                          color: green;
                          font-size: 14px;
                      }

                      #catatan-comment {
                          font-size: 14px;
                          color: red;
                          margin-top: 5px;
                      }
    
                      #catatan-comment.valid {
                          color: green;
                          font-size: 14px;
                      }

                      input:invalid {
                          border-color: red;
                      }
    
                      input:valid {
                          border-color: green;
                      }
                      </style>

                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS and dependencies -->
    <script src="{{ asset('https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js')}}" integrity="sha384-oBqDVmMz4fnFO9gybZn7Jp3uFCkq3ePpR2WgQokHiJZ5vCZy5f0kTcC46of8xxv7V" crossorigin="anonymous"></script>
    <script src="{{ asset('https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js')}}" integrity="sha384-pzjw8f+ua7Kw1TIq0g4+Q9zI6t5m1pg4pZ13pRS2VGhFS5kz3ztsSmlsL5yY/ZpM" crossorigin="anonymous"></script>
</body>
</html>
<!-- Detail Akun end  -->


      <!-- Keranjang start -->
      
    
     
       
    <!-- FontAwesome for icons -->
    <link href="{{ asset('https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css')}}" rel="stylesheet" />

    <style>
     /* Keranjang */
.cart {
  position: fixed;
  right: -100%; /* Menyembunyikan keranjang sepenuhnya di sisi kanan */
  top: 80px;
  width: 320px; /* Ukuran keranjang yang lebih kecil dan elegan */
  height: 70vh; /* Menjaga keranjang tetap proporsional */
  background-color: rgba(0, 0, 0, 0.7); /* Transparan dengan latar belakang gelap */
  color: #fff; /* Teks putih agar mudah dibaca */
  border-radius: 25px 0 0 25px; /* Sudut lebih melengkung untuk memberikan kesan modern */
  transition: right 0.4s ease;
  overflow-y: auto; /* Menambahkan scroll jika konten melebihi tinggi keranjang */
  z-index: 9999; /* Agar keranjang berada di atas elemen lainnya */
  box-shadow: 0px 0px 15px rgba(0, 255, 255, 0.3); /* Cahaya neon di sekitar keranjang */
  padding: 20px;
  backdrop-filter: blur(10px); /* Menambahkan efek blur untuk latar belakang transparan */
}

/* Menampilkan keranjang saat show class ditambahkan */
.cart.show {
  right: 0; /* Menampilkan keranjang dengan efek geser */
}

/* Header Keranjang */
.cart-header {
  display: flex;
  justify-content: space-between;
  align-items: center;
  padding: 10px;
  background-color: rgba(4, 6, 119, 0.8); /* Warna header yang lebih gelap dengan transparansi */
  color: #fff; /* Teks putih untuk kontras */
  border-radius: 20px 0 0 20px; /* Sudut melengkung untuk header */
  font-size: 18px; /* Ukuran font yang lebih kecil dan elegan */
}

/* Ikon close */
.cart-header i {
  font-size: 18px;
  cursor: pointer;
  transition: transform 0.3s;
}

.cart-header i:hover {
  transform: scale(1.2);
}

/* Konten Keranjang */
.cart-body {
  padding: 10px 15px;
  overflow-y: auto;
  font-size: 14px; /* Ukuran font yang lebih kecil untuk kenyamanan mata */
}

/* Tombol Beli Sekarang */
.cart-body .btn-warning {
  background-color: #ffcc00; /* Warna tombol yang kontras namun lembut */
  border: none;
  width: 100%;
  padding: 12px;
  font-size: 14px; /* Ukuran font tombol yang lebih proporsional */
  text-transform: uppercase;
  border-radius: 12px;
  color: #333; /* Warna teks yang kontras */
  font-weight: bold;
  transition: background-color 0.3s ease;
  margin-top: 20px;
  box-shadow: 0 0 10px rgba(255, 204, 0, 0.5); /* Menambahkan efek cahaya pada tombol */
}

.cart-body .btn-warning:hover {
  background-color: #e67e22; /* Warna lebih gelap saat dihover */
  box-shadow: 0 0 15px rgba(255, 204, 0, 0.8); /* Efek cahaya saat hover */
}

/* Tombol + dan - */
.cart-body .btn-secondary {
  padding: 6px 12px;
  font-size: 14px; /* Ukuran font tombol yang lebih kecil */
  background-color: #dfe6e9; /* Warna abu-abu pastel lembut */
  border-radius: 10px;
  color: #333; /* Teks gelap agar mudah dibaca */
  margin: 5px 0;
  transition: background-color 0.3s ease;
  box-shadow: 0px 0px 5px rgba(0, 0, 0, 0.2); /* Efek bayangan halus */
}

.cart-body .btn-secondary:hover {
  background-color: #b0bec5; /* Warna lebih gelap saat dihover */
  transform: scale(1.05);
  box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.4); /* Efek bayangan lebih kuat saat hover */
}

/* Mobile Responsiveness */
@media (max-width: 768px) {
  .cart {
    width: 85%; /* Keranjang memenuhi sebagian layar pada perangkat kecil */
    height: 60vh; /* Mengurangi tinggi untuk perangkat kecil */
    top: 50px; /* Menjaga jarak atas agar tidak terlalu dekat dengan bagian atas layar */
  }

  .cart.show {
    right: 0; /* Menampilkan keranjang dengan efek geser */
  }
}

@media (max-width: 480px) {
  .cart {
    width: 90%; /* Keranjang hampir memenuhi layar pada perangkat sangat kecil */
    top: 30px; /* Mengurangi jarak dari atas */
  }

  .cart.show {
    right: 0; /* Menampilkan keranjang dengan efek geser */
  }
}

    </style>
  </head>
  <body class="bg-dark text-white">
    

      <!-- Features Section -->
      <section id="features" class="features section">
        <div class="container">
          <div class="row gy-4">
            <div class="row">
              <section id="details" class="details section">
                <!-- Judul Joki Title -->
                <div class="container section-title" data-aos="fade-up">
                  <h2>pilih</h2>
                  <div>
                    <span>paket terbaik dari</span>
                    <span class="description-title">kami</span>
                  </div>
                </div>
            </div>
            <h4>per bintang</h4>


            <!-- Feature Item 1 -->
            <div
		id="package1"
              class="col-lg-3 col-md-6 col-6"
              data-aos="fade-up"
              data-aos-delay="100"
            >
              <div
                class="features-item d-flex align-items-center"
                style="height: 100%; display: flex; flex-direction: row"
		onclick="selectPackage('Grandmaster', 7000, event)"
              >
                <img
                  src="{{ asset('assets/landing/img/mlbb/grandmaster.png')}}"
                  style="width: 2rem; height: 2rem; margin-right: 10px"
                  alt="Grandmaster"
                />
                <div
                  class="d-flex flex-column justify-content-between"
                  style="height: 100%"
                >
                  <h3><a href="" class="stretched-link">Grandmaster</a></h3>
                  <div
                    class="d-flex justify-content-start align-items-center"
                    style="height: 100%"
                  >
                    <h3 class="text">Rp 7.000</h3>
                  </div>
                </div>
              </div>
            </div>
            <!-- End Feature Item -->


            <!-- Feature Item 2 -->
            <div
		id="package2"
              class="col-lg-3 col-md-6 col-6"
              data-aos="fade-up"
              data-aos-delay="200"
            >
              <div
                class="features-item d-flex align-items-center"
                style="height: 100%; display: flex; flex-direction: row"
		onclick="selectPackage('Epic', 8000, event)"
              >
                <img
                  src="{{ asset('assets/landing/img/mlbb/epic.png')}}"
                  style="width: 2rem; height: 2rem; margin-right: 10px"
                  alt="Epic"
                />
                <div
                  class="d-flex flex-column justify-content-between"
                  style="height: 100%"
                >
                  <h3><a href="" class="stretched-link">Epic</a></h3>
                  <div
                    class="d-flex justify-content-start align-items-center"
                    style="height: 100%"
                  >
                    <h3 class="text">Rp 8.000</h3>
                  </div>
                </div>
              </div>
            </div>
            <!-- End Feature Item -->


            <!-- Feature Item 3 -->
            <div
		id="package3"
              class="col-lg-3 col-md-6 col-6"
              data-aos="fade-up"
              data-aos-delay="300"
            >
              <div
                class="features-item d-flex align-items-center"
                style="height: 100%; display: flex; flex-direction: row"
		onclick="selectPackage('Legend', 9000, event)"
              >
                <img
                  src="{{ asset('assets/landing/img/mlbb/legend.png')}}"
                  style="width: 2rem; height: 2rem; margin-right: 10px"
                  alt="Legend"
                />
                <div
                  class="d-flex flex-column justify-content-between"
                  style="height: 100%"
                >
                  <h3><a href="" class="stretched-link">Legend</a></h3>
                  <div
                    class="d-flex justify-content-start align-items-center"
                    style="height: 100%"
                  >
                    <h3 class="text">Rp 9.000</h3>
                  </div>
                </div>
              </div>
            </div>
            <!-- End Feature Item -->

            <!-- Feature Item 4 -->
            <div
		id="package4"
              class="col-lg-3 col-md-6 col-6"
              data-aos="fade-up"
              data-aos-delay="400"
            >
              <div
                class="features-item d-flex align-items-center"
                style="height: 100%; display: flex; flex-direction: row"
		onclick="selectPackage('Mythic', 20000, event)"
              >
                <img
                  src="{{ asset('assets/landing/img/mlbb/mythic.png')}}"
                  style="width: 2rem; height: 2.1rem; margin-right: 10px"
                  alt="Mythic"
                />
                <div
                  class="d-flex flex-column justify-content-between"
                  style="height: 100%"
                >
                  <h3><a href="" class="stretched-link">Mythic</a></h3>
                  <div
                    class="d-flex justify-content-center align-items-center"
                    style="height: 100%"
                  >
                    <h3 class="text">Rp 20.000</h3>
                  </div>
                </div>
              </div>
            </div>
            <!-- End Feature Item -->

            <!-- end perbintang -->


            <!-- start per 5 bintang -->

            <h4>per lima bintang</h4>
            <!-- Feature Item 5 -->
            <div
		id="package5"
              class="col-lg-3 col-md-6 col-6"
              data-aos="fade-up"
              data-aos-delay="500"
            >
              <div
                class="features-item d-flex align-items-center"
                style="height: 100%; display: flex; flex-direction: row"
		onclick="selectPackage('Mythic Honor', 120000, event)"
              >
                <img
                  src="{{ asset('assets/landing/img/mlbb/honor.png')}}"
                  style="width: 2rem; height: 2.1rem; margin-right: 10px"
                  alt="Honor"
                />
                <div
                  class="d-flex flex-column justify-content-between"
                  style="height: 100%"
                >
                  <h3><a href="" class="stretched-link">Mythic honor</a></h3>
                  <div
                    class="d-flex justify-content-start align-items-center"
                    style="height: 100%"
                  >
                    <h3 class="text">Rp 120.000</h3>
                  </div>
                </div>
              </div>
            </div>
            <!-- End Feature Item -->

            <!-- Feature Item 6 -->
            <div
		id="package6"
              class="col-lg-3 col-md-6 col-6"
              data-aos="fade-up"
              data-aos-delay="600"
            >
              <div
                class="features-item d-flex align-items-center"
                style="height: 100%; display: flex; flex-direction: row"
		onclick="selectPackage('Mythic glory', 145000, event)"
              >
                <img
                  src="{{ asset('assets/landing/img/mlbb/glory.png')}}"
                  style="width: 2rem; height: 2.1rem; margin-right: 10px"
                  alt="Glory"
                />
                <div
                  class="d-flex flex-column justify-content-between"
                  style="height: 100%"
                >
                  <h3>
                    <a href="" class="stretched-link">Mythical glory 50+</a>
                  </h3>
                  <div
                    class="d-flex justify-content-start align-items-center"
                    style="height: 100%"
                  >
                    <h3 class="text">Rp 145.000</h3>
                  </div>
                </div>
              </div>
            </div>
            <!-- End Feature Item -->

            <!-- Feature Item 7 -->
            <div
		id="package7"
              class="col-lg-3 col-md-6 col-6"
              data-aos="fade-up"
              data-aos-delay="700"
            >
              <div
                class="features-item d-flex align-items-center"
                style="height: 100%; display: flex; flex-direction: row"
		onclick="selectPackage('Mythic imortal', 170000, event)"
              >
                <img
                  src="{{ asset('assets/landing/img/mlbb/imortal.png')}}"
                  style="width: 2.3rem; height: 2.1rem; margin-right: 10px"
                  alt="Imort"
                />
                <div
                  class="d-flex flex-column justify-content-between"
                  style="height: 100%"
                >
                  <h3>
                    <a href="" class="stretched-link">Mythical imortal 100+</a>
                  </h3>
                  <div
                    class="d-flex justify-content-start align-items-center"
                    style="height: 100%"
                  >
                    <h3 class="text">Rp 170.000</h3>
                  </div>
                </div>
              </div>
            </div>
            <!-- End Feature Item -->

            <!-- end per 5 bintang -->
            <!-- start paket rank -->
              <h4>paket rank</h4>

            <!-- Feature Item 8 -->
            <div
		id="package8"
              class="col-lg-3 col-md-6 col-6"
              data-aos="fade-up"
              data-aos-delay="800"
            >
              <div
                class="features-item d-flex align-items-center"
                style="height: 100%; display: flex; flex-direction: row"
		onclick="selectPackage('Grandmaster to Mythic', 470000, event)"
              >
                <img
                  src="{{ asset('assets/landing/img/mlbb/grandmaster.png')}}"
                  style="width: 2rem; height: 2rem; margin-right: 10px"
                  alt="Grandmaster"
                />
                <img
                  src="{{ asset('assets/landing/img/mlbb/mythic.png')}}"
                  style="width: 2rem; height: 2.2rem; margin-right: 10px"
                  alt="Mythic"
                />
                <div
                  class="d-flex flex-column justify-content-between"
                  style="height: 100%"
                >
                  <h3>
                    <a href="" class="stretched-link">Grandmaster to Mythic</a>
                  </h3>
                  <div
                    class="d-flex justify-content-start align-items-center"
                    style="height: 100%"
                  >
                    <h3 class="text">Rp 470.000</h3>
                  </div>
                </div>
              </div>
            </div>
            <!-- End Feature Item -->


            <!-- Feature Item 9 -->
            <div
		id="package9"
              class="col-lg-3 col-md-6 col-6"
              data-aos="fade-up"
              data-aos-delay="800"
            >
              <div
                class="features-item d-flex align-items-center"
                style="height: 100%; display: flex; flex-direction: row"
		onclick="selectPackage('Epic to Legend', 200000, event)"
              >
                <img
                  src="{{ asset('assets/landing/img/mlbb/epic.png')}}"
                  style="width: 2rem; height: 2.1rem; margin-right: 10px"
                  alt="Epic"
                />
                <img
                  src="{{ asset('assets/landing/img/mlbb/legend.png')}}"
                  style="width: 2rem; height: 2rem; margin-right: 10px"
                  alt="Legend"
                />
                <div
                  class="d-flex flex-column justify-content-between"
                  style="height: 100%"
                >
                  <h3>
                    <a href="" class="stretched-link">Epic to Legend</a>
                  </h3>
                  <div
                    class="d-flex justify-content-start align-items-center"
                    style="height: 100%"
                  >
                    <h3 class="text">Rp 200.000</h3>
                  </div>
                </div>
              </div>
            </div>
            <!-- End Feature Item -->


            <!-- Feature Item 10 -->
            <div
		id="package10"
              class="col-lg-3 col-md-6 col-6"
              data-aos="fade-up"
              data-aos-delay="800"
            >
              <div
                class="features-item d-flex align-items-center"
                style="height: 100%; display: flex; flex-direction: row"
		onclick="selectPackage('Epic to Mythic', 370000, event)"
              >
                <img
                  src="{{ asset('assets/landing/img/mlbb/epic.png')}}"
                  style="width: 2.1rem; height: 2.2rem; margin-right: 10px"
                  alt="Epic"
                />
                <img
                  src="{{ asset('assets/landing/img/mlbb/mythic.png')}}"
                  style="width: 2rem; height: 2.3rem; margin-right: 10px"
                  alt="Mythic"
                />
                <div
                  class="d-flex flex-column justify-content-between"
                  style="height: 100%"
                >
                  <h3>
                    <a href="" class="stretched-link">Epic to Mythic</a>
                  </h3>
                  <div
                    class="d-flex justify-content-start align-items-center"
                    style="height: 100%"
                  >
                    <h3 class="text">Rp 370.000</h3>
                  </div>
                </div>
              </div>
            </div>
            <!-- End Feature Item -->


            <!-- Feature Item 11 -->
            <div
		id="package11"
              class="col-lg-3 col-md-6 col-6"
              data-aos="fade-up"
              data-aos-delay="800"
            >
              <div
                class="features-item d-flex align-items-center"
                style="height: 100%; display: flex; flex-direction: row"
		onclick="selectPackage('Legend to Mythic', 225000, event)"
              >
                <img
                  src="{{ asset('assets/landing/img/mlbb/legend.png')}}"
                  style="width: 2rem; height: 2rem; margin-right: 10px"
                  alt="Legend"
                />
                <img
                  src="{{ asset('assets/landing/img/mlbb/mythic.png')}}"
                  style="width: 2rem; height: 2.2rem; margin-right: 10px"
                  alt="Mythic"
                />
                <div
                  class="d-flex flex-column justify-content-between"
                  style="height: 100%"
                >
                  <h3>
                    <a href="" class="stretched-link">Legend to Mythic</a>
                  </h3>
                  <div
                    class="d-flex justify-content-start align-items-center"
                    style="height: 100%"
                  >
                    <h3 class="text">Rp 225.000</h3>
                  </div>
                </div>
              </div>
            </div>
            <!-- End Feature Item -->


            <!-- Feature Item 12 -->
            <div
              id="package12"
              class="col-lg-3 col-md-6 col-6"
              data-aos="fade-up"
              data-aos-delay="800"
            >
              <div
                class="features-item d-flex align-items-center"
                style="height: 100%; display: flex; flex-direction: row"
		          onclick="selectPackage('Grading to Mythic', 200000, event)"
              >
                <img
                  src="{{ asset('assets/landing/img/mlbb/mythic.png')}}"
                  style="width: 2rem; height: 2.2rem; margin-right: 10px"
                  alt="Mythic"
                />
                <div
                  class="d-flex flex-column justify-content-between"
                  style="height: 100%"
                >
                  <h3>
                    <a href="" class="stretched-link">Grading to Mythic 15</a>
                  </h3>
                  <div
                    class="d-flex justify-content-start align-items-center"
                    style="height: 100%"
                  >
                    <h3 class="text">Rp 200.000</h3>
                  </div>
                </div>
              </div>
            </div>
            <!-- End Feature Item -->
          </div>
          <!-- End Row -->
        </div>
        <!-- End Container -->
      </section>
      <!-- End Features Section -->

    <!-- Keranjang -->
    <div id="cart" class="cart">
      <div class="cart-header">
        <span>Keranjang Belanja</span>
        <i class="fas fa-times" onclick="toggleCart()"></i>
      </div>
      <div class="cart-body">
        <p id="cartContent">Keranjang masih kosong...</p>
        <div class="d-flex align-items-center mb-3">
          <button class="btn btn-secondary" id="decreaseBtn">-</button>
          <input type="number" id="itemQuantity" class="form-control mx-2" value="1" min="1" readonly style="width: 60px;">
          <button class="btn btn-secondary" id="increaseBtn">+</button>
        </div>
        <!-- Input Hidden untuk Produk yang Dipilih -->
        <input type="hidden" id="package-name" name="package_name">
        <input type="hidden" id="package-price" name="package_price">
        <input type="hidden" id="package-quantity" name="package_quantity">
        <input type="hidden" id="package-total" name="package_total">

        <button class="btn-warning" onclick="proceedToCheckout()">Beli Sekarang!</button>
        {{-- <button class="btn-warning" type="submit">Beli Sekarang!</button> --}}

      </div>
    </div>

    

    <!-- Bootstrap JS & Popper -->
    <script src="{{ asset('https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js')}}"></script>
    <script src="{{ asset('https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js')}}"></script>

    <script>
      let selectedPackageName = '';
      let selectedPackagePrice = 0;
      let quantity = 1;
      let isAuthenticated = @auth true @else false @endauth;  
      // Memeriksa status login
    
      // Fungsi untuk memilih paket
      function selectPackage(name, price, event) {
        event.preventDefault();
        event.stopPropagation();
    
        selectedPackageName = name;
        selectedPackagePrice = price;
        // Update nama dan harga paket yang dipilih
        updateCart();
        // Tampilkan keranjang jika belum muncul
        toggleCart(true);
      }
    
      // Fungsi untuk toggle keranjang
      function toggleCart(show = false) {
        const cart = document.getElementById('cart');
        if (show) {
          cart.classList.add('show');
        } else {
          cart.classList.remove('show');
        }
      }
    
      // Fungsi untuk memperbarui keranjang
      function updateCart() {
        const total = selectedPackagePrice * quantity;
        // Perbarui tampilan jumlah barang pada input
        document.getElementById('itemQuantity').value = quantity;
    
        // Perbarui isi keranjang
        document.getElementById('cartContent').innerHTML = `
          Paket: ${selectedPackageName} <br>
          Jumlah: ${quantity} item <br>
          Total: Rp ${total.toLocaleString()}
        `;  
      }
    
      // Mengatur jumlah barang
      document.getElementById('decreaseBtn').addEventListener('click', function (event) {
        event.preventDefault();
        if (quantity > 1) {
          quantity--;
          updateCart();
        } else {
          alert('Jumlah item tidak bisa kurang dari 1.');
        }
      });
    
      document.getElementById('increaseBtn').addEventListener('click', function (event) {
        event.preventDefault();
        quantity++;
        updateCart();
      });
    
      function proceedToCheckout() {
        // Periksa apakah user sudah memilih paket
        if (!selectedPackageName || !selectedPackagePrice || quantity <= 0) {
          alert('Pilih paket dan pastikan jumlahnya lebih dari 0 sebelum melanjutkan!');
          return;
        }
    
        // Cek form apakah sudah diisi
        const nameInput = document.getElementById('name');
        const whatsappInput = document.getElementById('whatsapp');
        const emailInput = document.getElementById('email');
        const passwordInput = document.getElementById('password');
        const loginViaInput = document.getElementById('loginVia');
        const catatanInput = document.getElementById('catatan');
    
        if (!nameInput.value || !whatsappInput.value || !emailInput.value || !passwordInput.value || !loginViaInput.value || !catatanInput.value) {
          // Jika ada field yang belum diisi, scroll ke form yang belum diisi
          if (!nameInput.value) {
            nameInput.scrollIntoView({ behavior: "smooth", block: "center" });
            nameInput.focus();
          } else if (!whatsappInput.value) {
            whatsappInput.scrollIntoView({ behavior: "smooth", block: "center" });
            whatsappInput.focus();
          } else if (!emailInput.value) {
            emailInput.scrollIntoView({ behavior: "smooth", block: "center" });
            emailInput.focus();
          } else if (!passwordInput.value) {
            passwordInput.scrollIntoView({ behavior: "smooth", block: "center" });
            passwordInput.focus();
          } else if (!loginViaInput.value) {
            loginViaInput.scrollIntoView({ behavior: "smooth", block: "center" });
            loginViaInput.focus();
          } else if (!catatanInput.value) {
            catatanInput.scrollIntoView({ behavior: "smooth", block: "center" });
            catatanInput.focus();
          }
          alert('Form akun harap dilengkapi sebelum melanjutkan!');
          return;
        }
    
        // Update input hidden
        document.getElementById('package-name').value = selectedPackageName;
        document.getElementById('package-price').value = selectedPackagePrice;
        document.getElementById('package-quantity').value = quantity;
        document.getElementById('package-total').value = selectedPackagePrice * quantity;
    
        // Submit form secara manual
        document.querySelector('form').submit();
    
        // Cek apakah pengguna sudah login
        if (!isAuthenticated) {
          // Jika pengguna belum login, arahkan mereka ke halaman login
          alert('Anda harus login terlebih dahulu untuk melanjutkan ke checkout!');
          window.location.href = "{{ route('login') }}";  // Ganti dengan route login Anda
        } else {
          // Jika pengguna sudah login, lanjutkan ke halaman checkout
          alert('Proses checkout dimulai!');
          window.location.href = "{{ route('dashboard/checkout') }}";
        }
      }
    </script>
    


      

      <script src="{{ asset('assets/dashboard/js/pemanis.js')}}"></script>

</form> 