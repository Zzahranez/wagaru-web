<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Proifle</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    {{-- Link animasi --}}
    <link rel="stylesheet" href="css/hamburger.css">

    <style>
        html,
        body {
            height: 100%;
        }

        /* Atur konten agar tidak mengganggu footer */
        body {
            display: flex;
            flex-direction: column;
        }

        .hover-effect:hover {
            transform: translateY(-5px);
            transition: transform 0.3s;
        }

        .card {
            background-color: #f8f9fa;
        }

        .card-title {
            color: #007bff;
        }

        .card-body {
            padding: 1.5rem;
        }

        .hover-card {
            transition: transform 0.3s, box-shadow 0.3s;
        }

        .hover-card:hover {
            transform: translateY(-5px) scale(1.02);
            box-shadow: 0 8px 15px rgba(0, 0, 0, 0.2);
        }

        .modal-open .hover-card:hover {
            transform: none;
            box-shadow: none;
        }

        .no-hover:hover {
            transform: none;
            box-shadow: none;
        }

        .container {
            flex: 1;
        }

        footer {
            margin-top: auto;
        }
    </style>

</head>

<body class="d-flex flex-column min-vh-100 ">

    {{-- Message No action 3 menit --}}
    @include('admin.massagetimeout')
    
    <div class="container mt-4">
        <div class="card mb-4 border-0 shadow animate__animated animate__fadeInDown">
            <div class="card-body text-center">
                <i class="fas fa-user-cog mb-3" style="font-size: 2rem; color: #7da4a1;"></i>
                <h2 class="mb-0 font-weight-bold" style="font-size: 1.8rem;">Profile</h2>
                <p class="text-muted mb-0" style="font-size: 1rem;">Informasi anda</p>
                <hr style="width: 60%; margin: 1rem auto; border-top: 2px solid #324851;">
            </div>
        </div>
        @include('admin.session')
        <div class="card border-0 shadow animate__animated animate__fadeInUp">
            <div class="card-body">
                <form action="{{ route('profile.update', Auth::id()) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <!-- Informasi Akun -->
                    <h4 class="mb-3">Informasi Akun</h4>
                    <div class="row mb-4">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="username">Username</label>
                                <input type="text" class="form-control @error('username') is-invalid @enderror"
                                    id="username" name="username" value="{{ old('username', $user->username) }}">
                                @error('username')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" class="form-control @error('email') is-invalid @enderror"
                                    id="email" name="email" value="{{ old('email', $user->email) }}">
                                @error('email')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="password">Password Baru</label>
                                <input type="password" class="form-control @error('password') is-invalid @enderror"
                                    id="password" name="password" placeholder="Kosongkan jika tidak ingin mengubah">
                                @error('password')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <hr class="my-4">

                    <!-- Informasi Pribadi -->
                    <h4 class="mb-3">Informasi Pribadi</h4>
                    <div class="row mb-4">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="nama">Nama Lengkap</label>
                                <input type="text" class="form-control @error('nama') is-invalid @enderror"
                                    id="nama" name="nama" value="{{ old('nama', $dataPengguna->nama) }}">
                                @error('nama')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="tanggal_lahir">Tanggal Lahir</label>
                                <input type="date" class="form-control @error('tanggal_lahir') is-invalid @enderror"
                                    id="tanggal_lahir" name="tanggal_lahir"
                                    value="{{ old('tanggal_lahir', $dataPengguna->tanggal_lahir) }}">
                                @error('tanggal_lahir')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="jenis_kelamin">Jenis Kelamin</label>
                                <select class="form-control @error('jenis_kelamin') is-invalid @enderror"
                                    id="jenis_kelamin" name="jenis_kelamin">
                                    <option value="Laki-laki"
                                        {{ old('jenis_kelamin', $dataPengguna->jenis_kelamin) == 'Laki-laki' ? 'selected' : '' }}>
                                        Laki-laki</option>
                                    <option value="Perempuan"
                                        {{ old('jenis_kelamin', $dataPengguna->jenis_kelamin) == 'Perempuan' ? 'selected' : '' }}>
                                        Perempuan</option>
                                </select>
                                @error('jenis_kelamin')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="alamat">Alamat</label>
                                <textarea class="form-control @error('alamat') is-invalid @enderror" id="alamat" name="alamat" rows="3">{{ old('alamat', $dataPengguna->alamat) }}</textarea>
                                @error('alamat')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="text-center mt-5">
                        <a href="{{ route('beranda') }}" class="btn btn-secondary px-5 py-2 mr-2">
                            <i class="fas fa-arrow-left mr-2"></i>Kembali
                        </a>
                        <button type="submit" class="btn btn-primary px-5 py-2" style="background-color: #7da4a1;">
                            <i class="fas fa-save mr-2"></i>Perbarui Profil
                        </button>
                    </div>
                </form>
            </div>
        </div>




        <!-- Bootstrap core JavaScript-->
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
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/js/all.min.js"></script>



        <script>
            $(document).ready(function() {
                // Add some interactivity
                // Smooth scrolling for anchor links
                $('a[href^="#"]').on('click', function(event) {
                    var target = $(this.getAttribute('href'));
                    if (target.length) {
                        event.preventDefault();
                        $('html, body').stop().animate({
                            scrollTop: target.offset().top
                        }, 1000);
                    }
                });

                // Add animation class to elements when they come into view
                $(window).scroll(function() {
                    $(".animate__animated").each(function() {
                        var position = $(this).offset().top;
                        var scroll = $(window).scrollTop();
                        var windowHeight = $(window).height();
                        if (scroll > position - windowHeight + 200) {
                            $(this).addClass("animate__fadeInUp");
                        }
                    });
                });
            });
        </script>

        {{-- Hamburger klik --}}
        <script src="{{ asset('js/hambugerklik.js') }}"></script>
</body>

</html>
