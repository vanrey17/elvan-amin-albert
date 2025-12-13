<?php
// Tentukan variabel data yang berbeda untuk setiap halaman (DPIB)
$page_title = "Desain Pemodelan dan Informasi Bangunan";
$page_description = "DPIB mempersiapkan siswa menjadi juru gambar arsitektur, drafter CAD, dan operator BIM (Building Information Modeling) yang profesional untuk industri konstruksi modern.";

?>

<main class="program-detail-section">
    <div class="hero-background">
        <div class="text-with-gradient-bg">
            <h1><?php echo $page_title; ?></h1>
            <p><?php echo $page_description; ?></p>
        </div>
    </div>
</main>

<!-- //// -->

<div class="program-detail-section">
    <h2 class="section-title">Tentang Program DPIB</h2>
    <div class="program-layout-container">
        
        <div class="program-content">
            
            <p>Program keahlian ini fokus pada penguasaan perangkat lunak Gambar Teknik 2D (CAD) dan pemodelan 3D, simulasi visualisasi bangunan, perhitungan anggaran biaya, serta implementasi Building Information Modeling (BIM) dalam proyek konstruksi. Lulusan memiliki kompetensi mendasar di bidang arsitektur dan sipil.</p>
            
            <h3>Prospek Karier:</h3>
            <ul>
                <li>Drafter Arsitektur (CAD Operator)</li>
                <li>Teknisi BIM (BIM Modeler/Coordinator Junior)</li>
                <li>Juru Ukur Tanah (Surveyor Asisten)</li>
                <li>Estimator Biaya Konstruksi (Quantity Surveyor Asisten)</li>
                <li>Pengawas Lapangan Junior</li>
                <li>Desainer Interior/Eksterior</li>
            </ul>
        </div>
        
        <div class="program-visual">
            <img src="<?php echo $image_path; ?>/labdpib.png" alt="Siswa DPIB Sedang Mengerjakan Desain Model 3D Bangunan">
        </div>
        
    </div>  

    <div class="kurikulum-section">
        <div class="container">
            <h2 class="section-title">Mata Pelajaran Utama DPIB 📐</h2>
            <p>Kurikulum DPIB menekankan kemampuan teknis dalam penggambaran konstruksi, pemahaman standar bangunan, dan penerapan teknologi digital terkini di bidang konstruksi.</p>
            
            <div class="mata-pelajaran-grid">
                
                <div class="mapel-card">
                    <div class="mapel-icon-container">
                        📏 </div>
                    <div class="mapel-content">
                        <h3>Gambar Teknik dan CAD 2D</h3>
                        <p>Mempelajari dasar-dasar proyeksi, standar garis dan notasi gambar teknik, serta pengoperasian perangkat lunak Computer Aided Design (CAD) 2D untuk gambar kerja.</p>
                    </div>
                </div>
                
                <div class="mapel-card">
                    <div class="mapel-icon-container">
                        🧱 </div>
                    <div class="mapel-content">
                        <h3>Konstruksi Bangunan dan Mekanika Teknik</h3>
                        <p>Fokus pada jenis-jenis pondasi, struktur dinding, rangka atap, material bangunan, serta perhitungan sederhana gaya dan beban pada struktur.</p>
                    </div>
                </div>

                <div class="mapel-card">
                    <div class="mapel-icon-container">
                        🔺 </div>
                    <div class="mapel-content">
                        <h3>Pemodelan 3D dan Visualisasi</h3>
                        <p>Mencakup teknik membuat model 3D arsitektur/interior, penentuan material, pencahayaan, hingga menghasilkan gambar *rendering* yang realistis.</p>
                    </div>
                </div>
                
                <div class="mapel-card">
                    <div class="mapel-icon-container">
                        🌐 </div>
                    <div class="mapel-content">
                        <h3>Building Information Modeling (BIM)</h3>
                        <p>Mempelajari konsep BIM, kolaborasi antar disiplin (arsitektur, struktur, MEP), dan penggunaan software BIM untuk membuat model informatif.</p>
                    </div>
                </div>
                
                <div class="mapel-card">
                    <div class="mapel-icon-container">
                        💵 </div>
                    <div class="mapel-content">
                        <h3>Perhitungan Rencana Anggaran Biaya (RAB)</h3>
                        <p>Keterampilan menghitung volume pekerjaan, membuat daftar kebutuhan material, dan menyusun Rencana Anggaran Biaya (RAB) proyek konstruksi.</p>
                    </div>
                </div>
                
                <div class="mapel-card pilihan">
                    <div class="mapel-icon-container">
                        🗺️ </div>
                    <div class="mapel-content">
                        <h3>Pilihan: Survei Tanah dan Pengukuran</h3>
                        <p>Mengenal dasar-dasar pengukuran topografi, penggunaan alat survei (Theodolit/Total Station), dan interpretasi data pengukuran untuk perencanaan tapak.</p>
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