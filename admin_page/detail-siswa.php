<?php
include_once dirname(__DIR__) . '/config.php';
global $conn;

if (!$conn) {
    die("Error: Koneksi database tidak ditemukan.");
}

$id = isset($_GET['id']) ? mysqli_real_escape_string($conn, $_GET['id']) : '';

// Query Data Lengkap - Ditambahkan sekolah_asal dari tabel berkas
$sql = "SELECT 
            p.*, 
            -- Ambil sekolah_asal dari alias f (tb_berkas)
            -- Kolom dari tabel Orang Tua
            ot.nama_lengkap_ayah, 
            ot.nomor_induk_kependudukan_ayah, 
            ot.agama_ayah, 
            ot.tempat_lahir_ayah, 
            ot.tanggal_lahir_ayah, 
            ot.alamat_ayah, 
            ot.golongan_darah_ayah, 
            ot.hubungan_ayah, 
            ot.no_hp_ayah,
            ot.nama_lengkap_ibu, 
            ot.nomor_induk_kependudukan_ibu, 
            ot.agama_ibu, 
            ot.tempat_lahir_ibu, 
            ot.tanggal_lahir_ibu, 
            ot.alamat_ibu, 
            ot.golongan_darah_ibu, 
            ot.hubungan_ibu, 
            ot.nomor_handphone_ibu,
            -- Kolom dari tabel Wali
            w.nama_wali, 
            w.nik_wali, 
            w.agama_wali, 
            w.tempat_lahir_wali, 
            w.tanggal_lahir_wali, 
            w.alamat_wali, 
            w.kewarganegaraan_wali,
            w.golongan_darah_wali, 
            w.hubungan_wali, 
            w.no_hp_wali,
            -- Mengambil sekolah_asal dari baris mana saja di tb_berkas milik siswa ini
            (SELECT sekolah_asal FROM tb_berkas WHERE id_siswa = p.id_siswa AND sekolah_asal IS NOT NULL AND sekolah_asal != '' LIMIT 1) as sekolah_asal,
            -- Mengambil id_berkas foto
            f.id_berkas AS id_foto_berkas
        FROM tb_calon_siswa p
        LEFT JOIN tb_orangtua_siswa ot ON p.id_siswa = ot.id_siswa
        LEFT JOIN tb_wali w ON p.id_siswa = w.id_siswa
        -- Join ke tb_berkas (alias f) untuk mengambil foto DAN sekolah_asal
        LEFT JOIN tb_berkas f ON p.id_siswa = f.id_siswa 
             AND (f.jenis_berkas = 'foto_siswa' OR f.jenis_berkas = 'foto')
        WHERE p.id_siswa = '$id' 
        LIMIT 1";

$query = mysqli_query($conn, $sql);

// Tambahkan error handling jika query gagal
if (!$query) {
    die("Query Gagal: " . mysqli_error($conn));
}

$s = mysqli_fetch_assoc($query);

if (!$s) {
    echo "<div class='container mt-5'><div class='alert alert-danger'>Data siswa tidak ditemukan.</div></div>";
    exit;
}
?>

<div class="container mt-4 mb-5">
    <div class="card border-0 shadow-sm" style="border-radius: 20px;">
        <div class="card-header bg-white py-4 border-bottom-0">
            <h4 class="mb-0 text-primary d-flex align-items-center">
                <i class="fas fa-user-circle fa-lg me-3"></i> 
                Profil Lengkap Calon Siswa
            </h4>
        </div>
        
        <div class="card-body p-4">
            <div class="row g-4">
                <div class="col-lg-3 text-center border-end-lg">
                    <div class="sticky-top" style="top: 20px; z-index: 1;">
                        <?php 
                            if (!empty($s['id_foto_berkas'])) {
                                // Panggil routing admin agar view_blob.php diproses
                                $src_foto = "admin.php?page=view_blob&id=" . $s['id_foto_berkas'];
                            } else {
                                // Path jika foto tidak ada (pastikan folder assets ada di root project)
                                $src_foto = "../assets/img/default-user.png"; 
                            }
                        ?>
                        <img src="<?= $src_foto ?>" class="img-fluid rounded shadow-sm border" 
                            style="width: 200px; height: 250px; object-fit: cover;" alt="Foto Siswa">
                        
                        <div class="mt-4">
                            <label class="small text-muted d-block mb-1 text-uppercase fw-bold">Status Pendaftaran</label>
                            <span class="badge rounded-pill px-4 py-2 <?= ($s['status'] ?? '') == 'Lulus' ? 'bg-success' : 'bg-warning text-dark' ?>">
                                <i class="fas fa-info-circle me-1"></i> <?= $s['status'] ?? 'Dalam Proses' ?>
                            </span>
                        </div>
                    </div>
                </div>

                <div class="col-lg-9 ps-lg-5">
                    <h5 class="text-secondary border-bottom pb-2 mb-4">Informasi Siswa</h5>
                    
                    <div class="row mb-3">
                        <div class="col-sm-4 fw-bold text-muted">ID Pendaftaran</div>
                        <div class="col-sm-8">: <span class="badge bg-light text-dark border">#<?= $s['id_siswa'] ?></span></div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-sm-4 fw-bold text-muted">Nama Lengkap</div>
                        <div class="col-sm-8">: <span class="fw-bold text-dark"><?= strtoupper($s['nama_lengkap_siswa'] ) ?></span></div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-sm-4 fw-bold text-muted">NISN Siswa</div>
                        <div class="col-sm-8">: <?= $s['nomor_induk_kependudukan'] ?? '-' ?></div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-sm-4 fw-bold text-muted">Tempat, Tanggal Lahir</div>
                        <div class="col-sm-8">: 
                            <?= $s['tempat_lahir'] ?? '-' ?>, 
                            <?= isset($s['tanggal_lahir']) ? date('d F Y', strtotime($s['tanggal_lahir'])) : '-' ?>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-sm-4 fw-bold text-muted">Alamat</div>
                        <div class="col-sm-8">: <?= $s['alamat_siswa'] ?? '-' ?></div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-sm-4 fw-bold text-muted">Jenis Kelamin</div>
                        <div class="col-sm-8">: 
                            <?php 
                                // Ambil data, pastikan tidak null, dan ubah ke huruf kapital untuk pengecekan
                                $jk = strtoupper(trim($s['gender_siswa'] ?? ''));
                                
                                if ($jk == 'L' || $jk == 'LAKI-LAKI' || $jk == 'PRIA') {
                                    echo 'Pria';
                                } elseif ($jk == 'P' || $jk == 'PEREMPUAN' || $jk == 'WANITA') {
                                    echo 'Wanita';
                                } else {
                                    echo '-';
                                }
                            ?>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-sm-4 fw-bold text-muted">Nomor Telepon Siswa</div>
                        <div class="col-sm-8">: <?= $s['nomor_handphone_siswa'] ?? '-' ?></div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-sm-4 fw-bold text-muted">Kewarganegaraan</div>
                        <div class="col-sm-8">: 
                            <?php 
                                // Ambil data, pastikan tidak null, dan ubah ke huruf kapital untuk pengecekan
                                $kw = strtoupper(trim($s['kewarganegaraan'] ?? ''));
                                
                                if ($kw == 'WNI') {
                                    echo 'Warga Negara Indonesia';
                                } elseif ($kw == 'WNA') {
                                    echo 'Warga Negara Indonesia Asing';
                                } else {
                                    echo '-';
                                }
                            ?>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-sm-4 fw-bold text-muted">Agama</div>
                        <div class="col-sm-8">: <?= $s['agama_siswa'] ?? '-' ?></div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-sm-4 fw-bold text-muted">Golongan Darah</div>
                        <div class="col-sm-8">: 
                            <?php 
                                // Ambil data, pastikan tidak null, dan ubah ke huruf kapital untuk pengecekan
                                $gd = strtoupper(trim($s['golongan_darah'] ?? ''));
                                
                                if ($gd == 'A') {
                                    echo 'A';
                                } elseif ($gd == 'B') {
                                    echo 'B';
                                } elseif ($gd == 'AB') {
                                    echo 'AB';
                                } elseif ($gd == 'O') {
                                    echo 'O';
                                } else {
                                    echo '-';
                                }
                            ?>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-sm-4 fw-bold text-muted">Tinggi dan Berat Badan</div>
                        <div class="col-sm-8">: 
                            <?= $s['tinggi_badan'] ?? '-' ?>, 
                            <?= $s['berat_badan'] ?? '-' ?>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-sm-4 fw-bold text-muted">Hobi Siswa</div>
                        <div class="col-sm-8">: <?= $s['hobi_siswa'] ?? '-' ?>
                    </div>

                    <div class="row mb-3">
                        <div class="col-sm-4 fw-bold text-muted">Cita-cita Siswa</div>
                        <div class="col-sm-8">: <?= $s['cita_cita'] ?? '-' ?>
                    </div>

                    <h5 class="text-secondary border-bottom pb-2 mt-5 mb-4">Informasi Akademik</h5>

                    <div class="row mb-3">
                        <div class="col-sm-4 fw-bold text-muted">Asal Sekolah</div>
                        <div class="col-sm-8">: 
                            <?php 
                                // Cek apakah kolom ada dan tidak kosong
                                $sekolah = (isset($s['sekolah_asal']) && trim($s['sekolah_asal']) !== '') 
                                        ? ucwords(strtolower($s['sekolah_asal'])) 
                                        : '-'; 
                                echo $sekolah;
                            ?>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-sm-4 fw-bold text-muted">Minat Jurusan</div>
                        <div class="col-sm-8">: 
                            <?php 
                                // Ambil data, pastikan tidak null, dan ubah ke huruf kapital untuk pengecekan
                                $mj = strtoupper(trim($s['minat_jurusan'] ?? ''));
                                
                                if ($mj == 'TJKT') {
                                    echo 'TJKT';
                                } elseif ($mj == 'TKR') {
                                    echo 'Teknik Kendaraan Ringan';
                                } elseif ($mj == 'TSM') {
                                    echo 'Teknik Sepeda Motor';
                                } elseif ($mj == 'RPL') {
                                    echo 'Rekayasa Perangkat Lunak';
                                } elseif ($mj == 'DKV') {
                                    echo 'Desain Komunikasi Visual';
                                } elseif ($mj == 'DPIB') {
                                    echo 'Design Perencanaan Interior dan Bangunan';
                                } elseif ($mj == 'MPLB') {
                                    echo 'Manajemen Perkantoran dan Layanan Bisnis';
                                } elseif ($mj == 'TITL') {
                                    echo 'Teknik Instalasi Tenaga Listrik';
                                } else {
                                    echo '-';
                                }
                            ?>
                        </div>
                    </div>

                    <h5 class="text-secondary border-bottom pb-2 mb-4">Informasi Orang Tua Siswa</h5>

                        <h5 class="text-secondary border-bottom pb-2 mb-4">Informasi Ayah Siswa</h5>

                        <div class="row mb-3">
                            <div class="col-sm-4 fw-bold text-muted">Nama Lengkap Ayah</div>
                            <div class="col-sm-8">: <span class="fw-bold text-dark"><?= strtoupper($s['nama_lengkap_ayah'] ?? '-') ?></span></div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-sm-4 fw-bold text-muted">NIK Ayah</div>
                            <div class="col-sm-8">: <span class="fw-bold text-dark"><?= $s['nomor_induk_kependudukan_ayah'] ?? '-' ?></span></div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-sm-4 fw-bold text-muted">Agama Ayah</div>
                            <div class="col-sm-8">: <?= $s['agama_ayah'] ?? '-' ?></div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-sm-4 fw-bold text-muted">Tempat, Tanggal Lahir Ayah</div>
                            <div class="col-sm-8">: 
                                <?= $s['tempat_lahir_ayah'] ?? '-' ?>, 
                                <?= (!empty($s['tanggal_lahir_ayah']) && $s['tanggal_lahir_ayah'] != '0000-00-00') ? date('d F Y', strtotime($s['tanggal_lahir_ayah'])) : '-' ?>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-sm-4 fw-bold text-muted">Alamat Ayah</div>
                            <div class="col-sm-8">: <?= $s['alamat_ayah'] ?? '-' ?></div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-sm-4 fw-bold text-muted">Hubungan Dengan Ayah</div>
                            <div class="col-sm-8">: 
                                <?php 
                                    // Kita coba cek beberapa kemungkinan nama kolom jika ada typo di DB
                                    $hubungan = $s['hubungan_ayah'] ?? $s['hubunga_ayah'] ?? $s['hubungan_dgn_ayah'] ?? null;
                                    
                                    if (!empty($hubungan)) {
                                        echo ucwords(strtolower($hubungan));
                                    } else {
                                        echo "<span class='text-danger'>Data tidak ditemukan di database</span>";
                                    }
                                ?>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-sm-4 fw-bold text-muted">Nomor Telepon Ayah</div>
                            <div class="col-sm-8">: <?= $s['no_hp_ayah'] ?? '-' ?></div>
                        </div>

                        <h5 class="text-secondary border-bottom pb-2 mt-4 mb-4">Informasi Ibu Siswa</h5>

                        <div class="row mb-3">
                            <div class="col-sm-4 fw-bold text-muted">Nama Lengkap Ibu</div>
                            <div class="col-sm-8">: <span class="fw-bold text-dark"><?= strtoupper($s['nama_lengkap_ibu'] ?? '-') ?></span></div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-sm-4 fw-bold text-muted">NIK Ibu</div>
                            <div class="col-sm-8">: <span class="fw-bold text-dark"><?= $s['nomor_induk_kependudukan_ibu'] ?? '-' ?></span></div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-sm-4 fw-bold text-muted">Agama Ibu</div>
                            <div class="col-sm-8">: <?= $s['agama_ibu'] ?? '-' ?></div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-sm-4 fw-bold text-muted">Tempat, Tanggal Lahir Ibu</div>
                            <div class="col-sm-8">: 
                                <?= $s['tempat_lahir_ibu'] ?? '-' ?>, 
                                <?= (!empty($s['tanggal_lahir_ibu']) && $s['tanggal_lahir_ibu'] != '0000-00-00') ? date('d F Y', strtotime($s['tanggal_lahir_ibu'])) : '-' ?>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-sm-4 fw-bold text-muted">Alamat Ibu</div>
                            <div class="col-sm-8">: <?= $s['alamat_ibu'] ?? '-' ?></div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-sm-4 fw-bold text-muted">Hubungan Dengan Ibu</div>
                            <div class="col-sm-8">: <?= $s['hubungan_ibu'] ?? '-' ?></div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-sm-4 fw-bold text-muted">Nomor Telepon Ibu</div>
                            <div class="col-sm-8">: <?= $s['nomor_handphone_ibu'] ?? '-' ?></div>
                        </div>

                    <h5 class="text-secondary border-bottom pb-2 mb-4">Informasi Wali Siswa</h5>

                        <div class="row mb-3">
                            <div class="col-sm-4 fw-bold text-muted">Nama Lengkap Wali</div>
                            <div class="col-sm-8">: 
                                <?php if (!empty($s['nama_wali'])): ?>
                                    <span class="badge bg-light text-dark border"><?= strtoupper($s['nama_wali']) ?></span>
                                <?php else: ?>
                                    -
                                <?php endif; ?>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-sm-4 fw-bold text-muted">NIK Wali</div>
                            <div class="col-sm-8">: <span class="fw-bold text-dark"><?= $s['nik_wali'] ?? '-' ?></span></div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-sm-4 fw-bold text-muted">Agama Wali</div>
                            <div class="col-sm-8">: <?= $s['agama_wali'] ?? '-' ?></div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-sm-4 fw-bold text-muted">Tempat, Tanggal Lahir Wali</div>
                            <div class="col-sm-8">: 
                                <?= $s['tempat_lahir_wali'] ?? '-' ?>, 
                                <?= (!empty($s['tanggal_lahir_wali']) && $s['tanggal_lahir_wali'] != '0000-00-00') ? date('d F Y', strtotime($s['tanggal_lahir_wali'])) : '-' ?>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-sm-4 fw-bold text-muted">Alamat Wali</div>
                            <div class="col-sm-8">: <?= $s['alamat_wali'] ?? '-' ?></div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-sm-4 fw-bold text-muted">Golongan Darah Wali</div>
                            <div class="col-sm-8">: <?= !empty($s['golongan_darah_wali']) ? strtoupper($s['golongan_darah_wali']) : '-' ?></div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-sm-4 fw-bold text-muted">Hubungan Dengan Wali</div>
                            <div class="col-sm-8">: 
                                <?php 
                                    // Menampilkan hubungan secara dinamis (apapun isinya di database)
                                    if (!empty($s['hubungan_wali'])) {
                                        echo ucwords(strtolower($s['hubungan_wali']));
                                    } else {
                                        echo "-";
                                    }
                                ?>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-sm-4 fw-bold text-muted">Nomor Telepon Wali</div>
                            <div class="col-sm-8">: <?= $s['no_hp_wali'] ?? '-' ?></div>
                        </div>

                    <div class="d-flex gap-2">
                        <a href="admin.php?page=data-siswa" class="btn btn-outline-secondary px-4 py-2 shadow-sm">
                            <i class="fas fa-arrow-left me-2"></i> Kembali
                        </a>
                        <a href="admin.php?page=lihat-berkas&id=<?= $s['id_siswa'] ?>" class="btn btn-primary px-4 py-2 shadow-sm">
                            <i class="fas fa-file-signature me-2"></i> Verifikasi Berkas
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    .border-end-lg { border-right: 1px solid #dee2e6; }
    @media (max-width: 991.98px) {
        .border-end-lg { border-right: none; border-bottom: 1px solid #dee2e6; padding-bottom: 2rem; }
    }
    .badge { font-weight: 500; }
</style>