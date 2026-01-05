<?php
// Tentukan variabel data yang berbeda untuk setiap halaman (RPL)
$page_title = "WELCOME TO SMK TEKNOLOGI ASCENDIA";
$page_description = "Segera daftar dan bergabunglah dengan kami di SMK Teknologi Ascendia untuk masa depan yang gemilang!";
include 'page/hero.php';

// ======================
// INISIALISASI VARIABEL DI AWAL
// ======================
$success_message = ''; // Inisialisasi variabel
$errors = []; // Inisialisasi array errors
$form_data = []; // Untuk menyimpan data form jika ada error
$step = 1; // Langkah default

include 'config.php';

if (isset($_POST['submit_form'])) {
    // 1. AMBIL DATA
    $form_data = $_POST;
    $nama_lengkap_siswa = mysqli_real_escape_string($conn, $_POST['nama_lengkap_siswa'] ?? '');
    $nomor_induk_kependudukan = mysqli_real_escape_string($conn, $_POST['nomor_induk_kependudukan'] ?? '');
    $alamat_siswa = mysqli_real_escape_string($conn, $_POST['alamat_siswa'] ?? '');
    $nomor_handphone_siswa = mysqli_real_escape_string($conn, $_POST['nomor_handphone_siswa'] ?? '');
    $gender_siswa = mysqli_real_escape_string($conn, $_POST['gender_siswa'] ?? '');
    $kewarganegaraan = mysqli_real_escape_string($conn, $_POST['kewarganegaraan'] ?? '');
    $tempat_lahir = mysqli_real_escape_string($conn, $_POST['tempat_lahir'] ?? '');
    $tanggal_lahir = mysqli_real_escape_string($conn, $_POST['tanggal_lahir'] ?? '');
    $agama_siswa = mysqli_real_escape_string($conn, $_POST['agama_siswa'] ?? '');
    $golongan_darah = mysqli_real_escape_string($conn, $_POST['golongan_darah'] ?? '');
    $tinggi_badan = mysqli_real_escape_string($conn, $_POST['tinggi_badan'] ?? '');
    $berat_badan = mysqli_real_escape_string($conn, $_POST['berat_badan'] ?? '');
    $hobi_siswa = mysqli_real_escape_string($conn, $_POST['hobi_siswa'] ?? '');
    $cita_cita = mysqli_real_escape_string($conn, $_POST['cita_cita'] ?? '');
    $minat_jurusan = mysqli_real_escape_string($conn, $_POST['minat_jurusan'] ?? '');
    $pilihan_identitas = isset($_POST['pilihan_identitas']) ? implode(', ', $_POST['pilihan_identitas']) : '';


       // 2. VALIDASI (MODIFIED)
    if (empty($nama_lengkap_siswa)) $errors[] = "Nama lengkap siswa wajib diisi";
    if (empty($nomor_induk_kependudukan)) $errors[] = "Nomor Induk Kependudukan wajib diisi";
    if (empty($alamat_siswa)) $errors[] = "Alamat siswa wajib diisi";
    if (empty($nomor_handphone_siswa)) $errors[] = "Nomor handphone siswa wajib diisi";
    if (empty($gender_siswa)) $errors[] = "Gender siswa wajib diisi";
    if (empty($kewarganegaraan)) $errors[] = "Kewarganegaraan wajib diisi";
    if (empty($tempat_lahir)) $errors[] = "Tempat lahir wajib diisi";
    if (empty($tanggal_lahir)) $errors[] = "Tanggal lahir wajib diisi";
    if (empty($agama_siswa)) $errors[] = "Agama siswa wajib diisi";
    if (empty($golongan_darah)) $errors[] = "Golongan darah wajib diisi";
    if (empty($tinggi_badan)) $errors[] = "Tinggi badan wajib diisi";
    if (empty($berat_badan)) $errors[] = "Berat badan wajib diisi";
    if (empty($hobi_siswa)) $errors[] = "Hobi siswa wajib diisi";
    if (empty($cita_cita)) $errors[] = "Cita-cita wajib diisi";
    if (empty($minat_jurusan)) $errors[] = "Minat jurusan wajib diisi";
    if (empty($pilihan_identitas)) $errors[] = "Pilihan identitas wajib dipilih";

// ======================
    // 3. INSERT SISWA JIKA TIDAK ADA ERROR
    // ======================
    if (empty($errors)) {
        // Ambil penanggung jawab di sini agar tidak 'Undefined Variable'
        $penanggung = $_POST['penanggung_jawab'] ?? '';

        $insert_query = "
            INSERT INTO tb_calon_siswa (
                `nama_lengkap_siswa`, `nomor_induk_kependudukan`, `alamat_siswa`,
                `nomor_handphone_siswa`, `gender_siswa`, `kewarganegaraan`,
                `tempat_lahir`, `tanggal_lahir`, `agama_siswa`, `golongan_darah`,
                `tinggi_badan`, `berat_badan`, `hobi_siswa`, `cita_cita`, `minat_jurusan`
            ) VALUES (
                '$nama_lengkap_siswa', '$nomor_induk_kependudukan', '$alamat_siswa',
                '$nomor_handphone_siswa', '$gender_siswa', '$kewarganegaraan',
                '$tempat_lahir', '$tanggal_lahir', '$agama_siswa', '$golongan_darah',
                '$tinggi_badan', '$berat_badan', '$hobi_siswa', '$cita_cita', '$minat_jurusan'
            )
        ";

        // JALANKAN QUERY SISWA TERLEBIH DAHULU
        if (mysqli_query($conn, $insert_query)) {
            // Ambil ID siswa yang baru saja masuk
            $id_siswa = mysqli_insert_id($conn);

            // ======================
            // 4. SIMPAN ORANG TUA / WALI (Hanya jika Siswa Berhasil)
            // ======================
            // ======================
            if ($penanggung === 'orangtua') {
                // Bersihkan semua input POST untuk orang tua
                $data_ot = [];
                foreach ($_POST as $key => $val) {
                    // Cek jika input bukan array, baru di-escape
                    if (!is_array($val)) {
                        $data_ot[$key] = mysqli_real_escape_string($conn, $val);
                    } else {
                        // Jika array (seperti checkbox), abaikan atau gabung jadi string dulu
                        $data_ot[$key] = $val; 
                    }
                }

                $query_orangtua = "
                    INSERT INTO tb_orangtua_siswa (
                        id_siswa, nama_lengkap_ayah, nomor_induk_kependudukan_ayah, alamat_ayah,
                        tempat_lahir_ayah, tanggal_lahir_ayah, kewarganegaraan_ayah, agama_ayah, 
                        golongan_darah_ayah, hubungan_ayah, no_hp_ayah,
                        nama_lengkap_ibu, nomor_induk_kependudukan_ibu, alamat_ibu, 
                        tempat_lahir_ibu, tanggal_lahir_ibu, kewarganegaraan_ibu, 
                        agama_ibu, golongan_darah_ibu, hubungan_ibu, nomor_handphone_ibu
                    ) VALUES (
                        '$id_siswa',
                        '{$data_ot['nama_lengkap_ayah']}', '{$data_ot['nomor_induk_kependudukan_ayah']}', 
                        '{$data_ot['alamat_ayah']}', '{$data_ot['tempat_lahir_ayah']}', '{$data_ot['tanggal_lahir_ayah']}',
                        '{$data_ot['kewarganegaraan_ayah']}', '{$data_ot['agama_ayah']}', 
                        '{$data_ot['golongan_darah_ayah']}', 'ayah', '{$data_ot['no_hp_ayah']}',
                        '{$data_ot['nama_lengkap_ibu']}', '{$data_ot['nomor_induk_kependudukan_ibu']}', 
                        '{$data_ot['alamat_ibu']}', '{$data_ot['tempat_lahir_ibu']}', '{$data_ot['tanggal_lahir_ibu']}',
                        '{$data_ot['kewarganegaraan_ibu']}', '{$data_ot['agama_ibu']}', 
                        '{$data_ot['golongan_darah_ibu']}', 'ibu', '{$data_ot['nomor_handphone_ibu']}'
                    )
                ";
                
                if (!mysqli_query($conn, $query_orangtua)) {
                    $errors[] = "Gagal simpan data orangtua: " . mysqli_error($conn);
                }

            } elseif ($penanggung === 'wali') {
                $query_wali = "
                    INSERT INTO tb_wali (
                        id_siswa, 
                        nama_wali, 
                        nik_wali, 
                        alamat_wali,
                        tempat_lahir_wali, 
                        tanggal_lahir_wali,
                        kewarganegaraan_wali, 
                        agama_wali, 
                        golongan_darah_wali,
                        hubungan_wali, 
                        no_hp_wali
                    ) VALUES (
                        '$id_siswa',
                        '" . mysqli_real_escape_string($conn, $_POST['nama_lengkap_wali'] ?? '') . "', 
                        '" . mysqli_real_escape_string($conn, $_POST['nomor_induk_kependudukan_wali'] ?? '') . "',
                        '" . mysqli_real_escape_string($conn, $_POST['alamat_wali'] ?? '') . "',
                        '" . mysqli_real_escape_string($conn, $_POST['tempat_lahir_wali'] ?? '') . "', 
                        '" . mysqli_real_escape_string($conn, $_POST['tanggal_lahir_wali'] ?? '') . "',
                        '" . mysqli_real_escape_string($conn, $_POST['kewarganegaraan_wali'] ?? '') . "', 
                        '" . mysqli_real_escape_string($conn, $_POST['agama_wali'] ?? '') . "',
                        '" . mysqli_real_escape_string($conn, $_POST['golongan_darah_wali'] ?? '') . "', 
                        '" . mysqli_real_escape_string($conn, $_POST['hubungan_wali'] ?? '') . "',
                        '" . mysqli_real_escape_string($conn, $_POST['nomor_handphone_wali'] ?? '') . "'
                    )
                ";
                
                if (!mysqli_query($conn, $query_wali)) {
                    $errors[] = "Gagal simpan data wali: " . mysqli_error($conn);
                }
            }

            // Jika semua insert berhasil
            if (empty($errors)) {
                $success_message = "DATA BERHASIL DISIMPAN";
                $form_data = []; // Reset form
            }
            
        } else {
            // Jika insert siswa saja sudah gagal
            $errors[] = "Gagal insert siswa: " . mysqli_error($conn);
        }
    } else {
        $form_data = $_POST;
    }

}

// ... (setelah insert siswa dan orangtua/wali) ...

// ======================
// 7. UPLOAD FILE DAN SIMPAN LANGSUNG KE DATABASE (BLOB)
// ======================
if (empty($errors) && isset($id_siswa)) {
    
    $sekolah_asal = mysqli_real_escape_string($conn, $_POST['sekolah_asal'] ?? '');
    $nilai_ijazah = mysqli_real_escape_string($conn, $_POST['nilai_ijazah'] ?? 0);
    
    // Daftar input file
    $files_to_upload = [
        'bukti_pembayaran' => 'bukti_pembayaran',
        'akte_lahir'       => 'akte_lahir', 
        'kartu_keluarga'   => 'kartu_keluarga',
        'raport'           => 'raport',
        'transkrip_nilai'  => 'transkrip_nilai',
        'surat_komitmen'   => 'surat_komitmen',
        'foto_siswa'       => 'foto_siswa'
    ];
    
    $upload_errors = [];
    $upload_success_count = 0;
    
    foreach ($files_to_upload as $file_input => $jenis_berkas) {
        // Cek apakah file ada dan tidak error
        if (isset($_FILES[$file_input]) && $_FILES[$file_input]['error'] == 0) {
            $file = $_FILES[$file_input];
            
            // 1. Validasi tipe file
            $allowed_types = ['application/pdf', 'image/jpeg', 'image/jpg', 'image/png'];
            $finfo = finfo_open(FILEINFO_MIME_TYPE);
            $file_type = finfo_file($finfo, $file['tmp_name']);
            finfo_close($finfo);
            
            if (!in_array($file_type, $allowed_types)) {
                $upload_errors[] = "Format file $jenis_berkas tidak didukung ($file_type).";
                continue;
            }

            // 2. Validasi Ukuran (Max 5MB) - Backup validation server side
            $max_size = 5 * 1024 * 1024; // 5 Megabytes
            if ($file['size'] > $max_size) {
                // Berhenti di sini dan beri peringatan jika file terlalu besar
                $upload_errors[] = "File " . strtoupper(str_replace('_', ' ', $jenis_berkas)) . " gagal diunggah karena melebihi 5MB.";
                continue; // Lanjut ke file berikutnya, jangan diproses ke database
            }       
            
            // 3. PROSES MEMBACA FILE KE VARIABEL (BLOB)
            // Baca isi file sementara ke dalam memori
            $file_content_raw = file_get_contents($file['tmp_name']);
            // Escape string binary agar aman masuk query SQL
            $file_content_db = mysqli_real_escape_string($conn, $file_content_raw);

            $nama_asli = mysqli_real_escape_string($conn, $file['name']);
            $ukuran_file = $file['size'];
            
            // Penentuan nama foto untuk keperluan display sederhana (opsional)
            $foto_value = ($jenis_berkas == 'foto_siswa') ? $nama_asli : "default.jpg";

            // 4. INSERT KE DATABASE
            $jenis_save = $jenis_berkas; 
            
            $insert_berkas = "INSERT INTO tb_berkas (
                id_siswa, 
                sekolah_asal, 
                nilai_ijazah, 
                jenis_berkas, 
                nama_file, 
                path_file, 
                file_content,
                ukuran_file, 
                tipe_file,
                foto,
                uploaded_at
            ) VALUES (
                '$id_siswa',
                '$sekolah_asal',
                '$nilai_ijazah',
                '$jenis_berkas',
                '$nama_asli',
                'DATABASE', 
                '$file_content_db',
                '$ukuran_file',
                '$file_type',
                '$foto_value',
                NOW()
            )";
            
            // Eksekusi Query
            // NOTE: Query ini mungkin berat jika file sangat besar, pastikan setting 'max_allowed_packet' di MySQL cukup besar
            if (mysqli_query($conn, $insert_berkas)) {
                $upload_success_count++;
            } else {
                $upload_errors[] = "Gagal menyimpan data biner $jenis_berkas: " . mysqli_error($conn);
            }
        }
    }
    
    // Jika ada error upload
    if (!empty($upload_errors)) {
        $errors = array_merge($errors, $upload_errors);
        
        echo "<div style='background:#ffe6e6; padding:10px; margin:10px 0; border:1px solid red;'>";
        echo "<h3>❌ Error Upload:</h3>";
        echo "<ul>";
        foreach ($upload_errors as $error) {
            echo "<li>$error</li>";
        }
        echo "</ul>";
        echo "</div>";
        
    } else {
        // Simpan data info_source jika ada
        if (isset($_POST['info_source']) && is_array($_POST['info_source'])) {
            $info_sources = implode(", ", $_POST['info_source']);
            
            $create_table = "CREATE TABLE IF NOT EXISTS tb_info_sumber (
                id INT PRIMARY KEY AUTO_INCREMENT,
                id_siswa INT,
                sumber_info TEXT,
                created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
            )"; // Removed FK check for brevity to prevent error if FK exists
            mysqli_query($conn, $create_table);
            
            $query_info = "INSERT INTO tb_info_sumber (id_siswa, sumber_info) 
                           VALUES ('$id_siswa', '" . mysqli_real_escape_string($conn, $info_sources) . "')";
            mysqli_query($conn, $query_info);
        }
        
        // Simpan info_source_others jika ada
        if (!empty($_POST['info_source_others'])) {
             // Logic simpan others
        }
        
        // ==========================================
        // TAMPILKAN STATUS SUKSES
        // ==========================================
        $registration_success = true;
        
        $sukses_id      = $id_siswa;
        $sukses_nama    = $nama_lengkap_siswa;
        $sukses_jurusan = $minat_jurusan;
        $sukses_sekolah = $sekolah_asal; // Diambil dari $_POST['sekolah_asal']
        $sukses_tgl     = date('d F Y, H:i') . " WIB";
        $sukses_jumlah_file = $upload_success_count;

        echo "<h3 style='color:#2e7d32;'>✅ PENDAFTARAN & UPLOAD BERHASIL!</h3>";
        echo "<p>Data siswa dan <strong>$upload_success_count berkas</strong> telah tersimpan aman di Database Pusat.</p>";
        
        // Tampilkan daftar file yang SUDAH masuk ke DB (Query ulang untuk memastikan)
        echo "<p><strong>Berkas yang tersimpan:</strong></p>";
        echo "<ul>";
        
        $query_cek_file = "SELECT nama_file, ukuran_file, jenis_berkas FROM tb_berkas WHERE id_siswa = '$id_siswa'";
        $result_file = mysqli_query($conn, $query_cek_file);
        
        while($row_file = mysqli_fetch_assoc($result_file)){
            $kb_size = round($row_file['ukuran_file'] / 1024, 2);
            echo "<li>";
            echo "<strong>" . htmlspecialchars($row_file['jenis_berkas']) . "</strong>: " . htmlspecialchars($row_file['nama_file']);
            echo " ($kb_size KB) <span style='color:green'>[Tersimpan di DB]</span>";
            echo "</li>";
        }
        echo "</ul>";
        
        echo "</div>";
        
        $success_message = "🎉 DATA BERHASIL DISIMPAN! Semua data kini berada di database server.";
    }
}
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

    /* --- KARTU INFORMASI BERHASIL UPLOAD --- */
        .success-card {
        background: white;
        max-width: 700px;
        margin: 50px auto;
        border-radius: 15px;
        box-shadow: 0 10px 30px rgba(0,0,0,0.1);
        overflow: hidden;
        text-align: center;
        border: 1px solid #e0e0e0;
        animation: popUp 0.5s ease-out;
    }
    @keyframes popUp {
        from { transform: scale(0.8); opacity: 0; }
        to { transform: scale(1); opacity: 1; }
    }
    .success-header {
        background: linear-gradient(135deg, #28a745 0%, #20c997 100%);
        color: white;
        padding: 30px;
    }
    .success-icon {
        font-size: 60px;
        background: white;
        color: #28a745;
        width: 100px;
        height: 100px;
        line-height: 100px;
        border-radius: 50%;
        margin: 0 auto 15px;
        box-shadow: 0 5px 15px rgba(0,0,0,0.2);
    }
    .success-body { padding: 30px; }
    .reg-number {
        background: #f8f9fa;
        display: inline-block;
        padding: 10px 20px;
        border-radius: 50px;
        border: 2px dashed #28a745;
        color: #333;
        font-weight: bold;
        font-size: 1.2em;
        margin-bottom: 20px;
    }
    .student-details {
        text-align: left;
        background: #f9f9f9;
        padding: 20px;
        border-radius: 10px;
        margin-bottom: 20px;
    }
    .detail-row {
        display: flex;
        justify-content: space-between;
        border-bottom: 1px solid #eee;
        padding: 10px 0;
    }
    .detail-row:last-child { border-bottom: none; }
    .detail-label { color: #666; font-weight: 500; }
    .detail-value { font-weight: bold; color: #333; }
    .success-footer {
        background: #f1f1f1;
        padding: 20px;
        display: flex;
        justify-content: center;
        gap: 15px;
    }
    .btn-print {
        background: #007bff;
        color: white;
        padding: 12px 25px;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        font-weight: bold;
        text-decoration: none;
        display: inline-block;
    }
    .btn-home {
        background: #6c757d;
        color: white;
        padding: 12px 25px;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        text-decoration: none;
    }
    @media print {
        body * { visibility: hidden; }
        .success-card, .success-card * { visibility: visible; }
        .success-card { position: absolute; left: 0; top: 0; width: 100%; box-shadow: none; border: 2px solid #000; margin: 0; }
        .success-footer { display: none; }
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
            .form-step label{
                font-size : 0.9em;
            }
        }
    </style>


    <?php if (isset($registration_success) && $registration_success === true): ?>

        <div class="success-card">
            <div class="success-header">
                <div class="success-icon">✓</div>
                <h2 style="color:white; margin:0; border:none; padding:0;">Pendaftaran Berhasil!</h2>
                <p style="margin-top:10px; color:white; opacity:0.9;">Selamat bergabung di SMK Teknologi Ascendia</p>
            </div>
            
            <div class="success-body">
                <p>Halo <strong><?= htmlspecialchars($sukses_nama ?? 'Calon Siswa') ?></strong>, data pendaftaran dan berkas Anda telah berhasil kami terima.</p>
                
                <div class="reg-number">
                    NO. REG: REG-<?= date('Y') ?>-<?= str_pad($sukses_id ?? 0, 4, '0', STR_PAD_LEFT) ?>
                </div>

                <div class="student-details">
                    <div class="detail-row">
                        <span class="detail-label">Nama Lengkap</span>
                        <span class="detail-value"><?= htmlspecialchars($sukses_nama ?? '-') ?></span>
                    </div>
                    <div class="detail-row">
                        <span class="detail-label">Jurusan Diminati</span>
                        <span class="detail-value"><?= htmlspecialchars($sukses_jurusan ?? '-') ?></span>
                    </div>
                    <div class="detail-row">
                        <span class="detail-label">Sekolah Asal</span>
                        <span class="detail-value"><?= htmlspecialchars($sukses_sekolah ?? '-') ?></span>
                    </div>
                    <div class="detail-row">
                        <span class="detail-label">Tanggal Daftar</span>
                        <span class="detail-value"><?= $sukses_tgl ?? '-' ?></span>
                    </div>
                    <div class="detail-row">
                        <span class="detail-label">Status Berkas</span>
                        <span class="detail-value" style="color:green;">Terupload (<?= $sukses_jumlah_file ?? 0 ?> File)</span>
                    </div>
                </div>

                <p style="font-size:0.9em; color:#666;">
                    Silakan cetak bukti pendaftaran ini dan bawa saat verifikasi ulang.
                </p>
            </div>

            <div class="success-footer">
                <button onclick="window.print()" class="btn-print">🖨️ Cetak Bukti</button>
                <a href="index.php?page=daftar" class="btn-home">Kembali</a>
            </div>
        </div>

    <?php else: ?> 
        <?php if (!empty($errors)): ?>
            <div class="alert alert-danger shadow-sm mb-4" style="border-left: 5px solid red;">
                <h5 class="alert-heading"><i class="fas fa-exclamation-triangle"></i> Mohon koreksi kesalahan berikut:</h5>
                <hr>
                <ul class="mb-0">
                    <?php foreach ($errors as $error): ?>
                        <li><?= $error ?></li> 
                    <?php endforeach; ?>
                </ul>
            </div>
        <?php endif; ?>

    <div class="step-indicator">
        <div id="tab-1" onclick="showStep(1)">1. Data Calon Siswa</div>
        <div id="tab-2" onclick="showStep(2)">2. Data Orang Tua/Wali</div>
        <div id="tab-3" onclick="showStep(3)">3. Data Tambahan & Dokumen</div>
    </div>
    
    <form method="POST" action="" enctype="multipart/form-data">

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
                <label for="nomor_handphone_siswa">Nomor Handphone Siswa</label>
                <input type="tel" id="nomor_handphone_siswa" name="nomor_handphone_siswa" required value="<?= htmlspecialchars($form_data['nomor_handphone_siswa'] ?? '') ?>">
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
                    <option value="A" <?= (isset($form_data['golongan_darah']) && $form_data['golongan_darah'] == 'A') ? 'selected' : '' ?>>A</option>
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
                    <option value="TJKT" <?= (isset($form_data['minat_jurusan']) && $form_data['minat_jurusan'] == 'TJKT') ? 'selected' : '' ?>>Teknik Jaringan Komputer dan Telekomunikasi (TJKT)</option>
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
           <h2>Data Orang Tua / Wali</h2>
            <p>Pilih apakah Anda akan mengisi data orang tua atau wali, lalu lengkapi informasi yang diminta.</p>


            <div class="form-group">
                <label>
                    <input type="radio" name="penanggung_jawab" value="orangtua" onclick="cekPilihan()" 
            <?= (!isset($form_data['penanggung_jawab']) || (isset($form_data['penanggung_jawab']) && $form_data['penanggung_jawab'] == 'orangtua')) ? 'checked' : '' ?> 
            required> Orang Tua
                </label>

                <label>
                    <input type="radio" name="penanggung_jawab" value="wali" onclick="cekPilihan()"
            <?= (isset($form_data['penanggung_jawab']) && $form_data['penanggung_jawab'] == 'wali') ? 'checked' : '' ?>> Wali
                </label>
            </div>
            
            <div id="form-orangtua" style="display:none;">
            <h3>A. Data Ayah</h3>
            <!-- agar data base tau jika user mengisi ini maka akan menjadi data ayah -->

            <div class="form-group">
                <label for="nama_lengkap_ayah">Nama Lengkap</label>
                <input type="text" name="nama_lengkap_ayah" required value="<?= htmlspecialchars($form_data['nama_lengkap_ayah'] ?? '') ?>">
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
                <label for="tempat_lahir_ayah">Tempat Lahir</label>
                <input type="text" id="tempat_lahir_ayah" name="tempat_lahir_ayah" required value="<?= htmlspecialchars($form_data['tempat_lahir_ayah'] ?? '') ?>">
            </div>

            <div class="form-group">
                <label for="tanggal_lahir_ayah">Tanggal Lahir</label>
                <input type="date" id="tanggal_lahir_ayah" name="tanggal_lahir_ayah" required value="<?= htmlspecialchars($form_data['tanggal_lahir_ayah'] ?? '') ?>">
            </div>

            <div class="form-group">
                <label for="alamat_ayah">Alamat Lengkap Ayah</label>
                <textarea id="alamat_ayah" name="alamat_ayah" rows="3" required><?= htmlspecialchars($form_data['alamat_ayah'] ?? '') ?></textarea>
            </div>

            <div class="form-group">
                <label for="kewarganegaraan_ayah">Kewarganegaraan</label>
                <select id="kewarganegaraan_ayah" name="kewarganegaraan_ayah" required>
                    <option value="">Pilih Kewarganegaraan</option>
                    <option value="WNI" <?= (isset($form_data['kewarganegaraan_ayah']) && $form_data['kewarganegaraan_ayah'] == 'WNI') ? 'selected' : '' ?>>WNI</option>
                    <option value="WNA" <?= (isset($form_data['kewarganegaraan_ayah']) && $form_data['kewarganegaraan_ayah'] == 'WNA') ? 'selected' : '' ?>>WNA</option>
                </select>
            </div>

            <div class="form-group">
                <label for="agama_ayah">Agama</label>
                <select id="agama_ayah" name="agama_ayah" required>
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
                <label for="golongan_darah_ayah">Golongan Darah</label>
                <select id="golongan_darah_ayah" name="golongan_darah_ayah">
                    <option value="">Pilih Golongan Darah</option>
                    <option value="A" <?= (isset($form_data['golongan_darah_ayah']) && $form_data['golongan_darah_ayah'] == 'A') ? 'selected' : '' ?>>A</option>
                    <option value="B" <?= (isset($form_data['golongan_darah_ayah']) && $form_data['golongan_darah_ayah'] == 'B') ? 'selected' : '' ?>>B</option>
                    <option value="AB" <?= (isset($form_data['golongan_darah_ayah']) && $form_data['golongan_darah_ayah'] == 'AB') ? 'selected' : '' ?>>AB</option>
                    <option value="O" <?= (isset($form_data['golongan_darah_ayah']) && $form_data['golongan_darah_ayah'] == 'O') ? 'selected' : '' ?>>O</option>
                </select>
            </div>

            <div class="form-group">
                <label for="hubungan_dengan_siswa_ayah">Hubungan Dengan Siswa</label>
                <select id="hubungan_dengan_siswa_ayah" name="hubungan_dengan_siswa_ayah">
                    <option value="">Pilih </option>
                    <option value="ayah_kandung" <?= (isset($form_data['hubungan_dengan_siswa_ayah']) && $form_data['hubungan_dengan_siswa_ayah'] == 'ayah_kandung') ? 'selected' : '' ?>>Ayah Kandung</option>
                    <option value="ayah_tiri" <?= (isset($form_data['hubungan_dengan_siswa_ayah']) && $form_data['hubungan_dengan_siswa_ayah'] == 'ayah_tiri') ? 'selected' : '' ?>>Ayah Tiri</option>
                </select>
            </div>

            <div class="form-group">
                <label for="no_hp_ayah">Nomor Handphone</label>
                <input type="tel" id="no_hp_ayah" name="no_hp_ayah" required value="<?= htmlspecialchars($form_data['no_hp_ayah'] ?? '') ?>">
            </div>
            

            <h3>B. Data Ibu</h3>
           
            <div class="form-group">
                <label for="nama_lengkap_ibu">Nama lengkap Ibu</label>
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
                <label for="alamat_ibu">Alamat Lengkap Ibu</label>
                <textarea id="alamat_ibu" name="alamat_ibu" rows="3" required><?= htmlspecialchars($form_data['alamat_ibu'] ?? '') ?></textarea>
            </div>

            <div class="form-group">
                <label for="agama_ibu">Agama</label>
                <select id="agama_ibu" name="agama_ibu">
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
                <label for="golongan_darah_ibu">Golongan Darah</label>
                <select id="golongan_darah_ibu" name="golongan_darah_ibu">
                    <option value="">Pilih Golongan Darah</option>
                    <option value="A" <?= (isset($form_data['golongan_darah_ibu']) && $form_data['golongan_darah_ibu'] == 'A') ? 'selected' : '' ?>>A</option>
                    <option value="B" <?= (isset($form_data['golongan_darah_ibu']) && $form_data['golongan_darah_ibu'] == 'B') ? 'selected' : '' ?>>B</option>
                    <option value="AB" <?= (isset($form_data['golongan_darah_ibu']) && $form_data['golongan_darah_ibu'] == 'AB') ? 'selected' : '' ?>>AB</option>
                    <option value="O" <?= (isset($form_data['golongan_darah_ibu']) && $form_data['golongan_darah_ibu'] == 'O') ? 'selected' : '' ?>>O</option>
                </select>
            </div>

            <div class="form-group">
                <label for="hubungan_dengan_siswa_ibu">Hubungan Dengan Siswa</label>
                <select id="hubungan_dengan_siswa_ibu" name="hubungan_dengan_siswa_ibu">
                    <option value="">Pilih </option>
                    <option value="ibu_kandung" <?= (isset($form_data['hubungan_dengan_siswa_ibu']) && $form_data['hubungan_dengan_siswa_ibu'] == 'ibu_kandung') ? 'selected' : '' ?>>Ibu Kandung</option>
                    <option value="ibu_tiri" <?= (isset($form_data['hubungan_dengan_siswa_ibu']) && $form_data['hubungan_dengan_siswa_ibu'] == 'ibu_tiri') ? 'selected' : '' ?>>Ibu Tiri</option>
                </select>
            </div>

            <div class="form-group">
                <label for="nomor_handphone_ibu">Nomor Handphone</label>
                <input type="tel" id="nomor_handphone_ibu" name="nomor_handphone_ibu" required value="<?= htmlspecialchars($form_data['nomor_handphone_ibu'] ?? '') ?>">
            </div>
            </div>
            
            <div id="form-wali" style="display:none;">
            <h3>C. Data Wali</h3>

            <div class="form-group">
                <label for="nama_lengkap_wali">Nama lengkap Wali</label>
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
                <label for="alamat_wali">Alamat Lengkap Wali</label>
                <textarea id="alamat_wali" name="alamat_wali" rows="3" required><?= htmlspecialchars($form_data['alamat_wali'] ?? '') ?></textarea>
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
                <input type="tel" id="nomor_handphone_wali" name="nomor_handphone_wali" required value="<?= htmlspecialchars($form_data['nomor_handphone_wali'] ?? '') ?>">
            </div>

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
        <input type="file" id="bukti_pembayaran" name="bukti_pembayaran" accept=".pdf,.jpg,.jpeg,.png,.doc,.docx" required>
    </div>

    <div class="form-group">
        <label for="foto_siswa">Foto Siswa 3x4 *</label>
        <input type="file" id="foto_siswa" name="foto_siswa" accept=".jpg,.jpeg,.png" required>
    </div>
    
    <div class="form-group">
        <label for="akte_lahir">Akte Kelahiran Siswa *</label>
        <input type="file" id="akte_lahir" name="akte_lahir" accept=".pdf,.jpg,.jpeg,.png" required>
    </div>
    
    <div class="form-group">
        <label for="kartu_keluarga">Kartu Keluarga *</label>
        <input type="file" id="kartu_keluarga" name="kartu_keluarga" accept=".pdf,.jpg,.jpeg,.png" required>
    </div>

    <div class="form-group">
        <label for="raport">Nilai Raport Semester 1-5 *</label>
        <input type="file" id="raport" name="raport" accept=".pdf,.jpg,.jpeg,.png" required>
    </div>      

    <div class="form-group">
        <label for="transkrip_nilai">Transkrip Nilai *</label>
        <input type="file" id="transkrip_nilai" name="transkrip_nilai" accept=".pdf,.jpg,.jpeg,.png" required>
    </div>      

    <div class="form-group">
        <label for="surat_komitmen">Surat Komitmen *</label>
        <input type="file" id="surat_komitmen" name="surat_komitmen" accept=".pdf,.jpg,.jpeg,.png" required>
    </div>

    <h3>Sumber Informasi</h3>
    <div class="form-group">
        <label>Dari mana mendapatkan info tentang SMK Teknologi Ascendia?</label>
        <input type="checkbox" name="info_source[]" value="Website" <?= isset($form_data['info_source']) && in_array('Website', $form_data['info_source']) ? 'checked' : '' ?>> Ascendia Website <br>
        <input type="checkbox" name="info_source[]" value="Facebook" <?= isset($form_data['info_source']) && in_array('Facebook', $form_data['info_source']) ? 'checked' : '' ?>> Facebook <br>
        <input type="checkbox" name="info_source[]" value="Instagram" <?= isset($form_data['info_source']) && in_array('Instagram', $form_data['info_source']) ? 'checked' : '' ?>> Instagram <br>
        <input type="checkbox" name="info_source[]" value="X" <?= isset($form_data['info_source']) && in_array('X', $form_data['info_source']) ? 'checked' : '' ?>> X <br>
        <input type="checkbox" name="info_source[]" value="Youtube" <?= isset($form_data['info_source']) && in_array('Youtube', $form_data['info_source']) ? 'checked' : '' ?>> Youtube <br>
        <input type="checkbox" name="info_source[]" value="Others" <?= isset($form_data['info_source']) && in_array('Others', $form_data['info_source']) ? 'checked' : '' ?>> Others (Sebutkan: 
        <input type="text" name="info_source_others" style="width: auto;" value="<?= htmlspecialchars($form_data['info_source_others'] ?? '') ?>">)
    </div>
    
    <h3>Komitmen Pendaftaran</h3>
    <div class="form-group">
        <input type="checkbox" name="komitmen_setuju" value="1" 
            <?= isset($form_data['komitmen_setuju']) ? 'checked' : '' ?> required>
        <label for="komitmen_setuju" style="display: inline; font-weight: normal;">
            Saya menyatakan bahwa data yang diisi adalah benar dan menyetujui komitmen pada SMK Teknologi Ascendia.
        </label>
    </div>

    <div class="button-group">
        <button type="button" onclick="showPrevStep()">&laquo; Kembali ke Langkah 2</button>
       <button type="submit" name="submit_form" class="btn-submit">SUBMIT FORMULIR Pendaftaran</button>
    </div>
</div>
    </form>
    <?php endif; ?>
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

        function cekPilihan() {
    // 1. Ambil nilai radio button yang dipilih
    var penanggung = document.querySelector('input[name="penanggung_jawab"]:checked');
    
    // 2. Ambil elemen form
    var divOrangtua = document.getElementById('form-orangtua');
    var divWali = document.getElementById('form-wali');
    
    // 3. Jika tidak ada yang dipilih (saat pertama kali load)
    if (!penanggung) {
        // Default tampilkan form orangtua
        divOrangtua.style.display = 'block';
        divWali.style.display = 'none';
        return;
    }
    
    // 4. Tampilkan form sesuai pilihan
    if (penanggung.value === 'orangtua') {
        divOrangtua.style.display = 'block';
        divWali.style.display = 'none';
        
        // Set required untuk form orangtua
        divOrangtua.querySelectorAll('input[required], select[required]').forEach(function(item) {
            item.required = true;
        });
        // Hapus required dari form wali
        divWali.querySelectorAll('input[required], select[required]').forEach(function(item) {
            item.required = false;
        });
    } else {
        divOrangtua.style.display = 'none';
        divWali.style.display = 'block';
        
        // Set required untuk form wali
        divWali.querySelectorAll('input[required], select[required]').forEach(function(item) {
            item.required = true;
        });
        // Hapus required dari form orangtua
        divOrangtua.querySelectorAll('input[required], select[required]').forEach(function(item) {
            item.required = false;
        });
    }
}

// Tambahkan ke JavaScript Anda
function validateFileSize(input) {
    const maxSize = 5 * 1024 * 1024; // 5MB
    if (input.files[0].size > maxSize) {
        alert("Ukuran file maksimal 5MB!");
        input.value = "";
        return false;
    }
    return true;
}

// Tambahkan onchange ke setiap input file
document.querySelectorAll('input[type="file"]').forEach(input => {
    input.addEventListener('change', function() {
        validateFileSize(this);
    });
});

</script>

</body>
</html>