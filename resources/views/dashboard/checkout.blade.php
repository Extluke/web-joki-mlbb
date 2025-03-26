<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <!-- Midtrans -->
  <script type="text/javascript"
    src="https://app.sandbox.midtrans.com/snap/snap.js"
    data-client-key="{{ config('midtrans.client_key') }}"></script>

  <title>Invoice Pembayaran</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">

  <style>
    body { background-color: #040677; color: #fff; }
    .invoice-card { background-color: #fff; color: #040677; border-radius: 8px; padding: 20px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2); }
    .btn-custom { background-color: #040677; color: #fff; border: none; }
    .btn-custom:hover { background-color: #0cc7c7; }
    .header-buttons { display: flex; justify-content: space-between; align-items: center; }
  </style>
</head>

<body>
  <div class="container my-5">
    <div class="header-buttons mb-4">
      <div></div>
      <a href="/" class="btn btn-custom">Kembali ke Home</a>
    </div>
    <div class="row justify-content-center">
      <div class="col-lg-8">
        <div class="invoice-card">
          <h2 class="text-center">Invoice Pembayaran</h2>
          <p class="text-center">Cek kembali data pembelian Anda</p>
          <hr>
          <div class="row mb-4">
            <div class="col-md-6">
              <p><strong>Tanggal:</strong> {{ \Carbon\Carbon::parse($transaction->tanggal_dipesan)->format('d M Y') }}</p>
            </div>
            <div class="col-md-6 text-end">
              <p><strong>Nama:</strong> {{ $transaction->nama }}</p>
              <p><strong>Email:</strong> {{ $transaction->email }}</p>
            </div>
          </div>
          <table class="table table-bordered text-dark">
            <thead>
              <tr>
                <th>Paket yang dibeli</th>
                <th>Jumlah</th>
                <th>Harga</th>
                <th>Total</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>{{ $transaction->dibeli }}</td>
                <td>{{ $transaction->jumlah_dibeli }}</td>
                <td>Rp {{ number_format($transaction->total / $transaction->jumlah_dibeli, 0, ',', '.') }}</td>
                <td>Rp {{ number_format($transaction->total, 0, ',', '.') }}</td>
              </tr>
            </tbody>
            <tfoot>
              <tr>
                <th colspan="3" class="text-end">Total</th>
                <th>Rp {{ number_format($transaction->total, 0, ',', '.') }}</th>
              </tr>
            </tfoot>
          </table>
          <div class="d-flex justify-content-end mt-4">
            <button class="btn btn-custom" id="pay-button">Bayar</button>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Payment Gateway Script -->
  <script type="text/javascript">
    var payButton = document.getElementById('pay-button');
    payButton.addEventListener('click', function () {
      window.snap.pay("{{$snapToken}}", {
        onSuccess: function(result){
          // alert("Payment success!");
          window.location.href = "/";
          console.log(result);
        },
        onPending: function(result){
          alert("Waiting your payment!");
          console.log(result);
        },
        onError: function(result){
          alert("Payment failed!");
          console.log(result);
        },
        onClose: function(){
          alert('You closed the popup without finishing the payment');
        }
      });
    });
  </script>

  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
