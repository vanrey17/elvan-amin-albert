
<body>
    <main class="hero-section">
        <div class="hero-content">
            <h1>Pendidikan</h1>
            <p>
                Pendidikan di SMK SWAKARYA telah menerapkan kurikulum merdeka untuk menunjang pertumbuhan dan perkembangan siswa siswa.
            </p>
            <a href="#" class="scroll-explore">Scroll to Explore</a>
        </div>
    </main>

<section class="content-section">
    <div class="identity-header">
        <p class="breadcrumb"><span>&#x2329;</span> Identitas Kami</p>
        <div class="identity-layout">
            <div class="title-column">
                <h2>Sekolah Menengah Kejuruan SWASTA yang telah berdiri sejak tahun 1977</h2>
            </div>
            <div class="description-column">
                <p>Kami hadir untuk memberkati setiap keluarga yang memilih SPH (Sekolah Pelita Harapan) sebagai rumah kedua mereka melalui pendidikan yang komprehensif di sekolah internasional Kristen (Christian International School). Lulusan kami diperlengkapi dengan visi untuk memimpin dan melayani dimanapun Tuhan menempatkan mereka. Identitas utama kami adalah panggilan untuk melayani, dan karena itu, kami mengabdikan diri untuk pertumbuhan perjalanan iman siswa kami.</p>
            </div>
        </div>
    </div>
    
    <div class="facts-section">
        <h3>Fakta Singkat tentang SWAKA</h3>
            <div class="facts-container">
                <div class="fact-item">
                    <span class="fact-icon">&#x1F46A;</span> 
                    <div class="fact-number-group"> 
                        <span class="fact-number">500</span> <span class="fact-label">+</span>    </div>
                    <p class="fact-description">Siswa</p>
                </div>
                
                <div class="fact-item">
                    <span class="fact-icon">&#x1F393;</span> 
                    <div class="fact-number-group"> 
                        <span class="fact-number">3,000</span> <span class="fact-label">+</span>    </div>
                    <p class="fact-description">Alumni</p>
                </div>

                <div class="fact-item">
                    <span class="fact-icon">&#x2B50;</span> 
                    <div class="fact-number-group"> 
                        <span class="fact-number">40</span> <span class="fact-label">+</span>    </div>
                    <p class="fact-description">Tahun Pengalaman di Dunia Pendidikan</p>
                </div>
                
                <div class="fact-item fact-row-2">
                    <span class="fact-icon">&#x1F464;</span> 
                    <div class="fact-number-group"> 
                        <span class="fact-number">52</span> <span class="fact-label"></span>    </div>
                    <p class="fact-description">Guru Expat</p>
                </div>

                
            </div>
    </div>
</section>


<section class="principal-section">
    <div class="principal-layout">
        
        <div class="principal-text-column">
            <h1 class="section-tag">KEPALA SEKOLAH</h1>
            <h4 class="section-title">-Elvan Reynaldi-</h4>
                Selamat datang di Sekolah Pelita Harapan. Sebagai pemimpin, saya berkomitmen untuk menciptakan lingkungan belajar yang holistik, di mana setiap siswa tidak hanya unggul secara akademis tetapi juga bertumbuh dalam karakter dan iman. Kami percaya bahwa pendidikan yang berpusat pada Kristus akan mempersiapkan lulusan yang siap menghadapi tantangan global.
            </p>
            <p class="principal-quote">
                "Visi kami adalah membentuk pemimpin masa depan yang berakar kuat pada nilai-nilai kebenaran dan pelayanan."
            </p>
            
            <a href="#" c   lass="read-more-button">Baca Pesan Selengkapnya &rarr;</a>
        </div>
        
        <div class="principal-image-column">
            <img src="image/principal.png" alt="Foto Kepala Sekolah" class="principal-photo">
            
            <div class="principal-contact">
                <h4>Nama Kepala Sekolah</h4>
                <p>Kepala Sekolah SMA/SMK SPH</p>
            </div>
        </div>
    </div>
</section>


    <div class="floating-widget">
        <p>Need assistance? Chat us today!</p>
        <a href="#" class="whatsapp-icon">[Ikon Chat]</a>
    </div>

<script>
    const mainHeader = document.querySelector('.main-header-container');
    const topHeader = document.querySelector('.top-header');
    let stickyPoint = 90; // Default fallback

    // Hitung tinggi Top Header setelah DOM dimuat
    window.addEventListener('load', () => {
        if (topHeader) {
            stickyPoint = topHeader.offsetHeight;
            // Jika ada margin atau border, Anda mungkin perlu menambahkan window.getComputedStyle()
        }
    });

    function handleScroll() {
        // Jika posisi scroll vertikal (scrollY) lebih besar atau sama dengan tinggi Top Header
        if (window.scrollY >= stickyPoint) {
            mainHeader.classList.add('scrolled');
        } else {
            mainHeader.classList.remove('scrolled');
        }
    }
    window.addEventListener('scroll', handleScroll);
</script>


<footer class="main-footer">
    <div class="footer-top-container">
        <div class="footer-column contact-info-column">
            <address>
                Jl.Sosial Km.5 No.472,<br>
                Kemuning, Palembang
            </address>

            <div class="social-media">
                <a href="#" aria-label="YouTube"><i class="fab fa-youtube"></i></a>
                <a href="#" aria-label="Facebook"><i class="fab fa-facebook-f"></i></a>
                <a href="#" aria-label="Instagram"><i class="fab fa-instagram"></i></a>
                <a href="URL_TIKTOK_ANDA" aria-label="TikTok"><i class="fab fa-tiktok"></i></a>
                <a href="#" aria-label="LinkedIn"><i class="fab fa-whatsapp"></i></a>

            </div>

            <p class="contact-item">
                <i class="fas fa-phone-alt"></i> 
                +62 21 546 0234
            </p>
            <p class="contact-item">
                <i class="fas fa-envelope"></i> 
                <a href="smkswakaryapalembang@gmail.com">smkswakaryapalembang@gmail.com</a>
            </p>
            <p class="contact-item">
                <i class="fas fa-map-marker-alt"></i> 
                <a href="https://maps.app.goo.gl/KdDu9ttbRb9bWLVY6">Lihat di google maps</a>
            </p>
        </div>

        <div class="footer-column footer-menu-group">
            <a href="#">Tujuan Kami</a>
            <a href="#">Visi & Misi</a>
            <a href="#">Karier</a>
            <a href="#">Blogs</a>
            <a href="#">Berita dan Acara</a>
        </div>

        <div class="footer-column footer-menu-group">
            <a href="#">Program</a>
            <a href="#">Kurikulum</a>
            <a href="#">Jalur Pembelajaran</a>
            <a href="#">Dukungan Pembelajaran</a>
            <a href="#">Pembelajaran Pelayanan</a>
        </div>

        <div class="footer-column footer-menu-group">
            <a href="#">Hubungi Kami</a>
            <a href="#">Tur Virtual</a>
            <a href="#">Daftar Sekarang</a>
            <a href="#">Biaya Sekolah</a>
            <a href="#">FAQ</a>
        </div>
    </div>
    
    <div class="footer-bottom">
        <h4 class="accreditations-title">Memorandum of Understanding</h4>
        <div class="accreditations-logos">
            <img src="image/mikrotik.png" alt="Logo Akreditasi" class="accreditation-logo">
            <img src="image/biznet.png" class="accreditation-logo">
            <img src="image/indihome.png" alt="Logo WASC" class="accreditation-logo">
            <img src="image/yamaha.png" class="accreditation-logo">
        </div>
    </div>
</footer>
  <footer>
    <p>© 2025 SMK SWAKARYA PALEMBANG | All Rights Reserved</p>
  </footer>
</body>