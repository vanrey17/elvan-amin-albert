<?php
// Tentukan variabel data yang berbeda untuk setiap halaman
$page_title = "Teknik Jaringan Komputer dan Telekomunikasi";
$page_description = "TJKT mempersiapkan siswa untuk menjadi profesional di bidang jaringan komputer dan telekomunikasi, dengan fokus pada instalasi, konfigurasi, dan pemeliharaan sistem jaringan.";

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
    <h2>Tentang Program TJKT</h2>
    <div class="program-layout-container">
        
        <div class="program-content">
            
            <p>Program keahlian ini fokus pada instalasi perangkat jaringan, konfigurasi server, dan troubleshooting masalah hardware maupun software. Lulusan dipersiapkan untuk menghadapi sertifikasi industri seperti Mikrotik dan Cisco.</p>
            
            <h3>Prospek Karier:</h3>
            <ul>
                <li>Network Engineer</li>
                <li>IT Support Specialist</li>
                <li>Administrator Jaringan</li>
                <li>Teknisi Komputer</li>
                <li>Data Entry</li>
                <li>Web Developer</li>
            </ul>

        </div>
        
        <div class="program-visual">
            <img src="<?php echo $image_path; ?>/labtjkt.png" alt="Siswa TJKT Sedang Belajar Jaringan">
        </div>
        
    </div>  

<div class="kurikulum-section">
    <div class="container">
        <h2>Mata Pelajaran Utama TJKT 📚</h2>
        <p>Kurikulum TJKT dirancang untuk membekali siswa dengan keterampilan teknis dan soft skill yang relevan dengan kebutuhan industri 4.0, khususnya di bidang jaringan, server, dan telekomunikasi.</p>
        
        <div class="mata-pelajaran-grid">
            
            <div class="mapel-card">
                <div class="mapel-icon-container">
                    📡 </div>
                <div class="mapel-content">
                    <h3>Teknologi Layanan Jaringan (TLJ)</h3>
                    <p>Mempelajari teknologi Voice over IP (VoIP), manajemen bandwidth, dan layanan jaringan berbasis server seperti DNS, Web Server, dan FTP Server.</p>
                </div>
            </div>
            
            <div class="mapel-card">
                <div class="mapel-icon-container">
                    💻 </div>
                <div class="mapel-content">
                    <h3>Administrasi Sistem Jaringan (ASJ)</h3>
                    <p>Fokus pada konfigurasi dan pengelolaan **sistem operasi jaringan** (Windows Server & Linux Server), virtualisasi, dan layanan direktori (Active Directory).</p>
                </div>
            </div>

            <div class="mapel-card">
                <div class="mapel-icon-container">
                    ⚙️ </div>
                <div class="mapel-content">
                    <h3>Administrasi Infrastruktur Jaringan (AIJ)</h3>
                    <p>Mencakup perancangan, instalasi, dan pengelolaan **perangkat keras jaringan** seperti router, switch, firewall, serta teknologi wireless dan fiber optic.</p>
                </div>
            </div>
            
            <div class="mapel-card">
                <div class="mapel-icon-container">
                    🔒 </div>
                <div class="mapel-content">
                    <h3>Cyber Security</h3>
                    <p>Mempelajari prinsip dasar **keamanan siber**, pencegahan serangan (DoS/DDoS), implementasi Firewall, dan konfigurasi VPN untuk komunikasi aman.</p>
                </div>
            </div>
            
            <div class="mapel-card">
                <div class="mapel-icon-container">
                    🎨 </div>
                <div class="mapel-content">
                    <h3>Desain Grafis</h3>
                    <p>Keterampilan penting untuk dokumentasi teknis dan presentasi, mencakup penggunaan software desain (seperti Corel Draw/Photoshop) untuk membuat infografis dan layout.</p>
                </div>
            </div>
            
            <div class="mapel-card pilihan">
                <div class="mapel-icon-container">
                    💡 </div>
                <div class="mapel-content">
                    <h3>Pilihan: Internet of Things (IoT)</h3>
                    <p>Mengenal konsep dasar, perancangan, dan pemrograman **perangkat IoT**, menghubungkan sensor/aktuator ke jaringan, dan platform *cloud* untuk pengumpulan data.</p>
                </div>
            </div>
            
        </div>
    </div>
</div>

</div>

<style>
    /* ====================================================
   2. GAYA KURIKULUM SECTION (1 BARIS 1 MAPEL)
   ==================================================== */

.kurikulum-section {
    background-color: #e9ecef; /* Latar belakang kontras */
    padding: 80px 0;
}

.kurikulum-section h2 {
    text-align: center;
    margin-bottom: 10px;
    color: #007bff;
}

.kurikulum-section p {
    text-align: center;
    margin-bottom: 40px;
    max-width: 700px;
    margin-left: auto;
    margin-right: auto;
}

.mata-pelajaran-grid {
    display: grid;
    /* Memastikan HANYA 1 kolom pada semua ukuran layar */
    grid-template-columns: 1fr; 
    gap: 20px; 
    max-width: 900px; 
    margin: 0 auto;
    padding: 0 20px;
}

.mapel-card {
    background: white;
    padding: 25px;
    border-radius: 10px;
    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.08);
    transition: transform 0.3s ease, box-shadow 0.3s ease;
    border-left: 5px solid #007bff; /* Garis biru sebagai aksen utama */
    
    /* Menggunakan Flexbox untuk tata letak ikon dan konten */
    display: flex;
    align-items: flex-start; /* Mengatur ikon dan teks sejajar di bagian atas */
    gap: 20px;
}

.mapel-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 8px 20px rgba(0, 0, 0, 0.15);
}

/* --- STYLING ICON/IMAGE CONTAINER --- */
.mapel-icon-container {
    flex-shrink: 0; 
    width: 60px;
    height: 60px;
    display: flex;
    align-items: center;
    justify-content: center;
    border-radius: 50%; /* Bentuk lingkaran */
    background-color: #e6f0ff; /* Background ringan */
    color: #007bff; /* Warna ikon/simbol utama */
    font-size: 30px; 
    /* Gaya untuk gambar JPG jika digunakan */
    /* img { width: 100%; height: 100%; object-fit: cover; border-radius: 50%; } */
}

/* --- STYLING CONTENT --- */
.mapel-content {
    flex-grow: 1; /* Konten mengambil sisa ruang */
}

.mapel-content h3 {
    color: #212529;
    margin-top: 0;
    font-size: 1.4em; 
    margin-bottom: 5px;
}

.mapel-content p {
    text-align: left; /* Mengembalikan teks ke rata kiri */
    margin-bottom: 0;
}

/* --- STYLING MATA PELAJARAN PILIHAN (IoT) --- */
.mapel-card.pilihan {
    background-color: #fff3cd; /* Latar belakang kuning muda */
    border-left: 5px solid #ffc107; /* Garis kuning sebagai aksen */
}

.mapel-card.pilihan .mapel-icon-container {
    background-color: #ffe066; /* Background ikon kuning */
    color: #856404;
}

.mapel-card.pilihan h3 {
    color: #856404;
}


/* ====================================
   3. MEDIA QUERIES (RESPONSIVITAS)
   ==================================== */
@media (max-width: 768px) {
    
    .program-layout-container {
        /* Mengubah Flexbox menjadi stack vertikal */
        flex-direction: column; 
        gap: 20px;
    }
    
    .program-content, .program-visual {
        width: 100%;
        min-width: unset;
    }

    .program-detail-section {
        padding: 40px 0;
    }

    .mapel-card {
        padding: 20px; /* Kurangi padding di perangkat kecil */
    }
    
    .mapel-icon-container {
        width: 50px;
        height: 50px;
        font-size: 25px;
    }
}
</style>