<?php
// auth.php
session_start();
require_once 'config.php'; 

// --- A. PROSES REGISTER (Tanpa Hash) ---
if (isset($_POST['register'])) {
    $nama = trim($_POST['nama']);
    $user = trim($_POST['username']);
    
    // UBAH DISINI: Hilangkan password_hash
    $pass = $_POST['password']; 
    $role = 'siswa'; 

    $stmt = $conn->prepare("SELECT username FROM users WHERE username = ?");
    $stmt->bind_param("s", $user);
    $stmt->execute();
    
    if ($stmt->get_result()->num_rows > 0) {
        echo "<script>alert('Username sudah terpakai!'); window.location='register.php';</script>";
    } else {
        // Simpan password teks biasa ke database
        $stmt_ins = $conn->prepare("INSERT INTO users (nama_lengkap, username, password, role) VALUES (?, ?, ?, ?)");
        $stmt_ins->bind_param("ssss", $nama, $user, $pass, $role);
        
        if ($stmt_ins->execute()) {
            echo "<script>alert('Pendaftaran Berhasil! Silakan Login.'); window.location='login_user.php';</script>";
        }
        $stmt_ins->close();
    }
    $stmt->close();
}

// --- B. PROSES LOGIN (Admin & Siswa) ---

if (isset($_POST['login'])) {
    $username = trim($_POST['username']);
    $password = $_POST['password']; 
    $target_role = isset($_POST['target_role']) ? trim($_POST['target_role']) : '';

    // Gunakan Prepared Statement untuk keamanan dari SQL Injection
    $stmt = $conn->prepare("SELECT * FROM users WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $data = $result->fetch_assoc();

        // --- PERBANDINGAN TEKS BIASA ---
        if ($password === $data['password']) {
            
            // Verifikasi Role
            if ($data['role'] === $target_role) {
                $_SESSION['user_id'] = $data['id'];
                $_SESSION['nama']    = $data['nama_lengkap'];
                $_SESSION['role']    = $data['role'];

                if ($data['role'] === 'admin') {
                    header("Location: admin.php");
                } else {
                    header("Location: index.php"); 
                }
                exit();
            } else {
                echo "<script>alert('Akses Ditolak: Anda bukan " . $target_role . "!'); window.history.back();</script>";
            }
        } else {
            echo "<script>alert('Password salah!'); window.history.back();</script>";
        }
    } else {
        echo "<script>alert('Username tidak ditemukan!'); window.history.back();</script>";
    }
    $stmt->close();
}

// --- C. PROSES LOGOUT ---
if (isset($_GET['logout'])) {
    session_unset();
    session_destroy();
    header("Location: index.php");
    exit();
}
?>