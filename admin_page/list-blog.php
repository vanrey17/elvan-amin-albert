<?php
include 'config.php';

// 1. Logika Hapus Blog
if (isset($_GET['hapus'])) {
    $id_hapus = mysqli_real_escape_string($conn, $_GET['hapus']);
    
    // Ambil nama gambar
    $cek = mysqli_query($conn, "SELECT gambar FROM tb_blog WHERE id_blog = '$id_hapus'");
    $dt = mysqli_fetch_assoc($cek);
    
    if ($dt) {
        // Karena page-admin dan uploads sejajar, gunakan ../ untuk keluar ke root
        $target_file = "../uploads/berkas/" . $dt['gambar'];
        if (!empty($dt['gambar']) && file_exists($target_file)) {
            unlink($target_file);
        }
        
        $delete = mysqli_query($conn, "DELETE FROM tb_blog WHERE id_blog = '$id_hapus'"); 
        
        if ($delete) {
            // PERBAIKAN: Gunakan parameter 'page' yang sesuai dengan URL admin Anda saat ini
            // Jika saat ini Anda sedang membuka halaman ini lewat admin.php?page=list-blog
            echo "<script>window.location='admin.php?page=list-blog&status=deleted';</script>";
            exit;
        }
    }    
}

// Ambil semua data blog
$query = mysqli_query($conn, "SELECT * FROM tb_blog ORDER BY tanggal DESC");
?>

<div class="card" style="background: white; padding: 25px; border-radius: 12px; box-shadow: 0 4px 6px rgba(0,0,0,0.1);">
    
    <?php if (isset($_GET['status']) && $_GET['status'] == 'deleted'): ?>
        <div style="background: #d4edda; color: #155724; padding: 10px; border-radius: 5px; margin-bottom: 15px; border: 1px solid #c3e6cb;">
            <i class="fas fa-check-circle"></i> Berhasil! Data kegiatan telah dihapus secara permanen.
        </div>
    <?php endif; ?>

    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px;">
        <h3 style="color: #2c3e50;"><i class="fas fa-list"></i> Daftar Kegiatan Sekolah</h3>
        <a href="admin.php?page=edit-blog" style="background: #27ae60; color: white; padding: 10px 15px; border-radius: 8px; text-decoration: none; font-weight: bold; font-size: 14px;">
            <i class="fas fa-plus"></i> Tambah Post Baru
        </a>
    </div>

    <table style="width: 100%; border-collapse: collapse; margin-top: 10px;">
        <thead>
            <tr style="background: #f8f9fa; text-align: left; border-bottom: 2px solid #eee;">
                <th style="padding: 12px;">No</th>
                <th style="padding: 12px;">Gambar</th>
                <th style="padding: 12px;">Judul Kegiatan</th>
                <th style="padding: 12px;">Tanggal</th>
                <th style="padding: 12px; text-align: center;">Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php 
            $no = 1;
            while ($row = mysqli_fetch_assoc($query)) : 
            ?>
            <tr style="border-bottom: 1px solid #eee;">
                <td style="padding: 12px;"><?= $no++; ?></td>
                <td style="padding: 12px;">
                    <img src="../uploads/berkas/<?= $row['gambar']; ?>" width="80" style="border-radius: 5px; height: 50px; object-fit: cover;">
                </td>
                <td style="padding: 12px; font-weight: bold; color: #34495e;"><?= $row['judul']; ?></td>
                <td style="padding: 12px; color: #7f8c8d; font-size: 14px;"><?= date('d/m/Y', strtotime($row['tanggal'])); ?></td>
                <td style="padding: 12px; text-align: center;">
                    <a href="admin.php?page=list-blog&hapus=<?= $row['id_blog']; ?>" 
                        onclick="return confirm('Yakin ingin menghapus berita ini?')"
                        style="background: #e74c3c; color: white; padding: 5px 10px; border-radius: 5px; text-decoration: none; font-size: 12px;">
                        <i class="fas fa-trash"></i> Hapus
                    </a>
                </td>
            </tr>
            <?php endwhile; ?>

            <?php if (mysqli_num_rows($query) == 0) : ?>
            <tr>
                <td colspan="5" style="text-align: center; padding: 20px; color: #999;">Belum ada konten blog.</td>
            </tr>
            <?php endif; ?>
        </tbody>
    </table>
</div>