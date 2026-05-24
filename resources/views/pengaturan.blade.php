<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pengaturan</title>
    <style>
        :root {
            --color-navy: #002244;
            --color-white: #F8F9FA;
            --color-text-muted: #6B7280;
            --color-label: #5B7A99;
            --color-teal: #2BA5B5;
            --color-expense: #D32F2F;
            --color-income: #00E532;
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

        /* Sidebar */
        .sidebar {
            width: 250px;
            min-height: 100vh;
            background-color: var(--color-navy);
            display: flex;
            flex-direction: column;
            padding: 20px 0;
            flex-shrink: 0;
            position: relative;
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
            flex: 1;
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

        .nav-logout {
            padding: 0 20px 20px;
        }

        .nav-logout a {
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

        .nav-logout a:hover {
            background-color: rgba(255, 255, 255, 0.08);
        }

        .nav-logout svg {
            width: 24px;
            height: 24px;
        }

        /* Main Wrapper */
        .main-wrapper {
            flex: 1;
            display: flex;
            flex-direction: column;
            min-width: 0;
        }

        /* Top Bar */
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

        /* Content Area */
        .content {
            flex: 1;
            background-color: var(--color-white);
            padding: 60px 80px;
            overflow-y: auto;
        }


        .settings-grid {
            display: grid;
            grid-template-columns: 1.2fr 0.8fr;
            gap: 40px;
            max-width: 1100px;
            align-items: start;
        }

        .settings-card {
            background-color: #fff;
            border-radius: 16px;
            box-shadow: 0 10px 30px rgba(0, 34, 68, 0.05);
            padding: 32px;
            border: 1px solid rgba(0, 34, 68, 0.04);
            width: 100%;
        }

        .settings-card-title {
            font-size: 18px;
            font-weight: 700;
            color: var(--color-navy);
            margin-bottom: 24px;
            border-bottom: 2px solid #F3F4F6;
            padding-bottom: 12px;
        }

        .settings-form {
            width: 100%;
        }

        .form-group {
            margin-bottom: 24px;
        }

        .form-label {
            display: block;
            font-size: 16px;
            font-weight: 500;
            color: var(--color-label);
            margin-bottom: 8px;
        }

        .form-input {
            width: 100%;
            padding: 14px 16px;
            border: 2px solid var(--color-navy);
            border-radius: 8px;
            font-size: 14px;
            color: var(--color-navy);
            outline: none;
            transition: border-color 0.2s;
            background-color: #fff;
        }

        .form-input:focus {
            border-color: var(--color-teal);
        }

        .form-input::placeholder {
            color: var(--color-text-muted);
        }

        .btn-submit {
            padding: 14px 48px;
            background-color: var(--color-navy);
            color: #fff;
            border: none;
            border-radius: 25px;
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
            transition: opacity 0.2s;
            margin-top: 16px;
        }

        .btn-submit:hover {
            opacity: 0.9;
        }

        /* Profile Photo Section */
        .profile-section {
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 20px;
        }

        .profile-photo-wrapper {
            position: relative;
            width: 220px;
            height: 220px;
            border-radius: 50%;
            cursor: pointer;
            overflow: visible;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .profile-photo-large {
            width: 100%;
            height: 100%;
            border-radius: 50%;
            object-fit: cover;
            border: 4px solid #fff;
            box-shadow: 0 8px 20px rgba(0, 34, 68, 0.1);
            background-color: #fff;
            transition: all 0.3s ease;
        }

        .profile-photo-wrapper:hover .profile-photo-large {
            transform: scale(1.02);
            box-shadow: 0 10px 25px rgba(0, 34, 68, 0.15);
        }

        .profile-photo-overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            border-radius: 50%;
            background-color: rgba(0, 34, 68, 0.6);
            backdrop-filter: blur(2px);
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            opacity: 0;
            transition: opacity 0.3s ease;
            color: #fff;
            gap: 8px;
            border: 4px solid transparent;
            z-index: 1;
        }

        .profile-photo-wrapper:hover .profile-photo-overlay {
            opacity: 1;
        }

        .profile-overlay-icon {
            width: 28px;
            height: 28px;
        }

        .profile-overlay-text {
            font-size: 13px;
            font-weight: 600;
            letter-spacing: 0.5px;
        }

        .profile-photo-badge {
            position: absolute;
            bottom: 8px;
            right: 8px;
            background-color: var(--color-navy);
            border: 3px solid #fff;
            width: 44px;
            height: 44px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #fff;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.15);
            transition: all 0.3s ease;
            z-index: 2;
        }

        .profile-photo-wrapper:hover .profile-photo-badge {
            transform: scale(1.1);
            background-color: #003366;
        }

        .profile-info {
            text-align: center;
            margin-top: 20px;
            width: 100%;
        }

        .profile-name-large {
            font-size: 20px;
            font-weight: 700;
            color: var(--color-navy);
            margin-bottom: 4px;
        }

        .profile-email-small {
            font-size: 14px;
            color: var(--color-text-muted);
            margin-bottom: 16px;
        }

        .profile-badge-active {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            background-color: #DEF7EC;
            color: #03543F;
            font-size: 12px;
            font-weight: 600;
            padding: 6px 12px;
            border-radius: 12px;
            margin-bottom: 8px;
        }

        .profile-badge-dot {
            width: 8px;
            height: 8px;
            border-radius: 50%;
            background-color: #31C48D;
        }

        .profile-meta-text {
            font-size: 12px;
            color: var(--color-text-muted);
            margin-top: 8px;
        }

        .danger-zone-card {
            background-color: #FFF5F5;
            border: 1px dashed #FEB2B2;
            border-radius: 12px;
            padding: 20px;
            margin-top: 32px;
            text-align: center;
            width: 100%;
        }

        .danger-zone-title {
            color: #C53030;
            font-size: 15px;
            font-weight: 700;
            margin-bottom: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
        }

        .danger-zone-desc {
            color: #742A2A;
            font-size: 12px;
            line-height: 1.5;
            margin-bottom: 16px;
        }

        .btn-danger-outline {
            padding: 10px 20px;
            background-color: transparent;
            color: #C53030;
            border: 2px solid #C53030;
            border-radius: 20px;
            font-size: 13px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.2s ease;
            width: 100%;
            outline: none;
        }

        .btn-danger-outline:hover {
            background-color: #C53030;
            color: #fff;
        }

        .btn-warning-outline {
            padding: 10px 20px;
            background-color: transparent;
            color: #FF9500;
            border: 2px solid #FF9500;
            border-radius: 20px;
            font-size: 13px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.2s ease;
            width: 100%;
            outline: none;
        }

        .btn-warning-outline:hover {
            background-color: #FF9500;
            color: #fff;
        }

        /* Read-only info rows */
        .info-row {
            margin-bottom: 24px;
            padding-bottom: 16px;
            border-bottom: 1px solid #F3F4F6;
        }

        .info-row:last-of-type {
            border-bottom: none;
            margin-bottom: 32px;
        }

        .info-label {
            font-size: 13px;
            font-weight: 600;
            color: var(--color-text-muted);
            text-transform: uppercase;
            letter-spacing: 0.5px;
            margin-bottom: 6px;
        }

        .info-value {
            font-size: 16px;
            font-weight: 500;
            color: var(--color-navy);
        }

        .btn-edit-profile {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
            padding: 14px 28px;
            background-color: var(--color-navy);
            color: #fff;
            border: none;
            border-radius: 25px;
            font-size: 15px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.2s ease;
            width: 100%;
        }

        .btn-edit-profile:hover {
            opacity: 0.9;
            transform: translateY(-1px);
            box-shadow: 0 4px 12px rgba(0, 34, 68, 0.15);
        }

        /* Hidden file input */
        .hidden-input {
            display: none;
        }

        /* Responsive */
        @media (max-width: 1024px) {
            .settings-grid {
                grid-template-columns: 1fr;
                gap: 32px;
            }

            .content {
                padding: 40px;
            }
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

            .content {
                padding: 24px;
            }

            .profile-photo-large {
                width: 160px;
                height: 160px;
            }

            .change-photo-btn {
                font-size: 18px;
            }
        }

        /* Gaya untuk tombol Hapus Akun Utama */
        .btn-danger {
            padding: 14px 48px;
            background-color: var(--color-expense);
            color: #fff;
            border: none;
            border-radius: 25px;
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
            transition: opacity 0.2s;
            margin-top: 12px;
            display: inline-block;
        }

        .btn-danger:hover {
            opacity: 0.9;
        }

        /* Modal Overlay (Latar belakang gelap transparan) */
        .modal-overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.6);
            display: flex;
            justify-content: center;
            align-items: center;
            z-index: 9999;
            backdrop-filter: blur(4px);
        }

        /* Kotak Modal */
        .modal-box {
            background-color: #fff;
            padding: 32px;
            border-radius: 16px;
            max-width: 450px;
            width: 90%;
            text-align: center;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.2);
            border: 2px solid var(--color-navy);
        }

        .modal-title {
            color: var(--color-navy);
            font-size: 20px;
            font-weight: 700;
            margin-bottom: 12px;
        }

        .modal-text {
            color: var(--color-text-muted);
            font-size: 14px;
            line-height: 1.6;
            margin-bottom: 24px;
        }

        .modal-actions {
            display: flex;
            justify-content: center;
            gap: 16px;
        }

        /* Tombol Batal */
        .btn-cancel {
            padding: 12px 24px;
            background-color: #E5E7EB;
            color: var(--color-navy);
            border: none;
            border-radius: 8px;
            font-weight: 600;
            cursor: pointer;
            transition: background-color 0.2s;
        }

        .btn-cancel:hover {
            background-color: #D1D5DB;
        }

        /* Tombol Konfirmasi Hapus */
        .btn-confirm-delete {
            padding: 12px 24px;
            background-color: var(--color-expense);
            color: #fff;
            border: none;
            border-radius: 8px;
            font-weight: 600;
            cursor: pointer;
            transition: opacity 0.2s;
        }

        .btn-confirm-delete:hover {
            opacity: 0.9;
        }

        .nav-item img,
        .nav-logout img {
            filter: brightness(0) invert(1);
        }

        /* Dark Mode Styles */
        body.dark-mode {
            background-color: #0d1117;
            color: #c9d1d9;
        }

        body.dark-mode .main-wrapper {
            background-color: #0d1117;
        }

        body.dark-mode .content {
            background-color: #0d1117;
        }

        body.dark-mode .sidebar {
            background-color: #161b22;
            border-right: 1px solid #30363d;
        }

        body.dark-mode .stat-card {
            background-color: #161b22;
            border: 1px solid #30363d;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.2);
        }

        body.dark-mode .stat-icon {
            filter: brightness(0) invert(1);
        }

        body.dark-mode .stat-label {
            color: #8b949e;
        }

        body.dark-mode .stat-value {
            color: #f0f6fc;
        }

        body.dark-mode .chart-card,
        body.dark-mode .transaction-card,
        body.dark-mode .settings-card {
            background-color: #161b22;
            border: 1px solid #30363d;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.2);
        }

        body.dark-mode .chart-card-title,
        body.dark-mode .transaction-card-title,
        body.dark-mode .settings-card-title {
            color: #f0f6fc;
            border-bottom: 2px solid #30363d;
        }

        body.dark-mode .transaction-group-header {
            background-color: #0d1117;
            border: 1px solid #30363d;
        }

        body.dark-mode .transaction-date {
            color: #8b949e;
        }

        body.dark-mode .transaction-total {
            color: #f0f6fc;
        }

        body.dark-mode .transaction-item {
            background-color: #161b22;
            border: 1px solid #21262d;
            color: #c9d1d9;
        }

        body.dark-mode .transaction-title {
            color: #f0f6fc;
        }

        body.dark-mode .transaction-desc {
            color: #8b949e;
        }

        body.dark-mode .transaction-time {
            color: #8b949e;
        }

        body.dark-mode .info-row {
            border-bottom: 1px solid #21262d;
        }

        body.dark-mode .info-value {
            color: #f0f6fc;
        }

        body.dark-mode .form-label {
            color: #c9d1d9;
        }

        body.dark-mode .form-input {
            background-color: #0d1117;
            border-color: #30363d;
            color: #f0f6fc;
        }

        body.dark-mode .form-input:focus {
            border-color: var(--color-teal);
        }

        body.dark-mode .modal-box {
            background-color: #161b22;
            border: 1px solid #30363d;
            color: #c9d1d9;
        }

        body.dark-mode .modal-title {
            color: #f0f6fc;
            border-bottom-color: #30363d;
        }

        body.dark-mode .modal-text {
            color: #8b949e;
        }

        body.dark-mode .profile-name-large {
            color: #f0f6fc;
        }

        body.dark-mode .profile-badge-active {
            background-color: #0e4429;
            color: #3fb950;
        }

        /* Danger Zone dark-mode overrides */
        body.dark-mode .danger-zone-card {
            background-color: #2c1616;
            border-color: #8c3232;
        }

        body.dark-mode .danger-zone-desc {
            color: #fca5a5;
        }

        body.dark-mode div[style*="border-bottom: 1px solid #E5E7EB"] {
            border-bottom-color: #30363d !important;
        }

        body.dark-mode div[style*="color: var(--color-navy)"] {
            color: #f0f6fc !important;
        }

        body.dark-mode .profile-name {
            color: #f0f6fc !important;
        }
    </style>
</head>

<body class="{{ auth()->user()->mode_tampilan === 'dark' ? 'dark-mode' : '' }}">
    <aside class="sidebar">
        <div class="sidebar-logo">
            <img src="{{ asset('assets/main_logo.png') }}" alt="Nano Tracker Logo">
        </div>

        <div class="profile">
            <img src="{{ auth()->user()->foto_profil ? asset('storage/' . auth()->user()->foto_profil) : asset('assets/icon-profil.png') }}"
                alt="Foto Profil" class="profile-pic"
                onerror="this.onerror=null; this.src='{{ asset('assets/icon-profil.png') }}';">
            <div class="profile-name">Selamat Datang,<br>{{ auth()->user()->nama_lengkap }}</div>
        </div>

        <ul class="nav-menu">
            <li class="nav-item">
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
            <li class="nav-item active">
                <a href="{{ route('pengaturan') }}">
                    <img src="{{ asset('assets/settings.png') }}" alt="">
                    <span>Pengaturan</span>
                </a>
            </li>
        </ul>

        <div class="nav-logout">
            <form action="{{ route('logout') }}" method="POST" style="display: inline;">
                @csrf
                <button type="submit"
                    style="background: none; border: none; color: var(--color-white); font-size: 18px; font-weight: 700; cursor: pointer; display: flex; align-items: center; gap: 16px; padding: 12px 8px; border-radius: 6px; transition: background-color 0.2s; width: 100%;">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round">
                        <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4" />
                        <polyline points="16 17 21 12 16 7" />
                        <line x1="21" y1="12" x2="9" y2="12" />
                    </svg>
                    <span>Logout</span>
                </button>
            </form>
        </div>
    </aside>

    <div class="main-wrapper">
        <header class="top-bar">
            <div class="stat-card">
                <img src="{{ asset('assets/Coin.png') }}" alt="" class="stat-icon">
                <div class="stat-content">
                    <div class="stat-label">Pengeluaran</div>
                    <div class="stat-value">{{ auth()->user()->formatUang($pengeluaran ?? 0) }}</div>
                </div>
            </div>
            <div class="stat-card">
                <img src="{{ asset('assets/Coin - masuk.png') }}" alt="" class="stat-icon">
                <div class="stat-content">
                    <div class="stat-label">Pemasukan</div>
                    <div class="stat-value">{{ auth()->user()->formatUang($pemasukan ?? 0) }}</div>
                </div>
            </div>
            <div class="stat-card">
                <img src="{{ asset('assets/saldo.png') }}" alt="" class="stat-icon">
                <div class="stat-content">
                    <div class="stat-label">Total Saldo</div>
                    <div class="stat-value">{{ auth()->user()->formatUang($total ?? 0) }}</div>
                </div>
            </div>
        </header>

        <main class="content">
            @if (session('error'))
                <div
                    style="background-color: #fee2e2; color: #dc2626; padding: 16px; border-radius: 8px; margin-bottom: 24px; border: 1px solid #fecaca;">
                    {{ session('error') }}
                </div>
            @endif

            @if (session('success'))
                <div
                    style="background-color: #dcfce7; color: #16a34a; padding: 16px; border-radius: 8px; margin-bottom: 24px; border: 1px solid #bbf7d0;">
                    {{ session('success') }}
                </div>
            @endif

            @if ($errors->any())
                <div
                    style="background-color: #fee2e2; color: #dc2626; padding: 16px; border-radius: 8px; margin-bottom: 24px; border: 1px solid #fecaca;">
                    <ul style="margin: 0; padding-left: 20px;">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class="settings-grid">
                <!-- KOLOM KIRI CONTAINER -->
                <div style="display: flex; flex-direction: column; gap: 32px; width: 100%;">
                    <!-- KARTU KIRI 1: Rincian Profil (Read-Only) -->
                    <div class="settings-card">
                        <h3 class="settings-card-title">Informasi Akun & Keamanan</h3>

                        <div class="info-row">
                            <div class="info-label">Nama Lengkap</div>
                            <div class="info-value">{{ auth()->user()->nama_lengkap }}</div>
                        </div>

                        <div class="info-row">
                            <div class="info-label">Alamat Email</div>
                            <div class="info-value">{{ auth()->user()->email }}</div>
                        </div>

                        <div class="info-row">
                            <div class="info-label">Kata Sandi (Password)</div>
                            <div class="info-value" style="letter-spacing: 3px; font-family: monospace;">••••••••</div>
                        </div>

                        <button type="button" class="btn-edit-profile" onclick="openEditProfileModal()">
                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                            </svg>
                            Edit Profil & Keamanan
                        </button>
                    </div>

                    <!-- KARTU KIRI 2: Preferensi Aplikasi -->
                    <div class="settings-card">
                        <h3 class="settings-card-title">Preferensi Aplikasi & Data</h3>
                        <form action="{{ route('pengaturan.preferensi') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label class="form-label" for="pref_mata_uang">Mata Uang</label>
                                <select name="mata_uang" id="pref_mata_uang" class="form-input">
                                    <option value="Rp"
                                        {{ auth()->user()->mata_uang === 'Rp' || !auth()->user()->mata_uang ? 'selected' : '' }}>
                                        Rupiah (Rp)</option>
                                    <option value="$" {{ auth()->user()->mata_uang === '$' ? 'selected' : '' }}>
                                        Dollar ($)</option>
                                    <option value="€" {{ auth()->user()->mata_uang === '€' ? 'selected' : '' }}>
                                        Euro (€)</option>
                                    <option value="¥" {{ auth()->user()->mata_uang === '¥' ? 'selected' : '' }}>
                                        Yen (¥)</option>
                                </select>
                            </div>

                            <div class="form-group" style="margin-bottom: 24px;">
                                <label class="form-label" for="pref_mode_tampilan">Mode Tampilan</label>
                                <select name="mode_tampilan" id="pref_mode_tampilan" class="form-input">
                                    <option value="light"
                                        {{ auth()->user()->mode_tampilan === 'light' || !auth()->user()->mode_tampilan ? 'selected' : '' }}>
                                        Mode Terang</option>
                                    <option value="dark"
                                        {{ auth()->user()->mode_tampilan === 'dark' ? 'selected' : '' }}>Mode Gelap
                                    </option>
                                </select>
                            </div>

                            <button type="submit" class="btn-edit-profile"
                                style="background-color: var(--color-teal); margin-bottom: 16px;">
                                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M8 7H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-3m-1 4l-3 3m0 0l-3-3m3 3V4" />
                                </svg>
                                Simpan Preferensi
                            </button>
                        </form>

                        <div style="border-top: 1px solid #F3F4F6; padding-top: 16px; margin-top: 16px;">
                            <div
                                style="font-size: 13px; font-weight: 600; color: var(--color-text-muted); text-transform: uppercase; margin-bottom: 8px;">
                                Ekspor Riwayat</div>
                            <a href="{{ route('pengaturan.ekspor') }}" class="btn-edit-profile"
                                style="background-color: #4B5563; text-decoration: none; color: #fff;">
                                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4" />
                                </svg>
                                Unduh Data Transaksi (CSV)
                            </a>
                        </div>
                    </div>
                </div>

                <!-- KARTU KANAN: Pusat Akun & Area Bahaya -->
                <div class="settings-card" style="display: flex; flex-direction: column; align-items: center;">
                    <h3 class="settings-card-title" style="width: 100%; text-align: left;">Pusat Akun</h3>

                    <div class="profile-section">
                        <div class="profile-photo-wrapper" id="profilePhotoWrapper"
                            title="Klik untuk Ubah Foto Profil">
                            <img src="{{ auth()->user()->foto_profil ? asset('storage/' . auth()->user()->foto_profil) : asset('assets/icon-profil.png') }}"
                                alt="Foto Profil" class="profile-photo-large" id="profilePhotoPreview"
                                onerror="this.onerror=null; this.src='{{ asset('assets/icon-profil.png') }}';">
                            <div class="profile-photo-overlay">
                                <svg xmlns="http://www.w3.org/2000/svg" class="profile-overlay-icon" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M3 9a2 2 0 012-2h.93a2 2 0 001.664-.89l.812-1.22A2 2 0 0110.07 4h3.86a2 2 0 011.664.89l.812 1.22A2 2 0 0018.07 7H19a2 2 0 012 2v9a2 2 0 01-2 2H5a2 2 0 01-2-2V9z" />
                                    <circle cx="12" cy="13" r="3" stroke-linecap="round"
                                        stroke-linejoin="round" />
                                </svg>
                                <span class="profile-overlay-text">Ubah Foto</span>
                            </div>
                            <div class="profile-photo-badge">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M3 9a2 2 0 012-2h.93a2 2 0 001.664-.89l.812-1.22A2 2 0 0110.07 4h3.86a2 2 0 011.664.89l.812 1.22A2 2 0 0018.07 7H19a2 2 0 012 2v9a2 2 0 01-2 2H5a2 2 0 01-2-2V9z" />
                                    <circle cx="12" cy="13" r="3" stroke-linecap="round"
                                        stroke-linejoin="round" />
                                </svg>
                            </div>
                        </div>
                        @if (auth()->user()->foto_profil)
                            <button type="button" class="btn-danger-outline" id="btnShowDeletePhotoModal"
                                style="width: auto; margin-top: 8px; padding: 8px 16px; font-size: 13px; border-radius: 20px; display: flex; align-items: center; gap: 6px; cursor: pointer; transition: all 0.2s;">
                                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                </svg>
                                Hapus Foto
                            </button>
                        @endif

                        <div class="profile-info">
                            <div class="profile-name-large">{{ auth()->user()->nama_lengkap }}</div>
                            <div class="profile-email-small">{{ auth()->user()->email }}</div>
                            <div class="profile-badge-active">
                                <span class="profile-badge-dot"></span>
                                Akun Aktif
                            </div>
                            <div class="profile-meta-text">
                                Bergabung sejak:
                                {{ auth()->user()->created_at ? auth()->user()->created_at->translatedFormat('d F Y') : 'Baru saja' }}
                            </div>
                        </div>

                        <!-- AREA BAHAYA -->
                        <div class="danger-zone-card">
                            <div class="danger-zone-title" style="color: var(--color-expense);">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                                </svg>
                                Zona Bahaya & Keamanan
                            </div>

                            <!-- Section 1: Reset Data -->
                            <div style="border-bottom: 1px solid #E5E7EB; padding-bottom: 16px; margin-bottom: 16px;">
                                <div
                                    style="font-weight: 700; font-size: 14px; color: var(--color-navy); margin-bottom: 6px;">
                                    Reset Data Transaksi</div>
                                <p class="danger-zone-desc" style="margin-bottom: 12px;">
                                    Menghapus seluruh riwayat transaksi Anda. Saldo Anda akan kembali ke 0. Tindakan ini
                                    tidak dapat dibatalkan.
                                </p>
                                <button type="button" class="btn-warning-outline" id="btnShowResetModal">Reset Data</button>
                            </div>

                            <!-- Section 2: Hapus Akun -->
                            <div>
                                <div
                                    style="font-weight: 700; font-size: 14px; color: var(--color-navy); margin-bottom: 6px;">
                                    Hapus Akun Permanen</div>
                                <p class="danger-zone-desc" style="margin-bottom: 12px;">
                                    Menghapus akun Anda secara permanen beserta seluruh data transaksi dari sistem kami.
                                </p>
                                <button type="button" class="btn-danger-outline" id="btnShowDeleteModal">Hapus
                                    Akun</button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- MODAL EDIT PROFIL -->
                <form action="{{ route('pengaturan.update') }}" method="POST" enctype="multipart/form-data"
                    id="profileUpdateForm">
                    @csrf
                    @method('PUT')
                    <div id="editProfileModal" class="modal-overlay" style="display: none;">
                        <div class="modal-box" style="text-align: left; max-width: 500px;">
                            <div
                                style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 24px; border-bottom: 2px solid #F3F4F6; padding-bottom: 12px;">
                                <h3 class="modal-title" style="margin: 0;">Edit Profil & Keamanan</h3>
                                <button type="button" onclick="closeEditProfileModal()"
                                    style="background: none; border: none; font-size: 24px; cursor: pointer; color: var(--color-text-muted);">&times;</button>
                            </div>

                            <div class="form-group">
                                <label class="form-label" for="nama_lengkap">Nama Lengkap</label>
                                <input type="text" name="nama_lengkap" id="nama_lengkap" class="form-input"
                                    value="{{ auth()->user()->nama_lengkap }}" required>
                            </div>

                            <div class="form-group">
                                <label class="form-label" for="email">Email</label>
                                <input type="email" name="email" id="email" class="form-input"
                                    value="{{ auth()->user()->email }}" required>
                            </div>

                            <div class="form-group">
                                <label class="form-label" for="password">Password Baru</label>
                                <input type="password" name="password" id="password" class="form-input"
                                    placeholder="Kosongkan jika tidak ingin diubah">
                            </div>

                            <div class="form-group">
                                <label class="form-label" for="password_confirmation">Konfirmasi Password Baru</label>
                                <input type="password" name="password_confirmation" id="password_confirmation"
                                    class="form-input" placeholder="Konfirmasi password baru">
                            </div>

                            <input type="file" name="foto_profil" id="fotoProfilInput" accept="image/*"
                                style="display: none;">
                            <input type="hidden" name="foto_profil_base64" id="fotoProfilBase64">

                            <div style="display: flex; justify-content: flex-end; gap: 16px; margin-top: 32px;">
                                <button type="button" class="btn-cancel" onclick="closeEditProfileModal()"
                                    style="margin: 0; padding: 12px 28px;">Batal</button>
                                <button type="submit" class="btn-confirm-delete"
                                    style="margin: 0; padding: 12px 28px; background-color: var(--color-navy);">Simpan
                                    Perubahan</button>
                            </div>
                        </div>
                    </div>
                </form>
        </main>
    </div>

    <div id="deleteAccountModal" class="modal-overlay" style="display: none;">
        <div class="modal-box">
            <h3 class="modal-title">Hapus Akun Permanen?</h3>
            <p class="modal-text">Tindakan ini tidak dapat dibatalkan. Semua data transaksi Anda akan dihapus secara
                permanen.</p>

            <div class="modal-actions">
                <button type="button" class="btn-cancel" id="btnCancelDelete">Batal</button>
                <form action="{{ route('pengaturan.destroy') }}" method="POST" style="display: inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn-confirm-delete">Ya, Hapus Akun</button>
                </form>
            </div>
        </div>
    </div>

    <!-- MODAL RESET DATA -->
    <div id="resetDataModal" class="modal-overlay" style="display: none;">
        <div class="modal-box">
            <h3 class="modal-title" style="color: #FF9500;">Reset Semua Data Transaksi?</h3>
            <p class="modal-text">Tindakan ini tidak dapat dibatalkan. Semua data transaksi Anda akan dihapus permanen
                dari sistem kami dan saldo Anda akan kembali menjadi 0.</p>

            <div class="modal-actions">
                <button type="button" class="btn-cancel" id="btnCancelReset">Batal</button>
                <form action="{{ route('pengaturan.reset') }}" method="POST" style="display: inline;">
                    @csrf
                    <button type="submit" class="btn-confirm-delete" style="background-color: #FF9500;">Ya, Reset
                        Data</button>
                </form>
            </div>
        </div>
    </div>

    <!-- MODAL KONFIRMASI UBAH FOTO -->
    <div id="confirmPhotoModal" class="modal-overlay" style="display: none;">
        <div class="modal-box" style="max-width: 400px; text-align: center;">
            <h3 class="modal-title">Ubah Foto Profil?</h3>
            <p class="modal-text" style="margin-bottom: 20px;">Apakah Anda yakin ingin memperbarui foto profil Anda
                dengan foto yang dipilih?</p>

            <div
                style="margin: 20px auto; width: 120px; height: 120px; border-radius: 50%; overflow: hidden; border: 4px solid var(--color-navy); box-shadow: 0 4px 12px rgba(0,0,0,0.15); display: flex; justify-content: center; align-items: center; background-color: #f3f4f6;">
                <img id="photoConfirmPreview" src="" alt="Pratinjau Foto"
                    style="width: 100%; height: 100%; object-fit: cover;">
            </div>

            <div class="modal-actions" style="display: flex; justify-content: center; gap: 16px; margin-top: 24px;">
                <button type="button" class="btn-cancel" id="btnCancelPhoto"
                    style="margin: 0; padding: 10px 24px;">Batal</button>
                <button type="button" class="btn-confirm-delete" id="btnConfirmPhoto"
                    style="margin: 0; padding: 10px 24px; background-color: var(--color-navy);">Ya, Perbarui</button>
            </div>
        </div>
    </div>

    <!-- MODAL HAPUS FOTO PROFIL -->
    <div id="deletePhotoModal" class="modal-overlay" style="display: none;">
        <div class="modal-box" style="max-width: 400px; text-align: center;">
            <h3 class="modal-title" style="color: var(--color-expense);">Hapus Foto Profil?</h3>
            <p class="modal-text">Apakah Anda yakin ingin menghapus foto profil Anda? Gambar profil Anda akan kembali
                menggunakan gambar bawaan.</p>

            <div class="modal-actions" style="display: flex; justify-content: center; gap: 16px; margin-top: 24px;">
                <button type="button" class="btn-cancel" id="btnCancelDeletePhoto"
                    style="margin: 0; padding: 10px 24px;">Batal</button>
                <form action="{{ route('pengaturan.hapus_foto') }}" method="POST" style="display: inline;">
                    @csrf
                    <button type="submit" class="btn-confirm-delete" style="margin: 0; padding: 10px 24px;">Ya,
                        Hapus</button>
                </form>
            </div>
        </div>
    </div>

    <script>
        let selectedPhotoBase64 = null;

        document.getElementById('profilePhotoWrapper').addEventListener('click', function() {
            document.getElementById('fotoProfilInput').click();
        });

        document.getElementById('fotoProfilInput').addEventListener('change', function(e) {
            const file = e.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    selectedPhotoBase64 = e.target.result;
                    document.getElementById('photoConfirmPreview').src = selectedPhotoBase64;
                    // Tampilkan modal konfirmasi foto
                    document.getElementById('confirmPhotoModal').style.display = 'flex';
                };
                reader.readAsDataURL(file);
            }
        });

        // Event listener konfirmasi foto
        const confirmPhotoModal = document.getElementById('confirmPhotoModal');
        const btnCancelPhoto = document.getElementById('btnCancelPhoto');
        const btnConfirmPhoto = document.getElementById('btnConfirmPhoto');

        btnCancelPhoto.addEventListener('click', function() {
            document.getElementById('fotoProfilInput').value = '';
            selectedPhotoBase64 = null;
            confirmPhotoModal.style.display = 'none';
        });

        btnConfirmPhoto.addEventListener('click', function() {
            if (selectedPhotoBase64) {
                document.getElementById('fotoProfilBase64').value = selectedPhotoBase64;
                document.getElementById('profilePhotoPreview').src = selectedPhotoBase64;
                // Submit form otomatis setelah dikonfirmasi
                document.getElementById('profileUpdateForm').submit();
            }
            confirmPhotoModal.style.display = 'none';
        });

        const deleteModal = document.getElementById('deleteAccountModal');
        const btnShowDelete = document.getElementById('btnShowDeleteModal');
        const btnCancelDelete = document.getElementById('btnCancelDelete');

        btnShowDelete.addEventListener('click', function() {
            deleteModal.style.display = 'flex';
        });

        btnCancelDelete.addEventListener('click', function() {
            deleteModal.style.display = 'none';
        });

        const resetModal = document.getElementById('resetDataModal');
        const btnShowReset = document.getElementById('btnShowResetModal');
        const btnCancelReset = document.getElementById('btnCancelReset');

        btnShowReset.addEventListener('click', function() {
            resetModal.style.display = 'flex';
        });

        btnCancelReset.addEventListener('click', function() {
            resetModal.style.display = 'none';
        });

        const deletePhotoModal = document.getElementById('deletePhotoModal');
        const btnShowDeletePhoto = document.getElementById('btnShowDeletePhotoModal');
        const btnCancelDeletePhoto = document.getElementById('btnCancelDeletePhoto');

        if (btnShowDeletePhoto) {
            btnShowDeletePhoto.addEventListener('click', function() {
                deletePhotoModal.style.display = 'flex';
            });
        }

        if (btnCancelDeletePhoto) {
            btnCancelDeletePhoto.addEventListener('click', function() {
                deletePhotoModal.style.display = 'none';
            });
        }

        window.addEventListener('click', function(e) {
            if (e.target === deleteModal) {
                deleteModal.style.display = 'none';
            }
            if (e.target === resetModal) {
                resetModal.style.display = 'none';
            }
            if (e.target === deletePhotoModal) {
                deletePhotoModal.style.display = 'none';
            }
            if (e.target === confirmPhotoModal) {
                document.getElementById('fotoProfilInput').value = '';
                selectedPhotoBase64 = null;
                confirmPhotoModal.style.display = 'none';
            }
        });

        // Modal Edit Profile Javascript
        const editProfileModal = document.getElementById('editProfileModal');

        function openEditProfileModal() {
            editProfileModal.style.display = 'flex';
            document.body.style.overflow = 'hidden';
        }

        function closeEditProfileModal() {
            editProfileModal.style.display = 'none';
            document.body.style.overflow = '';
        }

        editProfileModal.addEventListener('click', function(e) {
            if (e.target === editProfileModal) {
                closeEditProfileModal();
            }
        });
    </script>

    @if(auth()->user()->mode_tampilan === 'dark')
        <div style="position: fixed; bottom: 20px; right: 20px; background: rgba(255, 149, 0, 0.15); border: 1px solid #FF9500; color: #FF9500; padding: 8px 16px; border-radius: 30px; font-size: 12px; font-weight: 600; display: flex; align-items: center; gap: 8px; box-shadow: 0 4px 12px rgba(0,0,0,0.25); z-index: 9999; backdrop-filter: blur(4px);">
            <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
            </svg>
            Beta: Mode Gelap dalam pengembangan
        </div>
    @endif
</body>

</html>
