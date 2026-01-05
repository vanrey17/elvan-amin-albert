<?php
session_start();

include 'config.php';
// Proteksi: Jika admin SUDAH login, langsung lempar ke dashboard
if (isset($_SESSION['role']) && $_SESSION['role'] === 'admin') {
    header("Location: admin.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login | Ascendia Management</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap');
        * { margin: 0; padding: 0; box-sizing: border-box; font-family: 'Poppins', sans-serif; }
        body {
            background: radial-gradient(at 0% 0%, rgba(44, 62, 80, 0.2) 0, transparent 50%), 
                        radial-gradient(at 100% 100%, rgba(52, 73, 94, 0.2) 0, transparent 50%),
                        #f1f2f6;
            height: 100vh; display: flex; justify-content: center; align-items: center; overflow: hidden; position: relative;
        }
        .circle { position: absolute; border-radius: 50%; background: linear-gradient(135deg, #2c3e50, #34495e); z-index: -1; filter: blur(2px); opacity: 0.4; }
        .circle-1 { width: 350px; height: 350px; top: -150px; left: -100px; }
        .circle-2 { width: 200px; height: 200px; bottom: -50px; right: -50px; }
        .auth-container {
            background: rgba(255, 255, 255, 0.7); backdrop-filter: blur(20px); -webkit-backdrop-filter: blur(20px);
            border: 1px solid rgba(255, 255, 255, 0.5); width: 100%; max-width: 400px; padding: 45px 40px;
            border-radius: 30px; box-shadow: 0 25px 50px rgba(0,0,0,0.15); text-align: center;
        }
        .header-box i { color: #2c3e50; margin-bottom: 20px; }
        .header-box h2 { font-size: 26px; color: #2c3e50; font-weight: 700; }
        .header-box p { color: #7f8c8d; font-size: 13px; margin-bottom: 35px; text-transform: uppercase; font-weight: 600; }
        .form-group { margin-bottom: 20px; text-align: left; }
        .form-group label { font-size: 12px; font-weight: 700; color: #2c3e50; text-transform: uppercase; }
        .input-icon-wrapper { position: relative; margin-top: 5px; }
        .input-icon-wrapper i { position: absolute; left: 15px; top: 50%; transform: translateY(-50%); color: #95a5a6; }
        .form-control { width: 100%; padding: 14px 15px 14px 45px; border: 2px solid transparent; border-radius: 12px; transition: 0.3s; }
        .form-control:focus { outline: none; border-color: #2c3e50; background: #fff; }
        .btn-auth {
            width: 100%; padding: 15px; margin-top: 15px; background: #2c3e50; color: white; border: none;
            border-radius: 12px; font-weight: 600; cursor: pointer; transition: 0.3s;
        }
        .btn-auth:hover { background: #1a252f; transform: translateY(-2px); }
        .footer-link { margin-top: 30px; font-size: 13px; }
        .footer-link a { color: #7f8c8d; text-decoration: none; display: flex; align-items: center; justify-content: center; gap: 8px; }
    </style>
</head>
<body>
    <div class="circle circle-1"></div>
    <div class="circle circle-2"></div>

    <div class="auth-container">
        <div class="header-box">
            <i class="fas fa-shield-alt fa-4x"></i>
            <h2>Admin Login</h2>
            <p>Authorized Access Only</p>
        </div>

        <form action="auth.php" method="POST">
            
            <input type="hidden" name="target_role" value="admin">
            
            <div class="form-group">
                <label>Username Admin</label>
                <div class="input-icon-wrapper">
                    <input type="text" name="username" class="form-control" placeholder="ID Administrator" required>
                    <i class="fas fa-user-shield"></i>
                </div>
            </div>

            <div class="form-group">
                <label>Password</label>
                <div class="input-icon-wrapper">
                    <input type="password" name="password" class="form-control" placeholder="••••••••" required>
                    <i class="fas fa-key"></i>
                </div>
            </div>

            <button type="submit" name="login" class="btn-auth">Verify & Login</button>
        </form>

        <div class="footer-link">
            <a href="index.php"><i class="fas fa-long-arrow-alt-left"></i> Back to Website</a>
        </div>
    </div>
</body>
</html>