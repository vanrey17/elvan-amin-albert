<?php 
$host = "localhost";     // Host server
$user = "root";          // Username MySQL
$pass = "";              // Password MySQL (kosong di XAMPP)
$db   = "db_project_smk";       // Nama database kamu

// Membuat koneksi
$conn = mysqli_connect($host, $user, $pass, $db);
// Mengecek koneksi
if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}


?>