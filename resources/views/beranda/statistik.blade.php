<section id="stats" class="py-5 bg-light">
    <div class="container">
        <h2 class="text-center section-title mb-5">Statistik Kami</h2>
        <div class="row text-center">
            <!-- Warga Terdaftar -->
            <div class="col-md-4 mb-4">
                <div class="stat-card bg-primary text-white p-4 rounded shadow-sm hover-card">
                    <i class="fas fa-users fa-3x mb-3"></i>
                    <div class="animated-number display-4">{{$user}}</div>
                    <p class="h5">Warga Terdaftar</p>
                </div>
            </div>
            
            <!-- Surat Diproses -->
            <div class="col-md-4 mb-4">
                <div class="stat-card bg-warning text-dark p-4 rounded shadow-sm hover-card">
                    <i class="fas fa-envelope fa-3x mb-3"></i>
                    <div class="animated-number display-4">{{$surat}}</div>
                    <p class="h5">Surat di Proses</p>
                </div>
            </div>
            
            <!-- Placeholder for future stats -->
            <div class="col-md-4 mb-4">
                <div class="stat-card bg-success text-white p-4 rounded shadow-sm hover-card">
                    <i class="fas fa-hand-holding-usd fa-3x mb-3"></i> <!-- Ikon uang / donasi -->
                    <div class="animated-number display-4 font-weight-bold" style="font-size: 1.5rem;">Iuran RT</div>
                    <ul class="list-unstyled mt-3 text-left">
                        @foreach ($namaiuran as $iuran)
                            <li>
                                <span class="text-white">Iuran : <strong>{{ $iuran }}</strong></span>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
            
            
            
            
        </div>
    </div>
</section>
