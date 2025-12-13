<?php
// Tentukan variabel data yang berbeda untuk setiap halaman
$page_title = "SMK Teknologi Ascendia";
$page_description = "Mencetak Generasi Unggul di Bidang Teknologi dengan Kompetensi, Inovasi, dan Karakter.";

?>

<main class="program-detail-section">
    <div class="hero-background">
        <div class="text-with-gradient-bg">
            <h1><?php echo $page_title; ?></h1>
            <p><?php echo $page_description; ?></p>
        </div>
    </div>
</main>

<?php
// Sertakan file-file lain jika diperlukan
include 'page/principal.php';
include 'page/fakta-singkat.php';

?>