// JS untuk QRIS
// Contoh menggunakan PHP dan Midtrans
require_once 'Midtrans.php';

// Set API key
Midtrans\Config::$serverKey = 'your_server_key';
Midtrans\Config::$isProduction = false; // set to true in production

// Buat objek transaksi
$transaction = [
    'payment_type' => 'qris',
    'transaction_details' => [
        'order_id' => 'order123',
        'gross_amount' => 50000,
    ],
];

// Kirim request untuk membuat transaksi
try {
    $snapToken = Midtrans\Snap::getSnapToken($transaction);
    // Menampilkan token atau QRIS untuk ditampilkan
    echo 'Token QRIS: ' . $snapToken;
} catch (Exception $e) {
    echo 'Error: ' . $e->getMessage();
}


// JS untuk pembayaran sukses
$json = file_get_contents('php://input');
$data = json_decode($json, true);

// Cek status transaksi
if ($data['transaction_status'] === 'settlement') {
    // Pembayaran berhasil
    echo "Pembayaran berhasil! Kembali ke halaman utama...";
    // Redirect ke halaman utama
    header('Location: /home');
    exit();
} else {
    // Pembayaran gagal
    echo "Pembayaran gagal!";
}
