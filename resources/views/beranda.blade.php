<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Beranda</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    {{-- Link animasi --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    <link rel="stylesheet" href="css/hamburger.css">
    <style>
        .card-hover:hover {
            transform: translateY(-5px);
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            transition: all 0.3s ease;
        }

        .card-title {
            font-weight: bold;
        }

        .card-hover {
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .card-hover:hover {
            transform: translateY(-10px);
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
        }

        .icon-container {
            transition: transform 0.3s ease;
        }

        .icon-container:hover {
            transform: translateY(-5px);
        }

        .hover-shadow {
            transition: transform 0.3s, box-shadow 0.3s;

        }

        .hover-shadow:hover {
            transform: translateY(-5px);
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);

        }

        .no-padding {
            padding-left: 0;
            padding-right: 0;
        }
        .hover-card {
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            cursor: pointer;
        }

        .hover-card:hover {
            transform: scale(1.05);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.15);
        }
    </style>
</head>

<body class="d-flex flex-column min-vh-100 ">

    <x-navbar></x-navbar>

    <!-- Header gambar -->
    @include('beranda.header')

    {{-- Message No action 3 menit --}}
    @include('admin.massagetimeout')

    <!--- Layanan Kami -->
    <div class="container">
    @include('beranda.layanankami')

    <!-- Section Tentang Kami -->
    @include('beranda.tentangkami')
        
    </div>

    <!-- Visi dan Misi -->
    @include('beranda.visidanmisi')

    <!-- Statistik -->
    @include('beranda.statistik')

    <!-- Pertanyaan Umum -->
    @include('beranda.pertanyaanumum')


    <p id="berita"></p>

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
  


    <script>
        // Add some interactivity
        $(document).ready(function() {
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
    <script src="{{asset("js/hambugerklik.js")}}"></script>
</body>

</html>
