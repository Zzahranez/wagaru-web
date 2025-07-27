<li class="nav-item dropdown">
    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown">
        <img src="img/undraw_profile.svg" alt="Admin" class="rounded-circle mr-2" style="width: 40px;">
        {{ Auth::user()->name }} <!-- Menampilkan nama pengguna yang sedang login -->
    </a>
    <div class="dropdown-menu dropdown-menu-right">
        <!-- Trigger the modal -->
        <a class="dropdown-item" href="#" data-toggle="modal" data-target="#profileModal"
            data-username="{{ Auth::user()->username ?? '' }}" data-email="{{ Auth::user()->email ?? '' }}"
            data-role="{{ Auth::user()->role ?? '' }}"
            data-nama="{{ Auth::user()->datapengguna->nama ?? 'Nama Tidak Ditemukan' }}"
            data-alamat="{{ Auth::user()->datapengguna->alamat ?? 'Alamat Tidak Ditemukan' }}"
            data-tanggal-lahir="{{ Auth::user()->datapengguna->tanggal_lahir ? \Carbon\Carbon::parse(Auth::user()->datapengguna->tanggal_lahir)->format('d F Y') : 'Tanggal Lahir Tidak Ditemukan' }}"
            data-jenis-kelamin="{{ Auth::user()->datapengguna->jenis_kelamin ?? 'Jenis Kelamin Tidak Ditemukan' }}"
            data-joined-date="{{ Auth::user()->created_at ? Auth::user()->created_at->format('d F Y') : '' }}">
            <i class="fas fa-user mr-2"></i>Profile
        </a>
        <div class="dropdown-divider"></div>
        <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
            <i class="fas fa-sign-out-alt mr-2"></i>Logout
        </a>
    </div>
</li>


{{-- Modal Logout --}}
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

                    <button class="btn btn-primary" type="submit"
                        style="background-color: #34675c; color:white">Logout</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Modal Profil User -->
<div class="modal fade" id="profileModal" tabindex="-1" role="dialog" aria-labelledby="profileModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content" style="background-color: #324851;">
            <div class="modal-header">
                <h5 class="modal-title" id="profileModalLabel" style="color: white;">Profil User</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true" style="color: white;">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="card" style="background-color: #7da4a1; color: white;">
                    <div class="card-body text-center">
                        <img src="img/undraw_profile.svg" alt="User Profile" class="rounded-circle mb-3"
                            style="width: 100px;">
                        <h5 class="card-title" id="profileUsername"></h5>
                        <p class="card-text" id="profileEmail"></p>
                        <hr style="border-color: white;">
                        <p><strong>Nama:</strong> <span id="profileNama"></span></p>
                        <p><strong>Alamat:</strong> <span id="profileAlamat"></span></p>
                        <p><strong>Tanggal Lahir:</strong> <span id="profileTanggalLahir"></span></p>
                        <p><strong>Jenis Kelamin:</strong> <span id="profileJenisKelamin"></span></p>
                        <p><strong>Username:</strong> <span id="profileUsernameDisplay"></span></p>
                        <p><strong>Role:</strong> <span id="profileRole"></span></p>
                        <p><strong>Tanggal Bergabung:</strong> <span id="profileJoinedDate"></span></p>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <a href="{{route('profile.index')}}">
                    <button type="button" class="btn btn-secondary" style="background-color: #7da4a1; border-color: #7da4a1; color: white;">
                        Edit
                    </button>
                </a>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
            </div>
        </div>
    </div>
</div>



<script>
    // Event listener untuk dropdown
    document.querySelector('.dropdown-menu').addEventListener('click', function(e) {
        // Pastikan kita hanya menjalankan kode ini jika elemen yang diklik adalah item profil
        if (e.target.closest('.dropdown-item[data-target="#profileModal"]')) {
            // Ambil data dari atribut data-* 
            const username = e.target.getAttribute('data-username');
            const email = e.target.getAttribute('data-email');
            const role = e.target.getAttribute('data-role');
            const joinedDate = e.target.getAttribute('data-joined-date');
            const nama = e.target.getAttribute('data-nama'); // Ambil nama
            const alamat = e.target.getAttribute('data-alamat'); // Ambil alamat
            const tanggalLahir = e.target.getAttribute('data-tanggal-lahir'); // Ambil tanggal lahir
            const jenisKelamin = e.target.getAttribute('data-jenis-kelamin'); // Ambil jenis kelamin

            // Isi konten modal
            document.getElementById('profileUsername').textContent = username;
            document.getElementById('profileEmail').textContent = email;
            document.getElementById('profileUsernameDisplay').textContent = username;
            document.getElementById('profileRole').textContent = role;
            document.getElementById('profileJoinedDate').textContent = joinedDate;

            // Isi data tambahan
            document.getElementById('profileNama').textContent = nama; // Set nama
            document.getElementById('profileAlamat').textContent = alamat; // Set alamat
            document.getElementById('profileTanggalLahir').textContent = tanggalLahir; // Set tanggal lahir
            document.getElementById('profileJenisKelamin').textContent = jenisKelamin;
        }
    });
</script>
