<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>PengajuanSurat</title>

    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@700&display=swap" rel="stylesheet">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    {{-- Link animasi --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    <link rel="stylesheet" href="css/hamburger.css">
    <link rel="stylesheet" href="css/pengajuan.css">
</head>

<body class="d-flex flex-column min-vh-100">
    <x-navbar></x-navbar>

    {{-- Message No action 3 menit --}}
    @include('admin.massagetimeout')

    <div class="container mt-1 col-md-8 col-lg-6 flex-fill">
        <div class="row align-items-center">
            <div class="col-md-6">
                <h1 class="mt-4 ms-3 animate__animated animate__fadeInLeft"
                    style="font-size: 3rem; font-weight: bold; color: #324254;">
                    Lakukan permohonan surat
                </h1>
                <p class="mt-2 ms-3 animate__animated animate__fadeInLeft"
                    style="font-family: 'Roboto'; font-size: 1.1rem;">
                    Untuk melakukan permohonan surat, silahkan isi form di bawah ini...
                </p>
            </div>
            <div class="col-md-6 ps-5 text-center">
                <img src="img/undraw_posting_photo.svg" alt="Deskripsi Gambar"
                    class="img-fluid img-hover animate__animated animate__fadeInRight"
                    style="max-width: 80%; border-radius: 15px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);">
            </div>
        </div>

        {{-- alert --}}
        @include('admin.session')

        {{-- Menampilkan Email Pengguna yang Login --}}
        @if (Auth::check())
            <div class="alert alert-info">
                Email Anda: {{ Auth::user()->email }}
            </div>
        @else
            <div class="alert alert-warning">
                Anda belum login. Silakan login untuk mengajukan surat.
            </div>
        @endif

        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-12">
                    <div class="card shadow-lg p-4 w-100 mb-5 rounded-lg hover-card" style="border-radius: 15px;">
                        {{-- Form --}}
                        <form action="{{ route('pengajuan.store') }}" method="POST" class="mb-5">
                            @csrf
                            {{-- Input nama --}}
                            <div class="mb-3">
                                <label for="nama" class="form-label">Nama</label>
                                <input type="text" class="form-control shadow-sm" id="nama" name="nama"
                                    placeholder="Masukkan nama" value="{{ old('nama', $datapengguna->nama) }}" required>
                            </div>

                            {{-- Input Alamat --}}
                            <div class="mb-3">
                                <label for="alamat" class="form-label">Alamat</label>
                                <textarea class="form-control shadow-sm" id="alamat" name="alamat" rows="3" placeholder="Masukkan alamat"
                                    required>{{ old('alamat', $datapengguna->alamat) }}</textarea>
                            </div>

                            <!-- Input Tanggal Lahir -->
                            <div class="mb-3">
                                <label for="tanggal_lahir" class="form-label">Tanggal Lahir</label>
                                <input type="date" class="form-control shadow-sm" id="tanggal_lahir"
                                    name="tanggal_lahir"
                                    value="{{ old('tanggal_lahir', $datapengguna->tanggal_lahir) }}" required>
                            </div>

                            <!-- Input Jenis Kelamin -->
                            <div class="mb-3">
                                <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
                                <select class="form-select shadow-sm" id="jenis_kelamin" name="jenis_kelamin" required>
                                    <option value="" disabled selected>Pilih jenis kelamin</option>
                                    <option value="Laki-laki"
                                        {{ old('jenis_kelamin', $datapengguna->jenis_kelamin) == 'Laki-laki' ? 'selected' : '' }}>
                                        Laki-laki</option>
                                    <option value="Perempuan"
                                        {{ old('jenis_kelamin', $datapengguna->jenis_kelamin) == 'Perempuan' ? 'selected' : '' }}>
                                        Perempuan</option>
                                </select>
                            </div>

                            <!-- Input Jenis Surat -->
                            <div class="mb-3">
                                <label for="jenis_surat" class="form-label">Jenis Surat</label>
                                <select class="form-select shadow-sm" id="jenis_surat" name="jenis_surat" required>
                                    <option value="" selected>Pilih jenis surat</option>
                                    <option value="Surat Keterangan Tidak Mampu">SKTM</option>
                                    <option value="Surat Pengantar Pembuatan KK">SPPK</option>
                                    <option value="Surat Keterangan Berkelakuan Baik">SKKB</option>
                                </select>
                            </div>

                            <!-- Tombol Submit -->
                            <button type="submit" class="btn btn-primary btn-hover"
                                style="background-color: #7da4a1; border-color: #7da4a1; color: white;">
                                Submit
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <x-footer></x-footer>


    <!-- Bootstrap core JavaScript-->
    <script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('vendor/jquery-easing/jquery.easing.min.js') }}"></script>
    <script src="{{ asset('js/sb-admin-2.min.js') }}"></script>
    <script src="{{ asset('vendor/chart.js/Chart.min.js') }}"></script>
    <script src="{{ asset('js/demo/chart-area-demo.js') }}"></script>
    <script src="{{ asset('js/demo/chart-pie-demo.js') }}"></script>

    {{-- Hamburger klik --}}
    <script src="{{ asset('js/hambugerklik.js') }}"></script>
</body>

</html>
