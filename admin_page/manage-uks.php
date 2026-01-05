<?php
include 'config.php';

// 1. Logika Update atau Hapus Otomatis
if (isset($_POST['update_status'])) {
    $id = mysqli_real_escape_string($conn, $_POST['id_pasien']);
    $status_baru = mysqli_real_escape_string($conn, $_POST['status_baru']);
    
    if ($status_baru === 'Selesai') {
        // JIKA STATUS SELESAI -> HAPUS DARI DATABASE
        $sql_action = "DELETE FROM tb_visit_uks WHERE id = '$id'";
        $pesan = "Pasien telah selesai dirawat dan data otomatis dihapus dari monitor.";
    } else {
        // JIKA STATUS LAIN -> UPDATE SEPERTI BIASA
        $sql_action = "UPDATE tb_visit_uks SET status = '$status_baru' WHERE id = '$id'";
        $pesan = "Status pasien berhasil diperbarui!";
    }
    
    if (mysqli_query($conn, $sql_action)) {
        echo "<script>alert('$pesan'); window.location='admin.php?page=manage-uks';</script>";
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}

// 2. Ambil data pasien (Hanya yang belum selesai/masih di UKS)
// Karena data 'Selesai' langsung dihapus, query ini akan menampilkan antrian aktif saja
$query = mysqli_query($conn, "SELECT * FROM tb_visit_uks ORDER BY created_at DESC");
?>

<div class="card">
    <h3><i class="fas fa-heartbeat"></i> Monitoring Smart UKS</h3>
    <p>Gunakan panel ini untuk memantau siswa yang sedang membutuhkan penanganan medis.</p>
    <hr>

    <div style="overflow-x:auto; margin-top: 20px;">
        <table style="width: 100%; border-collapse: collapse;">
            <thead>
                <tr style="background: #2c3e50; color: white;">
                    <th style="padding: 12px;">Nama Siswa</th>
                    <th>Kelas</th>
                    <th>L/P</th>
                    <th>Gejala/Keluhan</th>
                    <th>Waktu Kunjungan</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php while($row = mysqli_fetch_assoc($query)): ?>
                <tr style="border-bottom: 1px solid #ddd;">
                    <td style="padding: 12px;"><strong><?= htmlspecialchars($row['student_name']) ?></strong></td>
                    <td style="text-align: center;"><?= htmlspecialchars($row['grade']) ?></td>
                    <td style="text-align: center;"><?= $row['gender'] ?></td>
                    <td><?= htmlspecialchars($row['symptoms']) ?></td>
                    <td style="font-size: 13px;"><?= date('d/m/Y H:i', strtotime($row['created_at'])) ?></td>
                    <td style="text-align: center;">
                        <?php 
                            // Penentuan warna label berdasarkan status
                            $badge_color = "#f39c12"; // Default Menunggu (Orange)
                            if($row['status'] == 'Sedang Dirawat') $badge_color = "#3498db"; // Biru
                            if($row['status'] == 'Selesai') $badge_color = "#27ae60"; // Hijau
                        ?>
                        <span style="background: <?= $badge_color ?>; color: white; padding: 5px 10px; border-radius: 15px; font-size: 11px; white-space: nowrap;">
                            <?= $row['status'] ?>
                        </span>
                    </td>
                    <td style="padding: 10px;">
                        <form method="POST" style="display: flex; gap: 5px;">
                            <input type="hidden" name="id_pasien" value="<?= $row['id'] ?>">
                            <select name="status_baru" style="padding: 5px; border-radius: 4px; font-size: 12px;">
                                <option value="Menunggu" <?= ($row['status'] == 'Menunggu') ? 'selected' : '' ?>>Menunggu</option>
                                <option value="Sedang Dirawat" <?= ($row['status'] == 'Sedang Dirawat') ? 'selected' : '' ?>>Sedang Dirawat</option>
                                <option value="Selesai" <?= ($row['status'] == 'Selesai') ? 'selected' : '' ?>>Selesai</option>
                            </select>
                            <button type="submit" name="update_status" style="background: #2c3e50; color: white; border: none; padding: 5px 10px; border-radius: 4px; cursor: pointer; font-size: 12px;">
                                <i class="fas fa-sync-alt"></i>
                            </button>
                        </form>
                    </td>
                </tr>
                <?php endwhile; ?>

                <?php if(mysqli_num_rows($query) == 0): ?>
                <tr>
                    <td colspan="7" style="text-align: center; padding: 30px; color: #7f8c8d;">
                        <i class="fas fa-info-circle"></i> Tidak ada data kunjungan UKS saat ini.
                    </td>
                </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>

<style>
    /* Styling tambahan untuk tabel agar lebih rapi */
    table th, table td {
        text-align: left;
        border: 1px solid #eee;
    }
    tr:hover {
        background-color: #f9f9f9;
    }
</style>