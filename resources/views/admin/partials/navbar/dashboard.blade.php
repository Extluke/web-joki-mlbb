     <!-- Sidebar/ navbar start -->
     <div class="sidebar" data-background-color="dark">
      <div class="sidebar-logo">
        <!-- Logo Header -->
        <div class="logo-header" data-background-color="dark">
          <a href="{{ asset('index.html')}}" class="logo d-flex align-items-center">
            <!-- Uncomment the line below if you also wish to use an image logo -->
            <!-- <img src="assets/img/logo.png" alt=""> -->
            <h1 class="sitename">EZ Gaming</h1>
          </a>
          <div class="nav-toggle">
            <button class="btn btn-toggle toggle-sidebar">
              <i class="gg-menu-right"></i>
            </button>
            <button class="btn btn-toggle sidenav-toggler">
              <i class="gg-menu-left"></i>
            </button>
          </div>
          <button class="topbar-toggler more">
            <i class="gg-more-vertical-alt"></i>
          </button>
        </div>
        <!-- End Logo Header -->
      </div>
    
      <!-- Navbar Start-->
      <div class="sidebar-wrapper scrollbar scrollbar-inner">
        <div class="sidebar-content">
          <ul class="nav nav-secondary">
            
            <!-- Halaman Utama Start -->
      <li class="nav-item" id="halaman-utama-nav">
        <a href="{{ route('admin') }}">
          <i class="fas fa-desktop"></i>
          <p>Halaman Utama</p>
          <span class="badge badge-success"></span>
        </a>
      </li>

      <!-- Tables Start -->
      <li class="nav-item" id="tables-nav">
        <a data-bs-toggle="collapse" href="#tables">
          <i class="fas fa-table"></i>
          <p>Tables</p>
          <span class="caret"></span>
          <!-- Menambahkan badge notifikasi jika ada entri -->
          @if ($belumDikonfirmasiCount > 0 || $dikonfirmasiCount > 0 || $terkendalaCount > 0 || $selesaiCount > 0)
            <span class="badge badge-success">
              {{ $belumDikonfirmasiCount + $dikonfirmasiCount + $terkendalaCount + $selesaiCount }}
            </span>
          @endif
        </a>
        <div class="collapse" id="tables">
          <ul class="nav nav-collapse">
            <li id="belum-dikonfirmasi-nav">
              <a href="{{ route('belum-dikonfirmasi') }}">
                <span class="sub-item">Belum Dikonfirmasi</span>
                <!-- Tampilkan badge jika jumlah lebih dari 0 -->
                @if($belumDikonfirmasiCount > 0)
                <span class="badge badge-success">{{ $belumDikonfirmasiCount }}</span>
                @endif
              </a>
            </li>
            <li id="dikonfirmasi-nav">
              <a href="{{ route('dikonfirmasi') }}">
                <span class="sub-item">Dikonfirmasi</span>
                <!-- Tampilkan badge jika jumlah lebih dari 0 -->
                @if($dikonfirmasiCount > 0)
                <span class="badge badge-success">{{ $dikonfirmasiCount }}</span>
                @endif
              </a>
            </li>
            <li id="terkendala-nav">
              <a href="{{ route('terkendala') }}">
                <span class="sub-item">Terkendala</span>
                <!-- Tampilkan badge jika jumlah lebih dari 0 -->
                @if($terkendalaCount > 0)
                <span class="badge badge-success">{{ $terkendalaCount }}</span>
                @endif
              </a>
            </li>
            <li id="selesai-nav">
              <a href="{{ route('selesai') }}">
                <span class="sub-item">Selesai</span>
                 <!-- Tampilkan badge jika jumlah lebih dari 0 -->
                 @if($selesaiCount > 0)
                 <span class="badge badge-success">{{ $selesaiCount }}</span>
                 @endif
              </a>
            </li>
          </ul>
        </div>
      </li>
      <!-- Tables End -->
    
    
              <!-- header start -->
            <li>
              <div class="collapse" id="base">
                <ul class="nav nav-collapse">
                  <li>
                    <a href="components/avatars.html">
                      <span class="sub-item">Avatars</span>
                    </a>
                  </li>
                  <li>
                    <a href="components/buttons.html">
                      <span class="sub-item">Buttons</span>
                    </a>
                  </li>
                  <li>
                    <a href="components/gridsystem.html">
                      <span class="sub-item">Grid System</span>
                    </a>
                  </li>
                  <li>
                    <a href="components/panels.html">
                      <span class="sub-item">Panels</span>
                    </a>
                  </li>
                  <li>
                    <a href="components/notifications.html">
                      <span class="sub-item">Notifications</span>
                    </a>
                  </li>
                  <li>
                    <a href="components/sweetalert.html">
                      <span class="sub-item">Sweet Alert</span>
                    </a>
                  </li>
                  <li>
                    <a href="components/font-awesome-icons.html">
                      <span class="sub-item">Font Awesome Icons</span>
                    </a>
                  </li>
                  <li>
                    <a href="components/simple-line-icons.html">
                      <span class="sub-item">Simple Line Icons</span>
                    </a>
                  </li>
                  <li>
                    <a href="components/typography.html">
                      <span class="sub-item">Typography</span>
                    </a>
                  </li>
                </ul>
              </div>
            </li>
             <!-- end header -->
    
              <!-- pertanyaan start -->
               <!-- pertanyaan end -->
               
          </ul>
        </div>
      </div>
    </div>
    <!-- End Sidebar -->

  <script>
  const currentUrl = window.location.pathname;
console.log(currentUrl);  // Cek URL yang sedang aktif

// Hapus kelas active dari semua elemen sebelumnya
document.querySelectorAll('.nav-item').forEach(item => {
  item.classList.remove('active');
});

// Cek URL dan tambahkan kelas active ke elemen yang sesuai
if (currentUrl.includes('/admin/admin')) {
  document.getElementById('halaman-utama-nav').classList.add('active');
  console.log("Halaman Utama Active");
} else if (currentUrl.includes('/admin/tables/belum_dikonfirmasi') || 
           currentUrl.includes('/admin/tables/dikonfirmasi') || 
           currentUrl.includes('/admin/tables/terkendala') || 
           currentUrl.includes('/admin/tables/selesai')) {
  // Jika URL termasuk bagian tabel, tambahkan active pada "Tables" juga
  document.getElementById('tables-nav').classList.add('active');
  console.log("Tables Active");

  // Menambahkan active pada sub-menu berdasarkan halaman yang diakses
  if (currentUrl.includes('/admin/tables/belum_dikonfirmasi')) {
    document.getElementById('belum-dikonfirmasi-nav').classList.add('active');
    console.log("Belum Dikonfirmasi Active");
  } else if (currentUrl.includes('/admin/tables/dikonfirmasi')) {
    document.getElementById('dikonfirmasi-nav').classList.add('active');
    console.log("Dikonfirmasi Active");
  } else if (currentUrl.includes('/admin/tables/terkendala')) {
    document.getElementById('terkendala-nav').classList.add('active');
    console.log("Terkendala Active");
  } else if (currentUrl.includes('/admin/tables/selesai')) {
    document.getElementById('selesai-nav').classList.add('active');
    console.log("Selesai Active");
  }
}


  </script>