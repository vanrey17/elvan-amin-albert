<?php
// Tentukan variabel data yang berbeda untuk setiap halaman (TKR)
$page_title = "Dukungan Pembelajaran";
$page_description = "Lihat secara detail fasilitas pembelajaran dan infrastruktur teknologi yang kami sediakan. Setiap program keahlian didukung oleh laboratorium khusus dan peralatan standar industri untuk menjamin kompetensi teknis tertinggi bagi lulusan.";

?>

<main class="program-detail-section">
    <div class="hero-background">
        <div class="text-with-gradient-bg">
            <h1><?php echo $page_title; ?></h1>
            <p><?php echo $page_description; ?></p>
        </div>
    </div>
</main>
<div class="program-detail-section">
    <section class="labs-overview-section container">
        <h2 class="section-title">Laboratorium dan Peralatan Canggih Kami</h2>
        <p class="section-subtitle">Setiap lab dirancang untuk memaksimalkan potensi Anda, didukung oleh teknologi dan infrastruktur yang relevan dengan dunia kerja.</p>
        
        <div class="labs-grid">
            
            <div class="lab-card">
                <div class="lab-image-container">
                    <img src="<?php echo $image_path; ?>/labtjkt.png" alt="Lab Jaringan TJKT">
                    <div class="lab-icon">📡</div>
                </div>
                <div class="lab-info">
                    <h3>Teknik Jaringan Komputer dan Telekomunikasi (TJKT)</h3>
                    <p>Fokus pada instalasi, konfigurasi, dan pemeliharaan sistem jaringan berskala lokal hingga luas.</p>
                    <ul class="key-features">
                        <li><span>Lab:</span> Jaringan & Komputer</li>
                        <li><span>Alat:</span> Router, Switch (Mikrotik/Cisco), Server</li>
                        <li><span>Infrastruktur:</span> Internet Berkecepatan Tinggi, Ruang Server</li>
                    </ul>
                </div>
            </div>

            <div class="lab-card">
                <div class="lab-image-container">
                    <img src="<?php echo $image_path; ?>/labrpl.png" alt="Lab Pemrograman RPL">
                    <div class="lab-icon">💻</div>
                </div>
                <div class="lab-info">
                    <h3>Rekayasa Perangkat Lunak (RPL)</h3>
                    <p>Mengembangkan aplikasi web, mobile, dan desktop dengan penguasaan bahasa pemrograman terkini.</p>
                    <ul class="key-features">
                        <li><span>Lab:</span> Pemrograman</li>
                        <li><span>Alat:</span> PC High-Spec, Smart Board</li>
                        <li><span>Infrastruktur:</span> OS Multi-platform, Software Berlisensi</li>
                    </ul>
                </div>
            </div>

            <div class="lab-card">
                <div class="lab-image-container">
                    <img src="<?php echo $image_path; ?>/labdkv.png" alt="Lab Desain DKV">
                    <div class="lab-icon">🎨</div>
                </div>
                <div class="lab-info">
                    <h3>Desain Komunikasi Visual (DKV)</h3>
                    <p>Menciptakan karya visual inovatif melalui desain grafis, animasi, fotografi, dan videografi.</p>
                    <ul class="key-features">
                        <li><span>Lab:</span> Desain Kreatif</li>
                        <li><span>Alat:</span> PC/Mac (RAM 32GB+, GPU), Monitor Kalibrasi</li>
                        <li><span>Infrastruktur:</span> Adobe Creative Cloud, Studio Foto/Video</li>
                    </ul>
                </div>
            </div>

            <div class="lab-card">
                <div class="lab-image-container">
                    <img src="<?php echo $image_path; ?>/labdpib.png" alt="Lab Gambar DPIB">
                    <div class="lab-icon">📐</div>
                </div>
                <div class="lab-info">
                    <h3>Desain Pemodelan dan Informasi Bangunan (DPIB)</h3>
                    <p>Mewujudkan desain arsitektur dan konstruksi dengan pemodelan 2D/3D dan teknologi BIM.</p>
                    <ul class="key-features">
                        <li><span>Lab:</span> Gambar Teknik & Studio Manual</li>
                        <li><span>Alat:</span> PC High-Spec (Dual Monitor), Plotter, Alat Ukur</li>
                        <li><span>Infrastruktur:</span> Software BIM (Revit/Tekla), Meja Gambar</li>
                    </ul>
                </div>
            </div>

            <div class="lab-card">
                <div class="lab-image-container">
                    <img src="<?php echo $image_path; ?>/labmplb.png" alt="Lab Gambar DPIB">
                    <div class="lab-icon">👨‍💻</div>
                </div>
                <div class="lab-info">
                    <h3>Manajemen Perkantoran dan Layanan Bisnis (MPLB)</h3>
                    <p> menyediakan fasilitas laboratorium yang lengkap untuk mendukung pembelajaran di bidang manajemen 
                        perkantoran dan layanan bisnis.</p>
                    <ul class="key-features">
                        <li><span>Lab:</span> Gambar Teknik & Studio Manual</li>
                        <li><span>Alat:</span> PC High-Spec (Dual Monitor), Plotter, Alat Ukur</li>
                        <li><span>Infrastruktur:</span> Software BIM (Revit/Tekla), Meja Gambar</li>
                    </ul>
                </div>
            </div>

            <div class="lab-card">
                <div class="lab-image-container">
                    <img src="<?php echo $image_path; ?>/lablistrik.png" alt="Lab Kelistrikan TITL">
                    <div class="lab-icon">⚡</div>
                </div>
                <div class="lab-info">
                    <h3>Teknik Instalasi Tenaga Listrik (TITL)</h3>
                    <p>Menguasai instalasi listrik, kontrol motor, dan otomasi industri sesuai standar keamanan.</p>
                    <ul class="key-features">
                        <li><span>Lab:</span> Kelistrikan/Workshop</li>
                        <li><span>Alat:</span> Panel Praktik, Trainer Kontrol Motor, Trainer PLC</li>
                        <li><span>Infrastruktur:</span> Sumber Daya 3-Fase, Alat Ukur, Standar K3</li>
                    </ul>
                </div>
            </div>

            <div class="lab-card">
                <div class="lab-image-container">
                    <img src="<?php echo $image_path; ?>/labtsm.png" alt="Bengkel Otomotif TSM">
                    <div class="lab-icon">🚗</div>
                </div>
                <div class="lab-info">
                    <h3>Teknik Sepeda Motor (TSM)</h3>
                    <p>Perawatan, perbaikan, dan diagnosis sistem mesin, chasis, kelistrikan pada motor.</p>
                    <ul class="key-features">
                        <li><span>Lab:</span> Bengkel Praktek Sepeda Motor</li>
                        <li><span>Alat:</span> Unit Trainer Motor, Lift/Pit, Alat Diagnosis EFI</li>
                        <li><span>Infrastruktur:</span> Sistem Exhaust, Special Tools, Area Kerja K3</li>
                    </ul>
                </div>
            </div>

            <div class="lab-card">
                <div class="lab-image-container">
                    <img src="<?php echo $image_path; ?>/labtkr.png" alt="Bengkel Otomotif TKR">
                    <div class="lab-icon">🚗</div>
                </div>
                <div class="lab-info">
                    <h3>Teknik Kendaraan Ringan (TKR)</h3>
                    <p>Perawatan, perbaikan, dan diagnosis sistem mesin, chasis, kelistrikan pada mobil.</p>
                    <ul class="key-features">
                        <li><span>Lab:</span> Bengkel Praktek Otomotif</li>
                        <li><span>Alat:</span> Unit Trainer Mobil, Lift/Pit, Alat Diagnosis EFI</li>
                        <li><span>Infrastruktur:</span> Sistem Exhaust, Special Tools, Area Kerja K3</li>
                    </ul>
                </div>
            </div>
            
            <div class="lab-card">
                <div class="lab-image-container">
                    <img src="<?php echo $image_path; ?>/perpus.jpeg" alt="Perpustakaan">
                    <div class="lab-icon">📚</div>
                </div>
                <div class="lab-info">
                    <h3>Perpustakaan</h3>
                    <p>Perpustakaan yang bernuansa digital dan elegant serta menyediakan buku yang lengkap bagi siswa/siswi</p>
                    <ul class="key-features">
                        <li><span>Layar interaktif:</span>Mendukung pencarian buku secara digital</li>
                        <li><span>Buku: </span>Menyediakan fasilitas buku yang lengkap</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <section class="collaboration-section container">
        <h2 class="section-title">Kolaborasi dan Efisiensi Infrastruktur</h2>
        <p class="section-subtitle">Kami mengoptimalkan penggunaan fasilitas untuk pengalaman belajar yang komprehensif dan efisien.</p>
        <div class="collaboration-grid">
            <div class="collaboration-item">
                <div class="collaboration-icon">👥</div>
                <h3>Lab Komputer Dasar Bersama</h3>
                <p>Lab komputer standar dapat dijadwalkan bersama oleh **TJKT, RPL, DKV, dan DPIB** untuk mata pelajaran non-spesifik, menghemat pengadaan PC dasar.</p>
            </div>
            <div class="collaboration-item">
                <div class="collaboration-icon">🔬</div>
                <h3>Lab Spesialisasi Tinggi</h3>
                <p>Lab dengan **PC GPU Tinggi** (DKV & DPIB) dan Lab dengan **Mesin Berat** (TITL & Otomotif) dialokasikan secara semi-permanen karena kebutuhan *hardware* unik dan mahal.</p>
            </div>
            <div class="collaboration-item">
                <div class="collaboration-icon">📡</div>
                <h3>Infrastruktur Jaringan Terpadu</h3>
                <p>**Lab TJKT** berfungsi sebagai pusat untuk seluruh kampus. Dipastikan semua Lab Komputer terhubung dengan **jaringan gigabit** yang dikelola secara profesional.</p>
            </div>
        </div>
    </section>
</div>
</div>

<style>
/* --- HERO SECTION UTAMA (LEBIH VISUAL) --- */
.hero-section.visual-hero {
    position: relative;
    background: url('/path/to/your/main-lab-hero.jpg') no-repeat center center/cover; /* Ganti dengan gambar hero kampus/lab utama */
    color: white;
    padding: 100px 20px;
    text-align: center;
    overflow: hidden;
}

.hero-overlay {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: linear-gradient(rgba(0,0,0,0.6), rgba(0,0,0,0.8)); /* Overlay gelap */
    z-index: 1;
}

.hero-content {
    position: relative;
    z-index: 2;
    max-width: 900px;
    margin: 0 auto;
}

.hero-content h1 {
    color: white;
    font-size: 3.2em;
    margin-bottom: 15px;
    text-shadow: 2px 2px 4px rgba(0,0,0,0.4);
}

.hero-content p {
    font-size: 1.3em;
    opacity: 0.9;
    line-height: 1.5;
}

/* --- SECTION JUDUL UMUM --- */
.section-title {
    font-size: 2.8em;
    color: #003366;
    border-bottom: 4px solid #ff6600; /* Underline lebih tebal */
    padding-bottom: 15px;
    margin: 60px auto 20px auto;
    display: inline-block; 
    text-align: center;
    max-width: 80%; /* Batasi lebar agar underline tidak terlalu panjang */
}

.section-subtitle {
    font-size: 1.2em;
    color: #555;
    margin-bottom: 50px;
    text-align: center;
    max-width: 900px;
    margin-left: auto;
    margin-right: auto;
}

/* ====================================
   GAYA GRID KARTU LAB PER JURUSAN
   ==================================== */
.labs-overview-section {
    padding: 20px 50px 0 50px;
}

.labs-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(420px, 1fr)); /* 3 kolom di desktop */
    gap: 35px;
    margin-top: 40px;
}

.lab-card {
    background: white;
    border-radius: 12px;
    box-shadow: 0 8px 25px rgba(0, 0, 0, 0.1);
    overflow: hidden;
    transition: transform 0.3s ease, box-shadow 0.3s ease;
    border: 1px solid #e0e0e0;
}

.lab-card:hover {
    transform: translateY(-8px);
    box-shadow: 0 12px 30px rgba(0, 0, 0, 0.15);
}

.lab-image-container {
    position: relative;
    height: 200px; /* Tinggi gambar */
    overflow: hidden;
    background-color: #f0f0f0; /* Placeholder jika gambar belum ada */
    display: flex;
    align-items: center;
    justify-content: center;
}

.lab-image-container img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: transform 0.3s ease;
}

.lab-card:hover .lab-image-container img {
    transform: scale(1.05); /* Efek zoom pada hover */
}

.lab-icon {
    position: absolute;
    bottom: 15px;
    right: 15px;
    background-color: #007bff; /* Warna ikon */
    color: white;
    width: 50px;
    height: 50px;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 1.8em;
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
}

.lab-info {
    padding: 25px;
}

.lab-info h3 {
    font-size: 1.6em;
    color: #003366;
    margin-bottom: 10px;
}

.lab-info p {
    font-size: 0.95em;
    color: #666;
    margin-bottom: 20px;
}

.key-features {
    list-style: none;
    padding: 0;
    margin: 0;
}

.key-features li {
    font-size: 0.9em;
    color: #444;
    margin-bottom: 8px;
    display: flex;
    align-items: flex-start;
}

.key-features li::before {
    content: '•'; /* Bullet point kustom */
    color: #ff6600; /* Warna aksen */
    font-weight: bold;
    display: inline-block;
    width: 1em;
    margin-left: -1em;
    margin-right: 0.5em;
}

.key-features li span {
    font-weight: bold;
    color: #222;
    min-width: 70px; /* Lebar minimum untuk label seperti 'Lab:' */
}

/* ====================================
   GAYA KOLABORASI SECTION (LEBIH VISUAL)
   ==================================== */
.collaboration-section {
    background-color: #f1f8ff; /* Latar belakang biru muda */
    padding: 40px 80px 20px 80px;
    text-align: center;
}

.collaboration-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
    gap: 30px;
    margin-top: 40px;
}

.collaboration-item {
    background: white;
    padding: 30px;
    border-radius: 10px;
    box-shadow: 0 5px 15px rgba(0, 123, 255, 0.1);
    border: 1px solid #d4edda; /* Warna border hijau */
    transition: transform 0.3s ease, box-shadow 0.3s ease;
}

.collaboration-item:hover {
    transform: translateY(-5px);
    box-shadow: 0 8px 20px rgba(0, 123, 255, 0.2);
}

.collaboration-icon {
    font-size: 3em;
    color: #28a745; /* Ikon hijau */
    margin-bottom: 15px;
}

.collaboration-item h3 {
    font-size: 1.4em;
    color: #0056b3;
    margin-bottom: 10px;
}

.collaboration-item p {
    font-size: 0.9em;
    color: #555;
    line-height: 1.6;
}


/* ====================================
   MEDIA QUERIES (Responsif)
   ==================================== */
@media (max-width: 992px) {
    .hero-content h1 {
        font-size: 2.5em;
    }
    .hero-content p {
        font-size: 1.1em;
    }
    .section-title {
        font-size: 2.2em;
    }
}

@media (max-width: 768px) {
    .hero-section.visual-hero {
        padding: 80px 15px;
    }
    .hero-content h1 {
        font-size: 2em;
    }
    .hero-content p {
        font-size: 1em;
    }
    .section-title {
        font-size: 1.8em;
        margin-top: 40px;
        margin-bottom: 15px;
        max-width: 90%;
    }
    .section-subtitle {
        font-size: 1em;
        margin-bottom: 30px;
    }
    .labs-grid {
        grid-template-columns: 1fr; /* 1 kolom di ponsel */
        gap: 25px;
    }
    .lab-card {
        margin: 0 auto;
        max-width: 400px; /* Batasi lebar card di ponsel agar tidak terlalu lebar */
    }
    .collaboration-grid {
        grid-template-columns: 1fr;
    }
    .collaboration-item {
        max-width: 400px;
        margin: 0 auto;
    }
}

@media (max-width: 480px) {
    .hero-content h1 {
        font-size: 1.7em;
    }
    .hero-content p {
        font-size: 0.9em;
    }
    .lab-info h3 {
        font-size: 1.4em;
    }
    .lab-icon {
        width: 40px;
        height: 40px;
        font-size: 1.5em;
        bottom: 10px;
        right: 10px;
    }
}
</style>