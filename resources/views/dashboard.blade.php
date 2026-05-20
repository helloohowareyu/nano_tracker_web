<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Nano Tracker</title>
    <style>
        :root {
            --color-navy: #002244;
            --color-white: #F8F9FA;
            --color-text-muted: #6B7280;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: var(--color-white);
            min-height: 100vh;
            display: flex;
        }

        .sidebar {
            width: 250px;
            min-height: 100vh;
            background-color: var(--color-navy);
            display: flex;
            flex-direction: column;
            padding: 20px 0;
            flex-shrink: 0;
        }

        .sidebar-logo {
            padding: 0 20px 24px;
        }

        .sidebar-logo img {
            height: 50px;
            width: auto;
            display: block;
        }

        .profile {
            display: flex;
            flex-direction: column;
            align-items: center;
            padding: 20px;
            gap: 12px;
        }

        .profile-pic {
            width: 80px;
            height: 80px;
            border-radius: 50%;
            object-fit: cover;
            background-color: var(--color-white);
        }

        .profile-name {
            color: var(--color-white);
            font-size: 16px;
            font-weight: 700;
            text-align: center;
            line-height: 1.4;
        }

        .nav-menu {
            list-style: none;
            margin-top: 40px;
            display: flex;
            flex-direction: column;
            gap: 8px;
            padding: 0 20px;
        }

        .nav-item a {
            display: flex;
            align-items: center;
            gap: 16px;
            padding: 12px 8px;
            color: var(--color-white);
            text-decoration: none;
            font-size: 18px;
            font-weight: 700;
            border-radius: 6px;
            transition: background-color 0.2s;
        }

        .nav-item a:hover,
        .nav-item.active a {
            background-color: rgba(255, 255, 255, 0.08);
        }

        .nav-item img {
            width: 24px;
            height: 24px;
            object-fit: contain;
        }

        .main-wrapper {
            flex: 1;
            display: flex;
            flex-direction: column;
            min-width: 0;
        }

        .top-bar {
            background-color: var(--color-navy);
            padding: 20px 32px;
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 24px;
        }

        .stat-card {
            background-color: var(--color-white);
            border-radius: 10px;
            padding: 14px 20px;
            display: flex;
            align-items: center;
            gap: 16px;
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.15);
        }

        .stat-icon {
            width: 40px;
            height: 40px;
            object-fit: contain;
            flex-shrink: 0;
        }

        .stat-content {
            flex: 1;
            display: flex;
            flex-direction: column;
            align-items: center;
            text-align: center;
        }

        .stat-label {
            font-size: 14px;
            font-weight: 700;
            color: var(--color-navy);
        }

        .stat-value {
            font-size: 14px;
            color: var(--color-navy);
            margin-top: 2px;
        }

        .content {
            flex: 1;
            background-color: var(--color-white);
            padding: 32px;
        }

        @media (max-width: 900px) {
            .top-bar {
                grid-template-columns: 1fr;
            }
        }

        @media (max-width: 700px) {
            body {
                flex-direction: column;
            }
            .sidebar {
                width: 100%;
                min-height: auto;
            }
        }
    </style>
</head>
<body>
    <aside class="sidebar">
        <div class="sidebar-logo">
            <img src="{{ asset('assets/main_logo.png') }}" alt="Nano Tracker Logo">
        </div>

        <div class="profile">
            <img src="{{ asset('assets/icon-profil.png') }}" alt="Foto Profil" class="profile-pic">
            <div class="profile-name">Selamat Datang, {{ auth()->user()->nama_lengkap }}</div>
        </div>

        <ul class="nav-menu">
            <li class="nav-item active">
                <a href="{{ route('dashboard') }}">
                    <img src="{{ asset('assets/layout-dashboard.png') }}" alt="">
                    <span>Dashboard</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('transaksi.index') }}">
                    <img src="{{ asset('assets/badge-dollar-sign.png') }}" alt="">
                    <span>Transaksi</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="">
                    <img src="{{ asset('assets/settings.png') }}" alt="">
                    <span>Pengaturan</span>
                </a>
            </li>
        </ul>
    </aside>

    <div class="main-wrapper">
        <header class="top-bar">
            <div class="stat-card">
                <img src="{{ asset('assets/Coin.png') }}" alt="" class="stat-icon">
                <div class="stat-content">
                    <div class="stat-label">Pengeluaran</div>
                    <div class="stat-value">Rp{{ number_format($pengeluaran ?? 0, 0, ',', '.') }}</div>
                </div>
            </div>
            <div class="stat-card">
                <img src="{{ asset('assets/Coin - masuk.png') }}" alt="" class="stat-icon">
                <div class="stat-content">
                    <div class="stat-label">Pemasukan</div>
                    <div class="stat-value">Rp{{ number_format($pemasukan ?? 0, 0, ',', '.') }}</div>
                </div>
            </div>
            <div class="stat-card">
                <img src="{{ asset('assets/saldo.png') }}" alt="" class="stat-icon">
                <div class="stat-content">
                    <div class="stat-label">Total Saldo</div>
                    <div class="stat-value">Rp{{ number_format($total ?? 0, 0, ',', '.') }}</div>
                </div>
            </div>
        </header>

        <main class="content">
            {{-- Konten dashboard di sini --}}
        </main>
    </div>
</body>
</html>
