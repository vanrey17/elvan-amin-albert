<?php
// 1. Inisialisasi Koneksi
include_once dirname(__DIR__) . '/config.php';
global $conn;

// 2. Ambil ID Siswa dari URL
$id_siswa = isset($_GET['id']) ? mysqli_real_escape_string($conn, $_GET['id']) : '';

// 3. Query Biodata Siswa
$query_siswa = mysqli_query($conn, "SELECT nama_lengkap_siswa FROM tb_calon_siswa WHERE id_siswa = '$id_siswa'");
$data_siswa = mysqli_fetch_assoc($query_siswa);

if (!$data_siswa) {
    echo "<div class='container mt-5'><div class='alert alert-danger shadow-sm'>Data siswa tidak ditemukan.</div></div>";
    exit;
}

// 4. Query Berkas (Ambil tipe_file untuk menentukan icon)
$query_berkas = mysqli_query($conn, "SELECT id_berkas, jenis_berkas, nama_file, ukuran_file, tipe_file FROM tb_berkas WHERE id_siswa = '$id_siswa'");

$dokumen = [];
while ($row = mysqli_fetch_assoc($query_berkas)) {
    $dokumen[] = $row;
}
?>

<div class="container mt-4 mb-5">
    <div class="card border-0 shadow-sm" style="border-radius: 15px;">
        <div class="card-header bg-white py-3 d-flex justify-content-between align-items-center border-bottom">
            <div>
                <h4 class="mb-0 text-primary"><i class="fas fa-folder-open me-2"></i> Berkas Digital Siswa</h4>
                <small class="text-muted">Nama: <strong><?= strtoupper($data_siswa['nama_lengkap_siswa']) ?></strong></small>
            </div>
            <a href="admin.php?page=detail-siswa&id=<?= $id_siswa ?>" class="btn btn-sm btn-outline-secondary shadow-sm">
                <i class="fas fa-arrow-left me-1"></i> Kembali
            </a>
        </div>
        
        <div class="card-body">
            <?php if (empty($dokumen)): ?>
                <div class="text-center py-5">
                    <i class="fas fa-file-excel fa-4x text-light mb-3"></i>
                    <p class="text-muted">Belum ada berkas yang diunggah.</p>
                </div>
            <?php else: ?>
                <div class="row g-3">
                    <?php foreach ($dokumen as $info): 
                        $ukuran_kb = round($info['ukuran_file'] / 1024, 2);
                        
                        // Menentukan Icon & Warna Border
                        $is_pdf = (strpos($info['tipe_file'], 'pdf') !== false);
                        $icon = $is_pdf ? 'fa-file-pdf text-danger' : 'fa-file-image text-success';
                        $border_color = $is_pdf ? 'border-danger' : 'border-success';
                        
                        // Path ke view_blob (Pastikan file ini ada di folder yang sama)
                        $url_view = "admin.php?page=view_blob" . $info['id_berkas'];
                    ?>
                    <div class="col-md-6 col-lg-4">
                        <div class="p-3 border rounded-3 bg-white shadow-sm h-100 border-start border-4 <?= $border_color ?>">
                            <div class="d-flex align-items-start">
                                <div class="me-3">
                                    <i class="fas <?= $icon ?> fa-2x"></i>
                                </div>
                                <div class="overflow-hidden w-100">
                                    <small class="text-muted d-block text-uppercase fw-bold" style="font-size: 0.65rem; letter-spacing: 0.5px;">
                                        <?= str_replace('_', ' ', $info['jenis_berkas']) ?>
                                    </small>
                                    <p class="text-dark fw-bold mb-1 text-truncate" style="font-size: 0.85rem;" title="<?= $info['nama_file'] ?>">
                                        <?= $info['nama_file'] ?>
                                    </p>
                                    <small class="text-muted d-block mb-3"><?= $ukuran_kb ?> KB</small>
                                    
                                    <div class="btn-group w-100 shadow-sm">
                                        <a href="admin.php?page=view_blob&id=<?= $info['id_berkas'] ?>" target="_blank" class="btn btn-sm btn-primary">
                                            <i class="fas fa-eye me-1"></i> Lihat
                                        </a>
                                        <a href="<?= $url_view ?>&download=1" class="btn btn-sm btn-light border" title="Download">
                                            <i class="fas fa-download"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>

            <div class="alert alert-info mt-5 border-0 shadow-sm" style="background-color: #f0f7ff;">
                <div class="d-flex align-items-center">
                    <i class="fas fa-shield-alt me-3 text-primary fa-lg"></i>
                    <div class="small">
                        <strong>Mode Pratinjau Langsung (Direct View):</strong>
                        <p class="mb-0 text-muted">Berkas ditampilkan langsung dari Database (BLOB). Jika berkas tidak muncul, pastikan file <code>view_blob.php</code> berada di lokasi yang benar.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>