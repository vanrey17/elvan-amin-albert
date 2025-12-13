<?php
// Tentukan variabel data yang berbeda untuk setiap halaman (TITL)
$page_title = "Teknik Instalasi Tenaga Listrik";
$page_description = "TITL mempersiapkan siswa untuk menjadi teknisi ahli dalam perencanaan, pemasangan, dan pemeliharaan instalasi listrik perumahan, industri, serta sistem kontrol dan pembangkitan energi.";

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
    <h2 class="section-title">Tentang Program TITL</h2>
    <div class="program-layout-container">
        
        <div class="program-content">
            
            <p>Program keahlian ini fokus pada penguasaan dasar-dasar kelistrikan, standar pemasangan instalasi listrik (PUIL), perancangan rangkaian kontrol motor listrik, serta teknik perawatan dan perbaikan sistem tenaga listrik. Lulusan memiliki sertifikasi yang diperlukan untuk bekerja di sektor energi dan industri.</p>
            
            <h3>Prospek Karier:</h3>
            <ul>
                <li>Teknisi Instalasi Listrik Gedung/Industri</li>
                <li>Panel Maker dan Kontrol Listrik</li>
                <li>Operator Pembangkit Listrik (Asisten)</li>
                <li>Teknisi Perawatan dan Perbaikan Listrik</li>
                <li>Estimator Biaya Pemasangan Listrik</li>
                <li>Teknisi PLC dan Otomasi Industri</li>
            </ul>
        </div>
        
        <div class="program-visual">
            <img src="<?php echo $image_path; ?>/lablistrik.png" alt="Siswa TITL Sedang Merakit Panel Kontrol Listrik">
        </div>
        
    </div>  

    <div class="kurikulum-section">
        <div class="container">
            <h2 class="section-title">Mata Pelajaran Utama TITL 💡</h2>
            <p>Kurikulum TITL menekankan keselamatan kerja, pemahaman skema rangkaian, dan penguasaan teknik pemasangan sesuai standar Keselamatan dan Kesehatan Kerja (K3) dan PUIL.</p>
            
            <div class="mata-pelajaran-grid">
                
                <div class="mapel-card">
                    <div class="mapel-icon-container">
                        🔋 </div>
                    <div class="mapel-content">
                        <h3>Dasar Listrik dan Elektronika</h3>
                        <p>Mempelajari teori dasar arus AC/DC, hukum Ohm, rangkaian seri-paralel, serta pengenalan komponen dan alat ukur elektronika dasar.</p>
                    </div>
                </div>
                
                <div class="mapel-card">
                    <div class="mapel-icon-container">
                        🔌 </div>
                    <div class="mapel-content">
                        <h3>Instalasi Penerangan dan Tenaga Listrik</h3>
                        <p>Fokus pada perencanaan dan pemasangan instalasi listrik untuk perumahan dan gedung bertingkat, termasuk perhitungan daya dan pemilihan komponen (sesuai PUIL).</p>
                    </div>
                </div>

                <div class="mapel-card">
                    <div class="mapel-icon-container">
                        ⚙️ </div>
                    <div class="mapel-content">
                        <h3>Instalasi Motor Listrik dan Kontrol</h3>
                        <p>Mencakup perancangan dan perakitan panel kendali motor listrik (DOL, *forward-reverse*, *star-delta*), serta pengenalan komponen kontrol (relay, kontaktor, timer).</p>
                    </div>
                </div>
                
                <div class="mapel-card">
                    <div class="mapel-icon-container">
                        🛠️ </div>
                    <div class="mapel-content">
                        <h3>Perawatan dan Perbaikan Sistem Listrik</h3>
                        <p>Keterampilan mendiagnosis kerusakan pada instalasi dan mesin listrik, melakukan *troubleshooting*, dan melaksanakan prosedur perawatan berkala.</p>
                    </div>
                </div>
                
                <div class="mapel-card">
                    <div class="mapel-icon-container">
                        🤖 </div>
                    <div class="mapel-content">
                        <h3>Otomasi Industri dan PLC</h3>
                        <p>Mempelajari dasar-dasar Programable Logic Controller (PLC), pemrograman ladder diagram, dan penerapannya dalam sistem kontrol otomatis di industri.</p>
                    </div>
                </div>
                
                <div class="mapel-card pilihan">
                    <div class="mapel-icon-container">
                        ☀️ </div>
                    <div class="mapel-content">
                        <h3>Pilihan: Pembangkit Listrik Energi Terbarukan</h3>
                        <p>Mengenal konsep dasar PLTS (Pembangkit Listrik Tenaga Surya), PLTB (Bayu), instalasi, dan perawatan komponen sistem energi terbarukan.</p>
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