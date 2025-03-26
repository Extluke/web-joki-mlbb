<header id="header" class="header d-flex align-items-center fixed-top">
  <div
    class="container-fluid container-xl position-relative d-flex align-items-center justify-content-between"
  >
    <a href="{{ asset('index.html')}}" class="logo d-flex align-items-center">
      <!-- Uncomment the line below if you also wish to use an image logo -->
      <!-- <img src="assets/img/logo.png" alt=""> -->
      <h1 class="sitename">EZ Gaming</h1>
    </a>

    <nav id="navmenu" class="navmenu">
      <ul>
        <li><a href="#hero" class="active">Home</a></li>
        <li><a href="#about">About</a></li>
        <li><a href="#form-akun">Form Akun</a></li>
        <li class="dropdown">
          <a href="#features"
            ><span>Paket joki</span>
            <i class="bi bi-chevron-down toggle-dropdown"></i
          ></a>
          <ul>
            <li><a href="#features">Per Bintang</a></li>
            <li><a href="#package1">Per 5 Bintang</a></li>
            <li><a href="#package6">Paket Rank</a></li>
          </ul>
        </li>
        <li><a href="#faq">Q&A</a></li>
        <li><a href="#contact">Contact</a></li>

        {{-- button untuk tamu yang belum login --}}
        @guest
        <li><a href="/login">Login</a></li>
        <li><a href="/register">Register</a></li> 
        @endguest

        @auth
        <li>Halo {{ Auth::user()->name }}</li>
        <li><a href="#" id="logout-link">Logout</a></li>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
          @csrf
       </form>
        @endauth

        {{-- js --}}
        {{-- Tambahkan script di bawah ini di dalam template Blade yang sesuai --}}
<script>
  document.getElementById('logout-link').addEventListener('click', function(event) {
      event.preventDefault();  // Mencegah default action link
      document.getElementById('logout-form').submit();  // Kirimkan form logout
  });
</script>


      </ul>
      <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
    </nav>
  </div>
</header>