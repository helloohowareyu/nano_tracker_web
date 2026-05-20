<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Transaksi</title>
    <style>
        :root {
            --color-navy: #002244;
            --color-white: #F8F9FA;
            --color-text-muted: #6B7280;
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
            display: flex;
            justify-content: center;
            align-items: flex-start;
            padding-top: 60px;
        }

        .modal-form {
            background-color: #fff;
            border-radius: 16px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.15);
            width: 100%;
            max-width: 420px;
            overflow: hidden;
        }

        .modal-header {
            background-color: var(--color-navy);
            padding: 16px 24px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .modal-title {
            color: #fff;
            font-size: 18px;
            font-weight: 700;
        }

        .modal-close {
            background: none;
            border: none;
            color: #fff;
            font-size: 24px;
            cursor: pointer;
            line-height: 1;
            padding: 0;
        }

        .modal-close:hover {
            opacity: 0.8;
        }

        .modal-body {
            padding: 24px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-label {
            display: block;
            font-size: 14px;
            font-weight: 600;
            color: var(--color-navy);
            margin-bottom: 8px;
        }

        .type-toggle {
            display: flex;
            border: 2px solid #E5E7EB;
            border-radius: 25px;
            overflow: hidden;
            position: relative;
        }

        .type-toggle input[type="radio"] {
            display: none;
        }

        .type-toggle label {
            flex: 1;
            padding: 12px 24px;
            text-align: center;
            font-size: 14px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            position: relative;
            z-index: 1;
            color: var(--color-navy);
        }

        .type-toggle input[value="pengeluaran"]:checked + label {
            background-color: var(--color-expense);
            color: #fff;
            border-radius: 20px;
        }

        .type-toggle input[value="pemasukan"]:checked + label {
            background-color: var(--color-income);
            color: #fff;
            border-radius: 20px;
        }

        .form-input {
            width: 100%;
            padding: 12px 16px;
            border: 2px solid var(--color-expense);
            border-radius: 8px;
            font-size: 14px;
            color: var(--color-navy);
            outline: none;
            transition: border-color 0.2s;
        }

        .form-input:focus {
            border-color: var(--color-navy);
        }

        .form-input::placeholder {
            color: var(--color-text-muted);
        }

        .form-input.neutral {
            border-color: #E5E7EB;
        }

        .datetime-row {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 12px;
        }

        .input-with-icon {
            position: relative;
        }

        .input-with-icon .form-input {
            padding-right: 44px;
        }

        .input-icon {
            position: absolute;
            right: 12px;
            top: 50%;
            transform: translateY(-50%);
            width: 24px;
            height: 24px;
            pointer-events: none;
        }

        .form-textarea {
            width: 100%;
            padding: 12px 16px;
            border: 2px solid #E5E7EB;
            border-radius: 8px;
            font-size: 14px;
            color: var(--color-navy);
            outline: none;
            resize: vertical;
            min-height: 100px;
            font-family: inherit;
            transition: border-color 0.2s;
        }

        .form-textarea:focus {
            border-color: var(--color-navy);
        }

        .form-textarea::placeholder {
            color: var(--color-text-muted);
        }

        .btn-submit {
            width: 100%;
            padding: 14px 24px;
            background-color: var(--color-navy);
            color: #fff;
            border: none;
            border-radius: 25px;
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
            transition: opacity 0.2s;
            margin-top: 8px;
        }

        .btn-submit:hover {
            opacity: 0.9;
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
                padding: 20px;
                padding-top: 40px;
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
            <div class="profile-name">Selamat Datang,<br>{{ auth()->user()->nama_lengkap }}</div>
        </div>

        <ul class="nav-menu">
            <li class="nav-item">
                <a href="{{ route('dashboard') }}">
                    <img src="{{ asset('assets/layout-dashboard.png') }}" alt="">
                    <span>Dashboard</span>
                </a>
            </li>
            <li class="nav-item active">
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
                    <div class="stat-value">Rp{{ number_format($pengeluaran->sum('nominal') ?? 0, 0, ',', '.') }}</div>
                </div>
            </div>
            <div class="stat-card">
                <img src="{{ asset('assets/Coin - masuk.png') }}" alt="" class="stat-icon">
                <div class="stat-content">
                    <div class="stat-label">Pemasukan</div>
                    <div class="stat-value">Rp{{ number_format($pemasukan->sum('nominal') ?? 0, 0, ',', '.') }}</div>
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
            <div class="modal-form">
                <div class="modal-header">
                    <h3 class="modal-title">Tambah Transaksi</h3>
                    <button type="button" class="modal-close">&times;</button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('transaksi.store') }}" method="POST">
                        @csrf

                        <div class="form-group">
                            <label class="form-label">Type</label>
                            <div class="type-toggle">
                                <input type="radio" name="tipe" id="pengeluaran" value="pengeluaran" checked>
                                <label for="pengeluaran">Pengeluaran</label>
                                <input type="radio" name="tipe" id="pemasukan" value="pemasukan">
                                <label for="pemasukan">Pemasukan</label>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="form-label" for="nominal">Nominal Transaksi</label>
                            <input type="number" name="nominal" id="nominal" class="form-input" placeholder="Rp" step="0.01" required>
                        </div>

                        <div class="form-group">
                            <label class="form-label" for="kategori">Kategori</label>
                            <input type="text" name="kategori" id="kategori" class="form-input neutral" required>
                        </div>

                        <div class="form-group">
                            <label class="form-label" for="tanggal_waktu">Tanggal dan Waktu</label>
                            <input type="datetime-local" name="tanggal_waktu" id="tanggal_waktu" class="form-input neutral" required>
                        </div>

                        <div class="form-group">
                            <label class="form-label" for="catatan">Catatan</label>
                            <textarea name="catatan" id="catatan" class="form-textarea" placeholder="Catatan singkat detail transaksi"></textarea>
                        </div>

                        <button type="submit" class="btn-submit">Konfirmasi</button>
                    </form>
                </div>
            </div>
        </main>
    </div>
</body>
</html>