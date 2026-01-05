<?php
// Tentukan variabel data yang berbeda untuk setiap halaman
$page_title = "VISI MISI SEKOLAH";
$page_description = "Menjadi Pusat Keunggulan Pendidikan Vokasi yang Menghasilkan Lulusan Berkarakter, Inovatif, dan Kompeten di Tingkat Internasional.";

include 'page/hero.php';
?>


<section class="profil-section visimisi-section">
        <h2 class="section-title-center">Visi & Misi Sekolah</h2>
        <div class="visimisi-container">
            <div class="visi-column">
                <i class="fas fa-eye visimisi-icon"></i>
                <h3>Visi</h3>
                <p>“Menjadi sekolah kejuruan unggul yang melahirkan 
                    talenta masa depan, berkarakter, kreatif, dan kompeten 
                    dalam teknologi untuk membangun masa depan yang lebih cerdas dan berdaya saing global.”</p>
            </div>
            <div class="misi-column">
                <i class="fas fa-bullseye visimisi-icon"></i>
                <h3>Misi</h3>
                <ul>
                    <li>Menyelenggarakan pembelajaran berbasis proyek dan industri.</li>
                    <li>Mengembangkan potensi kewirausahaan dan kreativitas siswa.</li>
                    <li>Meningkatkan kualitas guru dan fasilitas praktik.</li>
                    <li>Membentuk karakter siswa yang unggul berdasarkan nilai-nilai 9K.</li>
                </ul>
            </div>
        </div>
    </section>


<style>
    .visimisi-section {
    padding: 80px 50px;
    background-color: white;
}

.visimisi-container {
    display: flex;
    max-width: 1000px;
    margin: 40px auto 0;
    gap: 50px;
}

.visi-column, .misi-column {
    flex: 1;
    padding: 30px;
    border-radius: 10px;
}

.visi-column {
    background-color: #fff8f0; 
    border-left: 5px solid #ff6600;
}

.misi-column {
    background-color: #f0f3ff; 
    border-left: 5px solid #003366;
}

.visimisi-icon {
    font-size: 2em;
    color: #ff6600;
    margin-bottom: 15px;
}

.misi-column .visimisi-icon {
    color: #003366;
}

.visi-column h3, .misi-column h3 {
    font-size: 1.8em;
    color: #0c1a4b;
    margin-top: 0;
    margin-bottom: 20px;
}

.misi-column ul {
    list-style: none;
    padding: 0;
}

.misi-column li {
    padding: 10px 0;
    border-bottom: 1px dashed #ccc;
    line-height: 1.6;
    color: #333;
    position: relative;
}

.misi-column li:before {
    content: "\2713"; 
    color: #ff6600;
    font-weight: bold;
    display: inline-block;
    width: 1em;
    margin-left: -1em;
}
@media (max-width: 768px) {
    .visimisi-container {
        flex-direction: column;
    }

    .visi-column p, .misi-column li {
        font-size : 0.7em;
    }
    .visimisi-section h2 {
        font-size: 2em;
    }
}
</style>