<?php
// 1. BASE PROJECT
$BASE = "/elvan-amin-albert"; 

// 2. SETUP URL (Otomatis deteksi IP agar Android lancar)
$protocol = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off') ? "https://" : "http://";
$host = $_SERVER['HTTP_HOST'] ?? 'localhost';
$base_url = $protocol . $host . $BASE . "/"; 

// 3. DEFINISI DATA (Harus di atas sebelum foreach)
$program_studies_data = [
    '/tjkt' => ['file' => 'page/tjkt.php', 'display' => 'TJKT - Teknik Jaringan Komputer dan Telekomunikasi'],
    '/mplb' => ['file' => 'page/mplb.php', 'display' => 'MPLB - Manajemen Perkantoran dan Layanan Bisnis'],
    '/pmsr' => ['file' => 'page/pmsr.php', 'display' => 'PMSR - Pemasaran'],
    '/tsm'  => ['file' => 'page/tsm.php', 'display' => 'TSM - Teknik Sepeda Motor'],
    '/akl'  => ['file' => 'page/akl.php', 'display' => 'AKL - Akuntansi dan Keuangan Lembaga'],
    '/rpl'  => ['file' => 'page/rpl.php', 'display' => 'RPL - Rekayasa Perangkat Lunak'],
    '/dkv'  => ['file' => 'page/dkv.php', 'display' => 'DKV - Desain Komunikasi dVisual'],
    '/titl' => ['file' => 'page/titl.php', 'display' => 'TITL - Teknik Instalasi Tenaga Listrik'],
    '/dpib' => ['file' => 'page/dpib.php', 'display' => 'DPIB - Desain Pemodelan dan Informasi Bangunan'],
    '/tkr'  => ['file' => 'page/tkr.php', 'display' => 'TKR - Teknik Kendaraan Ringan'],
];

$student_services_data = [
    '/uks'    => ['file' => 'page/uks.php', 'display' => 'Smart UKS'],
    '/bk'     => ['file' => 'page/bk.php', 'display' => 'Bimbingan Konseling (BK)'],
    '/kantin' => ['file' => 'page/kantin.php', 'display' => 'Kantin Sehat'],
];

$routes = [
    '/' => 'page/home.php',
    '/profil' => 'page/profil.php',
    '/tujuan' => 'page/tujuan.php',
    '/visimisi' => 'page/visimisi.php',
    '/9k' => 'page/9k.php', 
    '/kurikulum' => 'page/kurikulum.php',
    '/metode' => 'page/metodepembelajaran.php',
    '/dukunganpembelajaran' => 'page/dukunganpembelajaran.php',
    '/ekstrakurikuler' => 'page/ekstrakurikuler.php',
    '/kerohanian' => 'page/kerohanian.php',
    '/layanansiswa' => 'page/layanansiswa.php',
    '/keluargasekolah' => 'page/keluargasekolah.php',
    '/daftar' => 'page/daftar.php',
    '/biaya' => 'page/biaya.php',
    '/blog' => 'page/blog.php',
    '/blog-detail' => 'page/blog-detail.php',

];

// Gabungkan Sub-Menu ke Routes Utama
foreach ($program_studies_data as $path => $d) { 
    $clean_path = ltrim($path, '/'); // Menghilangkan "/" di awal jika ada
    $routes['/' . $clean_path] = $d['file']; 
}

foreach ($student_services_data as $path => $d) { 
    $clean_path = ltrim($path, '/'); 
    $routes['/' . $clean_path] = $d['file']; 
}
// 4. LOGIKA ROUTING GABUNGAN (PENTING AGAR LINK WORK)
$page_param = $_GET['page'] ?? ''; 

if (!empty($page_param)) {
    // Jika link dari header index.php?page=profil -> $route jadi /profil
    $route = '/' . $page_param;
} else {
    // Jika akses via URL langsung
    $request = parse_url($_SERVER['REQUEST_URI'] ?? '/', PHP_URL_PATH);
    $route = $request;
    if (strpos($route, $BASE) === 0) { $route = substr($route, strlen($BASE)); }
    $route = str_replace('/index.php', '', $route);
}

$route = rtrim($route, '/');
if ($route === '') $route = '/';

$content_file = $routes[$route] ?? 'page/404.php';
if (!file_exists(__DIR__ . '/' . $content_file)) { $content_file = 'page/404.php'; }
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <title>SMK Teknologi ASCENDIA</title>
    <link rel="stylesheet" href="<?= $base_url; ?>style.css?v=<?= time(); ?>">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
</head>
<body>

<?php 
// Share data ke header agar sub-menu tampil
$program_studi_sub_menu = $program_studies_data;
include __DIR__ . '/page/header.php'; 
?>

<main id="main-content">
    <?php 
    // Tentukan path lengkap secara absolut
    $target_file = __DIR__ . DIRECTORY_SEPARATOR . $content_file;

    if (file_exists($target_file) && !empty($content_file)) {
        include $target_file;
    } else {
        // Jika file konten tidak ada, coba panggil 404.php
        $error_page = __DIR__ . DIRECTORY_SEPARATOR . 'page' . DIRECTORY_SEPARATOR . '404.php';
        
        if (file_exists($error_page)) {
            include $error_page;
        } else {
            echo "<div class='alert alert-danger'>Kesalahan Fatal: Halaman <strong>$content_file</strong> dan 404.php tidak ditemukan.</div>";
        }
    }
    ?>
</main>

<?php include __DIR__ . '/page/footer.php'; ?>

<script src="<?= $base_url; ?>js/scroll-header.js"></script>
</body>
</html>