<?php
// Tentukan variabel data yang berbeda untuk setiap halaman
$page_title = "KURIKULUM";
$page_description = "TSM menghasilkan lulusan yang terampil dalam perawatan dan perbaikan sepeda motor, siap bekerja di bengkel resmi maupun membuka usaha sendiri.";

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
// Catatan: Asumsikan file ini disertakan di dalam struktur layout utama (misalnya setelah header dan sebelum footer).

// Data Konten (Dapat diubah di sini tanpa menyentuh HTML)
$intro_text = "Di SMK Vokasi Merdeka Belajar, kami mengadopsi, menyesuaikan, dan menggabungkan berbagai Kurikulum yang relevan dengan Kurikulum Merdeka Belajar saat ini. Kami berkomitmen untuk meningkatkan kompetensi dan kewirausahaan siswa.";

$struktur_kurikulum = [
    "Mata Pelajaran Umum (Matematika, Bahasa Indonesia, dll)",
    "Mata Pelajaran Kejuruan (Sesuai Kompetensi)",
    "Projek Penguatan Profil Pelajar Pancasila (P5)"
];

$perangkat_pembelajaran = [
    "Perangkat Ajar Modul Ajar Bahan Ajar",
    "Perangkat Ajar Bahan Ajar Lembar Kerja Siswa"
];

$area_khusus = "Bahasa";
?>

<div class="kurikulum-container">
    <div class="kurikulum-card">

        <div class="intro-text">
            <p><?php echo $intro_text; ?></p>
        </div>

        <div class="content-grid">
            
            <div class="grid-item">
                <?php foreach ($struktur_kurikulum as $item): ?>
                    <div class="list-item">
                        <span class="icon">◊</span>
                        <p><?php echo $item; ?></p>
                    </div>
                <?php endforeach; ?>
            </div>

            <div class="grid-item right-column">
                
                <div class="list-item special-area">
                    <span class="icon">◊</span>
                    <p><strong><?php echo $area_khusus; ?></strong></p>
                </div>
                
                <?php foreach ($perangkat_pembelajaran as $item): ?>
                    <div class="list-item">
                        <span class="icon">◊</span>
                        <p><?php echo $item; ?></p>
                    </div>
                <?php endforeach; ?>
            </div>
            
        </div>
    </div>
</div>

<style>
/* CSS HANYA UNTUK DEMO. SEBAIKNYA PINDAHKAN INI KE FILE .css TERPISAH */

.kurikulum-container {
    display: flex;
    justify-content: center;
    padding: 40px 20px;
    background-color: #f0f0f0; /* Latar belakang abu-abu gelap */
}

.kurikulum-card {
    background-color: white;
    border-radius: 12px;
    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
    max-width: 800px;
    padding: 30px;
}

.intro-text {
    margin-bottom: 30px;
    line-height: 1.6;
    color: #333;
    text-align: justify;
}

.content-grid {
    display: flex;
    gap: 40px;
    flex-wrap: wrap; /* Untuk responsif di layar kecil */
}

.grid-item {
    flex: 1;
    min-width: 300px; /* Lebar minimum untuk dua kolom */
}

.list-item {
    display: flex;
    align-items: flex-start;
    margin-bottom: 15px;
}

.list-item .icon {
    font-size: 1.2em;
    color: #cc6600; /* Warna oranye atau warna penekanan */
    margin-right: 10px;
    line-height: 1.5;
}

.list-item p {
    margin: 0;
    line-height: 1.5;
    color: #555;
}

.special-area .icon, .special-area p {
    color: #ff6600; /* Warna yang lebih menonjol untuk "Bahasa" */
}

.special-area p strong {
    font-weight: 700;
}

/* Responsif sederhana */
@media (max-width: 650px) {
    .content-grid {
        flex-direction: column;
    }
}
</style>