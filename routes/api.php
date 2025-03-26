<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\PaymentController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


// ----------------After Payment-----------------------
Route::post('/midtrans-callback', [PaymentController::class, 'callback'])->name('callback');

// route untuk belum konfirmasi menampilkan dan menyimpannya ke dalam kolom progres
Route::get('/belum_konfirmasi', [AdminController::class, 'getBelumKonfirmasi']);
Route::post('/konfirmasi/{id}', [AdminController::class, 'konfirmasiOrder']);


