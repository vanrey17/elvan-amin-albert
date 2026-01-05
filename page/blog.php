<?php include 'config.php'; ?>
<div class="blog-container" style="max-width: 1000px; margin: 0 auto; padding: 20px;">
    <h2 style="text-align: center; padding: 40px 20px 20px 20px;">Kegiatan Terbaru Sekolah 🏫</h2>
    
    <div class="blog-grid" style="display: grid; grid-template-columns: repeat(auto-fill, minmax(300px, 1fr)); gap: 25px;">
        
        <?php
        $ambil_blog = mysqli_query($conn, "SELECT * FROM tb_blog ORDER BY tanggal DESC");
        while ($row = mysqli_fetch_assoc($ambil_blog)) :
            // Tambahkan pengecekan jika gambar kosong
            $gambar_path = "../uploads/berkas/" . $row['gambar'];
            if (empty($row['gambar']) || !file_exists($gambar_path)) {
                $gambar_tampil = "https://via.placeholder.com/400x250?text=Gambar+Tidak+Ditemukan";
            } else {
                $gambar_tampil = $gambar_path;
            }
        ?>
        
        <div class="blog-card" style="background: white; border-radius: 12px; overflow: hidden; box-shadow: 0 4px 15px rgba(0,0,0,0.1);">
            <img src="<?= $gambar_tampil; ?>" style="width: 100%; height: 200px; object-fit: cover;" alt="<?= $row['judul']; ?>">
            
            <div style="padding: 20px;">
                <small style="color: #7f8c8d;"><i class="fas fa-calendar"></i> <?= date('d M Y', strtotime($row['tanggal'])); ?></small>
                <h3 style="margin: 10px 0; color: #2c3e50;"><?= $row['judul']; ?></h3>
                <p style="color: #666; font-size: 14px; line-height: 1.6;">
                    <?= substr(strip_tags($row['isi']), 0, 120); ?>...
                </p>
                <a href="index.php?page=blog-detail&id=<?= $row['id_blog']; ?>" style="display: inline-block; margin-top: 15px; color: #3498db; text-decoration: none; font-weight: bold;">Baca Selengkapnya →</a>
            </div>
        </div>
        
        <?php endwhile; ?>
        
    </div>
</div>