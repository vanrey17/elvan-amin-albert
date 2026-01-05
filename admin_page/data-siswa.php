<?php
include 'config.php';

// Logika Hapus Siswa
if (isset($_GET['hapus'])) {
    $id = mysqli_real_escape_string($conn, $_GET['hapus']);
    
    // 1. HAPUS SEMUA TABEL ANAK TERLEBIH DAHULU
    // Hapus tabel yang disebutkan dalam pesan error (tb_info_sumber)
    mysqli_query($conn, "DELETE FROM tb_info_sumber WHERE id_siswa = '$id'");
    
    // Hapus tabel relasi lainnya (pastikan kolomnya id_siswa)
    mysqli_query($conn, "DELETE FROM tb_berkas WHERE id_siswa = '$id'");
    mysqli_query($conn, "DELETE FROM tb_orangtua_siswa WHERE id_siswa = '$id'");
    mysqli_query($conn, "DELETE FROM tb_wali WHERE id_siswa = '$id'");
    
    // 2. HAPUS DATA INDUK (tb_calon_siswa)
    // Sekarang data induk sudah aman untuk dihapus
    $delete = mysqli_query($conn, "DELETE FROM tb_calon_siswa WHERE id_siswa = '$id'");
    
    if($delete) {
        echo "<script>alert('Data berhasil dihapus beserta semua relasinya'); window.location='admin.php?page=data-siswa';</script>";
        exit;
    } else {
        echo "<script>alert('Gagal: " . mysqli_error($conn) . "');</script>";
    }
}

// Ambil data siswa
$query = mysqli_query($conn, "SELECT * FROM tb_calon_siswa ORDER BY id_siswa DESC");
?>

<div class="card" style="background: white; padding: 20px; border-radius: 10px; box-shadow: 0 2px 10px rgba(0,0,0,0.1);">
    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px;">
        <h3><i class="fas fa-users"></i> Data Calon Siswa Terdaftar</h3>
        <button onclick="window.print()" class="btn-print" style="padding: 8px 15px; background: #34495e; color: white; border: none; border-radius: 5px; cursor: pointer;">
            <i class="fas fa-print"></i> Cetak Laporan
        </button>
    </div>

    <div style="overflow-x: auto;">
        <table style="width: 100%; border-collapse: collapse; font-size: 14px;">
            <thead>
                <tr style="background: #2c3e50; color: white; text-align: left;">
                    <th style="padding: 12px;">ID</th>
                    <th>Nama Lengkap</th>
                    <th>Jurusan</th>
                    <th>No. HP</th>
                    <th>Tanggal Daftar</th>
                    <th style="text-align: center;">Opsi</th>
                </tr>
            </thead>
            <tbody>
                <?php if (mysqli_num_rows($query) == 0) : ?>
                    <tr>
                        <td colspan="6" style="text-align: center; padding: 20px; color: #7f8c8d;">Belum ada siswa yang mendaftar.</td>
                    </tr>
                <?php endif; ?>

                <?php while ($row = mysqli_fetch_assoc($query)) : ?>
                    <tr style="border-bottom: 1px solid #eee;">
                        <td style="padding: 12px;">#<?= $row['id_siswa'] ?></td>
                        <td><strong><?= htmlspecialchars($row['nama_lengkap_siswa']) ?></strong></td>
                        <td><span style="background: #e1f5fe; color: #0288d1; padding: 2px 8px; border-radius: 4px; font-size: 11px;"><?= $row['minat_jurusan'] ?></span></td>
                        <td><?= $row['nomor_handphone_siswa'] ?></td>
                        <td style="font-size: 12px; color: #95a5a6;">
                            <?= isset($row['created_at']) ? date('d/m/y H:i', strtotime($row['created_at'])) : '-' ?>
                        </td>
                        
                        <td style="text-align: center; padding: 10px;">
                            <div style="display: flex; gap: 5px; justify-content: center;">
                                <a href="admin.php?page=detail-siswa&id=<?= $row['id_siswa'] ?>" class="btn-action view" title="Detail">
                                    <i class="fas fa-eye"></i>
                                </a>
                                <a href="admin.php?page=lihat-berkas&id=<?= $row['id_siswa'] ?>" class="btn-action file" title="Berkas">
                                    <i class="fas fa-file-alt"></i>
                                </a>
                                <a href="admin.php?page=data-siswa&hapus=<?= $row['id_siswa'] ?>" 
                                   onclick="return confirm('Hapus data siswa ini?')" 
                                   class="btn-action delete" title="Hapus">
                                    <i class="fas fa-trash"></i>
                                </a>
                            </div>
                        </td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>
</div>

<style>
    .btn-action {
        padding: 8px 10px;
        border-radius: 4px;
        color: white;
        text-decoration: none;
        transition: 0.2s;
    }
    .view { background: #3498db; }
    .file { background: #f39c12; }
    .delete { background: #e74c3c; }
    .btn-action:hover { opacity: 0.8; }

    @media print {
        .btn-print, .btn-action, .sidebar { display: none !important; }
    }
</style>