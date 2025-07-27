<footer class="text-white py-0 mt-5" 
    style="background: linear-gradient(135deg, #34675c, #1f4d3b); box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);">
    <div class="container text-center text-md-start">
        <div class="row">
            <!-- About Us Section -->
            <div class="col-md-4 mt-3">
                <h5 class="text-uppercase" style="font-size: 1rem; font-weight: bold; color:#f1f1f2; border-bottom: 1px solid #f1f1f2;">About Us</h5>
                <p class="small" style="font-size: 0.75rem;">
                    Sebagai bagian dari komunitas Rukun Tetangga, kami hadir untuk membangun lingkungan yang nyaman,
                    aman, dan penuh kebersamaan. Dengan semangat gotong royong, kami mendukung kesejahteraan warga demi
                    terciptanya kehidupan yang harmonis dan sejahtera.
                </p>
            </div>

            <!-- Links Section -->
            <div class="col-md-4 mt-3">
                <h5 class="text-uppercase" style="font-size: 1rem; font-weight: bold; color:#f1f1f2; border-bottom: 1px solid #f1f1f2;">Links</h5>
                <ul class="list-unstyled">
                    <li class="mb-2">
                        <a href="{{ route('beranda') }}" class="text-white text-decoration-none link-hover"
                            style="transition: color 0.3s ease; font-size: 1rem;">
                            <i class="fas fa-home me-2"></i>Beranda
                        </a>
                    </li>
                    <!-- Add more links as needed -->
                </ul>
            </div>

            <!-- Contact Us Section -->
            <div class="col-md-4 mt-3">
                <h5 class="text-uppercase" style="font-size: 1rem; font-weight: bold; color:#f1f1f2; border-bottom: 1px solid #f1f1f2;">Contact Us</h5>
                <p class="small" style="font-size: 0.75rem;">Alamat: Jalan Mendalo Darat, Kota Jambi</p>
                <p class="small" style="font-size: 0.75rem;">Email: rt19mendalodarat@gmail.com</p>

                <!-- Social Media Icons -->
                <div class="social-icons mt-2">
                    <a href="#" class="text-white me-2" style="transition: transform 0.3s;">
                        <i class="fab fa-facebook-f"></i>
                    </a>
                    <a href="#" class="text-white me-2" style="transition: transform 0.3s;">
                        <i class="fab fa-twitter"></i>
                    </a>
                    <a href="#" class="text-white" style="transition: transform 0.3s;">
                        <i class="fab fa-instagram"></i>
                    </a>
                </div>
            </div>
        </div>

        <!-- Footer Bottom -->
        <div class="text-center mb-3">
            <p class="small mb-0" style="font-size: 0.75rem;">&copy; 2024 Rukun Tetangga. Semua hak dilindungi undang-undang.</p>
        </div>
    </div>
</footer>



<style>
    .link-hover:hover {
        color: #ffc107 !important;
        text-decoration: underline !important;
    }

    .social-icons a {
        font-size: 1.5rem;
        /* Meningkatkan ukuran ikon media sosial */
        transition: color 0.3s ease;
    }

    a.link-hover:hover {
        color: #ffb74d;
        /* Mengubah warna teks saat hover */
        text-decoration: underline;
        /* Menambahkan garis bawah */
    }

    /* Efek hover pada social media icons */
    .social-icons a:hover {
        transform: scale(1.1);
        /* Membesarkan ikon sedikit saat hover */
        color: #ffb74d;
        /* Ubah warna ikon saat hover */
    }
</style>

<!-- Font Awesome -->
<script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
