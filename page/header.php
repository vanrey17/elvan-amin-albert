<?php
// Gunakan folder base yang sama dengan index.php

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
$PROJECT_FOLDER = "/elvan-amin-albert"; 

global $program_studies_data, $student_services_data;

// Supaya foreach di header tidak error jika data kosong
$sub_menu_prodi = $program_studies_data ?? [];
$sub_menu_layanan = $student_services_data ?? [];

if (!isset($base_url)) {
    $protocol = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off') ? "https://" : "http://";
    $host = $_SERVER['HTTP_HOST'] ?? 'localhost';
    // Penting: Sertakan folder project
    $base_url = $protocol . $host . $PROJECT_FOLDER . "/"; 
}

if (!isset($image_path)) $image_path = $base_url . "image";

// Akses data dari index.php
global $program_studi_sub_menu, $student_services_data; 

// --- 2. FALLBACK DATA (Disesuaikan untuk Query String) ---
if (!isset($program_studi_sub_menu)) {
    $program_studi_sub_menu = [
        'tjkt' => ['display' => 'TJKT - Teknik Jaringan Komputer dan Telekomunikasi'],
        'rpl'  => ['display' => 'RPL - Rekayasa Perangkat Lunak'],
        'mplb' => ['display' => 'MPLB - Manajemen Perkantoran dan Layanan Bisnis'],
        'dkv'  => ['display' => 'DKV - Desain Komunikasi Visual'],
        'dpib' => ['display' => 'DPIB - Desain Pemodelan dan Informasi Bangunan'],
        'titl' => ['display' => 'TITL - Teknik Instalasi Tenaga Listrik'],
        'tsm'  => ['display' => 'TSM - Teknik Sepeda Motor'],
        'tkr'  => ['display' => 'TKR - Teknik Kendaraan Ringan'],
    ];
}

if (!isset($student_services_data)) {
    $student_services_data = [
        'uks'    => ['display' => 'Smart UKS'], 
        'bk'     => ['display' => 'Bimbingan Konseling'],
        'kantin' => ['display' => 'Kantin Sehat'],
    ];
}
?>
<body>
<div class="main-header-container">
    <header class="navbar">

        <div class="logo-kiri">
            <a href="<?php echo $base_url; ?>index.php?page=/">
                <img src="<?php echo $image_path; ?>/ascendia_logo.png" alt="Logo" class="navbar-logo">
            </a>
        </div>

        <div class="mobile-menu-btn" onclick="toggleMenu()">
            <i class="fas fa-bars"></i>
        </div>

        <nav class="nav-links" id="navContainer">
            <div class="mobile-close-btn" onclick="toggleMenu()">
                <i class="fas fa-times"></i>
            </div>
            <div class="dropdown">
                <a href="#" class="dropbtn">Tentang Sekolah <i class="fa fa-caret-down"></i></a>
                <div class="dropdown-content">
                    <a href="<?php echo $base_url; ?>index.php?page=profil">Profil</a>
                    <a href="<?php echo $base_url; ?>index.php?page=tujuan">Tujuan Kami</a>
                    <a href="<?php echo $base_url; ?>index.php?page=visimisi">Visi Misi</a>
                    <a href="<?php echo $base_url; ?>index.php?page=9k">9K</a>
                </div>
            </div>

            <div class="dropdown">
                <a href="#" class="dropbtn">Pembelajaran <i class="fa fa-caret-down"></i></a>
                <div class="dropdown-content">
                    <a href="<?php echo $base_url; ?>index.php?page=kurikulum">Kurikulum</a>
                    <a href="<?php echo $base_url; ?>index.php?page=metode">Metode Pembelajaran</a>
                    <a href="<?php echo $base_url; ?>index.php?page=dukunganpembelajaran">Dukungan Pembelajaran</a>

                    <div class="sub-dropdown">
                        <a href="#" class="sub-dropbtn">Program Studi <i class="fa fa-angle-right"></i></a>
                        <div class="sub-dropdown-content">
                            <?php foreach ($sub_menu_prodi as $path => $data): ?>
                                <?php $slug = ltrim($path, '/'); ?>
                                <a href="<?= $base_url; ?>index.php?page=<?= $slug; ?>">
                                    <?= htmlspecialchars($data['display']); ?>
                                </a>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
            </div>

            <div class="dropdown">
                <a href="#" class="dropbtn">Pendaftaran <i class="fa fa-caret-down"></i></a>
                <div class="dropdown-content">
                    <a href="<?php echo $base_url; ?>index.php?page=daftar">Daftar Sekarang</a>
                    <a href="<?php echo $base_url; ?>index.php?page=biaya">Biaya</a>

                </div>
            </div>

            <div class="dropdown">
                <a href="#" class="dropbtn">Kehidupan Siswa <i class="fa fa-caret-down"></i></a>
                <div class="dropdown-content">
                    <a href="<?php echo $base_url; ?>index.php?page=ekstrakurikuler">Ekstrakurikuler</a>
                    <a href="<?php echo $base_url; ?>index.php?page=kerohanian">Kerohanian</a>
                    
                    <div class="sub-dropdown">
                        <a href="#" class="sub-dropbtn">Layanan Siswa <i class="fa fa-angle-right"></i></a>
                        <div class="sub-dropdown-content">
                            <?php foreach ($sub_menu_layanan as $path => $data): ?>
                                <?php $slug = ltrim($path, '/'); ?>
                                <a href="<?= $base_url; ?>index.php?page=<?= $slug; ?>">
                                    <?= htmlspecialchars($data['display']); ?>
                                </a>
                            <?php endforeach; ?>
                        </div>
                    </div>


                    
                    <a href="<?php echo $base_url; ?>index.php?page=keluargasekolah">Keluarga Sekolah</a>
                </div>
            </div>

            <div>
                <a href="<?php echo $base_url; ?>index.php?page=blog">Blog</a>
            </div>

            <!-- <a href="<?php echo $base_url; ?>index.php?page=blog">Blog</a>
            <a href="<?php echo $base_url; ?>index.php?page=karier">Karier</a>
            <a href="<?php echo $base_url; ?>index.php?page=hubungi">Hubungi Kami</a> -->


            <?php if (isset($_SESSION['user_id'])): ?>
                <div class="user-logged-in-wrapper">
                    <span class="user-name">
                        <i class="fas fa-user-circle"></i> 
                        <?php echo htmlspecialchars($_SESSION['nama']); ?>
                    </span>
                    <a href="auth.php?logout=true" class="btn-logout">
                        <i class="fas fa-sign-out-alt"></i> Logout
                    </a>
                </div>
            <?php else: ?>

                <div class="dropdown">
                    <a href="javascript:void(0)" class="btn-masuk-header" id="loginDropdownBtn">
                        Masuk <i class="fas fa-chevron-down" style="font-size: 0.8em;"></i>
                    </a>
                    
                    <div class="dropdown-login-content" id="loginDropdownMenu">
                        <div style="padding: 10px 20px; font-size: 12px; color: #999; font-weight: 600;">AKSES PENGGUNA</div>
                        <a href="<?php echo $base_url; ?>login_user.php"><i class="fas fa-graduation-cap"></i> Siswa / Pendaftar</a>
                        <a href="<?php echo $base_url; ?>register.php"><i class="fas fa-user-plus"></i> Daftar Akun Baru</a>
                        <div style="border-top: 1px solid #eee; margin: 5px 0;"></div>
                        <a href="<?php echo $base_url; ?>login_admin.php"><i class="fas fa-shield-alt"></i> Administrator</a>
                    </div>
                </div>

            <?php endif; ?>

        </nav>
    </header>

</div>
<script>
function toggleMenu() {
    const nav = document.getElementById('navContainer');
    // Buat overlay secara dinamis jika belum ada
    let overlay = document.querySelector('.menu-overlay');
    if (!overlay) {
        overlay = document.createElement('div');
        overlay.className = 'menu-overlay';
        document.body.appendChild(overlay);
        overlay.onclick = toggleMenu;
    }

    nav.classList.toggle('active');
    overlay.classList.toggle('active');
    
    // Mencegah scroll pada body saat menu buka
    document.body.style.overflow = nav.classList.contains('active') ? 'hidden' : 'auto';
}

// Logika khusus Dropdown di Mobile (Tap untuk buka)
document.querySelectorAll('.dropdown > .dropbtn').forEach(btn => {
    btn.addEventListener('click', function(e) {
        if (window.innerWidth <= 768) {
            e.preventDefault();
            this.parentElement.classList.toggle('mobile-open');
        }
    });
});

document.addEventListener('DOMContentLoaded', function() {
    const loginBtn = document.getElementById('loginDropdownBtn');
    const loginMenu = document.getElementById('loginDropdownMenu');

    if (loginBtn && loginMenu) {
        // 1. Fungsi ketika tombol Masuk diklik
        loginBtn.addEventListener('click', function(e) {
            e.preventDefault();
            e.stopPropagation(); // Mencegah event bubbling
            loginMenu.classList.toggle('active');
        });

        // 2. Klik di mana saja di luar menu untuk menutup
        window.addEventListener('click', function(e) {
            if (!loginBtn.contains(e.target) && !loginMenu.contains(e.target)) {
                loginMenu.classList.remove('active');
            }
        });
    }
});


</script>

<style>
    /* --- STYLE KHUSUS DROPDOWN LOGIN --- */

/* Tombol Masuk Utama (Oranye) */

.nav-links {
    display: flex;
    align-items: center; /* Ini yang membuat semuanya sejajar tinggi tengah */
    gap: 10px; /* Jarak antar menu */
}

/* Container khusus untuk User yang sudah login */
.user-logged-in-wrapper {
    display: flex;
    align-items: center;
    gap: 15px; /* Jarak antara Nama dan tombol Logout */
    margin-left: 10px; /* Memberi jarak sedikit dari menu terakhir */
    padding: 5px 0;
}

.user-name {
    font-weight: 600;
    color: #333;
    font-size: 14px;
    display: flex;
    align-items: center;
    white-space: nowrap; /* Agar nama tidak turun ke bawah jika panjang */
}

.user-name i {
    color: #f39c12;
    font-size: 1.2rem;
    margin-right: 8px;
}

.btn-logout {
    background-color: #ffebee;
    color: #c0392b !important;
    padding: 6px 14px;
    border-radius: 50px;
    font-size: 12px;
    font-weight: 600;
    text-decoration: none;
    transition: 0.3s;
    border: 1px solid #ffcdd2;
    display: inline-flex;
    align-items: center;
    gap: 5px;
}

.btn-logout:hover {
    background-color: #c0392b;
    color: white !important;
    border-color: #c0392b;
}

/* Penyesuaian untuk Mobile agar tidak berantakan */
@media screen and (max-width: 768px) {
    .user-logged-in-wrapper {
        flex-direction: column; /* Nama dan Logout susun ke bawah di HP */
        align-items: flex-start;
        padding: 15px;
        border-top: 1px solid #eee;
        width: 100%;
    }
    
    .btn-logout {
        width: 100%;
        justify-content: center;
        margin-top: 10px;
    }
}
.btn-masuk-header {
    background-color: #f39c12;
    color: #fff !important; /* Paksa putih */
    padding: 10px 24px;
    border-radius: 50px; /* Membuat tombol bulat lonjong */
    font-weight: 600;
    font-family: 'Poppins', sans-serif;
    box-shadow: 0 4px 6px rgba(243, 156, 18, 0.3);
    transition: all 0.3s ease;
    display: inline-flex;
    align-items: center;
    gap: 8px;
    user-select: none;
}

.btn-masuk-header:hover {
    background-color: #e67e22;
    transform: translateY(-2px);
    user-select: none;
    box-shadow: 0 6px 12px rgba(243, 156, 18, 0.4);
}

/* Style Dropdown Content agar lebih cantik */
.dropdown-login-content {
    display: none;
    position: absolute;
    right: 0; /* Rata kanan */
    background-color: #fff;
    min-width: 220px;
    box-shadow: 0 8px 16px rgba(0,0,0,0.15);
    border-radius: 12px; /* Sudut membulat */
    z-index: 1000;
    overflow: hidden;
    margin-top: 10px;
    border: 1px solid #eee;
}

.dropdown-login-content.active {
    display: block;
    animation: fadeIn 0.2s ease-in-out;
}

/* Link di dalam dropdown */
.dropdown-login-content a {
    color: #444;
    padding: 12px 20px;
    text-decoration: none;
    display: flex;
    align-items: center;
    gap: 10px;
    font-size: 14px;
    transition: background 0.2s;
}

.dropdown-login-content a:hover {
    background-color: #fff5e6; /* Oranye sangat muda saat hover */
    color: #d35400;
}

.dropdown-login-content a i {
    width: 20px;
    text-align: center;
    color: #f39c12; /* Icon warna oranye */
}

/* Style setelah Login (Nama User) */
.user-logged-in {
    display: flex;
    align-items: center;
    gap: 15px;
}


/* Agar dropdown muncul saat hover */
.dropdown:hover .dropdown-login-content {
    display: block;
    animation: fadeIn 0.2s ease-in-out;
}

@keyframes fadeIn {
    from { opacity: 0; transform: translateY(10px); }
    to { opacity: 1; transform: translateY(0); }
}
</style>
</body>