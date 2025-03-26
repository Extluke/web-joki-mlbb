<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
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
                            <table class="table table-striped table-hover">
                              <thead>
                                  <tr>
                                      <th>ID</th>
                                      <th>Nama</th>
                                      <th>Email</th>
                                      <th>WA</th>
                                      <th>Email Game</th>
                                      <th>Password Game</th>
                                      <th>Dibeli</th>
                                      <th>Total</th>
                                      <th>Status Pengerjaan</th>
                                      <th>Catatan Kendala</th>
                                      <th>Aksi</th>
                                  </tr>
                              </thead>
                              <tbody>
                                  @forelse ($progresTerkendala as $item)
                                  <tr>
                                      <td>{{ $item->id }}</td>
                                      <td>{{ $item->nama }}</td>
                                      <td>{{ $item->email }}</td>
                                      <td>{{ $item->wa }}</td>
                                      <td>{{ $item->email_game }}</td>
                                      <td>{{ $item->password_game }}</td>
                                      <td>{{ $item->dibeli }}</td>
                                      <td>{{ number_format($item->total, 0, ',', '.') }}</td>
                                      <td>{{ $item->status_pengerjaan }}</td>
                                      <td>{{ $item->terkendala }}</td>
                                      <td>
                                        <button class="btn btn-warning open-update-modal" data-id="{{ $item->id }}" data-terkendala="{{ $item->terkendala }}">Perbarui Kendala</button>
                                        <form action="{{ route('progres.selesaikanKendala', $item->id) }}" method="POST" class="d-inline">
                                            @csrf
                                            <button type="submit" class="btn btn-success">Kendala Selesai</button>
                                        </form>
                                    </td>
                                  </tr>
                                  @empty
                                  <tr>
                                      <td colspan="9" class="text-center">Tidak ada data terkendala.</td>
                                  </tr>
                                  @endforelse
                              </tbody>
                          </table>
                          </div>
                      </div>
                  </div>
              </div>
          </div>

          {{-- modal untuk update kendala --}}
          <div class="modal fade" id="updateKendalaModal" tabindex="-1" aria-labelledby="updateKendalaModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="updateKendalaModalLabel">Perbarui Kendala</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" id="updateKendalaId">
                        <textarea id="updateKendalaText" class="form-control" rows="4" placeholder="Masukkan catatan kendala"></textarea>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                        <button id="confirmUpdateKendala" class="btn btn-primary">Simpan Perubahan</button>
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
{{-- js untuk data tables --}}
<script>
  document.addEventListener('DOMContentLoaded', () => {
      const updateKendalaModal = new bootstrap.Modal(document.getElementById('updateKendalaModal'));
      let selectedKendalaId = null;
  
      // Ketika tombol "Perbarui Kendala" diklik
      document.querySelectorAll('.open-update-modal').forEach(button => {
          button.addEventListener('click', function () {
              selectedKendalaId = this.dataset.id; // Ambil ID kendala
              document.getElementById('updateKendalaText').value = this.dataset.terkendala; // Isi teks kendala
              updateKendalaModal.show(); // Tampilkan modal
          });
      });
  
      // Ketika tombol "Simpan Perubahan" di modal diklik
      document.getElementById('confirmUpdateKendala').addEventListener('click', function () {
          const kendalaText = document.getElementById('updateKendalaText').value.trim();
  
          if (!kendalaText) {
              alert('Deskripsi kendala tidak boleh kosong.');
              return;
          }
  
          fetch('{{ route('progres.updateTerkendala') }}', {
              method: 'POST',
              headers: {
                  'Content-Type': 'application/json',
                  'X-CSRF-TOKEN': '{{ csrf_token() }}'
              },
              body: JSON.stringify({
                  id: selectedKendalaId,
                  terkendala: kendalaText
              })
          })
          .then(response => response.json())
          .then(data => {
              if (data.success) {
                  alert(data.message);
                  updateKendalaModal.hide(); // Tutup modal
                  location.reload(); // Perbarui tabel
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
  

  
  
  </body>
</html>
