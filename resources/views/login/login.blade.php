<!--
=========================================================
Login Form Bootstrap 1
=========================================================

Product Page: https://uifresh.net
Copyright 2021 UIFresh (https://uifresh.net)
Coded by UIFresh

=========================================================
The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software. -->
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" type="image/png" href="{{ asset('assets/login/img/favicon.png')}}">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('assets/login/css/bootstrap.min.css')}}">
    <!-- FontAwesome CSS -->
    <link rel="stylesheet" href="{{ asset('assets/login/css/all.min.css')}}">
    <link rel="stylesheet" href="{{ asset('assets/login/css/uf-style.css')}}">
    <title>Login</title>
  </head>
  <body>
    <div class="uf-form-signin">
      <div class="text-center">
        <a href="https://uifresh.net/"><img src="{{ asset('assets/login/img/logo-fb.png')}}" alt="" width="100" height="100"></a>
      <h1 class="text-white h3">Login</h1>
      </div>
      {{-- form login start --}}
      <form class="mt-4" action="{{ route('proses_login') }}" method="POST">
        @csrf
        {{-- pesan eror untuk email --}}
        @error('email')
        <div id="alert-box" class="alert alert-danger alert-dismissible fade show" role="alert">{{ $message }}</div>
        @enderror
        {{-- pesan eror untuk password --}}
        @error('password')
        <div id="alert-box" class="alert alert-danger alert-dismissible fade show" role="alert">{{ $message }}</div>
        @enderror
        <!-- Global Error Message (for incorrect email/password) -->
          @if ($errors->has('login'))
            <div id="alert-box" class="alert alert-danger alert-dismissible fade show" role="alert">{{ $errors->first('login') }}</div>
          @endif
          {{-- alert untuk yang mau beli tapi belum login --}}
          @if(session('alert'))
            <script type="text/javascript">
            alert("{{ session('alert') }}");
            </script>
          @endif


          {{-- js untuk aler --}}
          <script>
            // Function to hide the alert after 10 seconds
            setTimeout(function() {
                var alerts= document.querySelectorAll('.alert');
                alerts.forEach(function(alert) {
                alert.classList.remove('show');
                alert.classList.add('fade');
            });
            }, 5000); // 10 seconds (10000 milliseconds)
        </script>


        {{-- form isian start --}}
             @if (session('success'))
                  <div class="alert alert-success">
                    {{ session('success') }}
                  </div>
            @endif

        <div class="input-group uf-input-group input-group-lg mb-3">
          <span class="input-group-text fa fa-user"></span>
          <input type="email" name="email" class="form-control" placeholder="Masukkan Email">
        </div>

        <div class="input-group uf-input-group input-group-lg mb-3">
          <span class="input-group-text fa fa-lock"></span>
          <input type="password" name="password" class="form-control" placeholder="Password">
        </div>
      
        {{-- form isian end --}}

        <div class="d-grid mb-4">
          <button type="submit" name="submit" class="btn uf-btn-primary btn-lg">Login</button>
        </div>
        
        <div class="mt-4 text-center">
          <span class="text-white">Belum punya akun?</span>
          <a href="/register">Daftar</a>
        </div>
      </form>
    </div>

    <!-- JavaScript -->

    <!-- Separate Popper and Bootstrap JS -->
    <script src="{{ asset('assets/login/js/popper.min.js')}}"></script>
    <script src="{{ asset('assets/login/js/bootstrap.min.js')}}"></script>
  </body>
</html>