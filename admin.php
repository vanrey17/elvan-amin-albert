<?php
require_once 'config.php'; 
session_start();

if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
    header("Location: login_admin.php");
    exit;
}

$BASE = "/elvan-amin-albert"; 
$protocol = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off') ? "https://" : "http://";
$host = $_SERVER['HTTP_HOST'] ?? 'localhost';
$base_url = $protocol . $host . $BASE . "/"; 

$admin_routes = [
    'dashboard'    => 'admin_page/dashboard-admin.php',
    'data-siswa'   => 'admin_page/data-siswa.php',
    'manage-uks'   => 'admin_page/manage-uks.php',
    'edit-blog'    => 'admin_page/edit-blog.php',
    'edit-lab'     => 'admin_page/edit-konten.php',
    'edit-biaya'   => 'admin_page/edit-biaya.php', 
    'detail-siswa' => 'admin_page/detail-siswa.php',
    'list-blog'    => 'admin_page/list-blog.php',
    'lihat-berkas' => 'admin_page/lihat-berkas.php',
    'view_blob'    => 'admin_page/view_blob.php', // File ini menghasilkan output binary
];

$page = $_GET['page'] ?? 'dashboard';

// 1. CEK APAKAH PAGE VALID
if (!array_key_exists($page, $admin_routes)) {
    $content_file = 'admin_page/404.php';
} else {
    $content_file = $admin_routes[$page];
}

// 2. LOGIKA KHUSUS VIEW_BLOB (TAMPILKAN GAMBAR/PDF TANPA SIDEBAR)
if ($page === 'view_blob') {
    $content_file = $admin_routes['view_blob'];
    if (file_exists(__DIR__ . '/' . $content_file)) {
        include __DIR__ . '/' . $content_file;
        exit; // Berhenti di sini
    }
}

// 3. JIKA FILE FISIK TIDAK ADA
if (!file_exists(__DIR__ . '/' . $content_file)) {
    $content_file = 'admin_page/404.php';
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel - SMK Teknologi Ascendia</title>
    
    <link rel="stylesheet" href="<?= $base_url; ?>style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <style>
        :root { --sidebar-width: 260px; --primary-color: #2c3e50; }
        body { margin: 0; font-family: 'Segoe UI', sans-serif; display: flex; background: #f4f7f6; }
        
        .sidebar { width: var(--sidebar-width); background: var(--primary-color); height: 100vh; position: fixed; color: white; transition: 0.3s; z-index: 1000;}
        .sidebar-header { padding: 20px; text-align: center; border-bottom: 1px solid #34495e; }
        .sidebar-menu { padding: 20px 0; }
        .sidebar-menu a { display: block; padding: 12px 25px; color: #bdc3c7; text-decoration: none; transition: 0.3s; font-size: 15px; }
        .sidebar-menu a:hover, .sidebar-menu a.active { background: #34495e; color: white; border-left: 4px solid #3498db; }
        .sidebar-menu i { margin-right: 10px; width: 20px; }

        .main-content { margin-left: var(--sidebar-width); flex: 1; padding: 30px; min-height: 100vh; width: calc(100% - var(--sidebar-width)); }
        .top-nav { background: white; padding: 15px 30px; margin: -30px -30px 30px -30px; display: flex; justify-content: space-between; align-items: center; box-shadow: 0 2px 5px rgba(0,0,0,0.1); }
        
        /* Fix untuk Bootstrap clash */
        .sidebar-menu a { text-decoration: none !important; }
    </style>
</head>
<body>

    <aside class="sidebar">
        <div class="sidebar-header">
            <h3 class="h5 mb-0">ASCENDIA ADMIN</h3>
        </div>
        <nav class="sidebar-menu">
            <a href="admin.php?page=dashboard" class="<?= $page == 'dashboard' ? 'active' : '' ?>">
                <i class="fas fa-tachometer-alt"></i> Dashboard
            </a>
            <a href="admin.php?page=list-blog" class="<?= $page == 'list-blog' ? 'active' : '' ?>">
                <i class="fas fa-newspaper"></i> List Blog
            </a>
            <a href="admin.php?page=edit-biaya" class="<?= $page == 'edit-biaya' ? 'active' : '' ?>">
                <i class="fas fa-money-bill-wave"></i> Edit Biaya
            </a>
            <a href="admin.php?page=manage-uks" class="<?= $page == 'manage-uks' ? 'active' : '' ?>">
                <i class="fas fa-heartbeat"></i> Smart UKS
            </a>
            <a href="admin.php?page=data-siswa" class="<?= ($page == 'data-siswa' || $page == 'detail-siswa' || $page == 'lihat-berkas') ? 'active' : '' ?>">
                <i class="fas fa-user-graduate"></i> Data Pendaftar
            </a>
            
            <div style="margin-top: 30px; border-top: 1px solid #34495e; padding-top: 10px;">
                <a href="index.php" target="_blank"><i class="fas fa-external-link-alt"></i> Lihat Web</a>
                <a href="logout.php" style="color: #e74c3c;">
                    <i class="fas fa-sign-out-alt"></i> Keluar
                </a>
            </div>
        </nav>
    </aside>

    <main class="main-content">
        <header class="top-nav">
            <div class="page-title">
                <h2 class="h4 mb-0" style="text-transform: capitalize; color: #333;">
                    <?= str_replace('-', ' ', $page) ?>
                </h2>
            </div>
            <div class="admin-profile">
                <span class="text-muted">Halo, <strong>Admin</strong> <i class="fas fa-user-circle ms-1"></i></span>
            </div>
        </header>

        <section class="content-body">
            <?php include __DIR__ . '/' . $content_file; ?>
        </section>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>