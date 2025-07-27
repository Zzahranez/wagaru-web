<!-- resources/views/components/navbar.blade.php -->
<nav class="navbar navbar-expand-lg py-3 " style="background-color: #7da4a1; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);">
    {{-- #6fb98f --}}
    <div class="container">
        <a class="navbar-brand" href="#">
            <img src="img/logo.png" alt="logo" style="width: auto; height: 55px">
        </a>
        <button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#navmenu"
                aria-controls="navmenu" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navmenu">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link text-white {{ request()->is('/') ? 'active' : '' }}"
                        href="{{ route('beranda') }}">Beranda</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white {{ request()->is('#') ? 'active' : '' }}"
                        href="{{ route('beranda') }}#berita">Kontak</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white {{ request()->is('pengajuan') ? 'active' : '' }}" href="{{route('pengajuan.index')}}">Pengajuan</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white {{ request()->is('riwayat') ? 'active' : '' }}" href="{{route('riwayat')}}">Riwayat</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white {{ request()->is('iuran') ? 'active' : '' }}" href="{{route('iuran.index')}}">Iuran RT</a>
                </li>
                @if (Auth::check())
                    <!-- Cek apakah pengguna sudah login -->
                    @include('beranda.profiluser')
                @else
                    <li class="nav-item">
                        <a class="nav-link text-white {{ request()->is('login') ? 'active' : '' }}"
                            href="{{ route('login') }}">Login</a>
                    </li>
                @endif
            </ul>
        </div>
    </div>
</nav>

<style>
    /* Warna dan efek hover navbar */
    .nav-link {
        transition: color 0.4s ease, background-color 0.4s ease;
        padding: 10px 15px;
        border-radius: 5px;
    }

    /* Warna saat dihover */
    .nav-link:hover {
        color: #324851;
        background-color: rgba(255, 255, 255, 0.1);
    }

    /* Warna untuk link yang aktif */
    .nav-link.active {
        color: #324851;
        background-color: rgba(255, 255, 255, 0.2);
        border-bottom: 5px solid #324851;
    }

    /* Hover untuk tombol menu (hamburger menu) di layar kecil */
    .navbar-toggler {
        transition: transform 0.3s ease;
    }

    .navbar-toggler:hover {
        transform: rotate(90deg);
    }

    /* Sesuaikan ukuran font dan padding untuk tampilan mobile */
    @media (max-width: 768px) {
        .nav-link {
            padding: 8px 10px;
            font-size: 0.9rem;
        }

        .navbar-brand img {
            height: 50px;
        }
    }
</style>

<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Yakin ingin keluar?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">Klik logout jika anda sudah yakin ingin keluar?</div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                <form action="{{ route('logout') }}" method="POST" style="display:inline;">
                    @csrf
                    <button class="btn btn-primary" type="submit" style="background-color: #34675c; color:white">Logout</button>
                </form>
            </div>
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
