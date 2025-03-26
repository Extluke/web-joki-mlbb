<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class LandingController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    //  penambahan Landing Controller untuk home
    // public function index()
    // {
    //     //
    //     return view('landing/home');
    // }


    // penambahan Landing Controller untuk checkout
    public function checkout()
    {
        if (!Auth::check()) {
            // Jika pengguna belum login, beri pesan flash dan redirect ke halaman login
            return redirect()->route('login')->with('alert', 'Anda harus login terlebih dahulu untuk melakukan pembelian.');
        }
        
        return view('dashboard/checkout');
    }


    // controler untuk menampilkan halaman nota ---------------------------------------------
    public function index()
{
    // Inisialisasi data transaksi dan progres
    $transactions = [];
    $progresData = [];
    $hasTerkendala = false;  // Default jika belum login
    $selesaiData = [];

    // Periksa apakah pengguna sudah login
    if (Auth::check()) {
        // Ambil email pengguna
        $userEmail = Auth::user()->email;

        // Ambil data dari tabel transaksi (status dibayar)
        $transactions = DB::table('transaksi')
            ->where('email', $userEmail)
            ->where('status_pembayaran', 'dibayar')
            ->orderBy('tanggal_dipesan', 'desc')
            ->get();

        // Ambil data dari tabel progres
        $progresData = DB::table('progres')
            ->select('id', 'dibeli', 'jumlah_dibeli', 'total', 'tanggal_dipesan', 'terkendala', 'progres')
            ->where('email', $userEmail)
            ->orderBy('tanggal_dipesan', 'desc')
            ->get()
            ->map(function ($progres) {
                // Tentukan status pengerjaan berdasarkan nilai kolom 'terkendala' dan 'progres'
                if (!is_null($progres->terkendala)) {
                    $progres->status_pengerjaan = "Terkendala: " . $progres->terkendala;
                } else {
                        // Jika progres null, hanya tampilkan 'Diproses'
                        if (is_null($progres->progres)) {
                            $progres->status_pengerjaan = "Diproses";
                        } else {
                            // Jika progres ada, tampilkan progres dengan jumlah star
                            $progres->status_pengerjaan = "Diproses: Progres " . $progres->progres . " Star";
                        }                
                    }
                return $progres;
            });

        // Periksa apakah ada data dengan status terkendala
        $hasTerkendala = $progresData->contains(function ($progres) {
            return !is_null($progres->terkendala);
        });

        // Ambil data dari tabel selesai (status selesai)
        $selesaiData = DB::table('selesai')
            ->where('email', $userEmail)
            ->orderBy('tanggal_dipesan', 'desc')
            ->get();
    }

    // Kirim data transaksi dan progres ke view
    return view('landing.home', compact('transactions', 'progresData', 'hasTerkendala', 'selesaiData'));
}


    

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}


