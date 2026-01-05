<?php
$data_file = __DIR__ . '/../data_biaya.json';

// 1. Inisialisasi data default jika file belum ada
if (!file_exists($data_file)) {
    $default = [
        "formulir" => 250000, "spp" => 1000000, "almamater" => 450000,
        "olahraga" => 300000, "wearpack" => 500000, "atribut" => 200000,
        "k3" => 800000, "toolbox" => 800000, "ujian" => 500000, "asuransi" => 200000
    ];
    file_put_contents($data_file, json_encode($default, JSON_PRETTY_PRINT));
}

// 2. Ambil data dari JSON
$biaya = json_decode(file_get_contents($data_file), true);

// 3. Proses Simpan
if (isset($_POST['simpan'])) {
    $new_data = [
        "formulir"  => $_POST['formulir'] ?? 0,
        "spp"       => $_POST['spp'] ?? 0,
        "almamater" => $_POST['almamater'] ?? 0,
        "olahraga"  => $_POST['olahraga'] ?? 0,
        "wearpack"  => $_POST['wearpack'] ?? 0,
        "atribut"   => $_POST['atribut'] ?? 0,
        "k3"        => $_POST['k3'] ?? 0,
        "toolbox"   => $_POST['toolbox'] ?? 0,
        "ujian"     => $_POST['ujian'] ?? 0,
        "asuransi"  => $_POST['asuransi'] ?? 0
    ];
    
    // Cek apakah file bisa ditulis
    if (is_writable(dirname($data_file))) {
        file_put_contents($data_file, json_encode($new_data, JSON_PRETTY_PRINT));
        echo "<script>alert('Berhasil Disimpan!'); window.location.href=window.location.href;</script>";
    } else {
        echo "<script>alert('Error: Folder tidak diizinkan untuk menulis file! Cek permission folder admin_page.');</script>";
    }
}
?>

<div class="card" style="background: white; padding: 25px; border-radius: 15px; box-shadow: 0 4px 15px rgba(0,0,0,0.05);">
    <div style="border-bottom: 2px solid #0046ad; padding-bottom: 10px; margin-bottom: 20px;">
        <h3 style="margin:0; color: #0046ad;"><i class="fas fa-edit"></i> Pengaturan Harga Biaya Pendidikan</h3>
        <p style="font-size: 13px; color: #666;">Perubahan di sini akan langsung merubah angka di halaman Rincian Biaya.</p>
    </div>

    <form method="POST">
        <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); gap: 20px;">
            
            <div style="background: #f8f9fa; padding: 15px; border-radius: 10px; border-left: 4px solid #0046ad;">
                <h5 style="color: #0046ad; margin-bottom: 15px;">Administrasi</h5>
                <label>Formulir Pendaftaran (Rp)</label>
                <input type="number" name="formulir" value="<?= $biaya['formulir'] ?? 0 ?>" style="width:100%; padding:8px; border:1px solid #ddd; border-radius:5px; margin-bottom:10px;">
                
                <label>SPP Tiap Bulan (Rp)</label>
                <input type="number" name="spp" value="<?= $biaya['spp'] ?? 0 ?>" style="width:100%; padding:8px; border:1px solid #ddd; border-radius:5px;">
            </div>

            <div style="background: #f8f9fa; padding: 15px; border-radius: 10px; border-left: 4px solid #ff6600;">
                <h5 style="color: #ff6600; margin-bottom: 15px;">Seragam & Atribut</h5>
                <label>Jas Almamater (Rp)</label>
                <input type="number" name="almamater" value="<?= $biaya['almamater'] ?? 0 ?>" style="width:100%; padding:8px; border:1px solid #ddd; border-radius:5px; margin-bottom:10px;">
                
                <label>Pakaian Olahraga (Rp)</label>
                <input type="number" name="olahraga" value="<?= $biaya['olahraga'] ?? 0 ?>" style="width:100%; padding:8px; border:1px solid #ddd; border-radius:5px; margin-bottom:10px;">
                
                <label>Wearpack Jurusan (Rp)</label>
                <input type="number" name="wearpack" value="<?= $biaya['wearpack'] ?? 0 ?>" style="width:100%; padding:8px; border:1px solid #ddd; border-radius:5px; margin-bottom:10px;">

                <label>Set Atribut (Rp)</label>
                <input type="number" name="atribut" value="<?= $biaya['atribut'] ?? 0 ?>" style="width:100%; padding:8px; border:1px solid #ddd; border-radius:5px;">
            </div>

            <div style="background: #f8f9fa; padding: 15px; border-radius: 10px; border-left: 4px solid #2ecc71;">
                <h5 style="color: #2ecc71; margin-bottom: 15px;">Praktek & Safety</h5>
                <label>APD (K3) Lengkap (Rp)</label>
                <input type="number" name="k3" value="<?= $biaya['k3'] ?? 0 ?>" style="width:100%; padding:8px; border:1px solid #ddd; border-radius:5px; margin-bottom:10px;">
                
                <label>Toolbox Personal (Rp)</label>
                <input type="number" name="toolbox" value="<?= $biaya['toolbox'] ?? 0 ?>" style="width:100%; padding:8px; border:1px solid #ddd; border-radius:5px;">
            </div>

            <div style="background: #f8f9fa; padding: 15px; border-radius: 10px; border-left: 4px solid #f1c40f;">
                <h5 style="color: #f1c40f; margin-bottom: 15px;">Lain-lain</h5>
                <label>Biaya Ujian & Kegiatan (Rp)</label>
                <input type="number" name="ujian" value="<?= $biaya['ujian'] ?? 0 ?>" style="width:100%; padding:8px; border:1px solid #ddd; border-radius:5px; margin-bottom:10px;">
                
                <label>Asuransi & Kartu Pelajar (Rp)</label>
                <input type="number" name="asuransi" value="<?= $biaya['asuransi'] ?? 0 ?>" style="width:100%; padding:8px; border:1px solid #ddd; border-radius:5px;">
            </div>
        </div>

        <div style="margin-top: 30px; border-top: 1px solid #eee; padding-top: 20px;">
            <button type="submit" name="simpan" style="background: #2ecc71; color: white; border: none; padding: 12px 25px; border-radius: 8px; cursor: pointer; font-weight: bold; font-size: 15px;">
                <i class="fas fa-save"></i> Simpan Semua Perubahan
            </button>
        </div>
    </form>
</div>