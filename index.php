<?php
// C:\xampp\htdocs\PROJECT-UAS\index.php

// BARIS 7 PERLU DIHAPUS JIKA ITU MENGANDUNG $_SERVER["REQUEST_URL"]


// BASE PROJECT
$BASE = "/elvan-amin-albert";
$image_path = $BASE . "/image";

// --- START: DEFINISI DATA RUTE DAN PROGRAM STUDI ---

// Definisikan rute dan nama panjang Program Studi secara terpisah
$program_studies_data = [
    '/programstudi' => [
        'file' => 'page/programstudi.php',
        'display' => 'Daftar Program Studi (Semua)',
    ],
    '/tjkt' => [
        'file' => 'page/tjkt.php',
        'display' => 'TJKT - Teknik Jaringan Komputer dan Telekomunikasi',
    ],
    '/mplb' => [
        'file' => 'page/mplb.php',
        'display' => 'MPLB - Manajemen Perkantoran dan Layanan Bisnis',
    ],
    '/pmsr' => [
        'file' => 'page/pmsr.php',
        'display' => 'PMSR - Pemasaran',
    ],
    '/tsm' => [
        'file' => 'page/tsm.php',
        'display' => 'TSM - Teknik Sepeda Motor',
    ],
    '/akl' => [
        'file' => 'page/akl.php',
        'display' => 'AKL - Akuntansi dan Keuangan Lembaga',
    ],
    // TAMBAHKAN PROGRAM STUDI LAIN YANG HILANG DI SINI:
    '/rpl' => [ 'file' => 'page/rpl.php', 'display' => 'RPL - Rekayasa Perangkat Lunak' ],
    '/dkv' => [ 'file' => 'page/dkv.php', 'display' => 'DKV - Desain Komunikasi Visual' ],
    '/titl' => [ 'file' => 'page/titl.php', 'display' => 'TITL - Teknik Instalasi Tenaga Listrik' ],
    '/dpib' => [ 'file' => 'page/dpib.php', 'display' => 'DPIB - Desain Pemodelan dan Informasi Bangunan' ],
    '/tkr' => [ 'file' => 'page/tkr.php', 'display' => 'TKR - Teknik Kendaraan Ringan' ],
];


// Routing map (Array datar, MENGANDALKAN $program_studies_data)
$routes = [
    '/' => 'page/home.php',

    // Tentang
    '/profil' => 'page/profil.php',
    '/tujuan' => 'page/tujuan.php',
    '/visimisi' => 'page/visimisi.php',
    '/9k' => 'page/9k.php',

    // Pembelajaranf
    '/kurikulum' => 'page/kurikulum.php',
    '/metode' => 'page/metodepembelajaran.php',
    '/dukunganpembelajaran' => 'page/dukunganpembelajaran.php',
];

// Gabungkan rute Program Studi ke array $routes datar
foreach ($program_studies_data as $url_path => $data) {
    $routes[$url_path] = $data['file'];
}
    
// Kehidupan siswa
$routes['/ekstrakurikuler'] = 'page/ekstrakurikuler.php';
$routes['/kerohanian'] = 'page/kerohanian.php';
$routes['/layanansiswa'] = 'page/layanansiswa.php';
$routes['/keluargasekolah'] = 'page/keluargasekolah.php';

// Pendaftaran
$routes['/daftar'] = 'page/daftar.php';
$routes['/biaya'] = 'page/biaya.php';
$routes['/brosur'] = 'page/brosur.php';
$routes['/turvirtual'] = 'page/turvirtual.php';

// --- END: DEFINISI DATA RUTE DAN PROGRAM STUDI ---

// --- START: LOGIKA ROUTING ---

// Ambil path request (tanpa query)
$request = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

// Hapus base folder dengan cara aman
if (strpos($request, $BASE) === 0) {
    $route = substr($request, strlen($BASE));
} else {
    $route = $request;
}

// Normalisasi double slash
$route = preg_replace('#/+#', '/', $route);

// Normalisasi trailing slash
$route = rtrim($route, '/');
if ($route === '' || $route === false) $route = '/';


// Tentukan file content
$content_file = $routes[$route] ?? 'page/404.php';
if (!file_exists($content_file)) {
    $content_file = 'page/404.php';
}

// HAPUS DEFINISI ROUTES GANDA DI BAWAH SINI!
// ... (Baris 112 - 140 dari kode Anda sebelumnya Dihapus)
// ...
?>
<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width,initial-scale=1">
<title>SMK SWAKARYA PALEMBANG</title>

<link rel="stylesheet" href="<?php echo $BASE; ?>/style.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" crossorigin="anonymous">

</head>
<body>

<?php include 'page/header.php'; ?>


<main id="main-content">
<?php include $content_file; ?>
</main>

<?php include 'page/footer.php'; ?>


<script src="<?php echo $BASE; ?>/js/scroll-header.js"></script>
</body>
</html>