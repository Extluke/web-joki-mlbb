<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Ez Gaming Admin</title>
    <meta
      content="width=device-width, initial-scale=1.0, shrink-to-fit=no"
      name="viewport"
    />
    <link
      rel="icon"
      href="{{ asset('assets/admin/img/kaiadmin/favicon.ico')}}"
      type="image/x-icon"
    />
    {{-- library data tables --}}
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css" />
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>


    <!-- Fonts and icons -->
    <script src="{{ asset('assets/admin/js/plugin/webfont/webfont.min.js')}}"></script>
    <script>
      WebFont.load({
        google: { families: ["Public Sans:300,400,500,600,700"] },
        custom: {
          families: [
            "Font Awesome 5 Solid",
            "Font Awesome 5 Regular",
            "Font Awesome 5 Brands",
            "simple-line-icons",
          ],
          urls: ["{{ asset('assets/admin/css/fonts.min.css')}}"],
        },
        active: function () {
          sessionStorage.fonts = true;
        },
      });
    </script>

    <!-- CSS Files -->
    <link rel="stylesheet" href="{{ asset('assets/admin/css/bootstrap.min.css')}}" />
    <link rel="stylesheet" href="{{ asset('assets/admin/css/plugins.min.css')}}" />
    <link rel="stylesheet" href="{{ asset('assets/admin/css/kaiadmin.min.css')}}" />

    <!-- CSS Just for demo purpose, don't include it in your project -->
    <link rel="stylesheet" href="{{ asset('assets/admin/css/demo.css')}}" />
  </head>
  <body>
    <div class="wrapper">

     {{-- start sidebar --}}
      @include('admin/partials/navbar/dashboard')
      <!-- End Sidebar -->

      <div class="main-panel">

        {{-- Header start --}}
        @include('admin/partials/heading/heading')
        {{-- Header End --}}

        <div class="container">
          <div class="page-inner">
            <div
              class="d-flex align-items-left align-items-md-center flex-column flex-md-row pt-2 pb-4"
            >
              <div>
                <h3 class="fw-bold mb-3">Dashboard</h3>
                <h6 class="op-7 mb-2">Rekap Dahboard</h6>
              </div>
              
            </div>
            

          
            <div class="row">
              <div class="col-12"> <!-- Ubah dari col-md-8 ke col-12 -->
                  <div class="card card-round">
                      <div class="card-header">
                          <div class="card-head-row card-tools-still-right">
                              <div class="card-title">Transaction History</div>
                          </div>
                      </div>
                      <div class="card-body p-0" style="padding: 0;"> <!-- Hilangkan padding -->
                          <div class="table-responsive">
                              <table id="progressTable" class="table table-striped table-hover w-100"> <!-- Tambahkan w-100 -->
                                  <thead>
                                      <tr>
                                          <th>ID</th>
                                          <th>Nama</th>
                                          <th>Email</th>
                                          <th>WA</th>
                                          <th>Email Game</th>
                                          <th>Password Game</th>
                                          <th>Catatan</th>
                                          <th>Login Via</th>
                                          <th>Dibeli</th>
                                          <th>Total</th>
                                          <th>Tanggal Dipesan</th>
                                          <th>Progres Bintang</th>
                                          <th>Status</th>
                                          <th>Aksi</th>
                                      </tr>
                                  </thead>
                                  <tbody>
                                      @forelse ($orders as $order)
                                      <tr data-order-id="{{ $order->order_id }}">
                                          <td>{{ $order->order_id }}</td>
                                          <td>{{ $order->nama }}</td>
                                          <td>{{ $order->email }}</td>
                                          <td>{{ $order->wa }}</td>
                                          <td>{{ $order->email_game }}</td>
                                          <td>{{ $order->password_game }}</td>
                                          <td>{{ $order->catatan }}</td>
                                          <td>{{ $order->login_via }}</td>
                                          <td>{{ $order->dibeli }}</td>
                                          <td>{{ number_format($order->total, 0, ',', '.') }}</td>
                                          <td>{{ $order->tanggal_dipesan }}</td>
                                          {{-- <td class="status-pembayaran">{{ $order->status_pembayaran }}</td> --}}
                                          <td>
                                            <div class="d-flex align-items-center">
                                                <button class="btn btn-sm btn-outline-primary decrement-star" data-id="{{ $order->id }}">-</button>
                                                <input type="number" class="form-control mx-2 star-input" data-id="{{ $order->id }}" value="{{ $order->progres }}" min="0" max="10" style="width: 60px;">
                                                <button class="btn btn-sm btn-outline-primary increment-star" data-id="{{ $order->id }}">+</button>
                                            </div>
                                          </td>
                                          <td>
                                              @if ($order->terkendala)
                                                  <span class="text-danger">{{ $order->terkendala }}</span>
                                              @else
                                                  <span>{{ $order->status_pengerjaan }}</span>
                                              @endif
                                          </td>
                                          <td>
                                            <button class="btn btn-warning btn-sm open-kendala-modal" data-id="{{ $order->id }}" data-status="{{ $order->status_pengerjaan }}">Terkendala</button>
                                            <form action="{{ route('order.complete', $order->id) }}" method="POST" class="d-inline">
                                              @csrf
                                              <button type="submit" class="btn btn-success btn-sm">Selesai</button>
                                          </form>
                                          </td>
                                      </tr>
                                      @empty
                                      <tr>
                                          <td colspan="9" class="text-center">Tidak ada data transaksi.</td>
                                      </tr>
                                      @endforelse
                                  </tbody>
                              </table>
                          </div>
                      </div>
                  </div>
              </div>
            </div>


            <!-- Modal untuk input kendala -->
            <!-- Modal Terkendala -->
            <div class="modal fade" id="kendalaModal" tabindex="-1" aria-labelledby="kendalaModalLabel" aria-hidden="true">
              <div class="modal-dialog">
                  <div class="modal-content">
                      <div class="modal-header">
                          <h5 class="modal-title" id="kendalaModalLabel">Catatan Kendala</h5>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      </div>
                      <div class="modal-body">
                          <input type="hidden" id="orderIdKendala">
                          <textarea id="kendalaText" class="form-control" rows="4" placeholder="Masukkan deskripsi kendala"></textarea>
                      </div>
                      <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                          <button id="confirmKendala" class="btn btn-primary">Konfirmasi</button>
                      </div>
                  </div>
              </div>
          </div>
          

          
          

           






          </div>
        </div>

        {{-- Footer start --}}
        @include('admin/partials/footer/footer')
        {{-- foooter End --}}
      </div>

      <!-- Custom template | don't include it in your project! -->
      <div class="custom-template">
        <div class="title">Settings</div>
        <div class="custom-content">
          <div class="switcher">
            <div class="switch-block">
              <h4>Logo Header</h4>
              <div class="btnSwitch">
                <button
                  type="button"
                  class="selected changeLogoHeaderColor"
                  data-color="dark"
                ></button>
                <button
                  type="button"
                  class="changeLogoHeaderColor"
                  data-color="blue"
                ></button>
                <button
                  type="button"
                  class="changeLogoHeaderColor"
                  data-color="purple"
                ></button>
                <button
                  type="button"
                  class="changeLogoHeaderColor"
                  data-color="light-blue"
                ></button>
                <button
                  type="button"
                  class="changeLogoHeaderColor"
                  data-color="green"
                ></button>
                <button
                  type="button"
                  class="changeLogoHeaderColor"
                  data-color="orange"
                ></button>
                <button
                  type="button"
                  class="changeLogoHeaderColor"
                  data-color="red"
                ></button>
                <button
                  type="button"
                  class="changeLogoHeaderColor"
                  data-color="white"
                ></button>
                <br />
                <button
                  type="button"
                  class="changeLogoHeaderColor"
                  data-color="dark2"
                ></button>
                <button
                  type="button"
                  class="changeLogoHeaderColor"
                  data-color="blue2"
                ></button>
                <button
                  type="button"
                  class="changeLogoHeaderColor"
                  data-color="purple2"
                ></button>
                <button
                  type="button"
                  class="changeLogoHeaderColor"
                  data-color="light-blue2"
                ></button>
                <button
                  type="button"
                  class="changeLogoHeaderColor"
                  data-color="green2"
                ></button>
                <button
                  type="button"
                  class="changeLogoHeaderColor"
                  data-color="orange2"
                ></button>
                <button
                  type="button"
                  class="changeLogoHeaderColor"
                  data-color="red2"
                ></button>
              </div>
            </div>
            <div class="switch-block">
              <h4>Navbar Header</h4>
              <div class="btnSwitch">
                <button
                  type="button"
                  class="changeTopBarColor"
                  data-color="dark"
                ></button>
                <button
                  type="button"
                  class="changeTopBarColor"
                  data-color="blue"
                ></button>
                <button
                  type="button"
                  class="changeTopBarColor"
                  data-color="purple"
                ></button>
                <button
                  type="button"
                  class="changeTopBarColor"
                  data-color="light-blue"
                ></button>
                <button
                  type="button"
                  class="changeTopBarColor"
                  data-color="green"
                ></button>
                <button
                  type="button"
                  class="changeTopBarColor"
                  data-color="orange"
                ></button>
                <button
                  type="button"
                  class="changeTopBarColor"
                  data-color="red"
                ></button>
                <button
                  type="button"
                  class="selected changeTopBarColor"
                  data-color="white"
                ></button>
                <br />
                <button
                  type="button"
                  class="changeTopBarColor"
                  data-color="dark2"
                ></button>
                <button
                  type="button"
                  class="changeTopBarColor"
                  data-color="blue2"
                ></button>
                <button
                  type="button"
                  class="changeTopBarColor"
                  data-color="purple2"
                ></button>
                <button
                  type="button"
                  class="changeTopBarColor"
                  data-color="light-blue2"
                ></button>
                <button
                  type="button"
                  class="changeTopBarColor"
                  data-color="green2"
                ></button>
                <button
                  type="button"
                  class="changeTopBarColor"
                  data-color="orange2"
                ></button>
                <button
                  type="button"
                  class="changeTopBarColor"
                  data-color="red2"
                ></button>
              </div>
            </div>
            <div class="switch-block">
              <h4>Sidebar</h4>
              <div class="btnSwitch">
                <button
                  type="button"
                  class="changeSideBarColor"
                  data-color="white"
                ></button>
                <button
                  type="button"
                  class="selected changeSideBarColor"
                  data-color="dark"
                ></button>
                <button
                  type="button"
                  class="changeSideBarColor"
                  data-color="dark2"
                ></button>
              </div>
            </div>
          </div>
        </div>
        <div class="custom-toggle">
          <i class="icon-settings"></i>
        </div>
      </div>
      <!-- End Custom template -->
    </div>
    <!--   Core JS Files   -->
    <script src="{{ asset('assets/admin/js/core/jquery-3.7.1.min.js')}}"></script>
    <script src="{{ asset('assets/admin/js/core/popper.min.js')}}"></script>
    <script src="{{ asset('assets/admin/js/core/bootstrap.min.js')}}"></script>

    <!-- jQuery Scrollbar -->
    <script src="{{ asset('assets/admin/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js')}}"></script>

    <!-- Chart JS -->
    <script src="{{ asset('assets/admin/js/plugin/chart.js/chart.min.js')}}"></script>

    <!-- jQuery Sparkline -->
    <script src="{{ asset('assets/admin/js/plugin/jquery.sparkline/jquery.sparkline.min.js')}}"></script>

    <!-- Chart Circle -->
    <script src="{{ asset('assets/admin/js/plugin/chart-circle/circles.min.js')}}"></script>

    <!-- Datatables -->
    <script src="{{ asset('assets/admin/js/plugin/datatables/datatables.min.js')}}"></script>

    <!-- Bootstrap Notify -->
    <script src="{{ asset('assets/admin/js/plugin/bootstrap-notify/bootstrap-notify.min.js')}}"></script>

    <!-- jQuery Vector Maps -->
    <script src="{{ asset('assets/admin/js/plugin/jsvectormap/jsvectormap.min.js')}}"></script>
    <script src="{{ asset('assets/admin/js/plugin/jsvectormap/world.js')}}"></script>

    <!-- Sweet Alert -->
    <script src="{{ asset('assets/admin/js/plugin/sweetalert/sweetalert.min.js')}}"></script>

    <!-- Kaiadmin JS -->
    <script src="{{ asset('assets/admin/js/kaiadmin.min.js')}}"></script>

    <!-- Kaiadmin DEMO methods, don't include it in your project! -->
    <script src="{{ asset('assets/admin/js/setting-demo.js')}}"></script>
    <script src="{{ asset('assets/admin/js/demo.js')}}"></script>
    <script>
      $("#lineChart").sparkline([102, 109, 120, 99, 110, 105, 115], {
        type: "line",
        height: "70",
        width: "100%",
        lineWidth: "2",
        lineColor: "#177dff",
        fillColor: "rgba(23, 125, 255, 0.14)",
      });

      $("#lineChart2").sparkline([99, 125, 122, 105, 110, 124, 115], {
        type: "line",
        height: "70",
        width: "100%",
        lineWidth: "2",
        lineColor: "#f3545d",
        fillColor: "rgba(243, 84, 93, .14)",
      });

      $("#lineChart3").sparkline([105, 103, 123, 100, 95, 105, 115], {
        type: "line",
        height: "70",
        width: "100%",
        lineWidth: "2",
        lineColor: "#ffa534",
        fillColor: "rgba(255, 165, 52, .14)",
      });
    </script>

    {{-- vue js --}}
    
    <script>
      window.Echo.channel('order-channel')
    .listen('OrderUpdated', (event) => {
        console.log('Event diterima:', event);  // Cek apakah event sampai di sini

        Pusher.logToConsole = true;


        if (event.transaction) {
            console.log('Transaction:', event.transaction);

            // Temukan baris dengan data-order-id yang sesuai dengan order_id
            const row = document.querySelector(`tr[data-order-id="${event.transaction.order_id}"]`);
            console.log('Row ditemukan:', row); // Cek apakah row ditemukan

            if (row) {
                // Temukan kolom status pembayaran dan perbarui
                const statusPembayaranCell = row.querySelector('.status-pembayaran');
                console.log('Status Pembayaran Cell:', statusPembayaranCell);

                if (statusPembayaranCell) {
                    statusPembayaranCell.textContent = event.transaction.status_pembayaran;
                }
            } else {
                // Jika baris tidak ditemukan, bisa dibuatkan baris baru
                const table = document.querySelector('table tbody');
                const newRow = document.createElement('tr');
                newRow.setAttribute('data-order-id', event.transaction.order_id); // Gunakan order_id di sini
                newRow.innerHTML = `
                    <td>${event.transaction.order_id}</td>
                    <td>${event.transaction.nama}</td>
                    <td>${event.transaction.email}</td>
                    <td>${event.transaction.wa}</td>
                    <td>${event.transaction.email_game}</td>
                    <td>${event.transaction.password_game}</td>
                    <td>${event.transaction.catatan}</td>
                    <td>${event.transaction.login_via}</td>
                    <td>${event.transaction.dibeli}</td>
                    <td>${event.transaction.total}</td>
                    <td>${event.transaction.tanggal_dipesan}</td>
                    <td class="status-pembayaran">${event.transaction.status_pembayaran}</td>
                    <td>
                        <form action="/admin/orders/${event.transaction.id}/konfirmasi" method="POST">
                            <button type="submit" class="btn btn-success">Konfirmasi</button>
                        </form>
                    </td>
                `;
                table.appendChild(newRow);  // Tambahkan baris baru ke tabel
            }
        }
    });

    </script>

      {{-- script untuk menyimpan kendala --}}
      <script>
        document.addEventListener('DOMContentLoaded', () => {
            const kendalaModal = new bootstrap.Modal(document.getElementById('kendalaModal'));
            let selectedOrderId = null;
        
            // Ketika tombol "Terkendala" diklik
            document.querySelectorAll('.open-kendala-modal').forEach(button => {
                button.addEventListener('click', function () {
                    selectedOrderId = this.dataset.id; // Ambil ID order
                    document.getElementById('kendalaText').value = ''; // Kosongkan teks sebelumnya
                    kendalaModal.show(); // Tampilkan modal
                });
            });
        
            // Ketika tombol "Konfirmasi" di modal diklik
            document.getElementById('confirmKendala').addEventListener('click', function () {
                const kendalaText = document.getElementById('kendalaText').value.trim();
        
                if (!kendalaText) {
                    alert('Deskripsi kendala tidak boleh kosong.');
                    return;
                }
        
                fetch('{{ route('order.updateKendala') }}', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    body: JSON.stringify({
                        id: selectedOrderId,
                        terkendala: kendalaText
                    })
                })
                .then(response => {
                    if (!response.ok) {
                        throw new Error('Network response was not ok');
                    }
                    return response.json();
                })
                .then(data => {
                    if (data.success) {
                        alert(data.message);
                        kendalaModal.hide(); // Tutup modal
                        location.reload(); // Muat ulang halaman untuk memperbarui tabel
                    } else {
                        alert(data.message || 'Gagal memperbarui kendala.');
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    alert('Terjadi kesalahan, coba lagi.');
                });
            });
        });
        </script>
        
        
        {{-- script untuk button + dan - --}}
        {{-- script untuk membuat button + dan - --}}
<script>
  $(document).ready(function () {
      // Increment bintang
      $(document).on('click', '.increment-star', function () {
          let input = $(this).siblings('.star-input');
          let currentValue = parseInt(input.val(), 10) || 0; // Ambil nilai sekarang atau 0 jika kosong
          input.val(currentValue + 1);  // Tambah 1 pada nilai
          input.trigger('change');  // Trigger event perubahan
          
          
      });

      // Decrement bintang
      $(document).on('click', '.decrement-star', function () {
          let input = $(this).siblings('.star-input');
          let currentValue = parseInt(input.val(), 10) || 0; // Ambil nilai sekarang atau 0 jika kosong
          if (currentValue > 0) {
              input.val(currentValue - 1);  // Kurangi 1 pada nilai
              input.trigger('change');  // Trigger event perubahan
              
              
          }
      });

      // Validasi input manual, tanpa pembatasan nilai (tidak ada batas 10)
      $(document).on('change', '.star-input', function () {
          let value = parseInt($(this).val(), 10);
          if (isNaN(value)) {
              $(this).val(0);  // Jika nilai bukan angka, set ke 0
          }
          // Tidak ada pembatasan nilai maksimal, jadi ini dibiarkan kosong
      });
  });
</script>

{{-- script untuk update progres --}}
<script>
  document.addEventListener('DOMContentLoaded', () => {
      const table = document.querySelector('#progressTable');
  
      table.addEventListener('click', function (e) {
          if (e.target.matches('.increment-star, .decrement-star')) {
              const button = e.target;
              const id = button.dataset.id;
              const input = document.querySelector(`.star-input[data-id="${id}"]`);
              const currentValue = parseInt(input.value, 10) || 0;
  
              // Hitung nilai baru berdasarkan tombol yang diklik
              let newValue = currentValue;
              if (button.classList.contains('increment-star')) {
                  newValue = currentValue + 1;  // Tanpa pembatasan nilai maksimal
              } else if (button.classList.contains('decrement-star')) {
                  newValue = currentValue - 1;  // Tanpa pembatasan nilai minimal
              }
  
              // Kirim nilai ke server via AJAX, dan tunggu respons
              updateProgress(id, newValue)
                  .then(() => {
                      // Perbarui input hanya jika update sukses
                      input.value = newValue;
                      alert('Data berhasil diubah!'); // Notifikasi sukses
                  })
                  .catch(() => {
                      alert('Gagal memperbarui progres. Coba lagi.');
                  });
          }
      });
  
      function updateProgress(id, value) {
          return fetch('{{ route('order.updateProgres') }}', {
              method: 'POST',
              headers: {
                  'Content-Type': 'application/json',
                  'X-CSRF-TOKEN': '{{ csrf_token() }}'
              },
              body: JSON.stringify({ id, progres: value })
          })
          .then(response => response.json())
          .then(data => {
              if (!data.success) {
                  throw new Error(data.message || 'Gagal memperbarui progres.');
              }
          });
      }
  });
</script>

      
      




  
  
  </body>
</html>
