<?php
    // 1. Deklarasi Variabel
    $project_location = "/PROJECT-WEBSITE-SMK";
    $me = $project_location;
    $image_path = $me . "/image";

    // Untuk mendapatkan URL Path
    $request = $_SERVER['REQUEST_URI'];
    
    // ===================================================
    // KODE PERBAIKAN: MENGUBAH $request MENJADI $route BERSIH
    // ===================================================
    
    // 1. Hapus path proyek ($me) dari request. 
    // Contoh: /PROJECT-WEBSITE-SMK/profil/ -> /profil/
    $route = str_replace($me, '', $request); 
    
    // 2. Bersihkan garis miring di awal dan akhir route, TAPI pertahankan jika itu home (/)
    if ($route !== '/') {
        $route = rtrim($route, '/'); // Hapus garis miring di akhir jika ada
    }
    
    // 3. Pastikan route dimulai dengan garis miring (kecuali jika itu sudah /)
    if (empty($route)) {
        $route = '/';
    } elseif ($route[0] !== '/') {
        $route = '/' . $route;
    }
    
$content_file = "page/home.php"; // Set default ke home page

    // 2. Logika Routing (Gunakan $route yang sudah dibersihkan)
    switch ($route) {
        // MENU Tentang Sekolah
        case '/' :
            $content_file = "page/home.php";
            break;
        case '/profil' :
            $content_file = "page/profil.php";
            break;
        case '/tujuan' :
            $content_file = "page/tujuan.php";
            break;
        case '/visimisi' :
            $content_file = "page/visimisi.php"; 
            break;
        case '/9k' :
            $content_file = "/9k.php";
            break;

        // MENU Pembelajaran
        case '/kurikulum' :
            $content_file = "page/kurikulum.php";
            break;
        case '/metode' :
            $content_file = "page/metodepembelajaran.php";
            break;
        case '/dukunganpembelajaran' :
            $content_file = "page/dukunganpembelajaran.php";
            break;
        case '/programstudi' :
            $content_file = "page/programstudi.php";
            break;
        
        // SUBMENU PROGRAM STUDI
        case '/tjkt' :
            $content_file = "page/tjkt.php"; 
            break;
        case '/mplb' :
            $content_file = "page/mplb.php"; 
            break;
        case '/pmsr' :
            $content_file = "page/pmsr.php";
            break;
        case '/tsm' :
            $content_file = "page/tsm.php";
            break;
        case '/akl' :
            $content_file = "page/akl.php";
            break;
        
        // MENU Kehidupan Siswa
        case '/ekstrakurikuler' :
            $content_file = "page/ekstrakurikuler.php";
            break;
        case '/kerohanian' :
            $content_file = "page/kerohanian.php";
            break;
        case '/layanansiswa' :
            $content_file = "page/layanansiswa.php";
            break;
        case '/keluargasekolah' :
            $content_file = "page/keluargasekolah.php";
            break;

        // MENU Pendaftaran
        case '/daftarsekarang' :
            $content_file = "page/daftarsekarang.php";
            break;
        case '/biaya' :
            $content_file = "page/biaya.php";
            break;
        case '/brosur' :
            $content_file = "page/brosur.php";
            break;    
        case '/turvirtual' :
            $content_file = "page/turvirtual.php"; 
            break;
            
        default:
            http_response_code(404);
            $content_file = "page/404.php";
            break;
    
    } 
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Melampaui Pendidikan - Dashboard PHP</title>
    <link rel="stylesheet" href="<?php echo $me; ?>/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>


<div class="main-header-container"> 
    <header class="navbar">
        <div class="logo-kiri">
        <a href="<?php echo $me; ?>/"> <img src="<?php echo $image_path; ?>/logo swaka.png" alt="Logo SPH" class="navbar-logo">
        </a>
        </div>
        <nav class="nav-links">
            <div class="dropdown">
                <a href="#" class="dropbtn">Tentang SPH<span class="arrow-down">&#9662;</span></a>
                <div class="dropdown-content">
                    <a href="<?php echo $me; ?>/profil">Profil</a>
                    <a href="<?php echo $me; ?>/tujuan">Tujuan Kami</a>
                    <a href="<?php echo $me; ?>/visimisi">Visi Misi</a> 
                    <a href="<?php echo $me; ?>/9k">9K</a> 
                </div>
            </div>
            <div class="dropdown">
                <a href="#" class="dropbtn">Pembelajaran <span class="arrow-down">&#9662;</span></a>
                <div class="dropdown-content">
                    <a href="<?php echo $me; ?>/kurikulum">Kurikulum</a> <a href="<?php echo $me; ?>/metode">Metode Pembelajaran</a> <div class="sub-dropdown">
                        <a href="<?php echo $me; ?>/programstudi">Program Studi &#9656;</a> <div class="sub-dropdown-content">
                            <a href="<?php echo $me; ?>/tjkt">Teknik Jaringan Komputer & Telekomunikasi (TKJ)</a>
                            <a href="<?php echo $me; ?>/mplb">Manajemen Perkantoran & Layanan Bisnis (MPLB)</a>
                            <a href="<?php echo $me; ?>/pmsr">Pemasaran (PMSR)</a>
                            <a href="<?php echo $me; ?>/tsm">Teknik Sepeda Motor (TSM)</a>
                            <a href="<?php echo $me; ?>/akl">Akuntansi (AK)</a>
                        </div>
                    </div>
                    <a href="<?php echo $me; ?>/dukunganpembelajaran">Dukugan Pembelajaran</a> </div> 
            </div>
            <div class="dropdown">
                <a href="#" class="dropbtn">Pendaftaran <span class="arrow-down">&#9662;</span></a>
                <div class="dropdown-content">
                    <a href="<?php echo $me; ?>/daftarsekarang">Daftar Sekarang</a> <a href="<?php echo $me; ?>/biaya">Biaya</a> <a href="<?php echo $me; ?>/brosur">Brosur</a> <a href="<?php echo $me; ?>/turvirtual">Tur Virtual</a> </div> 
            </div> 
            <div class="dropdown">
                <a href="#" class="dropbtn">Kehidupan Siswa <span class="arrow-down">&#9662;</span></a>
                <div class="dropdown-content">
                    <a href="<?php echo $me; ?>/ekstrakurikuler">Ekstrakurikuler</a> <a href="<?php echo $me; ?>/kerohanian">Kerohanian</a> <a href="<?php echo $me; ?>/layanansiswa">Layanan Siswa</a> <a href="<?php echo $me; ?>/keluargasekolah">Keluarga Sekolah</a> </div> 
            </div> 
            <div class="dropdown">
                <a href="#" class="dropbtn">Blog <span class="arrow-down">&#9662;</span></a>
                <div class="dropdown-content">
                    <a href="#">Berita</a>
                    <a href="#">Acara</a>
                    <a href="#">Prestasi</a>
                </div> 
            </div> 
            <a href="#">Karier</a>
            <a href="#">Hubungi Kami</a>
        </nav>
        <div class="utility-links">
            </div>
    </header>
</div>
<main id="main-content">
    <?php
        // Menggunakan path absolut untuk memastikan file konten ditemukan.
        // __DIR__ adalah direktori fisik tempat index.php berada.
        require $content_file;
    ?>
</main>

<footer class="main-footer">
    <div class="footer-top-container">
        <div class="footer-column contact-info-column">
            <address>
                Jl.Sosial Km.5 No.472,<br>
                Kemuning, Palembang
            </address>

            <div class="social-media">
                <a href="#" aria-label="YouTube"><i class="fab fa-youtube"></i></a>
                <a href="#" aria-label="Facebook"><i class="fab fa-facebook-f"></i></a>
                <a href="#" aria-label="Instagram"><i class="fab fa-instagram"></i></a>
                <a href="URL_TIKTOK_ANDA" aria-label="TikTok"><i class="fab fa-tiktok"></i></a>
                <a href="#" aria-label="LinkedIn"><i class="fab fa-whatsapp"></i></a>

            </div>

            <p class="contact-item">
                <i class="fas fa-phone-alt"></i> 
                +62 21 546 0234
            </p>
            <p class="contact-item">
                <i class="fas fa-envelope"></i> 
                <a href="smkswakaryapalembang@gmail.com">smkswakaryapalembang@gmail.com</a>
            </p>
            <p class="contact-item">
                <i class="fas fa-map-marker-alt"></i> 
                <a href="https://maps.app.goo.gl/KdDu9ttbRb9bWLVY6">Lihat di google maps</a>
            </p>
        </div>

        <div class="footer-column footer-menu-group">
            <a href="#">Tujuan Kami</a>
            <a href="#">Visi & Misi</a>
            <a href="#">Karier</a>
            <a href="#">Blogs</a>
            <a href="#">Berita dan Acara</a>
        </div>

        <div class="footer-column footer-menu-group">
            <a href="#">Program</a>
            <a href="#">Kurikulum</a>
            <a href="#">Jalur Pembelajaran</a>
            <a href="#">Dukungan Pembelajaran</a>
            <a href="#">Pembelajaran Pelayanan</a>
        </div>

        <div class="footer-column footer-menu-group">
            <a href="#">Hubungi Kami</a>
            <a href="#">Tur Virtual</a>
            <a href="#">Daftar Sekarang</a>
            <a href="#">Biaya Sekolah</a>
            <a href="#">FAQ</a>
        </div>
    </div>
    
    <div class="footer-bottom">
        <h4 class="accreditations-title">Memorandum of Understanding</h4>
        <div class="accreditations-logos">
            <img src="image/mikrotik.png" alt="Logo Akreditasi" class="accreditation-logo">
            <img src="image/biznet.png" class="accreditation-logo">
            <img src="image/indihome.png" alt="Logo WASC" class="accreditation-logo">
            <img src="image/yamaha.png" class="accreditation-logo">
        </div>
    </div>
</footer>
  <footer>
    <p>© 2025 SMK SWAKARYA PALEMBANG | All Rights Reserved</p>
  </footer>
</body> 
</html>