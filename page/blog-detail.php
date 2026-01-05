<?php
include 'config.php';

// 1. Ambil ID dari URL
$id = isset($_GET['id']) ? mysqli_real_escape_string($conn, $_GET['id']) : 0;

// 2. Query ambil data berita berdasarkan ID
$query = mysqli_query($conn, "SELECT * FROM tb_blog WHERE id_blog = '$id'");
$data = mysqli_fetch_assoc($query);

// 3. Jika ID tidak ditemukan atau data kosong
if (!$data) {
    echo "<div style='text-align:center; padding:50px;'>
            <h2>Oops! Berita tidak ditemukan.</h2>
            <a href='index.php?page=blog'>Kembali ke Blog</a>
          </div>";
    return;
}
?>

<div class="blog-detail-container" style="max-width: 850px; margin: 40px auto; padding: 0 20px; font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;">
    
    <a href="index.php?page=blog" style="text-decoration: none; color: #3498db; font-weight: bold; display: inline-block; padding: 40px 20px 20px 20px;">
        <i class="fas fa-arrow-left"></i> Kembali ke Daftar Kegiatan
    </a>

    <h1 style="color: #2c3e50; line-height: 1.3; margin-bottom: 10px;"><?= $data['judul']; ?></h1>
    <div style="color: #7f8c8d; margin-bottom: 30px; font-size: 14px;">
        <i class="fas fa-calendar-alt"></i> Dipublikasikan pada: <?= date('d F Y', strtotime($data['tanggal'])); ?>
    </div>

    <?php 
    // Path disesuaikan dengan struktur folder Anda (keluar dari folder page untuk ke uploads)
    $gambar_path = "../uploads/berkas/" . $data['gambar']; 
    ?>
    <div style="width: 100%; border-radius: 15px; overflow: hidden; box-shadow: 0 10px 30px rgba(0,0,0,0.1); margin-bottom: 30px;">
        <img src="<?= $gambar_path; ?>" alt="<?= $data['judul']; ?>" style="width: 100%; height: auto; display: block;">
    </div>

    <div class="blog-content" style="line-height: 1.8; color: #34495e; font-size: 17px; text-align: justify;">
        <?= nl2br($data['isi']); ?>
    </div>

    <div style="margin-top: 50px; padding-top: 20px; border-top: 1px solid #eee;">
        <p style="font-size: 14px; color: #95a5a6;">Tag: Kegiatan Sekolah, Berita Terbaru</p>
    </div>
</div>