<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Beranda</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">

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

    <x-navbar></x-navbar>
    <div class="container mt-4">
        <div class="card mb-4 border-0 shadow animate__animated animate__fadeInDown">
            <div class="card-body text-center">
                <i class="fas fa-bullhorn mb-3" style="font-size: 2rem; color: #7da4a1;"></i>
                <h2 class="mb-0 font-weight-bold" style="font-size: 1.8rem;">Pengumuman Iuran Rukun Tetangga 19</h2>
                <p class="text-muted mb-0" style="font-size: 1rem;">Informasi terbaru mengenai iuran warga di RT 19</p>
                <hr style="width: 60%; margin: 1rem auto; border-top: 2px solid #324851;">
            </div>
        </div>

        {{-- Message No action 3 menit --}}
        @include('admin.massagetimeout')

        <div class="row">
            @foreach ($iurans as $iuran)
                <div class="col-md-4 mb-4">
                    <div class="card mt-5 shadow border-0 rounded-lg hover-card"
                        style="background: linear-gradient(135deg, #f0f4f8, #e0e7ee);">
                        <div class="card-body">
                            <div class="d-flex align-items-center mb-3">
                                <i class="fas fa-money-bill-wave mr-2" style="font-size: 1.5rem; color: #28a745;"></i>
                                <h5 class="card-title text-dark font-weight-bold mb-0">{{ $iuran->nama_iuran }}</h5>
                            </div>
                            <p class="card-text text-muted mt-2">
                                <i class="fas fa-coins text-warning mr-1"></i>
                                Jumlah: <span class="text-dark">{{ number_format($iuran->jumlah, 0, ',', '.') }}</span>
                            </p>
                            <p class="card-text text-muted">
                                <i class="fas fa-calendar-alt text-primary mr-1"></i>
                                Tanggal: <span
                                    class="text-dark">{{ \Carbon\Carbon::parse($iuran->tanggal)->format('d M Y') }}</span>
                            </p>
                            <p class="card-text text-muted">
                                @if ($iuran->status === 'selesai')
                                    <i class="fas fa-check-circle text-info mr-1"></i>
                                    Status: <span class="text-dark">{{ $iuran->status }}</span>
                                @else
                                    <i class="fas fa-times-circle text-danger mr-1"></i>
                                    Status: <span class="text-dark">{{ $iuran->status }}</span>
                                @endif
                            </p>
                            <hr>
                            @include('admin.adminkelolaiuran.bayariuran')
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    <x-footer></x-footer>

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
