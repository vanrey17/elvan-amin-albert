<main class="profil-page-main">

<?php
// =========================================================================
// 1. LOGIKA PENENTUAN HALAMAN & DATA DINAMIS
// =========================================================================

// Ambil slug halaman dari URL. Jika tidak ada, default ke 'principal'.
$current_page_slug = $_GET['halaman'] ?? 'principal'; 

// Tentukan path gambar default yang sudah Anda berikan
$default_bg_img = 'image/ascendia-bangunan.png'; 

// --- ARRAY MAPPING: DATA SENTRAL UNTUK SEMUA HALAMAN ---
$page_map = [
    // Halaman Umum
    'principal' => [
        'bg_img' => $default_bg_img, 
        'title'  => 'Sambutan Kepala Sekolah',
        'content_file' => 'page/principal.php'
    ],
    'tujuan' => [
        'bg_img' => $default_bg_img, 
        'title'  => 'Tujuan & Sasaran Sekolah',
        'content_file' => 'page/tujuan.php'
    ],
    'profil' => [
        'bg_img' => $default_bg_img, 
        'title'  => 'Profil Singkat Sekolah',
        'content_file' => 'page/profil.php' // Asumsi Anda punya file ini
    ],
    
    // Halaman Program Studi
    'tjkt' => [
        'bg_img' => 'image/ascendia-bangunan.png', // Gambar khusus untuk TJKT
        'title'  => 'Teknik Jaringan Komputer & Telekomunikasi (TJKT)',
        'content_file' => 'page/TJKT.php'
    ],
    'dkv' => [
        'bg_img' => 'assets/img/hero-dkv.jpg', // Gambar khusus untuk DKV
        'title'  => 'Desain Komunikasi Visual (DKV)',
        'content_file' => 'page/prodi/dkv.php'
    ],
    'tsm' => [
        'bg_img' => 'assets/img/hero-tsm.jpg', // Gambar khusus untuk TSM
        'title'  => 'Teknik Sepeda Motor (TSM)',
        'content_file' => 'page/tsm.php'
    ],
    // Tambahkan halaman program studi dan lainnya di sini
];

// 2. Ambil data yang sesuai dengan slug yang aktif
$active_data = $page_map[$current_page_slug] ?? null;

// Jika slug tidak valid, tampilkan halaman 404 atau default
if ($active_data === null) {
    // Terapkan penanganan 404 di sini
    $hero_background_image = $default_bg_img;
    $page_title = 'Halaman Tidak Ditemukan';
    $content_to_include = 'page/404.php';
} else {
    // Definisikan variabel yang dilempar ke inc/hero.php dan untuk judul
    $hero_background_image = $active_data['bg_img']; 
    $page_title          = $active_data['title'];
    $content_to_include  = $active_data['content_file'];
}

// =========================================================================
// 3. PEMANGGILAN HERO DAN JUDUL
// =========================================================================
 
// Panggil file hero.php. Ia akan menggunakan $hero_background_image.
include 'inc/hero.php'; 
?>

<div class="page-title-wrapper">
    <h1><?php echo $page_title; ?></h1>
</div>

<?php
// =========================================================================
// 4. PEMANGGILAN KONTEN UTAMA Halaman (HANYA SATU FILE)
// =========================================================================

// Hanya panggil file konten yang sesuai dengan slug aktif
if (file_exists($content_to_include)) {
    include $content_to_include;
} else {
    // Tampilkan pesan error jika file konten yang dispesifikkan hilang
    echo "<p>Error: Konten utama <strong>" . $content_to_include . "</strong> tidak ditemukan.</p>";
}
?>
    
</main>