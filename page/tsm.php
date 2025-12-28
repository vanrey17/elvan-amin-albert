<?php
// Tentukan variabel data yang berbeda untuk setiap halaman (TSM)
$page_title = "Teknik Sepeda Motor";
$page_description = "TSM mempersiapkan siswa menjadi mekanik sepeda motor profesional yang terampil dalam perawatan, perbaikan, dan identifikasi kerusakan pada sistem mesin, chasis, dan kelistrikan sepeda motor.";

include 'page/hero.php';
?>


<div class="program-detail-section">
    <h2 class="section-title">Tentang Program TSM</h2>
    <div class="program-layout-container">
        
        <div class="program-content">
            
            <p>Program keahlian ini fokus pada penguasaan teknologi mesin 4-tak dan 2-tak, sistem injeksi (EFI), perbaikan chasis dan suspensi, serta diagnosis kerusakan pada sistem kelistrikan dan pengapian sepeda motor. Lulusan dipersiapkan untuk menghadapi sertifikasi kompetensi industri.</p>
            
            <h3>Prospek Karier:</h3>
            <ul>
                <li>Mekanik Sepeda Motor (Bengkel Resmi atau Umum)</li>
                <li>Teknisi Perawatan dan Perbaikan Mesin</li>
                <li>Staf Quality Control (QC) Perakitan Otomotif</li>
                <li>Tenaga Penjual Suku Cadang/Sales Motor</li>
                <li>Wirausaha Bengkel Mandiri</li>
                <li>Teknisi Modifikasi (Modifikator)</li>
            </ul>
        </div>
        
        <div class="program-visual">
            <img src="<?php echo $image_path; ?>/labtsm.png" alt="Siswa TSM Sedang Membongkar Mesin Sepeda Motor">
        </div>
        
    </div>  

    <div class="kurikulum-section">
        <div class="container">
            <h2 class="section-title">Mata Pelajaran Utama TSM 🛠️</h2>
            <p>Kurikulum TSM menekankan praktik langsung di laboratorium untuk memahami cara kerja mesin dan sistem pada berbagai jenis sepeda motor.</p>
            
            <div class="mata-pelajaran-grid">
                
                <div class="mapel-card">
                    <div class="mapel-icon-container">
                        ⚙️ </div>
                    <div class="mapel-content">
                        <h3>Perawatan Mesin Sepeda Motor</h3>
                        <p>Mempelajari dasar kerja mesin (4-tak dan 2-tak), pembongkaran, pengukuran komponen mesin, serta teknik *overhaul* dan *tune-up*.</p>
                    </div>
                </div>
                
                <div class="mapel-card">
                    <div class="mapel-icon-container">
                        ⛽ </div>
                    <div class="mapel-content">
                        <h3>Sistem Bahan Bakar (Karburator & EFI)</h3>
                        <p>Fokus pada prinsip kerja, perawatan, dan *troubleshooting* sistem karburator hingga teknologi injeksi bahan bakar elektronik (EFI) menggunakan *scanner*.</p>
                    </div>
                </div>

                <div class="mapel-card">
                    <div class="mapel-icon-container">
                        🔗 </div>
                    <div class="mapel-content">
                        <h3>Chasis, Suspensi, dan Pemindah Tenaga</h3>
                        <p>Mencakup perbaikan sistem rem (cakram & tromol), perawatan suspensi, dan perbaikan kopling serta transmisi manual dan otomatis (CVT).</p>
                    </div>
                </div>
                
                <div class="mapel-card">
                    <div class="mapel-icon-container">
                        💡 </div>
                    <div class="mapel-content">
                        <h3>Kelistrikan dan Pengapian</h3>
                        <p>Mempelajari rangkaian kelistrikan bodi (lampu, klakson), sistem pengisian (starter), dan sistem pengapian (CDI dan TCI) serta penggunaan alat ukur listrik.</p>
                    </div>
                </div>
                
                <div class="mapel-card">
                    <div class="mapel-icon-container">
                        💰 </div>
                    <div class="mapel-content">
                        <h3>Produk Kreatif dan Kewirausahaan</h3>
                        <p>Keterampilan merencanakan dan menjalankan unit bisnis bengkel kecil, manajemen inventaris suku cadang, dan pelayanan pelanggan.</p>
                    </div>
                </div>
                
                <div class="mapel-card pilihan">
                    <div class="mapel-icon-container">
                        🏎️ </div>
                    <div class="mapel-content">
                        <h3>Pilihan: Modifikasi dan Racing Engine</h3>
                        <p>Mengenal dasar-dasar modifikasi mesin (*porting and polish*), *setting* motor balap, dan pemahaman regulasi teknis balap motor.</p>
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