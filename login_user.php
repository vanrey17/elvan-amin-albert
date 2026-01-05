<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Siswa | Ascendia School</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        /* Import Google Font */
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap');

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
        }

        body {
            /* Background dengan gradasi mesh modern */
            background: radial-gradient(at 0% 0%, rgba(243, 156, 18, 0.15) 0, transparent 50%), 
                        radial-gradient(at 100% 100%, rgba(211, 84, 0, 0.15) 0, transparent 50%),
                        #f8f9fa;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            overflow: hidden;
            position: relative;
        }

        /* Elemen Lingkaran Dekoratif */
        .circle {
            position: absolute;
            border-radius: 50%;
            background: linear-gradient(135deg, #f39c12, #e67e22);
            z-index: -1;
            filter: blur(1px);
            opacity: 0.6;
        }
        .circle-1 { width: 300px; height: 300px; top: -100px; left: -100px; }
        .circle-2 { width: 200px; height: 200px; bottom: -50px; right: -50px; opacity: 0.4; }

        /* Container Utama Glassmorphism */
        .auth-container {
            background: rgba(255, 255, 255, 0.7);
            backdrop-filter: blur(15px);
            -webkit-backdrop-filter: blur(15px); /* Untuk Safari */
            border: 1px solid rgba(255, 255, 255, 0.4);
            width: 100%;
            max-width: 420px;
            padding: 40px;
            border-radius: 30px;
            box-shadow: 0 25px 45px rgba(0,0,0,0.1);
            text-align: center;
            animation: slideUp 0.8s ease;
        }

        @keyframes slideUp {
            from { opacity: 0; transform: translateY(30px); }
            to { opacity: 1; transform: translateY(0); }
        }

        .header-box i {
            background: linear-gradient(135deg, #f39c12, #e67e22);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            margin-bottom: 15px;
            display: inline-block;
        }

        .header-box h2 {
            font-size: 28px;
            color: #2c3e50;
            font-weight: 700;
            margin-bottom: 5px;
        }

        .header-box p {
            color: #7f8c8d;
            font-size: 14px;
            margin-bottom: 30px;
        }

        /* Form Styling */
        .form-group {
            margin-bottom: 20px;
            text-align: left;
        }

        .form-group label {
            font-size: 13px;
            font-weight: 600;
            color: #34495e;
            margin-left: 5px;
        }

        .input-icon-wrapper {
            position: relative;
            margin-top: 5px;
        }

        .input-icon-wrapper i {
            position: absolute;
            left: 15px;
            top: 50%;
            transform: translateY(-50%);
            color: #bdc3c7;
            transition: 0.3s;
        }

        .form-control {
            width: 100%;
            padding: 14px 15px 14px 45px;
            background: rgba(255, 255, 255, 0.9);
            border: 2px solid transparent;
            border-radius: 15px;
            font-size: 14px;
            transition: 0.3s;
            box-shadow: 0 5px 15px rgba(0,0,0,0.02);
        }

        .form-control:focus {
            outline: none;
            border-color: #f39c12;
            background: #fff;
            box-shadow: 0 10px 20px rgba(243, 156, 18, 0.1);
        }

        .form-control:focus + i {
            color: #f39c12;
        }

        /* Button Gradient Mewah */
        .btn-auth {
            width: 100%;
            padding: 15px;
            margin-top: 10px;
            background: linear-gradient(135deg, #f39c12 0%, #e67e22 100%);
            color: white;
            border: none;
            border-radius: 15px;
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
            transition: 0.4s;
            box-shadow: 0 10px 20px rgba(243, 156, 18, 0.3);
        }

        .btn-auth:hover {
            transform: translateY(-3px);
            box-shadow: 0 15px 30px rgba(243, 156, 18, 0.4);
            filter: brightness(1.1);
        }

        .btn-auth:active {
            transform: translateY(0);
        }

        /* Footer Link */
        .footer-link {
            margin-top: 25px;
            font-size: 14px;
            color: #7f8c8d;
        }

        .footer-link a {
            color: #e67e22;
            text-decoration: none;
            font-weight: 700;
            transition: 0.3s;
        }

        .footer-link a:hover {
            text-decoration: underline;
        }

        .back-home {
            display: inline-block;
            margin-top: 20px;
            color: #bdc3c7 !important;
            font-weight: 400 !important;
            font-size: 12px;
        }
    </style>
</head>
<body>
    <div class="circle circle-1"></div>
    <div class="circle circle-2"></div>

    <div class="auth-container">
        <div class="header-box">
            <i class="fas fa-graduation-cap fa-4x"></i>
            <h2>Portal Siswa</h2>
            <p>Ascendia School Learning System</p>
        </div>

        <form action="auth.php" method="POST">
            <input type="hidden" name="target_role" value="siswa">
            
            <div class="form-group">
                <label>Username</label>
                <div class="input-icon-wrapper">
                    <input type="text" name="username" class="form-control" placeholder="Masukkan username anda" required>
                    <i class="fas fa-user"></i>
                </div>
            </div>

            <div class="form-group">
                <label>Password</label>
                <div class="input-icon-wrapper">
                    <input type="password" name="password" class="form-control" placeholder="••••••••" required>
                    <i class="fas fa-lock"></i>
                </div>
            </div>

            <button type="submit" name="login" class="btn-auth">Masuk Sekarang</button>
        </form>

        <div class="footer-link">
            Belum punya akun? <a href="register.php">Daftar Akun Baru</a><br>
            <a href="index.php" class="back-home"><i class="fas fa-arrow-left"></i> Kembali ke Beranda</a>
        </div>
    </div>
</body>
</html>