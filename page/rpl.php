<?php
// Tentukan variabel data yang berbeda untuk setiap halaman (RPL)
$page_title = "Rekayasa Perangkat Lunak";
$page_description = "RPL mempersiapkan siswa untuk menjadi pengembang perangkat lunak, dengan fokus pada perancangan, pembuatan, pengujian, dan pemeliharaan aplikasi berbasis web, mobile, dan desktop.";
include 'page/hero.php';
?>

<div class="program-detail-section">
    <h2 class="section-title">Tentang Program RPL</h2>
    <div class="program-layout-container">
        
        <div class="program-content">
            
            <p>Program keahlian ini fokus pada logika pemrograman, basis data, pengembangan aplikasi *client-server*, dan manajemen proyek perangkat lunak. Lulusan memiliki kemampuan untuk beradaptasi dengan berbagai bahasa pemrograman modern.</p>
            
            <h3>Prospek Karier:</h3>
            <ul>
                <li>Web Developer (Front-End/Back-End)</li>
                <li>Mobile App Developer (Android/iOS)</li>
                <li>Software Tester / Quality Assurance (QA)</li>
                <li>Database Administrator</li>
                <li>Game Developer</li>
                <li>Analis Sistem</li>
            </ul>
        </div>
        
        <div class="program-visual">
            <img src="<?php echo $image_path; ?>/labrpl.png" alt="Siswa RPL Sedang Membuat Kode Program">
        </div>
        
    </div>  

    <div class="kurikulum-section">
        <div class="container">
            <h2 class="section-title">Mata Pelajaran Utama RPL 💻</h2>
            <p>Kurikulum RPL dirancang untuk membentuk *software developer* yang kompeten, mampu merancang solusi digital yang efisien dan skalabel.</p>
            
            <div class="mata-pelajaran-grid">
                
                <div class="mapel-card">
                    <div class="mapel-icon-container">
                        ⌨️ </div>
                    <div class="mapel-content">
                        <h3>Pemrograman Dasar</h3>
                        <p>Mempelajari dasar-dasar logika, algoritma, struktur data, dan konsep dasar berbagai bahasa pemrograman (misalnya Python atau Java).</p>
                    </div>
                </div>
                
                <div class="mapel-card">
                    <div class="mapel-icon-container">
                        🗃️ </div>
                    <div class="mapel-content">
                        <h3>Basis Data</h3>
                        <p>Fokus pada perancangan, implementasi, dan pengelolaan sistem basis data (MySQL, PostgreSQL), termasuk bahasa query SQL dan normalisasi data.</p>
                    </div>
                </div>

                <div class="mapel-card">
                    <div class="mapel-icon-container">
                        🧩 </div>
                    <div class="mapel-content">
                        <h3>Pemrograman Berorientasi Objek (OOP)</h3>
                        <p>Mencakup konsep OOP (Class, Object, Inheritance, Polymorphism) yang fundamental untuk pengembangan aplikasi skala besar menggunakan bahasa seperti Java/C++.</p>
                    </div>
                </div>
                
                <div class="mapel-card">
                    <div class="mapel-icon-container">
                        🌐 </div>
                    <div class="mapel-content">
                        <h3>Pengembangan Aplikasi Web</h3>
                        <p>Belajar teknologi Front-End (HTML, CSS, JavaScript) dan Back-End (PHP, Node.js) untuk membangun aplikasi web dinamis dan interaktif.</p>
                    </div>
                </div>
                
                <div class="mapel-card">
                    <div class="mapel-icon-container">
                        📱 </div>
                    <div class="mapel-content">
                        <h3>Pengembangan Aplikasi Mobile</h3>
                        <p>Fokus pada pembuatan aplikasi untuk platform Android dan/atau iOS, menggunakan bahasa pemrograman spesifik atau framework *cross-platform*.</p>
                    </div>
                </div>
                
                <div class="mapel-card pilihan">
                    <div class="mapel-icon-container">
                        🎮 </div>
                    <div class="mapel-content">
                        <h3>Pilihan: Pengembangan Game</h3>
                        <p>Mempelajari dasar-dasar perancangan game, logika fisika, dan penggunaan *Game Engine* (seperti Unity atau Unreal Engine) untuk membuat game sederhana.</p>
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