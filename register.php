<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrasi Siswa Baru | Ascendia School</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap');

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
        }

        body {
            background: radial-gradient(at 0% 100%, rgba(243, 156, 18, 0.15) 0, transparent 50%), 
                        radial-gradient(at 100% 0%, rgba(211, 84, 0, 0.15) 0, transparent 50%),
                        #f8f9fa;
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 20px;
            position: relative;
            overflow-x: hidden;
        }

        /* Elemen Lingkaran Dekoratif */
        .circle {
            position: absolute;
            border-radius: 50%;
            background: linear-gradient(135deg, #f39c12, #e67e22);
            z-index: -1;
            filter: blur(2px);
        }
        .circle-1 { width: 400px; height: 400px; top: -150px; right: -100px; opacity: 0.5; }
        .circle-2 { width: 250px; height: 250px; bottom: -80px; left: -50px; opacity: 0.3; }

        .auth-container {
            background: rgba(255, 255, 255, 0.75);
            backdrop-filter: blur(15px);
            -webkit-backdrop-filter: blur(15px);
            border: 1px solid rgba(255, 255, 255, 0.4);
            width: 100%;
            max-width: 480px; /* Sedikit lebih lebar dari login */
            padding: 40px;
            border-radius: 30px;
            box-shadow: 0 25px 45px rgba(0,0,0,0.1);
            animation: fadeIn 0.8s ease-out;
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: scale(0.95); }
            to { opacity: 1; transform: scale(1); }
        }

        .header-box {
            text-align: center;
            margin-bottom: 30px;
        }

        .header-box i {
            font-size: 50px;
            background: linear-gradient(135deg, #f39c12, #e67e22);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            margin-bottom: 10px;
        }

        .header-box h2 {
            font-size: 26px;
            color: #2c3e50;
            font-weight: 700;
        }

        .header-box p {
            color: #7f8c8d;
            font-size: 14px;
        }

        .form-group {
            margin-bottom: 18px;
        }

        .form-group label {
            display: block;
            font-size: 13px;
            font-weight: 600;
            color: #34495e;
            margin-bottom: 6px;
            margin-left: 5px;
        }

        .input-icon-wrapper {
            position: relative;
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
            background: rgba(255, 255, 255, 0.8);
            border: 2px solid transparent;
            border-radius: 15px;
            font-size: 14px;
            transition: 0.3s;
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

        .btn-auth {
            width: 100%;
            padding: 15px;
            margin-top: 15px;
            background: linear-gradient(135deg, #f39c12 0%, #d35400 100%);
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
            filter: brightness(1.05);
        }

        .footer-link {
            text-align: center;
            margin-top: 25px;
            font-size: 14px;
            color: #7f8c8d;
        }

        .footer-link a {
            color: #e67e22;
            text-decoration: none;
            font-weight: 700;
        }

        .footer-link a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="circle circle-1"></div>
    <div class="circle circle-2"></div>

    <div class="auth-container">
        <div class="header-box">
            <i class="fas fa-user-plus"></i>
            <h2>Daftar Akun</h2>
            <p>Lengkapi data pendaftaran siswa baru</p>
        </div>

        <form action="auth.php" method="POST">
            <div class="form-group">
                <label>Nama Lengkap</label>
                <div class="input-icon-wrapper">
                    <input type="text" name="nama" class="form-control" placeholder="Masukkan nama sesuai ijazah" required>
                    <i class="fas fa-address-card"></i>
                </div>
            </div>

            <div class="form-group">
                <label>Username</label>
                <div class="input-icon-wrapper">
                    <input type="text" name="username" class="form-control" placeholder="Buat username unik" required>
                    <i class="fas fa-user"></i>
                </div>
            </div>

            <div class="form-group">
                <label>Password</label>
                <div class="input-icon-wrapper">
                    <input type="password" name="password" class="form-control" placeholder="Minimal 6 karakter" required>
                    <i class="fas fa-lock"></i>
                </div>
            </div>

            <button type="submit" name="register" class="btn-auth">Buat Akun Sekarang</button>
        </form>

        <div class="footer-link">
            Sudah memiliki akun? <a href="login_user.php">Masuk di sini</a>
        </div>
    </div>
</body>
</html>