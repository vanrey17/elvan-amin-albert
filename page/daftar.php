<?php
// Tentukan variabel data yang berbeda untuk setiap halaman (RPL)
$page_title = "METODE PEMBELAJARAN";
$page_description = "Di SMK Teknologi Ascendia, pembelajaran berpusat pada Anda. 
Mengadopsi semangat Kurikulum Merdeka, kami menerapkan pendekatan aktif yang 
memprioritaskan eksplorasi, pemecahan masalah, dan kolaborasi, memastikan setiap 
siswa mendapatkan pengalaman belajar yang mendalam sesuai dengan minat dan potensi mereka.";

?>

<main class="program-detail-section">
    <div class="hero-background">
        <div class="text-with-gradient-bg">
            <h1><?php echo $page_title; ?></h1>
            <p><?php echo $page_description; ?></p>
        </div>
    </div>
</main>

<?php
// === BAGIAN PHP UNTUK PROSES SUBMIT FORMULIR ===

$step = 1; // Default step
$errors = [];
$success_message = '';
$form_data = [];

// Cek jika formulir telah di-submit (tombol 'submit_form' di Langkah 3 ditekan)
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit_form'])) {
    
    // 1. Validasi Data (Contoh sederhana)
    if (empty($_POST['nama_lengkap_siswa'])) {
        $errors[] = "Nama Lengkap Siswa wajib diisi.";
    }
    // ... Tambahkan validasi lain sesuai kebutuhan ...

    // 2. Simpan Data Form
    $form_data = $_POST;
    
    // 3. Proses Upload File (Ini hanya contoh struktur, perlu implementasi yang lebih robust)
    if (empty($errors)) {
        // ... Logika upload file (seperti di kode Anda) ...

        // 4. Proses Penyimpanan ke Database (SQL) atau Kirim Email
        // Misalnya: menyimpan $form_data ke MySQL database
        
        $success_message = "✅ Formulir pendaftaran berhasil dikirim! Kami akan segera memproses data Anda.";
        // Reset data setelah sukses
        $form_data = [];
    } else {
        // Jika ada error, kembali ke langkah 3 (atau langkah manapun yang validasinya gagal)
        $step = 3; 
    }
}

// === BAGIAN PHP SELESAI ===
?>


    <style>
        /* --- GENERAL RESET & TYPOGRAPHY --- */

        h1 {
            color: #004d99; /* Biru tua untuk judul utama */
            text-align: center;
            margin-bottom: 30px;
            border-bottom: 2px solid #e0e0e0;
            padding-bottom: 10px;
        }

        h2 {
            color: #007bff; /* Biru cerah untuk subjudul */
            border-left: 5px solid #007bff;
            padding-left: 10px;
            margin-top: 30px;
            margin-bottom: 15px;
        }

        h3 {
            color: #333;
            margin-top: 20px;
            font-size: 1.1em;
            border-bottom: 1px dashed #ccc;
            padding-bottom: 5px;
        }

        /* --- KONTEN FORMULIR UTAMA --- */
        form {
            max-width: 900px;
            margin: 0 auto;
            background: #ffffff;
            /* Hapus padding dari form, pindahkan ke form-step */
            padding: 0; 
            border-radius: 10px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
        }

        /* --- INDIKATOR LANGKAH (STEP INDICATOR) - DIUBAH AGAR MIRIP GAMBAR --- */
        .step-indicator {
            display: flex;
            background-color: #e9ecef;
            overflow: hidden;
            position: relative;
            height: 60px; 
            border-radius: 10px 10px 0 0; /* Sudut melengkung di atas */
        }

        .step-indicator > div {
            flex-grow: 1;
            padding: 15px 10px;
            text-align: center;
            cursor: pointer;
            transition: all 0.3s ease;
            color: #6c757d;
            font-weight: 500;
            position: relative;
            z-index: 2;
        }

        /* Efek Panah Pemisah */
        .step-indicator > div:not(:last-child)::after {
            content: '';
            position: absolute;
            right: -10px; 
            top: 0;
            width: 20px;
            height: 100%;
            background-color: inherit; 
            transform: skewX(-20deg); 
            z-index: 1;
            border-left: 1px solid #ccc;
        }
        
        /* Tab AKTIF */
        .step-indicator > div.active {
            background-color: #ffffff; 
            color: #004d99;
            font-weight: bold;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.05);
            border-bottom: 3px solid #007bff; 
        }

        /* Hilangkan efek panah di tab aktif */
        .step-indicator > div.active::after {
            background-color: #ffffff;
            z-index: 3; 
            border: none;
        }
        
        /* Pastikan tab berikutnya (yang tidak aktif) terlihat abu-abu */
        .step-indicator > div.active + div {
            background-color: #e9ecef !important;
        }

        /* --- KOTAK LANGKAH (FORM STEP) --- */
        .form-step {
            display: none; /* Penting: disembunyikan secara default */
            padding: 30px; /* Pindahkan padding konten di sini */
            border: 1px solid #ccc;
            margin-top: -1px; /* Tumpang tindih dengan garis bawah indikator */
            background-color: white;
            border-radius: 0 0 10px 10px;
        }
        .form-step.active {
            display: block; /* Hanya layer aktif yang ditampilkan */
        }


        /* --- FORM INPUTS DAN FIELDSETS (tetap sama) --- */
        .form-group {
            margin-bottom: 20px;
        }

        label {
            display: block;
            font-weight: 600;
            margin-bottom: 8px;
            color: #495057;
        }

        input[type="text"], 
        input[type="date"], 
        input[type="number"], 
        input[type="file"],
        select, 
        textarea {
            width: 100%;
            padding: 10px 15px;
            box-sizing: border-box;
            border: 1px solid #ced4da;
            border-radius: 5px;
            transition: border-color 0.3s, box-shadow 0.3s;
            background-color: #f8f9fa;
        }

        input[type="file"] {
            padding: 8px;
        }

        input[type="text"]:focus, 
        input[type="date"]:focus, 
        input[type="number"]:focus, 
        select:focus, 
        textarea:focus {
            border-color: #007bff;
            outline: 0;
            box-shadow: 0 0 0 0.2rem rgba(0, 123, 255, 0.25);
            background-color: #fff;
        }

        textarea {
            resize: vertical;
        }

        /* --- BUTTONS (tetap sama) --- */
        .button-group {
            margin-top: 30px;
            text-align: right;
        }

        .button-group button {
            padding: 10px 25px;
            border: none;
            border-radius: 5px;
            font-weight: bold;
            cursor: pointer;
            transition: background-color 0.3s, transform 0.1s;
            margin-left: 10px;
        }

        .button-group button:last-child {
            background-color: #007bff;
            color: white;
        }

        .button-group button:last-child:hover {
            background-color: #0056b3;
            transform: translateY(-1px);
        }

        .button-group button:first-child:not([type="submit"]) {
            background-color: #6c757d;
            color: white;
        }

        .button-group button:first-child:hover {
            background-color: #5a6268;
        }

        button[name="submit_form"] {
            background-color: #28a745 !important;
            color: white;
            padding: 12px 30px;
            font-size: 1.1em;
        }

        button[name="submit_form"]:hover {
            background-color: #1e7e34 !important;
        }

        /* --- ALERTS & MESSAGES (tetap sama) --- */
        [style*="border: 1px solid red"], [style*="border: 1px solid green"] {
            padding: 15px;
            margin-bottom: 20px;
            border-radius: 5px;
            font-weight: bold;
        }

        [style*="border: 1px solid red"] {
            background-color: #f8d7da;
            border-color: #f5c6cb !important;
            color: #721c24 !important;
        }

        [style*="border: 1px solid green"] {
            background-color: #d4edda;
            border-color: #c3e6cb !important;
            color: #155724 !important;
        }

        /* --- RESPONSIVENESS (tetap sama) --- */
        @media (max-width: 768px) {
            .step-indicator {
                flex-direction: column;
            }
            .step-indicator > div:not(:last-child)::after {
                content: none;
            }
            .button-group {
                text-align: center;
            }
            .button-group button {
                display: block;
                width: 100%;
                margin-left: 0;
                margin-bottom: 10px;
            }
        }
    </style>


    <h1>Welcome to SMK Teknologi Ascendia</h1>
    
    <?php if ($success_message): ?>
        <div style="color: green; border: 1px solid green; padding: 10px;"><?= $success_message ?></div>
    <?php endif; ?>

    <?php if (!empty($errors)): ?>
        <div style="color: red; border: 1px solid red; padding: 10px;">
            **Mohon koreksi kesalahan berikut:**
            <ul>
                <?php foreach ($errors as $error): ?>
                    <li><?= htmlspecialchars($error) ?></li>
                <?php endforeach; ?>
            </ul>
        </div>
    <?php endif; ?>

    <div class="step-indicator">
        <div id="tab-1" onclick="showStep(1)">1. Data Calon Siswa</div>
        <div id="tab-2" onclick="showStep(2)">2. Data Orang Tua/Wali</div>
        <div id="tab-3" onclick="showStep(3)">3. Data Tambahan & Dokumen</div>
        <div id="tab-submit">Submit</div>
    </div>
    
    <form method="POST" action="<?= htmlspecialchars($_SERVER["PHP_SELF"]) ?>" enctype="multipart/form-data">

        <div id="step-1" class="form-step active"> 
            <h2>Data Calon Siswa (Applicant Data)</h2>
            <p>Isi informasi pribadi calon siswa secara lengkap.</p>
            
            <div class="form-group">
                <label for="nama_lengkap_siswa">Nama Lengkap Siswa</label>
                <input type="text" id="nama_lengkap_siswa" name="nama_lengkap_siswa" required value="<?= htmlspecialchars($form_data['nama_lengkap_siswa'] ?? '') ?>">
            </div>

            <div class="form-group">
            <label for="nomor_induk_kependudukan">Nomor Induk Kependudukan</label>
            <input 
            type="text"
            id="nomor_induk_kependudukan"
            name="nomor_induk_kependudukan"
            required
            maxlength="16"
            value="<?= htmlspecialchars($form_data['nomor_induk_kependudukan'] ?? '') ?>"
            oninput="validateNIK(this)"
        >
            <small id="nik-warning" style="color:red; display:none;">
            Isi hanya dengan angka
            </small>
            </div>


            <div class="form-group">
                <label for="alamat_siswa">Alamat Lengkap Siswa</label>
                <textarea id="alamat_siswa" name="alamat_siswa" rows="3" required><?= htmlspecialchars($form_data['alamat_siswa'] ?? '') ?></textarea>
            </div>

            <div class="form-group">
                <label for="bahasa">Bahasa Sehari hari</label>
                <textarea id="bahasa" name="bahasa" rows="3" required><?= htmlspecialchars($form_data['bahasa'] ?? '') ?></textarea>
            </div>
            
            <div class="form-group">
                <label for="nomor_handphone_siswa">Nomor Handphone Siswa</label>
                <input type="telepon" id="nomor_handphone_siswa" name="nomor_handphone_siswa" required value="<?= htmlspecialchars($form_data['nomor_handphone_siswa'] ?? '') ?>">
            </div>
            
            <div class="form-group">
                <label for="gender_siswa">Gender</label>
                <select id="gender_siswa" name="gender_siswa" required>
                    <option value="">Pilih Gender</option>
                    <option value="Pria" <?= (isset($form_data['gender_siswa']) && $form_data['gender_siswa'] == 'Pria') ? 'selected' : '' ?>>Pria</option>
                    <option value="Wanita" <?= (isset($form_data['gender_siswa']) && $form_data['gender_siswa'] == 'Wanita') ? 'selected' : '' ?>>Wanita</option>
                </select>
            </div>
            
            <div class="form-group">
                <label for="kewarganegaraan">Kewarganegaraan</label>
                <select id="kewarganegaraan" name="kewarganegaraan" required>
                    <option value="">Pilih Kewarganegaraan</option>
                    <option value="WNI" <?= (isset($form_data['kewarganegaraan']) && $form_data['kewarganegaraan'] == 'WNI') ? 'selected' : '' ?>>WNI</option>
                    <option value="WNA" <?= (isset($form_data['kewarganegaraan']) && $form_data['kewarganegaraan'] == 'Wanita') ? 'selected' : '' ?>>WNA</option>
                </select>
            </div>

            <div class="form-group">
                <label for="tempat_lahir">Tempat Lahir</label>
                <input type="text" id="tempat_lahir" name="tempat_lahir" required value="<?= htmlspecialchars($form_data['tempat_lahir'] ?? '') ?>">
            </div>

            <div class="form-group">
                <label for="tanggal_lahir">Tanggal Lahir</label>
                <input type="date" id="tanggal_lahir" name="tanggal_lahir" required value="<?= htmlspecialchars($form_data['tanggal_lahir'] ?? '') ?>">
            </div>

            <div class="form-group">
                <label for="agama_siswa">Agama</label>
                <select id="agama_siswa" name="agama_siswa" required>
                    <option value="">Pilih Agama</option>
                    <option value="Islam" <?= (isset($form_data['agama_siswa']) && $form_data['agama_siswa'] == 'Islam') ? 'selected' : '' ?>>Islam</option>
                    <option value="Kristen" <?= (isset($form_data['agama_siswa']) && $form_data['agama_siswa'] == 'Kristen') ? 'selected' : '' ?>>Kristen</option>
                    <option value="Katolik" <?= (isset($form_data['agama_siswa']) && $form_data['agama_siswa'] == 'Katolik') ? 'selected' : '' ?>>Katolik</option>
                    <option value="Hindu" <?= (isset($form_data['agama_siswa']) && $form_data['agama_siswa'] == 'Hindu') ? 'selected' : '' ?>>Hindu</option>
                    <option value="Buddha" <?= (isset($form_data['agama_siswa']) && $form_data['agama_siswa'] == 'Buddha') ? 'selected' : '' ?>>Buddha</option>
                    <option value="Konghucu" <?= (isset($form_data['agama_siswa']) && $form_data['agama_siswa'] == 'Konghucu') ? 'selected' : '' ?>>Konghucu</option>
                    <option value="Lainnya" <?= (isset($form_data['agama_siswa']) && $form_data['agama_siswa'] == 'Lainnya') ? 'selected' : '' ?>>Lainnya</option>
                </select>
            </div>


            <div class="form-group">
                <label for="golongan_darah">Golongan Darah</label>
                <select id="golongan_darah" name="golongan_darah">
                    <option value="">Pilih Golongan Darah</option>
                    <option value="A" <?= (isset($form_data['golongan_darah']) && $form_data['golongan darah'] == 'A') ? 'selected' : '' ?>>A</option>
                    <option value="B" <?= (isset($form_data['golongan_darah']) && $form_data['golongan_darah'] == 'B') ? 'selected' : '' ?>>B</option>
                    <option value="AB" <?= (isset($form_data['golongan_darah']) && $form_data['golongan_darah'] == 'AB') ? 'selected' : '' ?>>AB</option>
                    <option value="O" <?= (isset($form_data['golongan_darah']) && $form_data['golongan_darah'] == 'O') ? 'selected' : '' ?>>O</option>
                </select>
            </div>

            <div class="form-group group-row">
                <label>Tinggi dan Berat Badan</label>
                <input type="number" name="tinggi_badan" placeholder="Tinggi (cm)" min="50" style="width: 48%; display: inline-block;" value="<?= htmlspecialchars($form_data['tinggi_badan'] ?? '') ?>">
                <input type="number" name="berat_badan" placeholder="Berat (kg)" min="10" style="width: 48%; display: inline-block; " value="<?= htmlspecialchars($form_data['berat_badan'] ?? '') ?>">
            </div>

            <div class="form-group">
                <label for="hobi_siswa">Hobi</label>
                <input type="text" id="hobi_siswa" name="hobi_siswa" value="<?= htmlspecialchars($form_data['hobi_siswa'] ?? '') ?>">
            </div>

            <div class="form-group">
                <label for="cita_cita">Cita-cita</label>
                <input type="text" id="cita_cita" name="cita_cita" value="<?= htmlspecialchars($form_data['cita_cita'] ?? '') ?>">
            </div>

            <div class="form-group">
                <label for="minat_jurusan">Minat Jurusan</label>
                <select id="minat_jurusan" name="minat_jurusan" required>
                    <option value="">Pilih Jurusan</option>
                    <option value="RPL" <?= (isset($form_data['minat_jurusan']) && $form_data['minat_jurusan'] == 'RPL') ? 'selected' : '' ?>>Rekayasa Perangkat Lunak (RPL)</option>
                    <option value="TKJ" <?= (isset($form_data['minat_jurusan']) && $form_data['minat_jurusan'] == 'TKJ') ? 'selected' : '' ?>>Teknik Komputer dan Jaringan (TKJ)</option>
                    <option value="DKV" <?= (isset($form_data['minat_jurusan']) && $form_data['minat_jurusan'] == 'DKV') ? 'selected' : '' ?>>Desain Komunikasi Visual (DKV)</option>
                    <option value="DPIB" <?= (isset($form_data['minat_jurusan']) && $form_data['minat_jurusan'] == 'DPIB') ? 'selected' : '' ?>>Desain Pemodelan dan Informasi Bangunan (DPIB)</option>
                    <option value="MPLB" <?= (isset($form_data['minat_jurusan']) && $form_data['minat_jurusan'] == 'MPLB') ? 'selected' : '' ?>>Manajemen Perkantoran dan Layanan Bisnis (MPLB)</option>
                    <option value="TITL" <?= (isset($form_data['minat_jurusan']) && $form_data['minat_jurusan'] == 'TITL') ? 'selected' : '' ?>>Teknik Instalasi dan Tenaga Listrik (TITL)</option>
                    <option value="TKR" <?= (isset($form_data['minat_jurusan']) && $form_data['minat_jurusan'] == 'TKR') ? 'selected' : '' ?>>Teknik Kendaraan Ringan (TKR)</option>
                    <option value="TSM" <?= (isset($form_data['minat_jurusan']) && $form_data['minat_jurusan'] == 'TSM') ? 'selected' : '' ?>>Teknik Sepeda Motor (TSM)</option>
                </select>
            </div>
            
            <div class="form-group">
                <label>Pilihan Identitas yang Akan Diupload (Boleh Pilih Lebih Dari Satu)</label>
                <p style="font-size: 0.9em; color: #666; margin-top: -5px; margin-bottom: 10px;">Centang semua dokumen yang akan Anda siapkan.</p>
                
                <div style="border: 1px solid #ccc; padding: 10px; border-radius: 5px; background-color: #f9f9f9;">
                    <?php 
                    // Daftar semua opsi identitas
                    $identitas_options = [
                        'Akte Lahir' => 'Akte Lahir',
                        'KK' => 'Kartu Keluarga (KK)',
                        'KTP' => 'KTP (jika sudah memiliki)',
                        'SIM' => 'SIM (jika sudah memiliki)',
                    ];

                    // Looping untuk menampilkan setiap kotak centang
                    foreach ($identitas_options as $value => $label): 
                        // Pengecekan apakah nilai sudah ada dalam form_data (jika ada error atau kembali ke langkah ini)
                        $is_checked = (isset($form_data['pilihan_identitas']) && is_array($form_data['pilihan_identitas']) && in_array($value, $form_data['pilihan_identitas']));
                    ?>
                        <div style="margin-bottom: 5px;">
                            <input type="checkbox" 
                                id="id_<?= strtolower(str_replace(' ', '_', $value)) ?>" 
                                name="pilihan_identitas[]" 
                                value="<?= htmlspecialchars($value) ?>" 
                                <?= $is_checked ? 'checked' : '' ?>
                                style="width: auto; margin-right: 8px;">
                            <label for="id_<?= strtolower(str_replace(' ', '_', $value)) ?>" style="display: inline; font-weight: normal;"><?= $label ?></label>
                        </div>
                    <?php endforeach; ?>
                </div>
                
            </div>
            
            <div class="button-group">
                <button type="button" onclick="showNextStep()">Lanjut ke Langkah 2 &raquo;</button>
            </div>
        </div>
        <div id="step-2" class="form-step">
            <h2>Data Orang Tua/Wali</h2>
            
            <h3>A. Data Ayah</h3>
            <!-- agar data base tau jika user mengisi ini maka akan menjadi data ayah -->
            <input type="hidden" name="jenis_peran" value="ayah">

            <div class="form-group">
                <label for="nama_lengkap">Nama Lengkap</label>
                <input type="text" name="nama_lengkap" required value="<?= htmlspecialchars($form_data['nama_lengkap_ayah'] ?? '') ?>">
            </div>
           <div class="form-group">
            <label for="nomor_induk_kependudukan_ayah">Nomor Induk Kependudukan</label>
            <input 
            type="text"
            id="nomor_induk_kependudukan_ayah"
            name="nomor_induk_kependudukan_ayah"
            required
            maxlength="16"
            value="<?= htmlspecialchars($form_data['nomor_induk_kependudukan_ayah'] ?? '') ?>"
            oninput="validateNIK(this)">
            </div>

            <div class="form-group">
                <label for="tempat_lahir">Tempat Lahir</label>
                <input type="text" id="tempat_lahir" name="tempat_lahir_ayah" required value="<?= htmlspecialchars($form_data['tempat_lahir_ayah'] ?? '') ?>">
            </div>

            <div class="form-group">
                <label for="tanggal_lahir">Tanggal Lahir</label>
                <input type="date" id="tanggal_lahir" name="tanggal_lahir_ayah" required value="<?= htmlspecialchars($form_data['tanggal_lahir_ayah'] ?? '') ?>">
            </div>


            <div class="form-group">
                <label for="kewarganegaraan">Kewarganegaraan</label>
                <select id="kewarganegaraan" name="kewarganegaraan" required>
                    <option value="">Pilih Kewarganegaraan</option>
                    <option value="WNI" <?= (isset($form_data['kewarganegaraan']) && $form_data['kewarganegaraan'] == 'WNI') ? 'selected' : '' ?>>WNI</option>
                    <option value="WNA" <?= (isset($form_data['kewarganegaraan']) && $form_data['kewarganegaraan'] == 'W') ? 'selected' : '' ?>>WNA</option>
                </select>
            </div>

            <div class="form-group">
                <label for="agama">Agama</label>
                <select id="agama" name="agama_ayah" required>
                    <option value="">Pilih Agama</option>
                    <option value="Islam" <?= (isset($form_data['agama_ayah']) && $form_data['agama_ayah'] == 'Islam') ? 'selected' : '' ?>>Islam</option>
                    <option value="Kristen" <?= (isset($form_data['agama_ayah']) && $form_data['agama_ayah'] == 'Kristen') ? 'selected' : '' ?>>Kristen</option>
                    <option value="Katholik" <?= (isset($form_data['agama_ayah']) && $form_data['agama_ayah'] == 'Katholik') ? 'selected' : '' ?>>Katholik</option>
                    <option value="Hindu" <?= (isset($form_data['agama_ayah']) && $form_data['agama_ayah'] == 'Hindu') ? 'selected' : '' ?>>Hindu</option>
                    <option value="buddha" <?= (isset($form_data['agama_ayah']) && $form_data['agama_ayah'] == 'buddha') ? 'selected' : '' ?>>Buddha</option>
                    <option value="konghucu" <?= (isset($form_data['agama_ayah']) && $form_data['agama_ayah'] == 'konghucu') ? 'selected' : '' ?>>Konghucu</option>
                    <option value="Lainnya" <?= (isset($form_data['agama_ayah']) && $form_data['agama_ayah'] == 'Lainnya') ? 'selected' : '' ?>>Lainnya</option>
                </select>
            </div>

            

            <div class="form-group">
                <label for="golongan_darah">Golongan Darah</label>
                <select id="golongan_darah" name="golongan_darah_ayah">
                    <option value="">Pilih Golongan Darah</option>
                    <option value="A" <?= (isset($form_data['golongan_darah_ayah']) && $form_data['golongan_darah_ayah'] == 'A') ? 'selected' : '' ?>>A</option>
                    <option value="B" <?= (isset($form_data['golongan_darah_ayah']) && $form_data['golongan_darah_ayah'] == 'B') ? 'selected' : '' ?>>B</option>
                    <option value="AB" <?= (isset($form_data['golongan_darah_ayah']) && $form_data['golongan_darah_ayah'] == 'AB') ? 'selected' : '' ?>>AB</option>
                    <option value="O" <?= (isset($form_data['golongan_darah_ayah']) && $form_data['golongan_darah_ayah'] == 'O') ? 'selected' : '' ?>>O</option>
                </select>
            </div>

            <div class="form-group">
                <label for="hubungan_dengan_siswa">Hubungan Dengan Siswa</label>
                <select id="hubungan_dengan_siswa" name="hubunga_dengan_siswa">
                    <option value="">Pilih </option>
                    <option value="ayah_kandung" <?= (isset($form_data['hubungan_dengan_siswa']) && $form_data['hubungan_dengan_siswa'] == 'ayah_kandung') ? 'selected' : '' ?>>Ayah Kandung</option>
                    <option value="ayah_tiri" <?= (isset($form_data['hubungan_dengan_siswa']) && $form_data['hubungan_dengan_siswa'] == 'ayah_tiri') ? 'selected' : '' ?>>Ayah Tiri</option>
                </select>
            </div>

            <div class="form-group">
                <label for="nomor_handphone_ayah">Nomor Handphone</label>
                <input type="telepon" id="nomor_handphone_ayah" name="nomor_handphone_ayah" required value="<?= htmlspecialchars($form_data['nomor_handphone_ayah'] ?? '') ?>">
            </div>
            

            <h3>B. Data Ibu</h3>
            <input type="hidden" name="jenis_peran" value="ibu">
            <div class="form-group">
                <label for="nama_lengkap">Nama lengkap Ibu</label>
                <input type="text" name="nama_lengkap_ibu" required value="<?= htmlspecialchars($form_data['nama_lengkap_ibu'] ?? '') ?>">
            </div>

            <div class="form-group">
            <label for="nomor_induk_kependudukan_ibu">Nomor Induk Kependudukan</label>
            <input 
            type="text"
            id="nomor_induk_kependudukan_ibu"
            name="nomor_induk_kependudukan_ibu"
            required
            maxlength="16"
            value="<?= htmlspecialchars($form_data['nomor_induk_kependudukan_ibu'] ?? '') ?>"
            oninput="validateNIK(this)">
            </div>

            <div class="form-group">
                <label for="tempat_lahir_ibu">Tempat Lahir</label>
                <input type="text" id="tempat_lahir_ibu" name="tempat_lahir_ibu" required value="<?= htmlspecialchars($form_data['tempat_lahir_ibu'] ?? '') ?>">
            </div>

            <div class="form-group">
                <label for="tanggal_lahir_ibu">Tanggal Lahir</label>
                <input type="date" id="tanggal_lahir_ibu" name="tanggal_lahir_ibu" required value="<?= htmlspecialchars($form_data['tanggal_lahir_ibu'] ?? '') ?>">
            </div>

          
            <div class="form-group">
                <label for="kewarganegaraan_ibu">Kewarganegaraan</label>
                <select id="kewarganegaraan_ibu" name="kewarganegaraan_ibu" required>
                    <option value="">Pilih Kewarganegaraan</option>
                    <option value="WNI" <?= (isset($form_data['kewarganegaraan_ibu']) && $form_data['kewarganegaraan_ibu'] == 'WNI') ? 'selected' : '' ?>>WNI</option>
                    <option value="WNA" <?= (isset($form_data['kewarganegaraan_ibu']) && $form_data['kewarganegaraan_ibu'] == 'WNA') ? 'selected' : '' ?>>WNA</option>
                </select>
            </div>

            <div class="form-group">
                <label for="agama_ibu">Agama</label>
                <select id="agama" name="agama_ibu">
                    <option value="">Pilih Agama</option>
                    <option value="Islam" <?= (isset($form_data['agama_ibu']) && $form_data['agama_ibu'] == 'Islam') ? 'selected' : '' ?>>Islam</option>
                    <option value="Kristen" <?= (isset($form_data['agama_ibu']) && $form_data['agama_ibu'] == 'Kristen') ? 'selected' : '' ?>>Kristen</option>
                    <option value="Katholik" <?= (isset($form_data['agama_ibu']) && $form_data['agama_ibu'] == 'Katholik') ? 'selected' : '' ?>>Katholik</option>
                    <option value="Hindu" <?= (isset($form_data['agama_ibu']) && $form_data['agama_ibu'] == 'Hindu') ? 'selected' : '' ?>>Hindu</option>
                    <option value="buddha" <?= (isset($form_data['agama_ibu']) && $form_data['agama_ibu'] == 'buddha') ? 'selected' : '' ?>>Buddha</option>
                    <option value="konghucu" <?= (isset($form_data['agama_ibu']) && $form_data['agama_ibu'] == 'konghucu') ? 'selected' : '' ?>>Konghucu</option>
                    <option value="Lainnya" <?= (isset($form_data['agama_ibu']) && $form_data['agama_ibu'] == 'Lainnya') ? 'selected' : '' ?>>Lainnya</option>
                </select>
            </div>


            <div class="form-group">
                <label for="golongan_darah">Golongan Darah</label>
                <select id="golongan_darah" name="golongan_darah_ibu">
                    <option value="">Pilih Golongan Darah</option>
                    <option value="A" <?= (isset($form_data['golongan_darah_ibu']) && $form_data['golongan_darah_ibu'] == 'A') ? 'selected' : '' ?>>A</option>
                    <option value="B" <?= (isset($form_data['golongan_darah_ibu']) && $form_data['golongan_darah_ibu'] == 'B') ? 'selected' : '' ?>>B</option>
                    <option value="AB" <?= (isset($form_data['golongan_darah_ibu']) && $form_data['golongan_darah_ibu'] == 'AB') ? 'selected' : '' ?>>AB</option>
                    <option value="O" <?= (isset($form_data['golongan_darah_ibu']) && $form_data['golongan_darah_ibu'] == 'O') ? 'selected' : '' ?>>O</option>
                </select>
            </div>

            <div class="form-group">
                <label for="hubungan_dengan_siswa">Hubungan Dengan Siswa</label>
                <select id="hubungan_dengan_siswa" name="hubunga_dengan_siswa">
                    <option value="">Pilih </option>
                    <option value="ibu_kandung" <?= (isset($form_data['hubungan_dengan_siswa']) && $form_data['hubungan_dengan_siswa'] == 'ibu_kandung') ? 'selected' : '' ?>>Ibu Kandung</option>
                    <option value="ibu_tiri" <?= (isset($form_data['hubungan_dengan_siswa']) && $form_data['hubungan_dengan_siswa'] == 'ibu_tiri') ? 'selected' : '' ?>>Ibu Tiri</option>
                </select>
            </div>

            <div class="form-group">
                <label for="nomor_handphone_ibu">Nomor Handphone</label>
                <input type="telepon" id="nomor_handphone_ibu" name="nomor_handphone_ibu" required value="<?= htmlspecialchars($form_data['nomor_handphone_ibu'] ?? '') ?>">
            </div>
            
            <h3>C. Data Wali (Jika Ada)</h3>
            <input type="hidden" name="jenis_peran" value="wali">
            <div class="form-group">
                <label for="nama_lengkap">Nama lengkap Wali</label>
                <input type="text" name="nama_lengkap_wali" required value="<?= htmlspecialchars($form_data['nama_lengkap_wali'] ?? '') ?>">
            </div>

            <div class="form-group">
            <label for="nomor_induk_kependudukan_wali">Nomor Induk Kependudukan</label>
            <input 
            type="text"
            id="nomor_induk_kependudukan_wali"
            name="nomor_induk_kependudukan_wali"
            required
            maxlength="16"
            value="<?= htmlspecialchars($form_data['nomor_induk_kependudukan_wali'] ?? '') ?>"
            oninput="validateNIK(this)">
            </div>

            <div class="form-group">
                <label for="tempat_lahir_wali">Tempat Lahir</label>
                <input type="text" id="tempat_lahir_wali" name="tempat_lahir_wali" required value="<?= htmlspecialchars($form_data['tempat_lahir_wali'] ?? '') ?>">
            </div>

            <div class="form-group">
                <label for="tanggal_lahir_wali">Tanggal Lahir</label>
                <input type="date" id="tanggal_lahir_wali" name="tanggal_lahir_wali" required value="<?= htmlspecialchars($form_data['tanggal_lahir_wali'] ?? '') ?>">
            </div>

          
            <div class="form-group">
                <label for="kewarganegaraan">Kewarganegaraan</label>
                <select id="kewarganegaraan" name="kewarganegaraan_wali" required>
                    <option value="">Pilih Kewarganegaraan</option>
                    <option value="WNI" <?= (isset($form_data['kewarganegaraan_wali']) && $form_data['kewarganegaraan_wali'] == 'WNI') ? 'selected' : '' ?>>WNI</option>
                    <option value="WNA" <?= (isset($form_data['kewarganegaraan_wali']) && $form_data['kewarganegaraan_wali'] == 'WNA') ? 'selected' : '' ?>>WNA</option>
                </select>
            </div>

            <div class="form-group">
                <label for="agama">Agama</label>
                <select id="agama" name="agama_wali" required>
                    <option value="">Pilih Agama</option>
                    <option value="Islam" <?= (isset($form_data['agama_wali']) && $form_data['agama_wali'] == 'Islam') ? 'selected' : '' ?>>Islam</option>
                    <option value="Kristen" <?= (isset($form_data['agama_wali']) && $form_data['agama_wali'] == 'Kristen') ? 'selected' : '' ?>>Kristen</option>
                    <option value="Katholik" <?= (isset($form_data['agama_wali']) && $form_data['agama_wali'] == 'Katholik') ? 'selected' : '' ?>>Katholik</option>
                    <option value="Hindu" <?= (isset($form_data['agama_wali']) && $form_data['agama_wali'] == 'Hindu') ? 'selected' : '' ?>>Hindu</option>
                    <option value="buddha" <?= (isset($form_data['agama_wali']) && $form_data['agama_wali'] == 'buddha') ? 'selected' : '' ?>>Buddha</option>
                    <option value="konghucu" <?= (isset($form_data['agama_wali']) && $form_data['agama_wali'] == 'konghucu') ? 'selected' : '' ?>>Konghucu</option>
                    <option value="Lainnya" <?= (isset($form_data['agama_wali']) && $form_data['agama_wali'] == 'Lainnya') ? 'selected' : '' ?>>Lainnya</option>
                </select>
            </div>

           

            <div class="form-group">
                <label for="golongan_darah">Golongan Darah</label>
                <select id="golongan_darah" name="golongan_darah_wali">
                    <option value="">Pilih Golongan Darah</option>
                    <option value="A" <?= (isset($form_data['golongan_darah_wali']) && $form_data['golongan_darah_wali'] == 'A') ? 'selected' : '' ?>>A</option>
                    <option value="B" <?= (isset($form_data['golongan_darah_wali']) && $form_data['golongan_darah_wali'] == 'B') ? 'selected' : '' ?>>B</option>
                    <option value="AB" <?= (isset($form_data['golongan_darah_wali']) && $form_data['golongan_darah_wali'] == 'AB') ? 'selected' : '' ?>>AB</option>
                    <option value="O" <?= (isset($form_data['golongan_darah_wali']) && $form_data['golongan_darah_wali'] == 'O') ? 'selected' : '' ?>>O</option>
                </select>
            </div>

            <div class="form-group">
                <label for="hubungan_dengan_siswa">Hubungan Dengan Siswa</label>
                <select id="hubungan_dengan_siswa" name="hubungan_dengan_siswa">
                    <option value="">Pilih Hubungan</option>
                    <option value="sepupu" <?= (isset($form_data['hubungan_dengan_siswa']) && $form_data['hubungan_dengan_siswa'] == 'sepupu') ? 'selected' : '' ?>>Sepupu</option>
                    <option value="paman" <?= (isset($form_data['hubungan_dengan_siswa']) && $form_data['hubungan_dengan_siswa'] == 'paman') ? 'selected' : '' ?>>Paman</option>
                    <option value="cucu" <?= (isset($form_data['hubungan_dengan_siswa']) && $form_data['hubungan_dengan_siswa'] == 'cucu') ? 'selected' : '' ?>>Cucu</option>
                    <option value="keponakan" <?= (isset($form_data['hubungan_dengan_siswa']) && $form_data['hubungan_dengan_siswa'] == 'keponakan') ? 'selected' : '' ?>>Keponakan</option>
                            
                </select>
            </div>

            <div class="form-group">
                <label for="nomor_handphone_wali">Nomor Handphone</label>
                <input type="telepon" id="nomor_handphone_wali" name="nomor_handphone_wali" required value="<?= htmlspecialchars($form_data['nomor_handphone_wali'] ?? '') ?>">
            </div>

            <div class="button-group">
                <button type="button" onclick="showPrevStep()">&laquo; Kembali ke Langkah 1</button>
                <button type="button" onclick="showNextStep()">Lanjut ke Langkah 3 &raquo;</button>
            </div>
        </div>

        <div id="step-3" class="form-step">
            <h2>Data Tambahan & Upload Dokumen</h2>

            <h3>Informasi Sekolah Asal</h3>
            <div class="form-group">
                <label for="sekolah_asal">Sekolah Asal</label>
                <input type="text" name="sekolah_asal" required value="<?= htmlspecialchars($form_data['sekolah_asal'] ?? '') ?>">
            </div>
            <div class="form-group">
                <label for="nilai_ijazah">Nilai Rata-rata Ijazah</label>
                <input type="number" step="0.01" name="nilai_ijazah" value="<?= htmlspecialchars($form_data['nilai_ijazah'] ?? '') ?>">
            </div>

            <h3>Upload Dokumen Wajib</h3>
            <p>Format yang diterima: PDF, Gambar (JPG/PNG), atau Word (DOC/DOCX). Max 5MB per file.</p>
            
            <div class="form-group">
                <label for="bukti_pembayaran">Bukti Pembayaran Pendaftaran *</label>
                <input type="file" id="bukti_pembayaran" name="bukti_pembayaran" accept=".pdf, .jpg, .jpeg, .png, .doc, .docx" required>
            </div>
            
            <div class="form-group">
                <label for="akte_lahir">Akte Kelahiran Siswa *</label>
                <input type="file" id="akte_lahir" name="akte_lahir" accept=".pdf, .jpg, .jpeg, .png" required>
            </div>
            
            <div class="form-group">
                <label for="akte_lahir">Kartu keluarga *</label>
                <input type="file" id="kartu_keluarga" name="kartu_keluarga" accept=".pdf, .jpg, .jpeg, .png" required>
            </div>

            <div class="form-group">
                <label for="akte_lahir">Nilai Raport Semester 1 -5 *</label>
                <input type="file" id="Raport" name="kartu_keluarga" accept=".pdf, .jpg, .jpeg, .png" required>
            </div>      

            <div class="form-group">
                <label for="akte_lahir">Transkrip Nilai *</label>
                <input type="file" id="transkrip_nilai" name="kartu_keluarga" accept=".pdf, .jpg, .jpeg, .png" required>
            </div>      

            <h3>Sumber Informasi</h3>
            <div class="form-group">
                <label>Dari mana mendapatkan info tentang SMK Teknologi Ascendia?</label>
                <input type="checkbox" name="info_source[]" value="Website"> Ascendia Website <br>
                <input type="checkbox" name="info_source[]" value="Facebook/Instagram"> Facebook  <br>
                <input type="checkbox" name="info_source[]" value="Instagram"> Instagram  <br>
                <input type="checkbox" name="info_source[]" value="x"> X  <br>
                <input type="checkbox" name="info_source[]" value="youtube"> Youtube  <br>
                <input type="checkbox" name="info_source[]" value="Others"> Others (Sebutkan: <input type="text" name="info_source_others" style="width: auto;">)
            </div>
            
            <h3>Komitmen Pendaftaran</h3>
            <div class="form-group">
                <label for="surat_komitmen">Upload Surat Komitmen pada SMK Teknologi Ascendia (Sudah ditandatangani)</label>
                <input type="file" id="surat_komitmen" name="surat_komitmen" accept=".pdf, .jpg, .jpeg, .png" required>
            </div>
            
            <div class="form-group">
                <input type="checkbox" name="komitmen_setuju" value="1" required>
                <label for="komitmen_setuju" style="display: inline; font-weight: normal;">Saya menyatakan bahwa data yang diisi adalah benar dan menyetujui komitmen pada SMK Teknologi Ascendia.</label>
            </div>

            <div class="button-group">
                <button type="button" onclick="showPrevStep()">&laquo; Kembali ke Langkah 2</button>
                <button type="submit" name="submit_form">**SUBMIT FORMULIR Pendaftaran**</button>
            </div>
        </div>

    </form>
    
    <script>
        let currentStep = <?= $step ?>; // Ambil nilai langkah dari PHP

        function showStep(stepNumber) {
            // 1. Kontrol Tampilan Konten Form
            // Sembunyikan semua konten langkah
            document.querySelectorAll('.form-step').forEach(step => {
                step.classList.remove('active');
            });
            // Tampilkan konten langkah yang diminta
            document.getElementById('step-' + stepNumber).classList.add('active');

            // 2. Kontrol Tampilan Tab/Indikator
            // Nonaktifkan semua tab
            document.querySelectorAll('.step-indicator > div').forEach(tab => {
                tab.classList.remove('active');
            });
            // Aktifkan tab yang diminta
            document.getElementById('tab-' + stepNumber).classList.add('active');
            
            currentStep = stepNumber;
        }

        function showNextStep() {
            // Logika validasi bisa ditambahkan di sini sebelum memanggil showStep()
            if (currentStep < 3) {
                showStep(currentStep + 1);
            }
        }

        function showPrevStep() {
            if (currentStep > 1) {
                showStep(currentStep - 1);
            }
        }

        // Pastikan langkah yang benar ditampilkan saat halaman dimuat (terutama setelah error PHP)
        document.addEventListener('DOMContentLoaded', () => {
            showStep(currentStep);
        });
        function validateNIK(input) {
            const warning = document.getElementById('nik-warning');
            
            if (!/^\d*$/.test(input.value)) {
                warning.style.display = 'block';
                input.value = input.value.replace(/\D/g, '');
            } else {
                warning.style.display = 'none';
            }
        }
</script>

</body>
</html>
