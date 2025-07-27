<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/4.5.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">

    {{-- CSS Admin --}}
    <link rel="stylesheet" href="css/admin.css">
    <link rel="stylesheet" href="css/sidebar-hamburger.css">

    <style>
        .hover-card {
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            cursor: pointer;
            /* Menunjukkan bahwa elemen bisa di-klik */
        }

        .hover-card:hover {
            transform: scale(1.05);
            /* Membesar sedikit */
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.15);
            /* Tambahkan bayangan */
        }

        .icon-container {
            width: 50px;
            height: 50px;
            display: flex;
            align-items: center;
            justify-content: center;
            background-color: rgba(0, 0, 0, 0.05);
            border-radius: 50%;
        }
    </style>


</head>

<body>
    <div class="container-fluid">
        <div class="row">

            <button class="navbar-toggler d-md-none" type="button" id="sidebarToggle">
                <span class="navbar-toggler-icon"></span>
            </button>
            <!-- Sidebar -->
            @include('admin.sidebar')

            <!-- Main content -->
            <main role="main" class="col-md-10 ml-sm-auto px-4">

                {{-- Profile --}}
                @include('admin.adminprofil')

                {{-- Message No action 3 menit --}}
                @include('admin.massagetimeout')

                <div class="container">
                    <div class="container mt-4">
                        <div class="card mb-4 border-0 shadow animate__animated animate__fadeInDown">
                            <div class="card-body text-center">
                                <i class="fas fa-user mb-3" style="font-size: 2rem; color: #7da4a1;"></i>
                                <h2 class="mb-0 font-weight-bold" style="font-size: 1.8rem;">Dashboard</h2>
                                <p class="text-muted mb-0" style="font-size: 1rem;">Selamat Datang Admin</p>
                                <hr style="width: 60%; margin: 1rem auto; border-top: 2px solid #324851;">
                            </div>
                        </div>

                        <div class="row mb-4">
                            <!-- Card 1: Jumlah Pengajuan Surat -->
                            <div class="col-md-4 mb-4">
                                <div class="card shadow border-0 rounded-lg hover-card">
                                    <div class="card-body d-flex align-items-center">
                                        <div>
                                            <i class="fas fa-envelope mb-3"
                                                style="font-size: 2rem; color: #007bff;"></i>
                                            <h5 class="card-title"><strong>Jumlah Pengajuan Surat</strong></h5>
                                            <div class="text-center">
                                                <h2 class="mb-0 fw-bold">{{ $pengajuancount }}</h2>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Card 2: Pengguna Aktif -->
                            <div class="col-md-4 mb-4">
                                <div class="card shadow border-0 rounded-lg hover-card">
                                    <div class="card-body d-flex align-items-center">
                                        <div>
                                            <i class="fas fa-user-friends mb-3"
                                                style="font-size: 2rem; color: #28a745;"></i>
                                            <h5 class="card-title"><strong>Pengguna Aktif</strong></h5>
                                            <div class="text-center">
                                                <h2 class="mb-0 fw-bold">{{ $jmlpengguna }}</h2>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Card 3: Jumlah Seluruh Iuran -->
                            <div class="col-md-4 mb-4">
                                <div class="card shadow border-0 rounded-lg hover-card">
                                    <div class="card-body d-flex align-items-center">
                                        <div>
                                            <i class="fas fa-money-bill-wave mb-3"
                                                style="font-size: 2rem; color: #ffc107;"></i>
                                            <h5 class="card-title"><strong>Jumlah Seluruh Iuran</strong></h5>
                                            <div class="text-center">
                                                <h2 class="mb-0 fw-bold">{{ $iuranpengguna }}</h2>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-8 mb-4">
                                <div class="card hover-card">
                                    <div class="card-header">
                                        <h5 class="mb-0">Pengajuan Surat Terbaru</h5>
                                    </div>
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table class="table table-striped">
                                                <thead>
                                                    <tr>
                                                        <th>No</th>
                                                        <th>Nama</th>
                                                        <th>Alamat</th>
                                                        <th>Jenis Surat</th>
                                                        <th>Tanggal_Pengajuan</th>
                                                        <th>Status</th>
                                                    </tr>
                                                </thead>
                                                <tbody>

                                                    @foreach ($pengajuan as $aju)
                                                        <tr>
                                                            <td>{{ $loop->iteration }}</td>
                                                            <td>{{ $aju->nama }}</td>
                                                            <td>{{ $aju->alamat }}</td>
                                                            <td>{{ $aju->jenis_surat }}</td>
                                                            <td>{{ $aju->created_at }}</td>
                                                            <td class="badge bg-warning text-dark">
                                                                {{ $aju->status }}</td>
                                                        </tr>
                                                    @endforeach

                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            {{-- Pengguna Terbaru --}}
                            <div class="col-md-4 mb-4">
                                <div class="card hover-card">
                                    <div class="card-header">
                                        <h5 class="mb-0">Pengguna Terbaru</h5>
                                    </div>
                                    <div class="card-body">
                                        <ul class="list-group list-group-flush">
                                            @foreach ($usernew as $usbar)
                                                <li
                                                    class="list-group-item d-flex justify-content-between align-items-center">
                                                    <div>

                                                        <img src="https://via.placeholder.com/30" alt="User"
                                                            class="rounded-circle mr-2">
                                                        {{ $usbar->username }}

                                                    </div>
                                                    <span class="badge badge-primary badge-pill">Baru</span>
                                                </li>
                                            @endforeach

                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
            </main>
        </div>
    </div>

    <script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <!-- Core plugin JavaScript-->
    <script src="{{ asset('vendor/jquery-easing/jquery.easing.min.js') }}"></script>
    <!-- Custom scripts for all pages-->
    <script src="{{ asset('js/sb-admin-2.min.js') }}"></script>
    <!-- Page level plugins -->
    <script src="{{ asset('vendor/chart.js/Chart.min.js') }}"></script>
    <!-- Page level custom scripts -->
    <script src="{{ asset('js/demo/chart-area-demo.js') }}"></script>
    <script src="{{ asset('js/demo/chart-pie-demo.js') }}"></script>

    {{-- Toggle Mobile --}}
    <script>
        $(document).ready(function() {
            $('#sidebarToggle').on('click', function() {
                $('.sidebar').toggleClass('active');
            });
        });
    </script>

</body>

</html>
