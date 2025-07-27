<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Riwayat</title>

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

    <x-navbar></x-navbar>
    {{-- Message No action 3 menit --}}
    @include('admin.massagetimeout')
    
    <div class="container mt-4">
        <div class="card mb-4 border-0 shadow animate__animated animate__fadeInDown">
            <div class="card-body text-center">
                <i class="fas fa-envelope mb-3" style="font-size: 2rem; color: #7da4a1;"></i>
                <h2 class="mb-0 font-weight-bold" style="font-size: 1.8rem;">Riwayat pengajuan surat</h2>
                <p class="text-muted mb-0" style="font-size: 1rem;">Informasi surat yang di setujui RT 19</p>
                <hr style="width: 60%; margin: 1rem auto; border-top: 2px solid #324851;">
            </div>
        </div>

        @if ($permohonans->isEmpty())
            <div class="alert alert-info text-center">
                <p>Anda belum pernah mengajukan surat.</p>
            </div>
        @else
            <div class="row">
                @foreach ($permohonans as $permohonan)
                    <div class="col-md-4 mb-4">
                        <div class="card shadow border-0 rounded-lg hover-card"
                            style="background: linear-gradient(135deg, #f0f4f8, #e0e7ee);">
                            <div class="card-body">
                                <!-- Nama Surat -->
                                <h5 class="card-title font-weight-bold text-dark">
                                    <i class="fas fa-file-alt text-primary"></i>
                                    {{ $permohonan->jenis_surat }}
                                </h5>

                                <!-- Status Surat -->
                                <p class="card-text mt-3">
                                    <strong>Status:</strong>
                                    @if ($permohonan->status === 'Selesai')
                                        <span class="badge badge-success">{{ $permohonan->status }}</span>
                                    @elseif ($permohonan->status === 'Ditolak')
                                        <span class="badge badge-danger">{{ $permohonan->status }}</span>
                                    @else
                                        <span class="badge badge-warning">{{ $permohonan->status }}</span>
                                    @endif
                                </p>

                                <!-- Detail Lain -->
                                <p class="card-text text-muted mt-2">
                                    <i class="fas fa-calendar-alt text-primary"></i>
                                    Tanggal Pengajuan:
                                    {{ \Carbon\Carbon::parse($permohonan->created_at)->format('d M Y') }}
                                </p>

                                <!-- Tombol Unduh -->
                                @if ($permohonan->status === 'Selesai')
                                    <a href="{{ route('download', $permohonan->id) }}"
                                        class="btn btn-primary btn-sm mt-3"
                                        style="background-color: #7da4a1; border-color: #7da4a1; color: white;">
                                        <i class="fas fa-download"></i> Unduh Surat
                                    </a>
                                @else
                                    <button class="btn btn-secondary btn-sm mt-3" disabled>
                                        <i class="fas fa-download"></i> Unduh Surat
                                    </button>
                                @endif

                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
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
