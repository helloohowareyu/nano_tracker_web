<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HomePage</title>
     <style>
        :root {
            --color-top-bar: #D9D9D9;
            --color-bg: #FFFFFF;
            --color-navy: #002244;
            --color-text: #002244;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: var(--color-bg);
            color: var(--color-text);
            min-height: 100vh;
        }

        .top-bar {
            background-color: var(--color-top-bar);
            width: 100%;
            padding: 16px 48px;
            display: flex;
            align-items: center;
            justify-content: flex-start;
            padding-left: 30px;
            }

        .top-bar-inner {
            max-width: 1280px;
            margin: 0 auto;
            display: flex;
            align-items: center;
            justify-content: flex-start;
        }

        .logo {
            height: 50px;
            width: auto;
        }

        .main-content {
            max-width: 1280px;
            margin: 0 auto;
            padding: 64px 48px;
        }

        .hero {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 48px;
            margin-bottom: 96px;
        }

        .hero-text {
            flex: 1;
            max-width: 620px;
        }

        .hero-title {
            font-size: 56px;
            font-weight: 800;
            line-height: 1.15;
            color: var(--color-navy);
            margin-bottom: 32px;
        }

        .hero-subtitle {
            font-size: 18px;
            line-height: 1.6;
            color: var(--color-navy);
            margin-bottom: 48px;
        }

        .btn-cta {
            display: inline-block;
            background-color: var(--color-navy);
            color: #FFFFFF;
            padding: 16px 36px;
            border-radius: 999px;
            text-decoration: none;
            font-size: 18px;
            font-weight: 600;
            transition: opacity 0.2s ease;
        }

        .btn-cta:hover {
            opacity: 0.9;
        }

        .hero-image {
            flex: 1;
            display: flex;
            justify-content: center;
        }

        .hero-image img {
            max-width: 100%;
            height: auto;
        }

        .features {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 32px;
        }

        .feature-card {
            border: 1.5px solid var(--color-navy);
            border-radius: 16px;
            padding: 36px 28px;
            text-align: center;
            background-color: var(--color-bg);
        }

        .feature-title {
            font-size: 24px;
            font-weight: 700;
            color: var(--color-navy);
            margin-bottom: 20px;
        }

        .feature-desc {
            font-size: 14px;
            line-height: 1.6;
            color: var(--color-navy);
        }

        @media (max-width: 900px) {
            .hero {
                flex-direction: column;
                text-align: center;
            }

            .hero-title {
                font-size: 40px;
            }

            .features {
                grid-template-columns: 1fr;
            }

            .main-content {
                padding: 40px 24px;
            }
        }
    </style>
</head>
<body>
    <header class="top-bar">
        <img src="{{ asset('assets/logo.png') }}" alt="Nano Tracker Logo" class="logo">
    </header>

    <main class="main-content">
        <section class="hero">
            <div class="hero-text">
                <h1 class="hero-title">
                    Selamat Datang
                    <br>
                    di Nano Tracker!
                </h1>
                <p class="hero-subtitle">
                    Website pencatatan keuangan Anda yang cerdas dan
                    mudah. Mulai kelola uang Anda lebih baik.
                </p>
                <a href="{{ route('register') }}" class="btn-cta">
                    Buat Akun Sekarang!
                </a>
            </div>

            <div class="hero-image">
                <img src="{{ asset('assets/icon-homepage.png') }}" alt="Ilustrasi Nano Tracker">
            </div>
        </section>

        <section class="features">
            <div class="feature-card">
                <h3 class="feature-title">Pencatatan Mudah</h3>
                <p class="feature-desc">
                    Pencatatan Keuangan yang Cepat dan Mudah dilakukan
                    pada satu Platform
                </p>
            </div>

            <div class="feature-card">
                <h3 class="feature-title">Analisis Mendalam</h3>
                <p class="feature-desc">
                    Analisis pencatatan keuangan secara mendalam dengan
                    grafik dan tabel.
                </p>
            </div>

            <div class="feature-card">
                <h3 class="feature-title">Keamanan Data</h3>
                <p class="feature-desc">
                    Data yang disimpan dipastikan aman dan tidak dipergunakan
                    untuk keperluan tidak sah.
                </p>
            </div>
        </section>
    </main>
</body>
</html>