<?php
// Tentukan variabel data yang berbeda untuk setiap halaman (TSM)
$page_title = "Kerohanian ASCENDIA";
$page_description = "ASCENDIA memiliki program kerohanian yang bertujuan untuk membentuk karakter siswa melalui kegiatan keagamaan dan spiritual.";

include 'page/hero.php';
?>

  <section class="principal-hero-section">
        <div class="principal-layout-content">
            <div class="principal-text-column"> 
                <h1 class="section-title">Kerohanian dalam agama islam</h1>
                
                <p>ASCENDIA memiliki beberapa kegiatan kerohanian bagi siswa/siswi yang beragama islam yaitu : </p>
                
            <!-- <h3>Prospek Karier:</h3> -->
            <ul>
                <li>Tadarus AL-Qur'an</li>
                <li>Kegiatan Rohis, Hadroh, marawis </li>
                <li>Memperingati Maulid Nabi Muhammad SAW</li>
                <li>Peringatan Hari Besar Islam</li>
                <li>Kajian ilmu agama </li>
            </ul>
                <a href="<?php echo $BASE; ?>/kontak" class="btn-primary-profile">Hubungi Kami</a>
            </div>

            <div class="principal-image-column">
                <img src="<?php echo $image_path; ?>/islam.png" alt="Foto Kepala Sekolah" class="principal-photo">
            </div>
        </div>
    </section>

    <section class="principal-hero-section">
        <div class="principal-layout-content">
            <div class="principal-text-column"> 
                <h1 class="section-title">Kerohanian dalam agama Kristen</h1>
                
                <p>ASCENDIA memiliki beberapa kegiatan kerohanian bagi siswa/siswi yang beragama Kristen yaitu : </p>
                
            <!-- <h3>Prospek Karier:</h3> -->
            <ul>
                <li>Peringatan Hari Raya Natal</li>
                <li>Peringatan wafat isa al masih</li>
                <li>ibadah rutin (Minggu, doa bersama)</li>
                <li>pendalaman iman (penelaahan Alkitab/Bible Study, retret, renungan) </li>
                <li>perayaan hari besar (Natal, Paskah, Pentakosta, Jumat Agung)</li>
                <li>pelayanan sosial (bakti sosial, penggalangan dana)</li>
                <li>kegiatan pembinaan dan persekutuan (pemuridan, kelompok sel, seminar, acara rekreatif seperti outing atau games rohani)</li>
            </ul>
                <a href="<?php echo $BASE; ?>/kontak" class="btn-primary-profile">Hubungi Kami</a>
            </div>

            <div class="principal-image-column">
                <img src="<?php echo $image_path; ?>/kristen.png" alt="Foto Kepala Sekolah" class="principal-photo">
            </div>
        </div>
    </section>

     <section class="principal-hero-section">
        <div class="principal-layout-content">
            <div class="principal-text-column"> 
                <h1 class="section-title">Kerohanian dalam agama Buddha</h1>
                
                <p>ASCENDIA memiliki beberapa kegiatan kerohanian bagi siswa/siswi yang beragama Buddha yaitu : </p>
                
            <!-- <h3>Prospek Karier:</h3> -->
            <ul>
                <li>Praktek Meditasi Singkat</li>
                <li>Pembacaan Paritta/Puja</li>
                <li>Kajian Dhamma Singkat</li>
                <li>Latihan Keterampilan Hidup Buddhis</li>
                <li>Kunjungan ke Vihara/Candi</li>
                <li>Peringatan Hari raya waisak</li>
            </ul>
                <a href="<?php echo $BASE; ?>/kontak" class="btn-primary-profile">Hubungi Kami</a>
            </div>

            <div class="principal-image-column">
                <img src="<?php echo $image_path; ?>/buddha.png" alt="Foto Kepala Sekolah" class="principal-photo">
            </div>
        </div>
    </section>

    <style>
/* --- A. COLOMN 1: HERO/SAMBUTAN KEPALA SEKOLAH --- */
.principal-hero-section {
    background-color: #f7f7f7;
    padding: 100px 50px;
    overflow: hidden;
    position: relative;
    margin-top: 0; 
}

.principal-layout-content {
    display: flex;
    max-width: 1200px;
    margin: 0 auto;
    gap: 80px;
    align-items: center;
}

.principal-text-column {
    flex: 1;
    max-width: 60%;
    margin-bottom: 0; 
}

.principal-text-column h1 {
    font-size: 3em;
    color: #0c1a4b;
    margin-bottom: 20px;
}

.principal-image-column {
    flex: 0 0 40%;
    position: relative;
}

.principal-photo {
    width: 100%; 
    height: 450px; 
    border-radius: 15px;
    box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
    transition: all 0.5s ease;
    object-fit: cover; 
}

.principal-photo:hover {
    transform: none; 
    box-shadow: 0 15px 40px rgba(0, 0, 0, 0.3);
}

.btn-primary-profile {
    display: inline-block;
    background-color: #ff6600; 
    color: white;
    padding: 12px 30px;
    border-radius: 50px; 
    text-decoration: none;
    font-weight: bold;
    margin-top: 30px;
    box-shadow: 0 4px 10px rgba(255, 102, 0, 0.4);
    transition: all 0.3s ease;
}

.btn-primary-profile:hover {
    background-color: #e65c00;
    transform: translateY(-2px);
    box-shadow: 0 6px 15px rgba(255, 102, 0, 0.6);
}



@media (max-width: 768px) {
    .principal-layout-content {
        flex-direction: column;
        gap: 40px;
    }
    
    .principal-text-column, .principal-image-column {
        max-width: 100%;
        text-align: center;
    }
    
    .principal-photo {
        height: 350px; 
    }

    .principal-text-column h1 {
        font-size: 2.5em;
    }
    
    .principal-hero-section {
        padding: 80px 20px;
    }
    
    .facts-container-profile {
        grid-template-columns: repeat(2, 1fr); 
        gap: 20px;
    }

    .visimisi-container {
        flex-direction: column;
        gap: 30px;
    }
    
    .tujuan-content-grid {
        grid-template-columns: 1fr; 
    }

    .section-title-center {
        /* Hapus transform X agar rata tengah normal di mobile */
        transform: none;
        left: 0;
        width: 100%;
    }

    .principal-text-column h1 {
        font-size: 1.5em;
    }

    .principal-text-column p {
        font-size: 0.8em;
    }

    .principal-text-column blockquote {
        font-size: 0.9em;
    }
}
    </style>