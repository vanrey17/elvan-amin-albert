<?php
// Tentukan variabel data yang berbeda untuk setiap halaman (DKV)
$page_title = "Desain Komunikasi Visual";
$page_description = "DKV mempersiapkan siswa menjadi desainer kreatif yang mampu menghasilkan solusi visual untuk menyampaikan pesan yang efektif melalui media cetak dan digital.";

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
    <h2 class="section-title">Tentang Program DKV</h2>
    <div class="program-layout-container">
        
        <div class="program-content">
            
            <p>Program keahlian ini fokus pada pengembangan kreativitas, penguasaan perangkat lunak desain grafis dan animasi, fotografi, videografi, serta pemahaman mendalam tentang branding dan komunikasi visual. Lulusan siap bekerja sebagai desainer di berbagai industri kreatif.</p>
            
            <h3>Prospek Karier:</h3>
            <ul>
                <li>Graphic Designer</li>
                <li>Illustrator</li>
                <li>Video Editor / Motion Graphic Designer</li>
                <li>Content Creator</li>
                <li>Web Designer (UI/UX Junior)</li>
                <li>Fotografer Komersial</li>
            </ul>
        </div>
        
        <div class="program-visual">
            <img src="<?php echo $image_path; ?>/labdkv.png" alt="Siswa DKV Sedang Mendesain dan Mengedit">
        </div>
        
    </div>  

    <div class="kurikulum-section">
        <div class="container">
            <h2 class="section-title">Mata Pelajaran Utama DKV 💡</h2>
            <p>Kurikulum DKV menekankan keseimbangan antara penguasaan konsep dasar desain (tipografi, warna, layout) dan keterampilan teknis menggunakan perangkat lunak standar industri.</p>
            
            <div class="mata-pelajaran-grid">
                
                <div class="mapel-card">
                    <div class="mapel-icon-container">
                        🖼️ </div>
                    <div class="mapel-content">
                        <h3>Dasar Desain dan Tipografi</h3>
                        <p>Mempelajari elemen dasar desain (garis, bentuk, warna, tekstur), prinsip komposisi, serta anatomi dan penggunaan tipografi yang efektif dalam komunikasi visual.</p>
                    </div>
                </div>
                
                <div class="mapel-card">
                    <div class="mapel-icon-container">
                        📰 </div>
                    <div class="mapel-content">
                        <h3>Desain Publikasi Cetak</h3>
                        <p>Fokus pada perancangan produk cetak seperti poster, brosur, majalah, dan *packaging*, termasuk pemahaman tentang proses pra-cetak dan resolusi.</p>
                    </div>
                </div>

                <div class="mapel-card">
                    <div class="mapel-icon-container">
                        🖱️ </div>
                    <div class="mapel-content">
                        <h3>Desain Web & Interaktif</h3>
                        <p>Mencakup konsep User Interface (UI) dan User Experience (UX), serta perancangan *wireframe* dan *mockup* untuk aplikasi dan *website*.</p>
                    </div>
                </div>
                
                <div class="mapel-card">
                    <div class="mapel-icon-container">
                        📸 </div>
                    <div class="mapel-content">
                        <h3>Fotografi dan Videografi Dasar</h3>
                        <p>Mempelajari teknik pengambilan gambar (pencahayaan, komposisi), pengoperasian kamera, serta proses editing video dan foto menggunakan software profesional.</p>
                    </div>
                </div>
                
                <div class="mapel-card">
                    <div class="mapel-icon-container">
                        🎬 </div>
                    <div class="mapel-content">
                        <h3>Animasi dan Motion Graphic</h3>
                        <p>Keterampilan membuat desain bergerak (2D/3D), perancangan *storyboard*, dan penggunaan software animasi untuk kebutuhan iklan atau media sosial.</p>
                    </div>
                </div>
                
                <div class="mapel-card pilihan">
                    <div class="mapel-icon-container">
                        branding </div>
                    <div class="mapel-content">
                        <h3>Pilihan: Branding dan Periklanan</h3>
                        <p>Mengenal konsep pembangunan identitas merek (logo, filosofi), dan strategi visual untuk kampanye periklanan di berbagai platform.</p>
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