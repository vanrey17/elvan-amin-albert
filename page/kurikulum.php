<?php
// --- KONFIGURASI DATA ---

$page_title = "Kurikulum & Pembelajaran";
$page_subtitle = "Mewujudkan Generasi Kompeten dengan Kurikulum Merdeka";
$page_description = "Kami memadukan standar pendidikan nasional dengan kebutuhan industri (Link & Match) untuk mencetak lulusan yang siap kerja, santun, dan mandiri.";

include 'page/hero.php';

// Penjelasan Detail Kurikulum Merdeka
$pilar_kurikulum = [
    [
        "title" => "Intrakurikuler (Teori & Praktik)",
        "icon" => "fa-book-open", // Menggunakan FontAwesome
        "desc" => "Pembelajaran tatap muka yang berpusat pada peserta didik. Mencakup Mata Pelajaran Umum (Normada) dan Mata Pelajaran Kejuruan yang disesuaikan dengan standar industri terbaru.",
        "color" => "#3b82f6" // Biru
    ],
    [
        "title" => "Kokurikuler (P5)",
        "icon" => "fa-hands-holding-circle",
        "desc" => "Projek Penguatan Profil Pelajar Pancasila (P5). Fokus pada pembentukan karakter, gotong royong, kebhinekaan global, dan kreativitas melalui projek nyata.",
        "color" => "#f59e0b" // Oranye
    ],
    [
        "title" => "Ekstrakurikuler & Budaya Kerja",
        "icon" => "fa-briefcase",
        "desc" => "Pengembangan minat bakat serta pembiasaan budaya kerja industri (5R/5S) untuk memastikan siswa memiliki soft skill dan kedisiplinan tinggi.",
        "color" => "#10b981" // Hijau
    ]
];

// Struktur Mata Pelajaran (Contoh Data)
$kelompok_mapel = [
    "Umum" => ["Pendidikan Agama", "Bahasa Indonesia", "Matematika", "Bahasa Inggris", "Sejarah", "Seni Budaya"],
    "Kejuruan" => ["Dasar Program Keahlian", "Konsentrasi Keahlian", "Produk Kreatif & Kewirausahaan", "Mata Pelajaran Pilihan"],
];

// Keunggulan / Fasilitas Belajar
$fasilitas_belajar = [
    "Modul Ajar Digital & Interaktif",
    "Job Sheet Standar Industri",
    "Learning Management System (LMS)",
    "Teaching Factory (TEFA)"
];

?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">
</head>
<body>


<section class="section-container">
    <div class="section-header">
        <h2>Pilar Kurikulum Merdeka</h2>
        <p>Struktur pembelajaran kami dirancang holistik untuk menyeimbangkan Hard Skill dan Soft Skill.</p>
    </div>

    <div class="cards-grid">
        <?php foreach ($pilar_kurikulum as $pilar): ?>
            <div class="card pilar-card" style="border-top: 4px solid <?php echo $pilar['color']; ?>">
                <div class="icon-wrapper" style="background-color: <?php echo $pilar['color']; ?>15; color: <?php echo $pilar['color']; ?>;">
                    <i class="fa-solid <?php echo $pilar['icon']; ?>"></i>
                </div>
                <h3><?php echo $pilar['title']; ?></h3>
                <p><?php echo $pilar['desc']; ?></p>
            </div>
        <?php endforeach; ?>
    </div>
</section>

<section class="section-container bg-light">
    <div class="split-layout">
        <div class="split-text">
            <h2>Struktur Pembelajaran</h2>
            <p class="lead">Komposisi materi yang adaptif.</p>
            <p>Kami menyusun mata pelajaran agar relevan dengan perkembangan zaman. Siswa tidak hanya belajar teori, tetapi langsung mempraktikkannya melalui pendekatan <em>Project Based Learning</em>.</p>
            
            <div class="highlight-box">
                <i class="fa-solid fa-check-circle"></i>
                <div>
                    <strong>Fokus Kompetensi</strong>
                    <p>Materi kejuruan diperdalam sesuai konsentrasi.</p>
                </div>
            </div>
        </div>

        <div class="split-content">
            <?php foreach ($kelompok_mapel as $kategori => $mapels): ?>
                <div class="mapel-group">
                    <h3 class="group-title"><i class="fa-solid fa-layer-group"></i> Kelompok <?php echo $kategori; ?></h3>
                    <ul class="mapel-list">
                        <?php foreach ($mapels as $mapel): ?>
                            <li><?php echo $mapel; ?></li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<section class="section-container">
    <div class="features-wrapper">
        <div class="feature-header">
            <h2>Dukungan Pembelajaran</h2>
            <p>Perangkat ajar modern untuk pengalaman belajar maksimal.</p>
        </div>
        <div class="feature-tags">
            <?php foreach ($fasilitas_belajar as $fasilitas): ?>
                <span class="tag"><i class="fa-solid fa-star"></i> <?php echo $fasilitas; ?></span>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<style>

    /* SECTION GENERAL */
    .section-container {
        max-width: 1100px;
        margin: 0 auto;
        padding: 80px 20px;
    }

    .bg-light {
        background-color: var(--bg-light);
    }

    .section-header {
        text-align: center;
        max-width: 700px;
        margin: 0 auto 50px;
    }

    .section-header h2 {
        font-size: 2rem;
        color: var(--secondary);
        margin-bottom: 10px;
    }

    /* CARDS GRID */
    .cards-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
        gap: 30px;
    }

    .card {
        background: white;
        padding: 30px;
        border-radius: var(--radius);
        box-shadow: var(--shadow);
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .card:hover {
        transform: translateY(-5px);
        box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.15);
    }

    .icon-wrapper {
        width: 60px;
        height: 60px;
        border-radius: 12px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.5rem;
        margin-bottom: 20px;
    }

    .pilar-card h3 {
        margin: 0 0 10px;
        font-size: 1.25rem;
        color: var(--secondary);
    }

    .pilar-card p {
        color: var(--text-light);
        font-size: 0.95rem;
    }

    /* SPLIT LAYOUT */
    .split-layout {
        display: flex;
        flex-wrap: wrap;
        gap: 50px;
        align-items: flex-start;
    }

    .split-text {
        flex: 1;
        min-width: 300px;
    }

    .split-content {
        flex: 1;
        min-width: 300px;
        background: white;
        padding: 30px;
        border-radius: var(--radius);
        box-shadow: var(--shadow);
    }

    .highlight-box {
        display: flex;
        gap: 15px;
        margin-top: 30px;
        padding: 20px;
        background: white;
        border-left: 4px solid var(--primary);
        border-radius: 0 8px 8px 0;
        box-shadow: 0 4px 6px -1px rgba(0,0,0,0.05);
    }
    
    .highlight-box i {
        font-size: 1.5rem;
        color: var(--primary);
        margin-top: 3px;
    }

    .mapel-group {
        margin-bottom: 25px;
    }

    .mapel-group:last-child {
        margin-bottom: 0;
    }

    .group-title {
        font-size: 1.1rem;
        border-bottom: 2px solid #e2e8f0;
        padding-bottom: 10px;
        margin-bottom: 15px;
        color: var(--secondary);
    }

    .mapel-list {
        list-style: none;
        padding: 0;
        display: grid;
        grid-template-columns: 1fr 1fr; /* Dua kolom list */
        gap: 10px;
    }

    .mapel-list li {
        position: relative;
        padding-left: 20px;
        font-size: 0.9rem;
        color: var(--text-light);
    }

    .mapel-list li::before {
        content: "•";
        color: var(--accent);
        font-weight: bold;
        position: absolute;
        left: 0;
    }

    /* FEATURE TAGS */
    .features-wrapper {
        text-align: center;
        background: var(--secondary);
        color: white;
        padding: 50px;
        border-radius: 20px;
    }

    .feature-header h2 {
        color: white;
    }

    .feature-header p {
        color: #94a3b8;
        margin-bottom: 30px;
    }

    .feature-tags {
        display: flex;
        flex-wrap: wrap;
        justify-content: center;
        gap: 15px;
    }

    .tag {
        background: rgba(255, 255, 255, 0.1);
        padding: 10px 20px;
        border-radius: 50px;
        font-size: 0.9rem;
        display: flex;
        align-items: center;
        gap: 8px;
        transition: background 0.3s;
    }

    .tag:hover {
        background: rgba(255, 255, 255, 0.2);
    }

    .tag i {
        color: var(--accent);
    }

    /* RESPONSIVE */
    @media (max-width: 768px) {
        .hero-content h1 { font-size: 2rem; }
        .mapel-list { grid-template-columns: 1fr; }
        .section-container { padding: 50px 20px; }
    }
</style>
</body>
</html>