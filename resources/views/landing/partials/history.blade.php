

<style>
    body {
        background-color: #f8f9fa;
        color: #040677;
    }

    .transaction-table {
        background-color: #fff;
        border-radius: 8px;
        padding: 20px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }

    .transaction-table h2 {
        color: #040677;
    }

    .table th {
        background-color: #040677;
        color: #fff;
        text-align: center;
    }

    .table td {
        text-align: center;
        vertical-align: middle;
    }

    .table tbody tr:hover {
        background-color: #f1f1f1;
    }

    .notification {
    position: fixed;
    top: 20px;
    left: 20px;
    background-color: #ff4d4d; /* Warna merah */
    color: white;
    padding: 15px 20px;
    border-radius: 5px;
    box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
    font-size: 14px;
    z-index: 9999;
    display: none; /* Tersembunyi default */
}


    @media (max-width: 768px) {
        .transaction-table {
            padding: 15px;
        }

        .table-responsive {
            overflow-x: auto;
        }
    }
</style>


<div class="container my-5" data-aos="fade-up" data-aos-delay="100">
    <div class="transaction-table">
        <h2 class="text-center">History Transaksi</h2>
        <hr>

        @if(Auth::check())
            <!-- Menunggu Konfirmasi -->
            <h3 class="mt-4">Menunggu Konfirmasi</h3>
            @if($transactions->isEmpty())
                <p class="text-center">Tidak ada transaksi yang menunggu konfirmasi.</p>
            @else
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Tanggal</th>
                                <th>Nama Paket</th>
                                <th>Jumlah</th>
                                <th>Total Harga</th>
                                <th>Status Pengerjaan</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($transactions as $index => $transaction)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ \Carbon\Carbon::parse($transaction->tanggal_dipesan)->format('d M Y') }}</td>
                                    <td>{{ $transaction->dibeli }}</td>
                                    <td>{{ $transaction->jumlah_dibeli }}</td>
                                    <td>Rp {{ number_format($transaction->total, 0, ',', '.') }}</td>
                                    <td>{{ $transaction->status_pengerjaan }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @endif

            <!-- Progres dan Terkendala -->
            <h3 class="mt-4">Progres dan Terkendala</h3>
            @if($progresData->isEmpty())
                <p class="text-center">Tidak ada transaksi yang sedang diproses atau terkendala.</p>
            @else
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Tanggal</th>
                                <th>Nama Paket</th>
                                <th>Jumlah</th>
                                <th>Total Harga</th>
                                <th>Status Pengerjaan</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($progresData as $index => $progres)
                                <tr class="{{ !is_null($progres->terkendala) ? 'table-danger' : '' }}">
                                    <td>{{ $transactions->count() + $index + 1 }}</td>
                                    <td>{{ \Carbon\Carbon::parse($progres->tanggal_dipesan)->format('d M Y') }}</td>
                                    <td>{{ $progres->dibeli }}</td>
                                    <td>{{ $progres->jumlah_dibeli }}</td>
                                    <td>Rp {{ number_format($progres->total, 0, ',', '.') }}</td>
                                    <td>{{ $progres->status_pengerjaan }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @endif

            <!-- Selesai -->
            <h3 class="mt-4">Selesai</h3>
            @if($selesaiData->isEmpty())
                <p class="text-center">Tidak ada transaksi yang sudah selesai.</p>
            @else
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Tanggal</th>
                                <th>Nama Paket</th>
                                <th>Jumlah</th>
                                <th>Total Harga</th>
                                <th>Status Pengerjaan</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($selesaiData as $index => $selesai)
                                <tr>
                                    <td>{{ $transactions->count() + $progresData->count() + $index + 1 }}</td>
                                    <td>{{ \Carbon\Carbon::parse($selesai->tanggal_dipesan)->format('d M Y') }}</td>
                                    <td>{{ $selesai->dibeli }}</td>
                                    <td>{{ $selesai->jumlah_dibeli }}</td>
                                    <td>Rp {{ number_format($selesai->total, 0, ',', '.') }}</td>
                                    <td>{{ $selesai->status_pengerjaan }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @endif

        @else
            <p class="text-center">Silakan login untuk melihat histori transaksi Anda.</p>
        @endif
    </div>
</div>



<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>


{{-- js untuk notifikasi alert --}}
@if($hasTerkendala)
<script>
    document.addEventListener('DOMContentLoaded', function () {
        // Fungsi untuk menampilkan notifikasi SweetAlert
        function showNotification() {
            Swal.fire({
                icon: 'error',
                title: 'Perhatian!',
                text: 'Transaksimu ada yang terkendala. Harap segera menghubungi nomor admin',
                position: 'top-start',
                timer: 5000,
                timerProgressBar: true,
                toast: true,
                showConfirmButton: false
            });
        }

        // Tampilkan notifikasi pertama kali
        showNotification();

        // Tampilkan notifikasi setiap 30 detik
        setInterval(() => {
            showNotification();
        }, 30000); // 30 detik dalam milidetik
    });
</script>
@endif


