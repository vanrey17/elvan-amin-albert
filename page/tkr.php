<?php
// Tentukan variabel data yang berbeda untuk setiap halaman (TKR)
$page_title = "Teknik Kendaraan Ringan";
$page_description = "TKR mempersiapkan siswa menjadi teknisi otomotif profesional yang kompeten dalam perawatan, perbaikan, dan diagnosis kerusakan pada sistem mesin, chasis, kelistrikan, dan AC mobil.";

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
    <h2 class="section-title">Tentang Program TKR</h2>
    <div class="program-layout-container">
        
        <div class="program-content">
            
            <p>Program keahlian ini fokus pada penguasaan teknologi mesin bensin dan diesel modern, sistem injeksi (EFI), perbaikan dan *overhaul* transmisi manual maupun otomatis, serta sistem kelistrikan bodi dan AC mobil. Lulusan memiliki bekal kuat untuk industri otomotif.</p>
            
            <h3>Prospek Karier:</h3>
            <ul>
                <li>Teknisi Mobil (Bengkel Resmi Dealer)</li>
                <li>Mekanik Perbaikan Mesin dan Transmisi</li>
                <li>Teknisi Servis AC Mobil</li>
                <li>Pemeriksa Kendaraan (*Quality Control*)</li>
                <li>Asisten Insinyur Otomotif</li>
                <li>Wirausaha Bengkel Mobil Mandiri</li>
            </ul>
        </div>
        
        <div class="program-visual">
            <img src="<?php echo $image_path; ?>/labtkr.png" alt="Siswa TKR Sedang Memperbaiki Mesin Mobil">
        </div>
        
    </div>  

    <div class="kurikulum-section">
        <div class="container">
            <h2 class="section-title">Mata Pelajaran Utama TKR 🚘</h2>
            <p>Kurikulum TKR menekankan praktik langsung dan pemahaman mendalam tentang standar operasional prosedur (SOP) perbaikan yang berlaku di industri otomotif.</p>
            
            <div class="mata-pelajaran-grid">
                
                <div class="mapel-card">
                    <div class="mapel-icon-container">
                        🛠️ </div>
                    <div class="mapel-content">
                        <h3>Perawatan dan Perbaikan Mesin</h3>
                        <p>Mempelajari siklus kerja mesin, pembongkaran, pengukuran komponen (blok, kepala silinder), *overhaul* mesin, dan teknik *tune-up* modern.</p>
                    </div>
                </div>
                
                <div class="mapel-card">
                    <div class="mapel-icon-container">
                        ⛽ </div>
                    <div class="mapel-content">
                        <h3>Sistem Bahan Bakar dan EFI</h3>
                        <p>Fokus pada diagnosis, perawatan, dan perbaikan sistem injeksi bahan bakar elektronik (EFI) serta penggunaan *scanner* dan alat diagnosa canggih.</p>
                    </div>
                </div>

                <div class="mapel-card">
                    <div class="mapel-icon-container">
                        🔩 </div>
                    <div class="mapel-content">
                        <h3>Chasis, Rem, dan Pemindah Tenaga</h3>
                        <p>Mencakup perbaikan sistem kemudi, suspensi, sistem rem (ABS), kopling, serta transmisi manual dan otomatis pada kendaraan ringan.</p>
                    </div>
                </div>
                
                <div class="mapel-card">
                    <div class="mapel-icon-container">
                        ⚡ </div>
                    <div class="mapel-content">
                        <h3>Kelistrikan Bodi dan Pengapian</h3>
                        <p>Mempelajari rangkaian kelistrikan bodi (lampu, *wiper*), sistem pengisian dan starter, serta sistem pengapian elektronik dan EFI pada mobil.</p>
                    </div>
                </div>
                
                <div class="mapel-card">
                    <div class="mapel-icon-container">
                        ❄️ </div>
                    <div class="mapel-content">
                        <h3>Perawatan dan Perbaikan AC Mobil</h3>
                        <p>Mempelajari prinsip kerja, komponen utama, proses *flushing*, pengisian freon, serta *troubleshooting* pada sistem pendingin udara (AC) mobil.</p>
                    </div>
                </div>
                
                <div class="mapel-card pilihan">
                    <div class="mapel-icon-container">
                        🔋 </div>
                    <div class="mapel-content">
                        <h3>Pilihan: Kendaraan Hybrid dan Listrik</h3>
                        <p>Mengenal konsep dasar, arsitektur sistem, dan teknik perawatan pada teknologi kendaraan *hybrid* dan mobil listrik (EV).</p>
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