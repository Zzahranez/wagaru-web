<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ViewAdminiuran</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/4.5.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">

    {{-- CSS Admin --}}
    <link rel="stylesheet" href="css/admin.css">
    {{-- <link rel="stylesheet" href="css/hamburger.css"> --}}
    <link rel="stylesheet" href="css/sidebar-hamburger.css">
</head>

<body>
    <div class="container-fluid">
        <div class="row">

            <!-- Sidebar -->
            @include('admin.sidebar')

            {{-- Message No action 3 menit --}}
            @include('admin.massagetimeout')

            <!-- Main content -->
            <main role="main" class="col-md-10 ml-sm-auto px-4">


                {{-- Admin Profile --}}
                @include('admin.adminprofil')


                {{-- table --}}
                <div class="container">

                    {{-- Modal dan button tambah --}}
                    @include('admin.session')
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    {{-- Heder --}}
                    <div class="container mt-4">
                        <div class="card mb-4 border-0 shadow animate__animated animate__fadeInDown">
                            <div class="card-body text-center">
                                <i class="fas fa-money-bill-wave mb-3" style="font-size: 2rem; color: #7da4a1;"></i>
                                <h2 class="mb-0 font-weight-bold" style="font-size: 1.8rem;">Lihat Iuran Users</h2>
                                <p class="text-muted mb-0" style="font-size: 1rem;">Informasi Iuran Users</p>
                                <hr style="width: 60%; margin: 1rem auto; border-top: 2px solid #324851;">
                            </div>
                        </div>

                        <div class="container">
                            <div class="card mb-4 mt-3">
                                <div class="card-header">
                                    <h5 class="mb-0">Daftar Iuran Users</h5>
                                </div>

                                {{-- Card --}}
                                <div class="card-body">
                                    @foreach ($users as $user)
                                        <div class="user-card p-3 mb-4 border rounded shadow-sm">
                                            <h4 class="font-weight-bold text-primary">{{ $user->datapengguna->nama }}
                                            </h4>
                                            <p class="text-muted mb-2"><i class="fas fa-map-marker-alt"></i> Alamat:
                                                {{ $user->datapengguna->alamat }}</p>

                                            @if ($user->iurans->isEmpty())
                                                <div class="alert alert-warning p-2">
                                                    <i class="fas fa-exclamation-circle"></i> <strong>Status:</strong>
                                                    Belum Ada Iuran
                                                </div>
                                            @else
                                                @foreach ($user->iurans as $iuran)
                                                    <div class="iuran-details p-3 my-2 border rounded">
                                                        <p class="mb-1"><strong>Nama Iuran:</strong>
                                                            {{ $iuran->nama_iuran }}</p>
                                                        <p class="mb-1"><strong>Jumlah:</strong> Rp
                                                            {{ number_format($iuran->jumlah, 2) }}</p>
                                                        <p class="mb-1"><strong>Tanggal:</strong>
                                                            {{ \Carbon\Carbon::parse($iuran->tanggal)->format('d M Y') }}
                                                        </p>

                                                        @if ($iuran->status == 'selesai')
                                                            <p class="mb-0 text-success"><i
                                                                    class="fas fa-check-circle"></i> Status: <span
                                                                    class="badge bg-success" style="color: white">Sudah
                                                                    Bayar</span></p>
                                                        @else
                                                            <p class="mb-0 text-danger"><i
                                                                    class="fas fa-times-circle"></i> Status: <span
                                                                    class="badge bg-danger" style="color: white">Belum
                                                                    Bayar</span></p>
                                                        @endif
                                                    </div>
                                                @endforeach
                                            @endif
                                        </div>
                                    @endforeach
                                </div>



                            </div>
                        </div>
                    </div>
                </div>
        </div>
        </main>
    </div>


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




</body>

</html>
