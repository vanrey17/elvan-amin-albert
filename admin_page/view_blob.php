<?php
// admin_page/view_blob.php

// 1. Bersihkan semua output buffer agar data binary tidak rusak
while (ob_get_level()) {
    ob_end_clean();
}

// 2. Gunakan koneksi yang sudah ada (karena file ini di-include oleh admin.php)
// Variabel $conn sudah tersedia dari admin.php
global $conn;

if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id = mysqli_real_escape_string($conn, $_GET['id']);
    
    $sql = "SELECT file_content, tipe_file, nama_file FROM tb_berkas WHERE id_berkas = '$id'";
    $result = mysqli_query($conn, $sql);
    
    if ($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        
        $data = $row['file_content'];
        $mime = $row['tipe_file']; 
        $nama = $row['nama_file'];

        // Kirim Header
        header("Content-Type: " . $mime);
        header("Content-Length: " . strlen($data));
        header("Content-Disposition: inline; filename=\"" . $nama . "\"");
        header("Cache-Control: no-cache, must-revalidate");
        
        echo $data;
        exit; // WAJIB agar admin.php tidak lanjut mencetak HTML
    }
}

// Jika sampai sini berarti gagal
http_response_code(404);
echo "File tidak ditemukan di database.";
exit;