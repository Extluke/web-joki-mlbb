<?php

use App\Events\OrderCreated;
use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;

// Penambahan Jalur yang kita ubah di app/http/controllers/
// Untuk Jalur Home
use App\Http\Controllers\LandingController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\SessionController;
use Database\Seeders\DummyAdmin;
use Illuminate\Contracts\Session\Session;
use Illuminate\Database\Eloquent\MassAssignmentException;
use Pusher\Pusher;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
// Url untuk home page
Route::get('/', [LandingController::class, 'index'])->name('/');

// url untuk register
Route::get('register', [LandingController::class, 'register'])->name('login/register');



  // ----- midleware untuk hanya tamu yang bisa melakukan login(belum melakukan login) ------
  Route::middleware(['guest'])->group(function () {
  // url untuk login
  Route::get('login', [SessionController::class, 'login'])->name('login');

  Route::post('proses_login', [SessionController::class, 'proses_login'])->name('proses_login');
  });

// untuk mengarahkan user yang sudah login akan diarahkan ke halaman landing
Route::get('/home', function () {
  return redirect('/');
});

// route untuk logout
Route::middleware(['auth'])->post('logout', [SessionController::class, 'logout'])->name('logout');

// Route untuk user biasa 
// Route::middleware(['auth'])->get('/', [AdminController::class, 'user'])->name('home');

// -------------------- Route untuk sesi login selesai ----------------------------------
//-------- Route untuk pembatasan akses checkout untuk para tamu ( belum login ) ------------
Route::middleware('auth')->get('checkout', [LandingController::class, 'checkout'])->name('dashboard/checkout');






























// --------- url untuk register ------------
Route::post('/register', [SessionController::class, 'proses_registrasi'])->name('proses.registrasi');
Route::get('/register', [SessionController::class, 'register'])->name('register');



// route untuk menampilkan halaman authenticator
Route::get('login/authentication',[SessionController::class, 'autentikasi'])->name('authentikasi');


// route untuk kirim ulang token
// routes/web.php
Route::post('resend-token', [SessionController::class, 'resendToken'])->name('resend.token');
Route::post('verify-token', [SessionController::class, 'verifyToken'])->name('verify.token');


































// ------------Payment Gateway ------------------------
// memindahkan data user ke session
Route::post('/post-session', [PaymentController::class, 'session'])->name('post.session');

// menampilkan halaman payment gateway
// Route::get('dashboard.checkout', [PaymentController::class, 'payment'])->name('payment.sekarang');
Route::get('dashboard/checkout', [PaymentController::class, 'payment'])->name('payment.sekarang'); 

// ------------------------- admin -------------------------------------------------
// pendaftaran midleware untuk pembatasan akses 
// Route untuk admin, hanya bisa diakses oleh admin
Route::middleware(['auth', 'akses:admin'])->get('admin/admin', [AdminController::class, 'admin'])->name('admin');



// ------------------------------------------------- belum dikonfirmasi ------------------------------------------------------------------
// Pendaftaran untuk route waiting list
Route::middleware(['auth', 'akses:admin'])->get('admin/tables/belum_dikonfirmasi', [AdminController::class, 'belum_dikonfirmasi'])->name('belum-dikonfirmasi');

// membuat button konfirmasi dan menghapusnya dri database
Route::post('/admin/orders/{id}/konfirmasi', [AdminController::class, 'konfirmasi'])->name('order.konfirmasi');















//------------------------------------------------- dikonfirmasi ----------------------------------------------------------------------
// Pendaftaran untuk route on progres
Route::middleware(['auth', 'akses:admin'])->get('admin/tables/dikonfirmasi', [AdminController::class, 'dikonfirmasi'])->name('dikonfirmasi');


// Pendaftaran route untuk update progres
Route::post('/order/update-progres', [AdminController::class, 'updateProgres'])->name('order.updateProgres');



// pendaftaran untuk route terkendala
Route::post('/order/update-kendala', [AdminController::class, 'updateKendala'])->name('order.updateKendala');

//pendaftaran untuk route mengirim ke tabel selesai
Route::post('/order/complete/{id}', [AdminController::class, 'complete'])->name('order.complete');




















//------------------------------------------------- terkendala ----------------------------------------------------------------------
// Pendaftaran untuk route on progres
Route::middleware(['auth', 'akses:admin'])->get('admin/tables/terkendala', [AdminController::class, 'terkendala'])->name('terkendala');

Route::post('/progres/update-terkendala', [AdminController::class, 'updateTerkendala'])->name('progres.updateTerkendala');
Route::post('/progres/selesaikan-kendala/{id}', [AdminController::class, 'selesaikanKendala'])->name('progres.selesaikanKendala');





















//------------------------------------------------- selesai ----------------------------------------------------------------------
// Pendaftaran untuk route on progres
Route::middleware(['auth', 'akses:admin'])->get('admin/tables/selesai', [AdminController::class, 'selesai'])->name('selesai');









// url untuk admin
// Route::get('admin', [LandingController::class, 'admin'])->name('admin/admin');

// url untuk menu admin tables bagian waiting list
// Route::get('waiting_list', [LandingController::class, 'waiting_list'])->name('admin/tables/waiting_list');

// url untuk menu admin tables bagian on progres
// Route::get('onprogres', [LandingController::class, 'onproges'])->name('admin/on/on_progres');

// url untuk menu admin pertanyaan
// Route::get('pertanyaan', [LandingController::class, 'pertanyaan'])->name('admin/pertanyaan/pertanyaan');


