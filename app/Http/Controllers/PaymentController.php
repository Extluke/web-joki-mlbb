<?php

namespace App\Http\Controllers;

use App\Events\OrderCreated;
use App\Jobs\BroadcastOrderCreated;
use App\Models\Transaksi;
use Faker\Core\Uuid;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Broadcast;
use Illuminate\Support\Facades\DB;
use PhpParser\Node\NullableType;
use Pusher\Pusher;
use Ramsey\Uuid\Codec\OrderedTimeCodec;

class PaymentController extends Controller
{



    //fungsi untuk memindahkan data ke session dan membuat token snap midtrans serta memindahkan datanya ke database
    public function session(Request $request)
{
    // validasi input
    $validated = $request->validate([

            'nama' => 'required|string',
            'wa' => 'required|string',
            'email_game' => 'nullable|email',
            'password_game' => 'required|string',
            'login_via' => 'required|string',
            'catatan' => 'nullable|string',

            'package_quantity' => 'required',
            'package_name' => 'required',
            'package_price' => 'required|numeric',
            'package_total' => 'required|numeric',
    ]);

        //creating order id
        $orderId = 'ORDER-' . Auth::id() . '-' . now()->format('YmdHis');

        // creating token biar sekalian
            //SAMPLE REQUEST START HERE

        // Set your Merchant Server Key
        \Midtrans\Config::$serverKey = config('midtrans.server_key');
        // Set to Development/Sandbox Environment (default). Set to true for Production Environment (accept real transaction).
        \Midtrans\Config::$isProduction = false;
        // Set sanitization on (default)
        \Midtrans\Config::$isSanitized = true;
        // Set 3DS transaction for credit card to true
        \Midtrans\Config::$is3ds = true;

        $params = array(
                'transaction_details' => array(
                'order_id' => $orderId,
                'gross_amount' => $validated['package_total'],
            ),
                'customer_details' => array(
                'first_name' => $validated['nama'],
                'email' => Auth::user()->email,
                'phone' =>  $validated['wa'],
            ),
        );
            $snapToken = \Midtrans\Snap::getSnapToken($params);

                DB::table('transaksi')->insert([
                    'user_id' => Auth::id(),
                    'order_id' => $orderId,
                    'nama' => Auth::user()->name,
                    'email' => Auth::user()->email,

                    'wa' => $validated['wa'],
                    'email_game' => $validated['email_game'],
                    'password_game' => $validated['password_game'],
                    'login_via' => $validated['login_via'],
                    'catatan' => $validated['catatan'],
                    'jumlah_dibeli' => $validated['package_quantity'],
                    'dibeli' => $validated['package_name'], 
                    'total' => $validated['package_total'],
                    'status_pembayaran' => 'belum dibayar',
                    'tanggal_dipesan' => now(),
                    'status_pengerjaan' => 'menunggu konfirmasi',
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);

                // Ambil data transaksi berdasarkan order_id
                $transaction = DB::table('transaksi')->where('order_id', $orderId)->first();

               
                return view('dashboard.checkout', compact('snapToken', 'orderId', 'transaction'));
            }









            //controller untuk callback
            public function callback(Request $request) {
                $serverKey = config('midtrans.server_key');
                $grossAmount = number_format($request->gross_amount, 2, '.', '');
                $hashed = hash("sha512", $request->order_id . $request->status_code . $request->gross_amount . $serverKey);

                if ($hashed !== $request->signature_key) {
                    return response()->json([
                        'message' => 'Invalid signature',
                        'calculated_signature' => $hashed,
                        'provided_signature' => $request->signature_key,
                    ], 403);
                }

                if ($request->transaction_status == 'capture' || $request->transaction_status == 'settlement') {
                    try {
                        DB::table('transaksi')
                            ->where('order_id', $request->order_id)
                            ->update([
                                'status_pembayaran' => 'dibayar',
                                'updated_at' => now(),
                            ]);


                            // Ambil data transaksi terbaru
                            $transaction = DB::table('transaksi')->where('order_id', $request->order_id)->first();

                            // Setup Pusher untuk broadcast event
                            $pusher = new Pusher(
                                config('broadcasting.connections.pusher.key'),
                                config('broadcasting.connections.pusher.secret'),
                                config('broadcasting.connections.pusher.app_id'),
                                [
                                    'cluster' => config('broadcasting.connections.pusher.options.cluster'),
                                    'useTLS' => true
                                ]
                            );

                            // Trigger event untuk mengupdate status pembayaran di frontend
                            $pusher->trigger('order-channel', 'OrderUpdated', [
                                'transaction' => $transaction, // Kirimkan data transaksi yang sudah terupdate
                            ]);


                           


                        return response()->json(['message' => 'Transaction updated successfully'], 200);
                    } catch (\Exception $e) {
                        return response()->json(['message' => 'Error updating transaction: ' . $e->getMessage()], 500);
                    }
                } elseif (in_array($request->transaction_status, ['deny', 'cancel', 'expire'])) {
                    DB::table('transaksi')
                        ->where('order_id', $request->order_id)
                        ->update([
                            'status_pembayaran' => 'gagal', 
                            'updated_at' => now(),
                        ]);
                    return response()->json(['message' => 'Transaction failed or expired'], 400);
                }

                return response()->json(['message' => 'Invalid transaction status'], 400);
            }







                            
                public function payment(Request $request, $orderId)
                {
                    // Ambil data transaksi berdasarkan orderId
                    $transaction = DB::table('transaksi')->where('order_id', $orderId)->first();
                    dd($transaction);  // Untuk mengecek apakah data ditemukan

                    if (!$transaction) {
                        abort(404, 'Transaksi tidak ditemukan');
                    }

                    // Pass data transaksi ke view
                    return view('dashboard.checkout', [
                        'transaction' => $transaction, 
                        'snapToken' => $transaction->snap_token // Pastikan snap_token tersimpan
                    ]);

                }

};
