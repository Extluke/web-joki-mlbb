<?php

namespace App\Http\Controllers;

use App\Events\OrderCreated;
use App\Models\Progres;
use App\Models\Selesai;
use App\Models\Transaksi;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{

    function user()
    {
        return view("landing/home");
    }

    // ---------------------------------- dashboard --------------------------------
    // penambahan Landing Controller untuk admin
    public function admin()
    {
        // Menghitung jumlah pengguna dari tabel users
        $userCount = User::count();

        // Menghitung jumlah unik pengguna yang telah melakukan transaksi
        $emails = collect();
        // Ambil email unik dari Transaksi
        $emails = $emails->merge(Transaksi::distinct()->pluck('email'));
        // Ambil email unik dari Progres
        $emails = $emails->merge(Progres::distinct()->pluck('email'));
        // Ambil email unik dari Selesai
        $emails = $emails->merge(Selesai::distinct()->pluck('email'));
        // Ambil email yang unik dari gabungan ketiga tabel
        $uniqueEmails = $emails->unique();
        // Hitung jumlah email unik
        $uniqueUsers = $uniqueEmails->count();


        // mengambil data transaksi yang belum di konfirmasi
        $orderan = Transaksi::select('id', 'user_id', 'order_id', 'nama', 'email', 'total', 'status_pembayaran', 'tanggal_dipesan')
                             ->get();


        // mengambil track record data transaksi
        $dailySales = DB::table('transaksi')
        ->select(DB::raw('DATE(tanggal_dipesan) as date'), DB::raw('SUM(total) as total_sales'))
        ->where('status_pembayaran', 'dibayar') // Hanya transaksi yang dibayar
        ->groupBy(DB::raw('DATE(tanggal_dipesan)'))
        ->orderBy('date', 'asc')
        ->get();    

        //
        return view('admin/admin', compact('userCount', 'uniqueUsers', 'orderan', 'dailySales'));
    }

    //----------------------------------- belum dikonfirmasi -------------------------------
    // penambahan Landing Controller untuk menu admin tables bagian waiting list
    public function belum_dikonfirmasi()
    {
        //
        $orders = Transaksi::where('status_pembayaran', 'dibayar')->get();

        return view('admin/tables/belum_dikonfirmasi', compact('orders'));

    }














    //----------------------------------- dikonfirmasi -------------------------------------
     // penambahan Landing Controller untuk menu admin tables bagian on progres
     public function dikonfirmasi()
     {
         //
         // Ambil data dari tabel orders dengan status pengerjaan tidak mengandung 'terkendala'
        $orders = Progres::where('status_pengerjaan', 'NOT LIKE', '%terkendala%')->get();

         return view('admin/tables/dikonfirmasi', compact('orders'));
     }



// --------------------------------------updatate progres-------------------------------------
    //  penambahan fitur untuk update progres
     public function updateProgres(Request $request)
    {
        $request->validate([
            'id' => 'required|exists:progres,id',
            'progres' => 'required|integer|min:0|max:100',
        ]);

        $order = Progres::find($request->id);
        $order->progres = $request->progres;
        $order->save();

        return response()->json(['success' => true, 'message' => 'Progres berhasil diperbarui.']);
    }


// ------------------------------------update nilai kendala------------------------------------------
    // update nilai terkendala
    public function updateKendala(Request $request)
    {
        try {
            // Validasi input
            $request->validate([
                'id' => 'required|exists:progres,id',
                'terkendala' => 'required|string|max:255',
            ]);
    
            // Cari order berdasarkan ID
            $order = Progres::find($request->id);
            if (!$order) {
                return response()->json(['success' => false, 'message' => 'Order tidak ditemukan.']);
            }
    
            // Update kolom terkendala dan status pengerjaan
            $order->terkendala = $request->terkendala;
            $order->status_pengerjaan = 'Terkendala';
            $order->save();
    
            return response()->json(['success' => true, 'message' => 'Catatan kendala berhasil diperbarui.']);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => 'Kesalahan server: ' . $e->getMessage()], 500);
        }
    }


    // --------------------------------------------selesai-----------------------------------------------------------
    // fungsi untuk menyelesaikan transaksi
    public function complete($id)
{
    try {
        // Cari data order berdasarkan ID
        $order = DB::table('progres')->where('id', $id)->first();

        if (!$order) {
            return redirect()->back()->with('error', 'Data order tidak ditemukan.');
        }

        // Pindahkan data ke tabel selesai
        DB::table('selesai')->insert([
            'user_id' => $order->user_id,
            'order_id' => $order->order_id,
            'nama' => $order->nama,
            'email' => $order->email,
            'wa' => $order->wa,
            'email_game' => $order->email_game,
            'password_game' => $order->password_game,
            'catatan' => $order->catatan,
            'login_via' => $order->login_via,
            'dibeli' => $order->dibeli,
            'jumlah_dibeli' => $order->jumlah_dibeli,
            'total' => $order->total,
            'status_pembayaran' => $order->status_pembayaran,
            'tanggal_dipesan' => $order->tanggal_dipesan,
            'status_pengerjaan' => 'Selesai', // Ubah status menjadi "Selesai"
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // Hapus data dari tabel progres
        DB::table('progres')->where('id', $id)->delete();

        return redirect()->back()->with('success', 'Order berhasil diselesaikan dan dipindahkan ke tabel selesai.');
    } catch (\Exception $e) {
        return redirect()->back()->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
    }
}


        


















     //----------------------------------- terkendala -------------------------------------
     // penambahan Landing Controller untuk menu admin tables bagian on progres
     public function terkendala()
     {
         $progresTerkendala = Progres::whereNotNull('terkendala')->get();

         return view('admin.tables.terkendala', compact('progresTerkendala'));
     }


     //---------------------------------update masalah kendala------------------------------
     public function updateTerkendala(Request $request)
        {
            try {
                $request->validate([
                    'id' => 'required|exists:progres,id',
                    'terkendala' => 'required|string|max:255',
                ]);

                $progres = Progres::find($request->id);
                $progres->terkendala = $request->terkendala;
                $progres->save();

                return response()->json(['success' => true, 'message' => 'Catatan kendala berhasil diperbarui.']);
            } catch (\Exception $e) {
                return response()->json(['success' => false, 'message' => $e->getMessage()], 500);
            }
        }


        // ----------------------------------------- selesaikan kendala ---------------------------------------
        // kontroler untuk menyelesaikan kendala
        public function selesaikanKendala($id)
        {
            try {
                $progres = Progres::findOrFail($id);
                $progres->status_pengerjaan = 'diproses';
                $progres->terkendala = null;
                $progres->save();
        
                return redirect()->back()->with('success', 'Kendala berhasil diselesaikan.');
            } catch (\Exception $e) {
                return redirect()->back()->with('error', 'Terjadi kesalahan, coba lagi.');
            }
        }
        


    
    








     //----------------------------------- selesai -------------------------------------
     // penambahan Landing Controller untuk menu admin tables bagian on progres
     public function selesai()
     {
        $selesai = Selesai::all();
        return view('admin.tables.selesai', compact('selesai'));
     }












    // -----------------------------------navbar--------------------------------------------
    public function __construct()
{
    // Middleware untuk menghitung jumlah data untuk setiap tabel
    $this->middleware(function ($request, $next) {
        $belumDikonfirmasiCount = Transaksi::where('status_pengerjaan', 'menunggu konfirmasi')->count();
        $dikonfirmasiCount = Progres::where('status_pengerjaan', 'NOT LIKE', '%terkendala%')->count();
        $terkendalaCount = Progres::whereNotNull('terkendala')->count();
        $selesaiCount = Selesai::count();

        // Menyimpan jumlah data ke view global
        view()->share('belumDikonfirmasiCount', $belumDikonfirmasiCount);
        view()->share('dikonfirmasiCount', $dikonfirmasiCount);
        view()->share('terkendalaCount', $terkendalaCount);
        view()->share('selesaiCount', $selesaiCount);

        return $next($request);
    });
}


    //  notification
     // Tambahkan event saat order dibuat atau status pembayaran diubah ke "dibayar"  
    // public function updateStatusPembayaran(Request $request, $id)
    // {
    //     $order = Transaksi::find($id);

    //     if (!$order) {
    //         return response()->json(['message' => 'Order tidak ditemukan'], 404);
    //     }

    //     $order->status_pembayaran = 'dibayar';
    //     $order->save();

    //     // Trigger event
    //     event(new OrderCreated($order));

    //     return response()->json(['message' => 'Status pembayaran berhasil diperbarui']);
    // }

            public function konfirmasi($id)
        {
            // Ambil data transaksi
            $transaksi = Transaksi::findOrFail($id);

            // Pindahkan data ke tabel progres
            DB::table('progres')->insert([
                'user_id' => $transaksi->user_id,
                'order_id' => $transaksi->order_id,
                'nama' => $transaksi->nama,
                'email' => $transaksi->email,
                'wa' => $transaksi->wa,
                'email_game' => $transaksi->email_game,
                'password_game' => $transaksi->password_game,
                'catatan' => $transaksi->catatan,
                'login_via' => $transaksi->login_via,
                'dibeli' => $transaksi->dibeli,
                'jumlah_dibeli' => $transaksi->jumlah_dibeli,
                'total' => $transaksi->total,
                'status_pembayaran' => $transaksi->status_pembayaran,
                'tanggal_dipesan' => $transaksi->tanggal_dipesan,
                'status_pengerjaan' => 'diproses',
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            // Hapus data dari tabel transaksi
            $transaksi->delete();

            return redirect()->back()->with('success', 'Order berhasil dikonfirmasi!');
        }





        



    
}
