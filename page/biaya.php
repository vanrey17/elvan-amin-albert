<?php
$page_title = "RINCIAN BIAYA PENDIDIKAN";
$page_description = "Transparansi biaya pendidikan untuk masa depan cerah putra-putri Anda di SMK Vokasi Merdeka Belajar.";
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
                                    <tr class="category-header">
                                        <td colspan="2">Pendaftaran & Seleksi</td>
                                    </tr>
                                    <tr>
                                        <td>Formulir Pendaftaran</td>
                                        <td class="text-end price-tag">Rp 250.000</td>
                                    </tr>
                                    <tr>
                                        <td>Tes Potensi Akademik & Kesehatan</td>
                                        <td class="text-end price-tag">Rp 150.000</td>
                                    </tr>

                                    <tr class="category-header">
                                        <td colspan="2">Paket Seragam & Atribut</td>
                                    </tr>
                                    <tr>
                                        <td>Jas Almamater Prestisius</td>
                                        <td class="text-end price-tag">Rp 350.000</td>
                                    </tr>
                                    <tr>
                                        <td>Pakaian Olahraga</td>
                                        <td class="text-end price-tag">Rp 200.000</td>
                                    </tr>
                                    <tr>
                                        <td>Seragam Identitas Jurusan (Wearpack)</td>
                                        <td class="text-end price-tag">Rp 300.000</td>
                                    </tr>
                                    <tr>
                                        <td>Set Atribut (Dasi, Topi, Sabuk, Kaos Kaki)</td>
                                        <td class="text-end price-tag">Rp 150.000</td>
                                    </tr>

                                    <tr class="category-header">
                                        <td colspan="2">Perlengkapan Praktek (Safety)</td>
                                    </tr>
                                    <tr>
                                        <td>Alat Pelindung Diri (K3) Lengkap</td>
                                        <td class="text-end price-tag">Rp 450.000</td>
                                    </tr>
                                    <tr>
                                        <td>Toolbox Personal (Khusus Jurusan Teknik)</td>
                                        <td class="text-end price-tag">Rp 500.000</td>
                                    </tr>

                                    <tr class="category-header">
                                        <td colspan="2">Biaya Ujian & Kegiatan</td>
                                    </tr>
                                    <tr>
                                        <td>Biaya Ujian Semester (1 Tahun)</td>
                                        <td class="text-end price-tag">Rp 400.000</td>
                                    </tr>
                                    <tr>
                                        <td>Asuransi Siswa & Kartu Pelajar Digital</td>
                                        <td class="text-end price-tag">Rp 100.000</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <div class="col-lg-4">
                        <div class="top" style="top: 20px;">
                            <div class="total-highlight mb-4">
                                <h5 class="text-muted mb-1">Estimasi Total Awal</h5>
                                <h2 class="text-dark fw-bold">Rp 3.100.000</h2>
                                <hr>
                                <small class="text-muted">*Biaya di atas belum termasuk SPP bulanan.</small>
                            </div>

                            <div class="card bg-light border-0 p-3 mb-4">
                                <h5 class="mb-3"><i class="fas fa-university me-2 text-primary"></i>Metode Pembayaran</h5>
                                
                                <div class="row g-2 text-center">
                                    <div class="col-4">
                                        <div class="bg-white p-2 rounded shadow-sm border">
                                            <small class="fw-bold d-block" style="color:#0046ad">BCA</small>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="bg-white p-2 rounded shadow-sm border">
                                            <small class="fw-bold d-block" style="color:#f7941d">MANDIRI</small>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="bg-white p-2 rounded shadow-sm border">
                                            <small class="fw-bold d-block" style="color:#ff6600">BNI</small>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="mt-3">
                                    <div class="d-flex align-items-center gap-2 mb-2">
                                        <i class="fab fa-google-pay fa-2x text-muted"></i>
                                        <i class="fab fa-apple-pay fa-2x text-muted"></i>
                                        <i class="fas fa-qrcode fa-lg text-success"></i>
                                        <span class="small text-muted">Mendukung QRIS</span>
                                    </div>
                                </div>
                            </div>

                            <a href="#" class="btn btn-download w-100 text-white mb-3">
                                <i class="fas fa-file-pdf me-2"></i> Download Brosur Biaya (PDF)
                            </a>

                            <div class="alert alert-info border-0" style="border-radius: 15px;">
                                <i class="fas fa-info-circle me-2"></i> 
                                <strong>Tersedia Beasiswa!</strong><br>
                                Dapatkan potongan biaya bagi siswa berprestasi atau jalur tahfidz.
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</main>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>