{{-- Section gambar Layanan Kami  --}}
<section id="layanan" class="py-5 bg-white">
    <div class="container">
        <h2 class="text-center mb-5 animate__animated animate__fadeInUp">Layanan Kami</h2>
        <div class="row">
            <div class="col-md-4 mb-4">
                <div class="card h-100 animate__animated opacity-0" data-animation="animate__zoomIn" data-delay="0.1s">
                    <div class=text-center>
                        <img src="img/logo.png" class="card-img-top img-fluid" alt="Konsultasi Online"
                            style="height: 200px; width:250px;">
                    </div>

                    <div class="card-body shadow-sm hover-shadow">
                        <h5 class="card-title"><i class="fas fa-envelope mr-2" style="color: #34675c;"></i>Pengajuan
                            Surat Online</h5>
                        <p class="card-text">Ajukan surat secara online
                        </p>
                        <div class="text-center">
                            <a href="{{ route('pengajuan.index') }}" class="btn btn-primary"
                                style="background-color: #34675c; border-color: #34675c;">Ajukan Surat</a>
                        </div>

                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="card h-100 animate__animated opacity-0" data-animation="animate__zoomIn" data-delay="0.3s">
                    <div class="text-center">
                        <img src="img/logo.png" class="card-img-top img-fluid" alt="Informasi Kesehatan"
                            style="height: 200px; width:250px;">
                    </div>

                    <div class="card-body shadow-sm hover-shadow">
                        <h5 class="card-title"><i class="fas fa-book mr-2" style="color: #34675c;"></i>Lihat iuran</h5>
                        <p class="card-text">Lihat iuran secara online
                        </p>
                        <div class="text-center">
                            <a href="{{ route('iuran.index') }}" class="btn btn-primary"
                                style="background-color: #34675c; border-color: #34675c;">Lihat iuran</a>
                        </div>

                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="card h-100 animate__animated opacity-0" data-animation="animate__zoomIn" data-delay="0.5s">
                    <div class="text-center">
                        <img src="img/logo.png" class="card-img-top img-fluid" alt="Jadwal Vaksinasi"
                            style="height: 200px; width:250px;">
                    </div>

                    <div class="card-body shadow-sm hover-shadow">
                        <h5 class="card-title"><i class="fas fa-history mr-2" style="color: #34675c;"></i>
                            Riwayat</h5>
                        <p class="card-text">Lihat Riwayat pengajuan surat</p>
                        <div class="text-center">
                            <a href="{{ route('riwayat') }}" class="btn btn-primary"
                            style="background-color: #34675c; border-color: #34675c;">Lihat Riwayat</a>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        const elements = document.querySelectorAll(".animate__animated");

        const observer = new IntersectionObserver(
            (entries) => {
                entries.forEach((entry) => {
                    if (entry.isIntersecting) {
                        const element = entry.target;
                        const animation = element.getAttribute("data-animation");
                        const delay = element.getAttribute("data-delay") || "0s";

                        element.style.animationDelay = delay;
                        element.classList.add(animation);
                        element.classList.remove("opacity-0");
                        observer.unobserve(element); // Stop observing once animated
                    }
                });
            }, {
                threshold: 0.1
            } // Element is considered visible when 10% of it is in viewport
        );

        elements.forEach((el) => observer.observe(el));
    });
</script>
