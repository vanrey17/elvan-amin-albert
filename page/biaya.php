<?php
// Sesuaikan path data_file agar mengarah ke file yang sama dengan biaya.php
$data_file = __DIR__ . '/../data_biaya.json';

// 1. Ambil data dari JSON
if (file_exists($data_file)) {
    $biaya = json_decode(file_get_contents($data_file), true);
} else {
    $biaya = [];
}

// 2. Proses Simpan
if (isset($_POST['simpan'])) {
    // Ambil data dari form dan masukkan ke array
    $new_data = [
        "formulir"  => $_POST['formulir'],
        "spp"       => $_POST['spp'],
        "almamater" => $_POST['almamater'],
        "olahraga"  => $_POST['olahraga'],
        "wearpack"  => $_POST['wearpack'],
        "atribut"   => $_POST['atribut'],
        "k3"        => $_POST['k3'],
        "toolbox"   => $_POST['toolbox'],
        "ujian"     => $_POST['ujian'],
        "asuransi"  => $_POST['asuransi']
    ];
    
    // Simpan ke file JSON
    if (file_put_contents($data_file, json_encode($new_data, JSON_PRETTY_PRINT))) {
        // Redireksi kembali ke halaman edit agar tidak 404
        // Sesuaikan parameter 'page' dengan nama menu di admin.php Anda
        echo "<script>alert('Data Berhasil Disimpan!'); window.location='admin.php?page=edit-biaya';</script>";
        exit;
    }
}

$page_title = "RINCIAN BIAYA PENDIDIKAN";
$page_description = "Transparansi biaya pendidikan untuk masa depan cerah putra-putri Anda.";
?>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">

<style>
    :root {
        --asc-blue: #0046ad;
        --asc-orange: #ff6600;
        --light-bg: #f8f9fa;
    }

    body { background-color: var(--light-bg); font-family: 'Segoe UI', sans-serif; }

    /* Hero Section */
    .hero-biaya {
        background: linear-gradient(135deg, var(--asc-blue) 0%, #002a6b 100%);
        color: white;
        padding: 80px 0;
        text-align: center;
        clip-path: polygon(0 0, 100% 0, 100% 90%, 0% 100%);
    }

    .section-card {
        border: none;
        border-radius: 20px;
        box-shadow: 0 10px 30px rgba(0,0,0,0.05);
        margin-top: -50px;
        background: white;
    }

    .table-custom thead {
        background-color: var(--asc-blue);
        color: white;
    }

    .category-header {
        background-color: #e9ecef;
        font-weight: bold;
        color: var(--asc-blue);
        text-transform: uppercase;
        letter-spacing: 1px;
        font-size: 0.9rem;
    }

    .price-tag {
        font-weight: bold;
        color: var(--asc-orange);
    }

    .icon-box {
        width: 40px;
        height: 40px;
        background: #fff0e6;
        color: var(--asc-orange);
        border-radius: 10px;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        margin-right: 15px;
    }

    .btn-download {
        background-color: var(--asc-orange);
        border: none;
        padding: 12px 25px;
        border-radius: 50px;
        font-weight: bold;
        transition: 0.3s;
    }

    .btn-download:hover {
        background-color: #e65c00;
        transform: translateY(-2px);
        color: white;
    }

    .total-highlight {
        background: #fff8f4;
        border: 2px dashed var(--asc-orange);
        border-radius: 15px;
        padding: 20px;
    }
    @media (max-width: 768px) {
    .table-responsive td {
        font-size: 0.7rem;
    }
    .container h1 {
        font-size: 1.5rem !important; 
    } 
    .container p {
        font-size: 0.8rem !important; 
        padding : 0px 30px 0 30px;
    }
    }
</style>

<main>
    <section class="hero-biaya">
        <div class="container">
            <span class="badge bg-warning text-dark mb-3">Tahun Ajaran 2025/2026</span>
            <h1 class="display-5 fw-bold"><?php echo $page_title; ?></h1>
            <p class="lead"><?php echo $page_description; ?></p>
        </div>
    </section>

    <div class="container mb-5">
        <div class="card section-card">
            <div class="card-body p-4 p-md-5">
                
                <div class="row g-4">
                    <div class="col-lg-8">
                        <h4 class="mb-4 d-flex align-items-center">
                            <i class="fas fa-file-invoice-dollar me-2 text-primary"></i> 
                            Detail Komponen Biaya
                        </h4>
                        
                        <div class="table-responsive">
                            <table class="table table-hover table-custom align-middle">
                                <thead>
                                    <tr>
                                        <th style="border-radius: 15px 0 0 0;">Komponen Biaya</th>
                                        <th style="border-radius: 0 15px 0 0;" class="text-end">Jumlah</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr class="category-header"><td colspan="2">Pendaftaran & Seleksi</td></tr>
                                    <tr>
                                        <td>Formulir Pendaftaran</td>
                                        <td class="text-end price-tag">Rp <?= number_format($biaya['formulir'] ?? 0, 0, ',', '.') ?></td>
                                    </tr>
                                    <tr>
                                        <td>SPP tiap bulan</td>
                                        <td class="text-end price-tag">Rp <?= number_format($biaya['spp'] ?? 0, 0, ',', '.') ?></td>
                                    </tr>

                                    <tr class="category-header"><td colspan="2">Paket Seragam & Atribut</td></tr>
                                    <tr>
                                        <td>Jas Almamater Prestisius</td>
                                        <td class="text-end price-tag">Rp <?= number_format($biaya['almamater'] ?? 0, 0, ',', '.') ?></td>
                                    </tr>
                                    <tr>
                                        <td>Pakaian Olahraga</td>
                                        <td class="text-end price-tag">Rp <?= number_format($biaya['olahraga'] ?? 0, 0, ',', '.') ?></td>
                                    </tr>
                                    <tr>
                                        <td>Seragam Identitas (Wearpack)</td>
                                        <td class="text-end price-tag">Rp <?= number_format($biaya['wearpack'] ?? 0, 0, ',', '.') ?></td>
                                    </tr>
                                    <tr>
                                        <td>Set Atribut (Dasi, Topi, Sabuk, dll)</td>
                                        <td class="text-end price-tag">Rp <?= number_format($biaya['atribut'] ?? 0, 0, ',', '.') ?></td>
                                    </tr>

                                    <tr class="category-header"><td colspan="2">Perlengkapan Praktek</td></tr>
                                    <tr>
                                        <td>APD (K3) Lengkap</td>
                                        <td class="text-end price-tag">Rp <?= number_format($biaya['k3'] ?? 0, 0, ',', '.') ?></td>
                                    </tr>
                                    <tr>
                                        <td>Toolbox Personal (Khusus Teknik)</td>
                                        <td class="text-end price-tag">Rp <?= number_format($biaya['toolbox'] ?? 0, 0, ',', '.') ?></td>
                                    </tr>

                                    <tr class="category-header"><td colspan="2">Lainnya</td></tr>
                                    <tr>
                                        <td>Biaya Ujian & Kegiatan</td>
                                        <td class="text-end price-tag">Rp <?= number_format($biaya['ujian'] ?? 0, 0, ',', '.') ?></td>
                                    </tr>
                                    <tr>
                                        <td>Asuransi & Kartu Pelajar Digital</td>
                                        <td class="text-end price-tag">Rp <?= number_format($biaya['asuransi'] ?? 0, 0, ',', '.') ?></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <div class="col-lg-4">
                        <div class="top" style="position: sticky; top: 20px;">
                            <div class="total-highlight mb-4">
                                <h5 class="text-muted mb-1">Estimasi Total Awal</h5>
                                <h2 class="text-dark fw-bold" id="total-biaya">Rp 0</h2>
                                <hr>
                                <small class="text-muted">*Biaya di atas adalah biaya masuk awal (Sekali bayar).</small>
                            </div>

                            <div class="card bg-light border-0 p-3 mb-4">
                                <h5 class="mb-3"><i class="fas fa-university me-2 text-primary"></i>Metode Pembayaran</h5>
                                </div>

                            <a href="#" class="btn btn-download w-100 text-white mb-3">
                                <i class="fas fa-file-pdf me-2"></i> Download Brosur Biaya (PDF)
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</main>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script>
    function hitungEstimasiTotal() {
        let total = 0;
        // Mengambil semua elemen yang memiliki class 'price-tag'
        const prices = document.querySelectorAll('.price-tag');

        prices.forEach(price => {
            // Mengambil teks, menghapus 'Rp', titik, dan spasi agar menjadi angka murni
            let cleanPrice = price.innerText.replace(/[^0-9]/g, '');
            total += parseInt(cleanPrice) || 0;
        });

        // Format kembali angka ke format Rupiah (Rp XX.XXX.XXX)
        const formattedTotal = new Intl.NumberFormat('id-ID', {
            style: 'currency',
            currency: 'IDR',
            minimumFractionDigits: 0
        }).format(total);

        // Update teks di elemen h2
        document.getElementById('total-biaya').innerText = formattedTotal.replace("IDR", "Rp");
    }

    // Jalankan fungsi saat halaman selesai dimuat
    document.addEventListener('DOMContentLoaded', hitungEstimasiTotal);
</script>