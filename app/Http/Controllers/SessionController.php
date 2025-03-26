<?php

namespace App\Http\Controllers;

use App\Mail\VerificationEmail;
use App\Models\User;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Auth\Notifications\VerifyEmail;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use PhpParser\Node\Expr\Cast\String_;
use Stringable;

class SessionController extends Controller
{
    // controller untuk halaman utama 
    function login() 
    {
        return view("login/login");
    }

    
    // controller untuk halaman login
    function proses_login(Request $request) 
    {
        $request->validate([    
            'email'=>'required',
            'password'=>'required'
        ],[
            // jika tidak diisi maka akan menampilkan berikut
            'email.required'=>'email wajib diisi!!',
            'password.required'=>'password wajib diisi!!'
        ]);
        // membuat variabel info login untuk meminta request
        $infologin = [
            'email' => $request->email,
            'password' => $request->password
        ];


        if (Auth::attempt($infologin)) {
            // Kalau autentikasi sukses
            if (Auth::user()->role == 'admin') {
                return redirect('admin/admin');
            } else if (Auth::user()->role == 'user') {
                return redirect('/');
            }
        } else {
            // Kalau autentikasi gagal
            return back()->withErrors(['login' => 'Email atau password salah']); // Menampilkan error umum
        }
    }
    // controlerr untuk halaman logout
    function logout() {
        Auth::logout();
        return redirect()->route('login');
    }









    
    // controller untuk halaman register
    public function register()
    {
        //
        return view('login/register');
    }

    public function proses_registrasi(Request $request) 
    {
        // Validasi input
    $validated = $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|string|email|max:255|unique:users',
        'password' => 'required|string|min:6|confirmed',
    ]);

    // Buat user baru
    $user = new User();
    $user->name = $validated['name'];
    $user->email = $validated['email'];
    $user->password = Hash::make($validated['password']); // Enkripsi password
    // $user->email_verification_token = String::random(60);
    $user->save(); // Simpan ke database

    // Redirect ke halaman login dengan pesan sukses
    return redirect()->route('login')->with('success', 'User berhasil dibuat. Silakan login!');
    }


























    // untuk menampilkan halaman authentifikasi
    public function autentikasi(Request $request) 
    {
        return view('login.authentication');
    }

    
}
