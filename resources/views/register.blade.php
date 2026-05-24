<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrasi Akun</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #002244;
            min-height: 100vh;
        }

        .top-bar {
            width: 100%;
            height: 60px;
            background-color: #F8F9FA;
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0px 30px;
        }

        .logo-link {
            display: flex;
            align-items: center;
        }

        .top-bar img {
            height: 50px;
            width: auto;
        }

        .back-link {
            color: var(--color-navy);
            text-decoration: none;
            font-size: 14px;
            font-weight: 600;
            transition: opacity 0.2s ease;
        }

        .back-link:hover {
            opacity: 0.8;
        }

        .page-wrapper {
            width: 100%;
            min-height: calc(100vh - 60px);
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 40px 20px;
            background-color: #002244;
        }

        .register-card {
            background-color: #D9D9D9;
            border-radius: 20px;
            width: 100%;
            max-width: 420px;
            padding: 40px 35px;
        }

        .register-card h1 {
            color: #002244;
            font-size: 28px;
            font-weight: 800;
            text-align: center;
            margin-bottom: 30px;
            letter-spacing: 0.5px;
        }

        form {
            display: flex;
            flex-direction: column;
            gap: 16px;
        }

        .form-group {
            display: flex;
            flex-direction: column;
        }

        label {
            color: #002244;
            font-size: 13px;
            font-weight: 500;
            margin-bottom: 6px;
            display: block;
        }

        input {
            width: 100%;
            padding: 10px 14px;
            border: none;
            border-radius: 10px;
            background-color: #F8F9FA;
            font-size: 14px;
            color: #002244;
            outline: none;
        }

        input:focus {
            box-shadow: 0 0 0 2px #002244;
        }

        .btn-daftar {
            display: block;
            margin: 18px auto 0;
            background-color: #F8F9FA;
            color: #002244;
            border: none;
            padding: 10px 50px;
            border-radius: 10px;
            font-size: 15px;
            font-weight: 500;
            cursor: pointer;
            transition: background 0.2s;
        }

        .btn-daftar:hover {
            background-color: #ffffff;
        }

        .separator {
            display: flex;
            align-items: center;
            gap: 10px;
            margin: 22px 0 16px;
        }

        .separator::before,
        .separator::after {
            content: "";
            flex: 1;
            height: 1px;
            background-color: #002244;
            opacity: 0.6;
        }

        .separator span {
            color: #002244;
            font-size: 13px;
            font-weight: 700;
        }

        .google-btn {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            width: max-content;
            margin: 0 auto;
            background-color: #F8F9FA;
            color: #002244;
            border: 1px solid #002244;
            padding: 8px 18px;
            border-radius: 10px;
            font-size: 13px;
            font-weight: 500;
            cursor: pointer;
            text-decoration: none;
            transition: background 0.2s;
        }

        .google-btn:hover {
            background-color: #ffffff;
        }

        .google-btn svg {
            width: 18px;
            height: 18px;
        }

        .login-link {
            text-align: center;
            margin-top: 18px;
            color: #002244;
            font-size: 13px;
        }

        .login-link a {
            color: #22c55e;
            text-decoration: none;
            font-weight: 500;
        }

        .login-link a:hover {
            text-decoration: underline;
        }
    </style>
</head>

<body>
    <div class="top-bar">
        <a href="{{ route('home_page') }}" class="logo-link">
            <img src="{{ asset('assets/logo.png') }}" alt="Nano Tracker Logo">
        </a>
        <a href="{{ route('home_page') }}" class="back-link">
            &larr; Kembali ke Beranda
        </a>
    </div>

    <div class="page-wrapper">
        <div class="register-card">
            <h1>REGISTRASI AKUN</h1>

            <form action="{{ route('register') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="nama_lengkap">Nama Lengkap</label>
                    <input type="text" id="nama_lengkap" name="nama_lengkap" required>
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" required>
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" id="password" name="password" required>
                </div>
                <div class="form-group">
                    <label for="password_confirmation">Konfirmasi Password</label>
                    <input type="password" id="password_confirmation" name="password_confirmation" required>
                </div>

                <button type="submit" class="btn-daftar">Daftar</button>
            </form>

            <div class="separator">
                <span>atau</span>
            </div>

            <a href="{{ route('login.google') }}" class="google-btn">
                <img src="{{ asset('assets/google-icon.png') }}" alt="Google Icon">
                Daftar dengan google
            </a>

            <p class="login-link">
                Sudah punya akun? <a href="{{ route('login') }}">Login Sekarang</a>
            </p>
        </div>
    </div>
</body>

</html>
