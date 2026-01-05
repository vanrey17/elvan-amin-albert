<?php
include 'config.php';

// Fungsi bantuan untuk cek kolom agar tidak error lagi
function columnExists($conn, $table, $column) {
    $result = mysqli_query($conn, "SHOW COLUMNS FROM `$table` LIKE '$column'");
    return mysqli_num_rows($result) > 0;
}

// 1. Cek apakah kolom created_at ada, jika tidak pakai id_siswa
$sort_column = columnExists($conn, 'tb_calon_siswa', 'created_at') ? 'created_at' : 'id_siswa';

// 2. Ambil Statistik
$query_pendaftar = mysqli_query($conn, "SELECT COUNT(*) as total FROM tb_calon_siswa");
$total_pendaftar = ($query_pendaftar) ? mysqli_fetch_assoc($query_pendaftar)['total'] : 0;

// 3. Data Pendaftar Terakhir (Menggunakan kolom sortir yang tersedia)
$recent_students = mysqli_query($conn, "SELECT * FROM tb_calon_siswa ORDER BY $sort_column DESC LIMIT 5");
?>

<div class="dashboard-wrapper">
    <div class="welcome-banner" style="background: linear-gradient(135deg, #1a2a6c, #b21f1f); color: white; padding: 30px; border-radius: 15px; margin-bottom: 30px;">
        <h1>Dashboard Monitoring</h1>
        <p>Ringkasan data pendaftaran SMK Teknologi Ascendia.</p>
    </div>

    <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); gap: 20px; margin-bottom: 30px;">
        <div class="card" style="background: white; padding: 20px; border-radius: 10px; border-left: 5px solid #3498db; box-shadow: 0 4px 6px rgba(0,0,0,0.1);">
            <h4 style="color: #7f8c8d; margin: 0;">Total Siswa Baru</h4>
            <h2 style="font-size: 32px; margin: 10px 0;"><?= $total_pendaftar; ?></h2>
            <a href="admin.php?page=data-siswa" style="font-size: 12px; color: #3498db; text-decoration: none;">Lihat Semua Data &rarr;</a>
        </div>
    </div>

    <div class="card" style="background: white; padding: 20px; border-radius: 10px; box-shadow: 0 4px 6px rgba(0,0,0,0.1);">
        <h3><i class="fas fa-list"></i> Pendaftar Terkini</h3>
        <table style="width: 100%; border-collapse: collapse; margin-top: 10px;">
            <thead>
                <tr style="text-align: left; border-bottom: 2px solid #eee;">
                    <th style="padding: 10px;">Nama Siswa</th>
                    <th>Jurusan</th>
                    <th>NIK</th>
                </tr>
            </thead>
            <tbody>
                <?php if ($recent_students && mysqli_num_rows($recent_students) > 0) : ?>
                    <?php while($s = mysqli_fetch_assoc($recent_students)): ?>
                    <tr style="border-bottom: 1px solid #eee;">
                        <td style="padding: 10px;"><strong><?= htmlspecialchars($s['nama_lengkap_siswa']) ?></strong></td>
                        <td><?= $s['minat_jurusan'] ?></td>
                        <td style="color: #95a5a6;"><?= $s['nomor_induk_kependudukan'] ?></td>
                    </tr>
                    <?php endwhile; ?>
                <?php else : ?>
                    <tr><td colspan="3" style="text-align: center; padding: 20px;">Belum ada data.</td></tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>