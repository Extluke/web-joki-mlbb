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
    <link rel="stylesheet" href="{{ asset('assets/login/css/bootstrap.min.css')}}">
    <!-- FontAwesome CSS -->
    <link rel="stylesheet" href="{{ asset('assets/login/css/all.min.css')}}">
    <link rel="stylesheet" href="{{ asset('assets/login/css/uf-style.css')}}">
    <title>Register</title>
  </head>
  <body>
    <div class="uf-form-signin">
      <div class="text-center">
        <a href="https://uifresh.net/"><img src="{{ asset('assets/login/img/logo-fb.png')}}" alt="" width="100" height="100"></a>
        <h1 class="text-white h3">Konfirmasi Email</h1>
      </div>

      <form class="mt-4" action="{{ route('verify.token') }}" method="POST">
        @csrf

        {{-- Pesan error jika token tidak valid --}}
        @error('token')
        <div id="alert-box" class="alert alert-danger alert-dismissible fade show" role="alert">{{ $message }}</div>
        @enderror

        <!-- Global Error Message (for incorrect token) -->
        @if ($errors->has('token_invalid'))
          <div id="alert-box" class="alert alert-danger alert-dismissible fade show" role="alert">{{ $errors->first('token_invalid') }}</div>
        @endif

        <div class="input-group uf-input-group input-group-lg mb-3">
          <span class="input-group-text fa fa-key"></span>
          <input type="text" name="token" class="form-control" placeholder="Masukkan Token Verifikasi" required>
        </div>

        <div class="d-grid mb-3">
          <button type="submit" class="btn uf-btn-primary btn-lg">Verifikasi</button>
        </div>

        <div class="d-grid mb-4">
          <button type="button" class="btn btn-link" onclick="resendToken()">Kirim Ulang Token</button>
        </div>

        <div class="mt-4 text-center">
          <span class="text-white">Sudah memiliki akun?</span>
          <a href="{{ route('login') }}">Login</a>
        </div>
      </form>
    </div>

    <!-- JavaScript -->
    <script src="{{ asset('assets/login/js/popper.min.js') }}"></script>
    <script src="{{ asset('assets/login/js/bootstrap.min.js') }}"></script>

    <script>
      // Fungsi untuk mengirim ulang token verifikasi
      function resendToken() {
        fetch("{{ route('resend.token') }}", {
          method: "POST",
          headers: {
            "Content-Type": "application/json",
            "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').content
          },
          body: JSON.stringify({
            email: "{{ old('email') }}"
          })
        })
        .then(response => response.json())
        .then(data => {
          alert(data.message);  // Tampilkan pesan konfirmasi
        })
        .catch(error => {
          console.error("Error:", error);
          alert("Terjadi kesalahan saat mengirim ulang token.");
        });
      }
    </script>
</body>

</html>