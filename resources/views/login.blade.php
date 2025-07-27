<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>

    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    <link rel="stylesheet" href="css/hamburger.css">
    <style>
        body {
            background-color: #f8f9fc;
            /* Warna latar belakang */
        }

        .btn-primary {
            transition: all 0.3s ease;
            /* Animasi transisi */
        }

        .btn-primary:hover {
            background-color: #0056b3;
            /* Warna saat hover */
            transform: scale(1.05);
            /* Efek zoom saat hover */
        }

        .alert {
            transition: opacity 0.3s ease;
            /* Animasi transisi untuk alert */
        }

        .alert-danger {
            opacity: 0.9;
        }

        .card {
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            /* Animasi transisi untuk card */
        }

        .card:hover {
            transform: translateY(-10px);
            /* Efek mengangkat card saat hover */
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.2);
            /* Tambahkan bayangan saat hover */
        }
    </style>
</head>

<body class="bg-light">

    {{-- Message No action 3 menit --}}
    @include('admin.massagetimeout')

    <div class="container d-flex align-items-center justify-content-center" style="min-height: 100vh;">
        <!-- Outer Row -->
        <div class="row justify-content-center w-100">
            <div class="col-xl-8 col-lg-10 col-md-9">
                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <!-- Kolom untuk Gambar -->
                            <div class="col-lg-6 d-flex align-items-center justify-content-center">
                                <div
                                    style="border-radius: 20px; overflow: hidden; width: 100%; max-width: 600px; height: auto; display: flex; align-items: center; justify-content: center;">
                                    <!-- Gambar responsif -->
                                    <img src="img/login_img.svg" class="img-fluid" alt="Login Image"
                                        style="height: auto%; width: 65%; ">
                                </div>
                            </div>
                            <!-- Kolom untuk Form Login -->
                            <div class="col-lg-6 d-flex flex-column justify-content-center">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h2>Login yuk...</h2>
                                        <p>Ajukan permohonan surat, dengan lebih mudah dan praktis</p>
                                        <h1 class="h4 text-gray-900 mb-4">Selamat Datang</h1>
                                    </div>

                                    <form class="user" action="{{ route('login') }}" method="POST">
                                        @csrf
                                        <div class="form-group">
                                            <input type="text" class="form-control form-control-user" id="username"
                                                name="username" aria-describedby="emailHelp" placeholder="Username"
                                                required>
                                            @error('username')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control form-control-user" id="password"
                                                name="password" placeholder="Password" required>
                                            @error('password')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <button type="submit" class="btn btn-primary btn-user btn-block"
                                            style="background-color: #7da4a1; border-color: #7da4a1; color: white;">
                                            Login
                                        </button>

                                    </form>

                                    @if ($errors->any())
                                        <div class="alert alert-danger mt-3">
                                            <ul>
                                                @foreach ($errors->all() as $error)
                                                    <li>{{ $error }}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>
</body>

</html>
