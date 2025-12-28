<?php
// Tentukan variabel data yang berbeda untuk setiap halaman (MPLB)
$page_title = "Manajemen Perkantoran dan Layanan Bisnis";
$page_description = "MPLB mempersiapkan siswa untuk menjadi profesional di bidang administrasi, kesekretariatan, layanan pelanggan, dan pengelolaan dokumen digital maupun konvensional.";

include 'page/hero.php';
?>


<div class="program-detail-section">
    <h2 class="section-title">Tentang Program MPLB</h2>
    <div class="program-layout-container">
        
        <div class="program-content">
            
            <p>Program keahlian ini fokus pada keterampilan manajerial perkantoran, komunikasi bisnis, kearsipan digital, otomatisasi perkantoran, dan pelayanan prima (*service excellence*). Lulusan siap mengisi posisi strategis dalam lingkungan kantor modern.</p>
            
            <h3>Prospek Karier:</h3>
            <ul>
                <li>Staf Administrasi Umum</li>
                <li>Sekretaris/Asisten Pribadi</li>
                <li>Customer Service Officer</li>
                <li>Arsiparis (Pengelola Dokumen)</li>
                <li>Staf Pemasaran Digital</li>
                <li>Operator Komputer Perkantoran</li>
            </ul>
        </div>
        
        <div class="program-visual">
            <img src="<?php echo $image_path; ?>/labmplb.png" alt="Siswa MPLB Sedang Belajar Administrasi dan Kearsipan">
        </div>
        
    </div>  

    <div class="kurikulum-section">
        <div class="container">
            <h2 class="section-title">Mata Pelajaran Utama MPLB 📝</h2>
            <p>Kurikulum MPLB dirancang untuk menciptakan tenaga administrasi yang profesional, terampil dalam teknologi, dan memiliki etika kerja yang tinggi.</p>
            
            <div class="mata-pelajaran-grid">
                
                <div class="mapel-card">
                    <div class="mapel-icon-container">
                        📈 </div>
                    <div class="mapel-content">
                        <h3>Otomatisasi Tata Kelola (OTK) Perkantoran</h3>
                        <p>Mempelajari penggunaan perangkat lunak perkantoran (MS Office/G Suite) dan sistem informasi manajemen untuk efisiensi pekerjaan administrasi, termasuk OTK Kepegawaian dan Sarana Prasarana.</p>
                    </div>
                </div>
                
                <div class="mapel-card">
                    <div class="mapel-icon-container">
                        📂 </div>
                    <div class="mapel-content">
                        <h3>Kearsipan dan Dokumen Digital</h3>
                        <p>Fokus pada sistem penyimpanan dan penemuan kembali dokumen (arsip) secara konvensional dan digital, sesuai standar keamanan dan efisiensi.</p>
                    </div>
                </div>

                <div class="mapel-card">
                    <div class="mapel-icon-container">
                        🤝 </div>
                    <div class="mapel-content">
                        <h3>Komunikasi Bisnis & Pelayanan Prima</h3>
                        <p>Mencakup teknik komunikasi lisan dan tertulis (surat, *email*) yang efektif, serta prinsip-prinsip *service excellence* (pelayanan prima) kepada pelanggan dan kolega.</p>
                    </div>
                </div>
                
                <div class="mapel-card">
                    <div class="mapel-icon-container">
                        💰 </div>
                    <div class="mapel-content">
                        <h3>Administrasi Keuangan Dasar</h3>
                        <p>Mempelajari dasar-dasar pencatatan transaksi keuangan, penyusunan laporan sederhana, dan pengelolaan kas kecil untuk operasional kantor.</p>
                    </div>
                </div>
                
                <div class="mapel-card">
                    <div class="mapel-icon-container">
                        👔 </div>
                    <div class="mapel-content">
                        <h3>Etika Profesi dan Budaya Kerja</h3>
                        <p>Keterampilan non-teknis (soft skill) yang krusial, meliputi etika berbusana, etika telepon, dan membangun budaya kerja yang profesional.</p>
                    </div>
                </div>
                
                <div class="mapel-card pilihan">
                    <div class="mapel-icon-container">
                        🛒 </div>
                    <div class="mapel-content">
                        <h3>Pilihan: Pemasaran Digital dan E-Commerce</h3>
                        <p>Mengenal konsep dasar pemasaran melalui media digital, pengelolaan media sosial untuk bisnis, dan dasar-dasar transaksi *e-commerce*.</p>
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