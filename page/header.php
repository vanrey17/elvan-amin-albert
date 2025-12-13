<?php
// header partial - gunakan variable $BASE dan $image_path dari index.php
if (!isset($BASE)) $BASE = '';
if (!isset($image_path)) $image_path = $BASE . '/image';

// Akses data Program Studi dari file utama (index.php)
// Data ini digunakan untuk menu Multi-Level Program Studi
global $program_studi_sub_menu, $BASE; 

// --- FALLBACK/CONTOH DATA PROGRAM STUDI ---
// Jika array belum didefinisikan di index.php, gunakan fallback ini:
if (!isset($program_studi_sub_menu)) {
    $program_studi_sub_menu = [
        '/tjkt' => ['display' => 'TJKT - Teknik Jaringan Komputer dan Telekomunikasi'],
        '/rpl' => ['display' => 'RPL - Rekayasa Perangkat Lunak'],
        '/mplb' => ['display' => 'MPLB - Manajemen Perkantoran dan Layanan Bisnis'],
        '/dkv' => ['display' => 'DKV - Desain Komunikasi Visual'],
        '/dpib' => ['display' => 'DPIB - Desain Pemodelan dan Informasi Bangunan'],
        '/titl' => ['display' => 'TITL - Teknik Instalasi Tenaga Listrik'],
        '/tsm' => ['display' => 'TSM - Teknik Sepeda Motor'],
        '/tkr' => ['display' => 'TKR - Teknik Kendaraan Ringan'],
        
    ];
}
// ------------------------------------------
?>

<div class="main-header-container">
    <header class="navbar">

        <div class="logo-kiri">
            <a href="<?php echo $BASE; ?>/">
                <img src="<?php echo $image_path; ?>/ascendia_logo.png" alt="Logo" class="navbar-logo">
            </a>
        </div>

        <nav class="nav-links">
            <div class="dropdown">
                <a href="#" class="dropbtn">Tentang Sekolah <i class="fa fa-caret-down"></i></a>
                <div class="dropdown-content">
                    <a href="<?php echo $BASE; ?>/profil">Profil</a>
                    <a href="<?php echo $BASE; ?>/tujuan">Tujuan Kami</a>
                    <a href="<?php echo $BASE; ?>/visimisi">Visi Misi</a>
                    <a href="<?php echo $BASE; ?>/9k">9K</a>
                </div>
            </div>

            <div class="dropdown">
                <a href="#" class="dropbtn">Pembelajaran <i class="fa fa-caret-down"></i></a>
                <div class="dropdown-content">
                    <a href="<?php echo $BASE; ?>/kurikulum">Kurikulum</a>
                    <a href="<?php echo $BASE; ?>/metode">Metode Pembelajaran</a>
                    <a href="<?php echo $BASE; ?>/dukunganpembelajaran">Dukungan Pembelajaran</a>

                    <div class="sub-dropdown">
                        <a href="<?php echo $BASE; ?>/programstudi" class="sub-dropbtn">
                            Program Studi <i class="fa fa-angle-right"></i>
                        </a>

                        <div class="sub-dropdown-content">
                            <?php foreach ($program_studi_sub_menu as $url_path => $data): ?>
                                <a href="<?php echo $BASE . $url_path; ?>">
                                    <?php echo htmlspecialchars($data['display']); ?>
                                </a>
                            <?php endforeach; ?>
                        </div>
                    </div>
                    </div>
            </div>

            <div class="dropdown">
                <a href="#" class="dropbtn">Pendaftaran <i class="fa fa-caret-down"></i></a>
                <div class="dropdown-content">
                    <a href="<?php echo $BASE; ?>/daftar">Daftar Sekarang</a>
                    <a href="<?php echo $BASE; ?>/biaya">Biaya</a>
                    <a href="<?php echo $BASE; ?>/brosur">Brosur</a>
                    <a href="<?php echo $BASE; ?>/turvirtual">Tur Virtual</a>
                </div>
            </div>

            <div class="dropdown">
                <a href="#" class="dropbtn">Kehidupan Siswa <i class="fa fa-caret-down"></i></a>
                <div class="dropdown-content">
                    <a href="<?php echo $BASE; ?>/ekstrakurikuler">Ekstrakurikuler</a>
                    <a href="<?php echo $BASE; ?>/kerohanian">Kerohanian</a>
                    <a href="<?php echo $BASE; ?>/layanansiswa">Layanan Siswa</a>
                    <a href="<?php echo $BASE; ?>/keluargasekolah">Keluarga Sekolah</a>
                </div>
            </div>

            <a href="#">Blog</a>
            <a href="#">Karier</a>
            <a href="#">Hubungi Kami</a>

        </nav>
    </header>
</div>

