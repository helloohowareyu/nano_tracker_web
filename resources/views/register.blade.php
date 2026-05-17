<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #0d1a2e 0%, #1a2a40 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .container {
            display: flex;
            background: white;
            border-radius: 20px;
            overflow: hidden;
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.3);
            max-width: 1000px;
            width: 90%;
        }
        .form-section {
            flex: 1;
            padding: 60px 50px;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }
        .logo-section {
            flex: 1;
            background: linear-gradient(135deg, #0d1a2e 0%, #1a2a40 100%);
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 60px;
        }
        .logo-content {
            text-align: center;
            color: white;
        }
        .logo-content h2 {
            font-size: 48px;
            font-weight: bold;
            margin-bottom: 10px;
        }
        .logo-content .nano {
            color: #4CAF50;
        }
        .logo-content p {
            font-size: 18px;
            opacity: 0.8;
        }
        h1 {
            color: #0d1a2e;
            font-size: 28px;
            margin-bottom: 30px;
            font-weight: 600;
        }
        form {
            display: flex;
            flex-direction: column;
            gap: 20px;
        }
        label {
            color: #333;
            font-size: 14px;
            font-weight: 500;
            margin-bottom: 5px;
            display: block;
        }
        input {
            width: 100%;
            padding: 12px 15px;
            border: 2px solid #e0e0e0;
            border-radius: 8px;
            font-size: 14px;
            transition: border-color 0.3s;
        }
        input:focus {
            outline: none;
            border-color: #4CAF50;
        }
        button[type="submit"] {
            background: #4CAF50;
            color: white;
            border: none;
            padding: 14px;
            border-radius: 8px;
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
            transition: background 0.3s;
        }
        button[type="submit"]:hover {
            background: #45a049;
        }
        .separator {
            text-align: center;
            color: #999;
            font-size: 14px;
            margin: 20px 0;
        }
        .google-btn {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
            background: white;
            color: #333;
            border: 2px solid #e0e0e0;
            padding: 12px;
            border-radius: 8px;
            font-size: 14px;
            font-weight: 500;
            cursor: pointer;
            transition: all 0.3s;
            text-decoration: none;
        }
        .google-btn:hover {
            background: #f5f5f5;
            border-color: #ddd;
        }
        .google-btn img {
            width: 20px;
            height: 20px;
        }
        .google-btn p {
            margin: 0;
        }
        .login-link {
            text-align: center;
            margin-top: 20px;
            color: #666;
            font-size: 14px;
        }
        .login-link a {
            color: #4CAF50;
            text-decoration: none;
            font-weight: 600;
        }
        .login-link a:hover {
            text-decoration: underline;
        }
        @media (max-width: 768px) {
            .container {
                flex-direction: column;
            }
            .logo-section {
                display: none;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="form-section">
            <h1>MULAI LACAK KEUANGANMU</h1>
            <form action="{{ route('register') }}" method="POST">
                @csrf
                <div>
                    <label for="nama_depan">Nama Depan</label>
                    <input type="text" name="nama_depan" placeholder="Masukkan nama depan kamu" required>
                </div>
                <div>
                    <label for="nama_belakang">Nama Belakang</label>
                    <input type="text" name="nama_belakang" placeholder="Masukkan nama belakang kamu" required>
                </div>
                <div>
                    <label for="email">Email</label>
                    <input type="email" name="email" placeholder="Masukkan email kamu" required>
                </div>
                <div>
                    <label for="password">Password</label>
                    <input type="password" name="password" placeholder="Masukkan password kamu" required>
                </div>
                <div>
                    <label for="password_confirmation">Konfirmasi Password</label>
                    <input type="password" name="password_confirmation" placeholder="Konfirmasi password kamu" required>
                </div>
                <button type="submit">Daftar</button>
            </form>

            <p class="separator">━━━━━━━━━━━━━━ atau ━━━━━━━━━━━━━━</p>

            <a href="{{ route('login.google') }}" class="google-btn">
                <img src="{{ asset('assets/google-icon.png') }}" alt="Google">
                <p>Masuk dengan Google</p>
            </a>

            <p class="login-link">Sudah punya akun? <a href="{{ route('login') }}">Masuk Sekarang</a></p>
        </div>
        <div class="logo-section">
            <div class="logo-content">
                <h2><span class="nano">NANO</span> TRACKER</h2>
                <p>Kelola Keuangan Anda dengan Cerdas</p>
            </div>
        </div>
    </div>
</body>
</html>