<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Pastikan autoload benar, jika file ini ada di dalam folder 'page/', gunakan '../vendor/autoload.php'
if (file_exists('vendor/autoload.php')) {
    require 'vendor/autoload.php';
} else {
    require '../vendor/autoload.php';
}

if (!isset($BASE)) $BASE = '';
if (!isset($image_path)) $image_path = $BASE . '/image';

$active_page = 'bk';
$pesan_terkirim = false;
$nama_pengirim = ""; 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama    = htmlspecialchars($_POST['nama']);
    $kelas   = htmlspecialchars($_POST['kelas']);
    $jurusan = htmlspecialchars($_POST['jurusan']);
    $topik   = htmlspecialchars($_POST['topik']);
    $metode  = htmlspecialchars($_POST['metode']);
    $pesan   = htmlspecialchars($_POST['pesan']);
    $nama_pengirim = $nama;

    $mail = new PHPMailer(true);

    try {
        $mail->isSMTP();
        $mail->Host       = 'smtp.gmail.com'; 
        $mail->SMTPAuth   = true;
        $mail->Username   = 'reyelvan16@gmail.com'; 
        $mail->Password   = 'anvlehhrblwpkxxf'; // App Password Anda
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port       = 587;

        $mail->SMTPOptions = array(
            'ssl' => array(
                'verify_peer' => false,
                'verify_peer_name' => false,
                'allow_self_signed' => true
            )
        );

        $mail->setFrom('reyelvan16@gmail.com', 'Sistem BK Ascendia');
        $mail->addAddress('elvanreynaldi434@gmail.com'); 

        $mail->isHTML(true);
        $mail->Subject = "Konseling Baru: $nama ($kelas $jurusan)";
        $mail->Body    = "
            <div style='font-family: Arial; border: 1px solid #667eea; padding: 20px; border-radius: 10px;'>
                <h2 style='color: #667eea;'>Permintaan Konseling Baru</h2>
                <hr>
                <p><strong>Nama:</strong> $nama</p>
                <p><strong>Kelas:</strong> $kelas - $jurusan</p>
                <p><strong>Topik:</strong> $topik</p>
                <p><strong>Metode:</strong> $metode</p>
                <p><strong>Pesan:</strong><br>$pesan</p>
            </div>";

        $mail->send();
        $pesan_terkirim = true;
    } catch (Exception $e) {
        error_log("Gagal kirim email: " . $mail->ErrorInfo);
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bimbingan Konseling - SMK Teknologi Ascendia</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="<?php echo $BASE; ?>/style.css"> 
    
    <style>
        /* Paste CSS dari langkah 1 di sini jika ingin cepat */
        .bk-hero { background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); color: white; padding: 60px 20px; text-align: center; border-radius: 0 0 50px 50px; margin-bottom: 40px; }
        .bk-hero h1 { margin: 0 0 10px; font-size: 2.5rem; }
        .bk-hero p { opacity: 0.9; font-size: 1.1rem; max-width: 600px; margin: 0 auto; }
        .bk-container { max-width: 1000px; margin: 0 auto 60px; padding: 0 20px; display: grid; grid-template-columns: 1fr 1.5fr; gap: 40px; }
        .bk-info h3 { color: #333; border-bottom: 2px solid #667eea; display: inline-block; padding-bottom: 10px; }
        .bk-features { list-style: none; padding: 0; margin-top: 20px; }
        .bk-features li { margin-bottom: 15px; display: flex; align-items: start; color: #555; }
        .bk-features i { color: #667eea; margin-right: 12px; margin-top: 4px; }
        .bk-form-card { background: white; padding: 30px; border-radius: 15px; box-shadow: 0 10px 30px rgba(0,0,0,0.08); border-top: 5px solid #667eea; }
        .form-group { margin-bottom: 20px; }
        .form-group label { display: block; margin-bottom: 8px; font-weight: 600; color: #444; }
        .form-control { width: 100%; padding: 12px; border: 1px solid #ddd; border-radius: 8px; font-size: 14px; box-sizing: border-box; }
        .form-control:focus { border-color: #667eea; outline: none; }
        .btn-bk { background: #667eea; color: white; padding: 12px 25px; border: none; border-radius: 8px; font-weight: bold; cursor: pointer; width: 100%; transition: 0.3s; }
        .btn-bk:hover { background: #764ba2; }
        .alert-success { background: #d4edda; color: #155724; padding: 15px; border-radius: 8px; margin-bottom: 20px; border: 1px solid #c3e6cb; }
        @media (max-width: 768px) { .bk-container { grid-template-columns: 1fr; } }
    </style>
</head>
<body>

    <style>
    /* Container Utama */
.bk-hero {
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    color: white;
    padding: 60px 20px;
    text-align: center;
    border-radius: 0 0 50px 50px; /* Lengkungan modern */
    margin-bottom: 40px;
}

.bk-hero h1 { margin: 0 0 10px; font-size: 2.5rem; }
.bk-hero p { opacity: 0.9; font-size: 1.1rem; max-width: 600px; margin: 0 auto; }

.bk-container {
    max-width: 1000px;
    margin: 0 auto 60px;
    padding: 0 20px;
    display: grid;
    grid-template-columns: 1fr 1.5fr;
    gap: 40px;
}

/* Bagian Info (Kiri) */
.bk-info h3 { color: #333; border-bottom: 2px solid #667eea; display: inline-block; padding-bottom: 10px; }
.bk-features { list-style: none; padding: 0; margin-top: 20px; }
.bk-features li {
    margin-bottom: 15px;
    display: flex;
    align-items: start;
    color: #555;
}
.bk-features i { color: #667eea; margin-right: 12px; margin-top: 4px; }

/* Bagian Form (Kanan) */
.bk-form-card {
    background: white;
    padding: 30px;
    border-radius: 15px;
    box-shadow: 0 10px 30px rgba(0,0,0,0.08);
    border-top: 5px solid #667eea;
}

.form-group { margin-bottom: 20px; }
.form-group label { display: block; margin-bottom: 8px; font-weight: 600; color: #444; }
.form-control {
    width: 100%;
    padding: 12px;
    border: 1px solid #ddd;
    border-radius: 8px;
    font-size: 14px;
    transition: all 0.3s;
}
.form-control:focus {
    border-color: #667eea;
    box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.1);
    outline: none;
}

/* Tombol Submit */
.btn-bk {
    background: #667eea;
    color: white;
    padding: 12px 25px;
    border: none;
    border-radius: 8px;
    font-weight: bold;
    cursor: pointer;
    width: 100%;
    transition: transform 0.2s, background 0.2s;
}
.btn-bk:hover { background: #764ba2; transform: translateY(-2px); }

/* Responsif untuk HP */
@media (max-width: 768px) {
    .bk-container { grid-template-columns: 1fr; }
    .bk-hero { border-radius: 0 0 30px 30px; }
}

/* Alert Box */
.alert-success {
    background: #d4edda; color: #155724; padding: 15px; border-radius: 8px; margin-bottom: 20px; border: 1px solid #c3e6cb;
}

/* Section Guru */
.guru-section {
    max-width: 1000px;
    margin: -80px auto 40px; /* Negatif margin agar naik sedikit menumpuk hero section */
    padding: 0 20px;
    position: relative;
    z-index: 10;
}

.guru-grid {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 25px;
}

.guru-card {
    background: white;
    padding: 20px;
    border-radius: 15px;
    box-shadow: 0 10px 20px rgba(0,0,0,0.05);
    display: flex;
    align-items: center;
    transition: transform 0.3s;
    border: 1px solid #eee;
}

.guru-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 15px 30px rgba(102, 126, 234, 0.15);
    border-color: #667eea;
}

.guru-img {
    width: 100px;
    height: 100px;
    border-radius: 50%;
    object-fit: cover;
    margin-right: 20px;
    border: 3px solid #f0f2f5;
}

.guru-info h4 { margin: 0 0 5px; color: #333; font-size: 1.1rem; }
.guru-role { font-size: 0.85rem; color: #667eea; font-weight: bold; text-transform: uppercase; letter-spacing: 0.5px; }
.guru-quote { font-size: 0.9rem; color: #666; font-style: italic; margin-top: 8px; display: block; }

/* Status Indicator (Teknologi vibe) */
.status-badge {
    display: inline-block;
    font-size: 0.75rem;
    padding: 2px 8px;
    border-radius: 20px;
    margin-bottom: 5px;
}
.status-online { background: #d4edda; color: #155724; }
.status-offline { background: #f8d7da; color: #721c24; }
.status-dot { height: 8px; width: 8px; background-color: #28a745; border-radius: 50%; display: inline-block; margin-right: 4px; }

/* Responsif HP */
@media (max-width: 768px) {
    .guru-grid { grid-template-columns: 1fr; }
    .guru-section { margin-top: -40px; }
}
</style>

    <div class="bk-hero">
        <h1>Teman Cerita Ascendia</h1>
        <p>Ruang aman untuk berbagi cerita, merencanakan masa depan, dan menemukan solusi terbaik untukmu. Kami hadir untuk mendengar, bukan menghakimi.</p>
    </div>

</div> <div class="guru-section">
        <div class="guru-grid">
            
            <div class="guru-card">
                <img src="<?php echo $image_path; ?>/principal.png" alt="Pak Andi" class="guru-img" >
                
                <div class="guru-info">
                    <div class="status-badge status-online">
                        <span class="status-dot"></span> Available
                    </div>
                    <h4>Bpk. Andi Pratama, S.Pd.</h4>
                    <span class="guru-role">Konselor Karir & Industri</span>
                    <span class="guru-quote">"Jangan bingung soal masa depan. Ayo petakan potensimu bersama Bapak."</span>
                </div>
            </div>

            <div class="guru-card">
                <img src="<?php echo $image_path; ?>/principal.png" alt="Ibu Sarah" class="guru-img">
                
                <div class="guru-info">
                    <div class="status-badge status-online">
                        <span class="status-dot"></span> Available
                    </div>
                    <h4>Ibu Sarah Wijaya, M.Psi.</h4>
                    <span class="guru-role">Psikolog Remaja & Personal</span>
                    <span class="guru-quote">"Tidak ada masalah yang terlalu sepele. Ibu siap mendengarkanmu."</span>
                </div>
            </div>

        </div>
    </div>

    <div class="bk-container">
        
        <div class="bk-info">
            <h3>Mengapa ke BK?</h3>
            <p style="color: #666; line-height: 1.6;">
                Bimbingan Konseling di SMK Teknologi Ascendia telah bertransformasi menggunakan pendekatan modern. Jangan ragu untuk menghubungi kami.
            </p>
            
            <ul class="bk-features">
                <li>
                    <i class="fas fa-user-secret fa-lg"></i>
                    <div>
                        <strong>Privasi Terjamin 100%</strong>
                        <div style="font-size: 0.9em;">Ceritamu aman bersama kami. Kode etik adalah prioritas utama.</div>
                    </div>
                </li>
                <li>
                    <i class="fas fa-laptop-house fa-lg"></i>
                    <div>
                        <strong>Konseling Hybrid</strong>
                        <div style="font-size: 0.9em;">Bisa curhat tatap muka di ruang nyaman atau via Video Call jika malu bertemu langsung.</div>
                    </div>
                </li>
                <li>
                    <i class="fas fa-rocket fa-lg"></i>
                    <div>
                        <strong>Konsultasi Karir & Kuliah</strong>
                        <div style="font-size: 0.9em;">Bingung setelah lulus mau kemana? Kami punya data dan asesmen bakat minat digital.</div>
                    </div>
                </li>
            </ul>

            <div style="background: #f8f9fa; padding: 15px; border-radius: 10px; margin-top: 30px;">
                <strong><i class="fas fa-clock"></i> Jam Operasional:</strong><br>
                Senin - Jumat: 08.00 - 15.00 WIB<br>
                <small>*Untuk kondisi darurat, silakan langsung menuju ruang UKS/BK.</small>
            </div>
        </div>

        <div class="bk-form-card" id="form-konseling">
            
            <?php if ($pesan_terkirim): ?>
                <div class="alert-success">
                    <i class="fas fa-check-circle"></i> 
                    Halo <strong><?php echo $nama_pengirim; ?></strong>! Permintaanmu sudah kami terima. Guru BK akan menghubungimu via WhatsApp/Email sesegera mungkin untuk konfirmasi jadwal.
                </div>
                <div style="text-align: center;">
                    <a href="bk" class="btn-bk" style="display:inline-block; width:auto; text-decoration:none;">
                        <i class="fas fa-arrow-left"></i> Kirim Pesan Lain
                    </a>
                </div>
            <?php else: ?>

                <h3 style="margin-top: 0; color: #444;">Jadwalkan Sesi Curhat</h3>
                <p style="font-size: 0.9rem; color: #888; margin-bottom: 20px;">Isi form ini untuk membuat janji temu.</p>

                <form action="" method="POST">
                    
                    <div class="form-group">
                        <label for="nama">Nama Lengkap (Boleh Inisial jika malu)</label>
                        <input type="text" id="nama" name="nama" class="form-control" placeholder="Contoh: Budi Santoso" required>
                    </div>

                    <div class="form-group">
                        <label for="kelas">Kelas & Jurusan</label>
                        <select id="kelas" name="kelas" class="form-control" required>
                            <option value="">-- Pilih Kelas --</option>
                            <option value="X">Kelas X</option>
                            <option value="XI">Kelas XI</option>
                            <option value="XII">Kelas XII</option>
                        </select>
                        <input type="text" name="jurusan" class="form-control" placeholder="Contoh: RPL 1" style="margin-top: 5px;" required>
                    </div>

                    <div class="form-group">
                        <label for="topik">Topik Bahasan</label>
                        <select id="topik" name="topik" class="form-control" required>
                            <option value="akademik">Masalah Belajar / Nilai</option>
                            <option value="karir">Konsultasi Karir / Kuliah / Kerja</option>
                            <option value="pribadi">Masalah Pribadi / Teman / Keluarga</option>
                            <option value="lainnya">Lainnya</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="metode">Metode Konseling yang Nyaman</label>
                        <select id="metode" name="metode" class="form-control">
                            <option value="offline">Tatap Muka (Di Ruang BK)</option>
                            <option value="online">Online (Google Meet / Zoom)</option>
                            <option value="chat">Chat WhatsApp Dulu</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="pesan">Ceritakan Sedikit (Opsional)</label>
                        <textarea id="pesan" name="pesan" rows="4" class="form-control" placeholder="Gambaran singkat apa yang ingin kamu obrolkan..."></textarea>
                    </div>

                    <button type="submit" class="btn-bk">
                        <i class="fas fa-paper-plane"></i> Kirim Permintaan
                    </button>

                </form>
            <?php endif; ?>
        </div>

    </div>

</body>
</html>

