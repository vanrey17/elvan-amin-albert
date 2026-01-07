<?php 
$host = "localhost";     // Host server
$user = "smktekn3";          // Username MySQL
$pass = "h8J00xrI-D4vT";              // Password MySQL (kosong di XAMPP)
$db   = "smktekn3_db_project_smk";       // Nama database kamu

// Membuat koneksi
$conn = mysqli_connect($host, $user, $pass, $db);
// Mengecek koneksi
if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}


?>