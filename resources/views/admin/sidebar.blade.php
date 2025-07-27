<nav id="sidebarNav" class="col-md-2 d-none d-md-block sidebar">
    <div class="sidebar-sticky">
        <div class="text-center py-4">
            <img src="img/logo.png" alt="Logo RT 19" class="img-fluid" style="max-width: 120px; height:100px;">
        </div>
        <ul class="nav flex-column mt-3">
            <li class="nav-item">
                <a class="nav-link {{ request()->is('admindash') ? 'active' : '' }}" href="{{ route('admindash') }}">
                    <i class="fas fa-tachometer-alt mr-2"></i>Dashboard
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ request()->is('adminpengajuansurat') ? 'active' : '' }}" href="{{route('adminpengajuansurat.index')}}">
                    <i class="fas fa-envelope mr-2"></i>Kelola Surat
                </a>
            </li>
            <hr class="nav-divider">
            <li class="nav-item text-white ">
                <a class="nav-link {{ request()->is('adminkelolaiuran') ? 'active' : '' }}"
                    href="{{ route('adminkelolaiuran.index') }}">
                    <i class="fas fa-cog mr-2"></i>Kelola Iuran
                </a>
            </li>
            <li class="nav-item text-white " >
                <a class="nav-link {{ request()->is('viewadminiuran') ? 'active' : '' }}"
                    href="{{ route('viewadminiuran.index') }}">
                    <i class="fas fa-landmark mr-2"></i>Data Iuran 
                </a>
            </li>
            <hr class="nav-divider">
            <li class="nav-item">
                <a class="nav-link {{ request()->is('adminkelolauser') ? 'active' : '' }}"
                    href="{{ route('adminkelolauser.index') }}">
                    <i class="fas fa-users mr-2"></i>Kelola User
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ request()->is('adminkelolapengguna') ? 'active' : '' }}"
                    href="{{ route('adminkelolapengguna.index') }}">
                    <i class="fas fa-users-cog mr-2"></i>Data Pengguna
                </a>
            </li>
        </ul>

    </div>
</nav>

<style>
    .nav-link {
        color: #ffffff;
        /* Warna teks dasar */
        transition: background-color 0.3s ease, border-bottom 0.3s ease;
        /* Transisi untuk efek hover dan border */
        padding: 10px 15px;
        /* Tambahkan padding untuk ruang di sekitar teks */
        position: relative;
        /* Posisi relatif untuk elemen anak */
    }

    .nav-link:hover {
        background-color: rgba(255, 255, 255, 0.1);
        /* Warna latar belakang saat hover */
    }

    .nav-link.active {
        color: #112e27;
        /* Ubah warna teks saat aktif */
        border-bottom: 5px solid #324851;
        /* Tambahkan garis bawah saat aktif */
    }

    .nav-divider {
        border: 0;
        border-top: 3px solid #ddd;
        margin: 4px 0;
    }
</style>
