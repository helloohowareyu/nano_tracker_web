<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Akun</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        :root {
            --color-white: #F8F9FA;
            --color-navy: #002244;
            --color-card: #D9D9D9;
            --color-green: #00C853;
        }

        body {
            width: 100%;
            min-height: 100vh;
            background-color: var(--color-navy);
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        .top-bar {
            width: 100%;
            height: 60px;
            background-color: var(--color-white);
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
            background-color: var(--color-navy);
        }

        .login-card {
            width: 100%;
            max-width: 420px;
            background-color: var(--color-card);
            border-radius: 20px;
            padding: 50px 40px;
            display: flex;
            flex-direction: column;
            gap: 20px;
        }

        .login-title {
            text-align: center;
            font-size: 32px;
            font-weight: 800;
            color: var(--color-navy);
            margin-bottom: 10px;
            letter-spacing: 0.5px;
        }

        .alert {
            border-radius: 12px;
            padding: 14px 18px;
            margin-bottom: 18px;
            font-size: 14px;
            line-height: 1.4;
        }

        .alert-success {
            background-color: #e6f4ea;
            color: #1d6d3a;
            border: 1px solid #b7d8bb;
        }

        .form-group {
            display: flex;
            flex-direction: column;
            gap: 6px;
        }

        .form-group label {
            font-size: 14px;
            color: var(--color-navy);
            font-weight: 500;
        }

        .form-group input {
            width: 100%;
            background-color: var(--color-white);
            border: none;
            border-radius: 10px;
            padding: 12px 14px;
            font-size: 14px;
            color: var(--color-navy);
            outline: none;
        }

        .form-group input:focus {
            box-shadow: 0 0 0 2px rgba(0, 34, 68, 0.15);
        }

        .btn-submit {
            align-self: center;
            background-color: var(--color-white);
            color: #000;
            border: none;
            border-radius: 10px;
            padding: 12px 50px;
            font-size: 15px;
            font-weight: 500;
            cursor: pointer;
            margin-top: 10px;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
        }

        .btn-submit:hover {
            background-color: #fff;
        }

        .divider {
            display: flex;
            align-items: center;
            gap: 12px;
            margin: 4px 0;
        }

        .divider::before,
        .divider::after {
            content: "";
            flex: 1;
            height: 1px;
            background-color: var(--color-navy);
            opacity: 0.6;
        }

        .divider span {
            font-size: 14px;
            font-weight: 700;
            color: var(--color-navy);
        }

        .btn-google {
            align-self: center;
            display: inline-flex;
            align-items: center;
            gap: 10px;
            background-color: var(--color-white);
            color: var(--color-navy);
            border: 1px solid rgba(0, 34, 68, 0.2);
            border-radius: 10px;
            padding: 10px 20px;
            font-size: 13px;
            cursor: pointer;
            text-decoration: none;
        }

        .btn-google img {
            width: 18px;
            height: 18px;
        }

        .register-text {
            text-align: center;
            font-size: 13px;
            font-weight: 600;
            color: var(--color-navy);
            margin-top: 4px;
        }

        .register-text a {
            color: var(--color-green);
            text-decoration: none;
            font-weight: 600;
            margin-left: 4px;
        }

        .register-text a:hover {
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
        <div class="login-card">
            <h1 class="login-title">LOGIN AKUN</h1>
            @if (session('success'))
                <div class="alert alert-success"
                    style="background-color: #d4edda; color: #155724; padding: 10px; border-radius: 5px; margin-bottom: 15px;">
                    {{ session('success') }}
                </div>
            @endif

            <form action="{{ route('login') }}" method="POST">
                @csrf

                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" required>
                </div>

                <div style="height: 16px;"></div>

                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" id="password" name="password" required>
                    @error('password')
                        <div style="color:#d32f2f; font-size: 12px; margin-top: 6px;">{{ $message }}</div>
                    @enderror
                </div>
                <div style="display:flex; justify-content:center;">
                    <button type="submit" class="btn-submit">Masuk</button>
                </div>
            </form>

            <div class="divider"><span>atau</span></div>

            <a href="{{ route('login.google') }}" class="btn-google">
                <img src="{{ asset('assets/google-icon.png') }}" alt="Google Icon">
                Masuk dengan google
            </a>

            <p class="register-text">
                Belum punya akun? <a href="{{ route('register') }}">Daftar Sekarang</a>
            </p>
        </div>
    </div>
</body>

</html>
