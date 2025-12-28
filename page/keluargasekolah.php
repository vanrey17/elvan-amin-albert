<?php
if (!isset($BASE)) $BASE = '';
if (!isset($image_path)) $image_path = $BASE . '/image';
// --- DATA PHP (KONTEN) ---

$hero_title = "Keluarga Besar & Aktivitas Sekolah";
$hero_subtitle = "Lebih dari Sekadar Tempat Belajar";
$hero_desc = "Di sini, kami membangun ikatan persaudaraan yang kuat antara siswa, guru, dan staf melalui berbagai kegiatan positif yang menyenangkan dan bermakna.";

// Nilai Utama Kekeluargaan
$core_values = [
    [
        "icon" => "fa-hand-holding-heart",
        "title" => "Solidaritas",
        "desc" => "Saling mendukung dalam suka dan duka sebagai satu keluarga besar."
    ],
    [
        "icon" => "fa-users-gear",
        "title" => "Kolaborasi",
        "desc" => "Bekerja sama dalam berbagai event untuk hasil yang luar biasa."
    ],
    [
        "icon" => "fa-face-smile-beam",
        "title" => "Kegembiraan",
        "desc" => "Menciptakan kenangan masa sekolah yang indah dan tak terlupakan."
    ]
];

// Daftar Kegiatan (Zig-Zag Layout)
$kegiatan_list = [
    [
        "title" => "Class Meeting & Porseni",
        "date"  => "Akhir Semester",
        "desc"  => "Ajang unjuk bakat olahraga dan seni antar kelas. Bukan hanya soal kompetisi, tapi soal sorak sorai dukungan dan mempererat kekompakan kelas setelah ujian yang melelahkan.",
        "image" => "https://images.unsplash.com/photo-1576267423445-b2e0074d68a4?auto=format&fit=crop&q=80&w=800", // Ganti dengan foto lomba
        "align" => "left" // Gambar di kiri
    ],
    [
        "title" => "Jumat Berkah & Kerohanian",
        "date"  => "Setiap Jumat",
        "desc"  => "Kegiatan rutin untuk mempertebal iman dan karakter. Mulai dari sholat dhuha bersama, istighosah, hingga bakti sosial berbagi makanan kepada warga sekitar sekolah.",
        "image" => "image/jumat_berkah.png", // Ganti dengan foto ibadah/sosial
        "align" => "right" // Gambar di kanan
    ],
    [
        "title" => "Perayaan Hari Guru & HUT Sekolah",
        "date"  => "Tahunan",
        "desc"  => "Momen spesial di mana siswa memberikan apresiasi kepada pahlawan tanpa tanda jasa. Diisi dengan pentas seni, pemotongan tumpeng, dan tukar kado yang penuh haru.",
        "image" => "https://images.unsplash.com/photo-1524178232363-1fb2b075b655?auto=format&fit=crop&q=80&w=800", // Ganti dengan foto perayaan
        "align" => "left" // Gambar di kiri
    ],
    [
        "title" => "Camping & LDKS",
        "date"  => "Awal Tahun Ajaran",
        "desc"  => "Latihan Dasar Kepemimpinan Siswa di alam terbuka. Membentuk mental pemimpin yang tangguh sekaligus malam keakraban di api unggun.",
        "image" => "https://images.unsplash.com/photo-1478131143081-80f7f84ca84d?auto=format&fit=crop&q=80&w=800", // Ganti dengan foto kemah
        "align" => "right" // Gambar di kanan
    ]
];

?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $hero_title; ?></title>
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@400;500;600;700&family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">
</head>
<body>

<header class="family-hero">
    <div class="overlay"></div>
    <div class="hero-text-container">
        <span class="pill-badge"><i class="fa-solid fa-heart"></i> Life at School</span>
        <h1><?php echo $hero_title; ?></h1>
        <h2><?php echo $hero_subtitle; ?></h2>
        <p><?php echo $hero_desc; ?></p>
        <a href="#gallery-section" class="btn-scroll">Lihat Galeri <i class="fa-solid fa-arrow-down"></i></a>
    </div>
</header>

<section class="values-section">
    <div class="container">
        <div class="values-grid">
            <?php foreach ($core_values as $val): ?>
                <div class="value-card">
                    <div class="icon-box">
                        <i class="fa-solid <?php echo $val['icon']; ?>"></i>
                    </div>
                    <h3><?php echo $val['title']; ?></h3>
                    <p><?php echo $val['desc']; ?></p>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<section class="activities-section">
    <div class="container">
        <div class="section-title">
            <h2>Agenda Kegiatan</h2>
            <p>Momen-momen seru yang membangun karakter kami.</p>
        </div>

        <div class="timeline-wrapper">
            <?php foreach ($kegiatan_list as $index => $kegiatan): ?>
                <div class="activity-row <?php echo ($index % 2 == 0) ? 'row-left' : 'row-right'; ?>">
                    
                    <div class="act-image">
                        <div class="img-frame">
                            <img src="<?php echo $kegiatan['image']; ?>" alt="<?php echo $kegiatan['title']; ?>">
                            <div class="date-badge"><?php echo $kegiatan['date']; ?></div>
                        </div>
                    </div>

                    <div class="act-content">
                        <h3 class="gradient-text"><?php echo $kegiatan['title']; ?></h3>
                        <p><?php echo $kegiatan['desc']; ?></p>
                    </div>

                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<section id="gallery-section" class="gallery-section">
    <div class="container">
        <div class="section-title">
            <h2>Potret Kebersamaan</h2>
            <p>Satu gambar berjuta cerita.</p>
        </div>
        
        <div class="photo-grid">
            <div class="photo-item wide">
                <img src="https://images.unsplash.com/photo-1529390079861-591de354faf5?auto=format&fit=crop&w=800&q=80" alt="Siswa">
                <div class="caption">Upacara Bendera</div>
            </div>
            <div class="photo-item tall">
                <img src="https://images.unsplash.com/photo-1543269865-cbf427effbad?auto=format&fit=crop&w=600&q=80" alt="Diskusi">
                <div class="caption">Belajar Kelompok</div>
            </div>
            <div class="photo-item">
                <img src="https://images.unsplash.com/photo-1511632765486-a01980e01a18?auto=format&fit=crop&w=600&q=80" alt="Happiness">
                <div class="caption">Tawa Canda</div>
            </div>
            <div class="photo-item">
                <img src="https://images.unsplash.com/photo-1509062522246-3755977927d7?auto=format&fit=crop&w=600&q=80" alt="Guru">
                <div class="caption">Teaching with Heart</div>
            </div>
        </div>
    </div>
</section>

<style>
    /* VARIABLES */
    :root {
        --primary: #ffa96bff; /* Merah Muda/Coral cerah */
        --secondary: #4ECDC4; /* Tosca cerah */
        --dark: #2D3436;
        --light: #F7F9FC;
        --glass: rgba(255, 255, 255, 0.9);
        --shadow: 0 15px 30px rgba(0,0,0,0.1);
        --gradient: linear-gradient(45deg, #FF6B6B, #FF8E53);
    }

    /* GLOBAL RESET */
    body {
        margin: 0;
        font-family: 'Quicksand', sans-serif; /* Font yang lebih friendly & bulat */
        background-color: var(--light);
        color: var(--dark);
        line-height: 1.6;
    }

    h1, h2, h3 { font-family: 'Poppins', sans-serif; font-weight: 700; }
    
    .container { max-width: 1100px; margin: 0 auto; padding: 0 20px; }
    
    .section-title { text-align: center; margin-bottom: 60px; }
    .section-title h2 { font-size: 2.5rem; color: var(--dark); margin-bottom: 10px; }
    .section-title p { color: #636e72; font-size: 1.1rem; }

    /* HERO SECTION */
    .family-hero {
        position: relative;
        height: 500px; /* Tinggi Hero */
        background: url('https://images.unsplash.com/photo-1523580494863-6f3031224c94?auto=format&fit=crop&w=1200&q=80');
        background-size: cover;
        background-position: center;
        background-attachment: fixed; /* Efek Parallax */
        display: flex;
        align-items: center;
        justify-content: center;
        text-align: center;
        color: white;
    }

    .family-hero .overlay {
        position: absolute; inset: 0;
        background: linear-gradient(to bottom, rgba(45,52,54,0.7), rgba(45,52,54,0.4));
    }

    .hero-text-container {
        position: relative; z-index: 2; max-width: 700px;
        animation: fadeUp 1s ease-out;
    }

    .pill-badge {
        background: rgba(255,255,255,0.2);
        padding: 8px 20px; border-radius: 50px;
        backdrop-filter: blur(5px);
        font-size: 0.9rem; letter-spacing: 1px;
        text-transform: uppercase; border: 1px solid rgba(255,255,255,0.4);
    }

    .hero-text-container h1 { font-size: 3rem; margin: 20px 0 5px; line-height: 1.2; }
    .hero-text-container h2 { font-size: 1.5rem; font-weight: 300; margin-bottom: 20px; opacity: 0.9; }
    
    .btn-scroll {
        display: inline-block; margin-top: 30px; color: white; text-decoration: none;
        border: 2px solid white; padding: 10px 25px; border-radius: 30px;
        transition: 0.3s;
    }
    .btn-scroll:hover { background: white; color: var(--primary); }

    /* VALUES SECTION */
    .values-section { margin-top: -60px; position: relative; z-index: 10; margin-bottom: 80px; }
    
    .values-grid {
        display: grid; grid-template-columns: repeat(auto-fit, minmax(280px, 1fr)); gap: 30px;
    }

    .value-card {
        background: white; padding: 40px 30px; border-radius: 20px;
        box-shadow: 0 10px 40px rgba(0,0,0,0.08);
        text-align: center; transition: transform 0.3s;
    }
    
    .value-card:hover { transform: translateY(-10px); }

    .icon-box {
        font-size: 2.5rem; color: var(--primary); margin-bottom: 20px;
        background: #FFF0F0; width: 80px; height: 80px; line-height: 80px;
        border-radius: 50%; margin-left: auto; margin-right: auto;
    }

    /* ACTIVITIES ZIG ZAG */
    .activities-section { padding: 50px 0; overflow: hidden; }

    .activity-row {
        display: flex; align-items: center; gap: 60px; margin-bottom: 80px;
    }

    /* Membalik urutan untuk row kanan (ZigZag) */
    .row-right { flex-direction: row-reverse; }

    .act-image { flex: 1; position: relative; }
    .act-content { flex: 1; }

    .img-frame {
        position: relative; border-radius: 20px; overflow: hidden;
        box-shadow: 20px 20px 0px var(--secondary); /* Aksen kotak solid */
        transition: 0.3s;
    }
    
    .row-right .img-frame { box-shadow: -20px 20px 0px var(--primary); }

    .img-frame img { width: 100%; display: block; transition: transform 0.5s; }
    .img-frame:hover img { transform: scale(1.05); }

    .date-badge {
        position: absolute; top: 20px; left: 20px;
        background: white; color: var(--dark); padding: 8px 15px;
        font-weight: 700; border-radius: 8px; box-shadow: 0 5px 15px rgba(0,0,0,0.2);
    }

    .act-content h3 { font-size: 2rem; margin-bottom: 15px; }
    
    .gradient-text {
        background: var(--gradient); -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
    }

    /* GALLERY GRID */
    .gallery-section { padding: 80px 0; background: #fff; }

    .photo-grid {
        display: grid; grid-template-columns: repeat(4, 1fr);
        grid-auto-rows: 200px; gap: 15px;
    }

    .photo-item { position: relative; overflow: hidden; border-radius: 12px; cursor: pointer; }
    .photo-item img { width: 100%; height: 100%; object-fit: cover; transition: 0.5s; }
    
    /* Layout variasi */
    .photo-item.wide { grid-column: span 2; }
    .photo-item.tall { grid-row: span 2; }

    .photo-item:hover img { transform: scale(1.1); filter: brightness(0.7); }

    .caption {
        position: absolute; bottom: -50px; left: 0; right: 0;
        text-align: center; color: white; padding: 10px;
        font-weight: 600; transition: 0.3s;
    }
    
    .photo-item:hover .caption { bottom: 10px; }

    /* ANIMATION */
    @keyframes fadeUp {
        from { opacity: 0; transform: translateY(30px); }
        to { opacity: 1; transform: translateY(0); }
    }

    /* RESPONSIVE */
    @media (max-width: 768px) {
        .family-hero { height: 400px; }
        .hero-text-container h1 { font-size: 2rem; }
        
        .activity-row, .row-right { flex-direction: column; gap: 30px; }
        .img-frame { box-shadow: 10px 10px 0px var(--secondary); }
        .row-right .img-frame { box-shadow: 10px 10px 0px var(--primary); }
        
        .photo-grid { grid-template-columns: repeat(2, 1fr); }
        .photo-item.wide, .photo-item.tall { grid-column: span 1; grid-row: span 1; }
    }
</style>

</body>
</html>