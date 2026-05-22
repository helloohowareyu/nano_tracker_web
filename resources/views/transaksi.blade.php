<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Transaksi - Nano Tracker</title>
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

        .nav-logout img {
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
            padding: 24px 32px;
            overflow-y: auto;
        }

        .content-header {
            display: flex;
            justify-content: flex-end;
            margin-bottom: 24px;
        }

        .btn-add {
            display: flex;
            align-items: center;
            gap: 8px;
            padding: 12px 20px;
            background-color: var(--color-white);
            border: 2px solid var(--color-navy);
            border-radius: 25px;
            font-size: 14px;
            font-weight: 600;
            color: var(--color-navy);
            cursor: pointer;
            transition: all 0.2s;
        }

        .btn-add:hover {
            background-color: var(--color-navy);
            color: var(--color-white);
        }

        .btn-add svg {
            width: 20px;
            height: 20px;
        }

        .transaction-list {
            display: flex;
            flex-direction: column;
            gap: 20px;
        }

        .transaction-group {
            background-color: #fff;
            border: 2px solid var(--color-navy);
            border-radius: 12px;
            overflow: hidden;
        }

        .transaction-group-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 14px 24px;
            background-color: var(--color-navy);
            color: #fff;
        }

        .transaction-date {
            font-size: 14px;
            font-weight: 600;
            color: #fff;
        }

        .transaction-total {
            font-size: 14px;
            font-weight: 600;
            color: #fff;
        }

        .transaction-item {
            display: grid;
            grid-template-columns: 80px 160px 1fr auto;
            align-items: center;
            padding: 20px 24px;
            border-bottom: 1px solid #E5E7EB;
            gap: 24px;
        }

        .transaction-item:last-child {
            border-bottom: none;
        }

        .transaction-time {
            font-size: 15px;
            color: var(--color-navy);
            font-weight: 600;
        }

        .transaction-type {
            font-size: 15px;
            color: var(--color-navy);
            font-weight: 500;
        }

        .transaction-desc {
            font-size: 15px;
            color: var(--color-navy);
        }

        .transaction-amount {
            font-size: 15px;
            font-weight: 700;
            text-align: right;
        }

        .transaction-amount.expense {
            color: var(--color-expense);
        }

        .transaction-amount.income {
            color: var(--color-income);
        }

        .modal-overlay {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: rgba(0, 0, 0, 0.5);
            backdrop-filter: blur(4px);
            z-index: 1000;
            justify-content: center;
            align-items: flex-start;
            padding: 40px 20px;
            overflow-y: auto;
        }

        .modal-overlay.active {
            display: flex;
        }

        .modal-form {
            background-color: #fff;
            border-radius: 16px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.15);
            width: 100%;
            max-width: 420px;
            overflow: hidden;
            animation: modalSlideIn 0.3s ease;
            margin: auto;
        }

        @keyframes modalSlideIn {
            from {
                opacity: 0;
                transform: translateY(-20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
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
            width: 32px;
            height: 32px;
            display: flex;
            align-items: center;
            justify-content: center;
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
            background-color: #fff;
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
            border-radius: 20px;
            margin: 2px;
        }

        .type-toggle input[value="pengeluaran"]:checked + label {
            background-color: var(--color-expense);
            color: #fff;
        }

        .type-toggle input[value="pemasukan"]:checked + label {
            background-color: var(--color-income);
            color: #fff;
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

        @media (max-width: 1024px) {
            .transaction-item {
                grid-template-columns: 70px 120px 1fr auto;
            }
        }

        @media (max-width: 900px) {
            .top-bar {
                grid-template-columns: 1fr;
            }
        }

        @media (max-width: 768px) {
            .transaction-item {
                grid-template-columns: 1fr 1fr;
                gap: 8px;
            }
            
            .transaction-time {
                order: 1;
            }
            
            .transaction-amount {
                order: 2;
                text-align: right;
            }
            
            .transaction-type {
                order: 3;
            }
            
            .transaction-desc {
                order: 4;
                text-align: right;
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
            <img src="{{ auth()->user()->foto_profil ? asset('storage/' . auth()->user()->foto_profil) : asset('assets/icon-profil.png') }}" alt="Foto Profil" class="profile-pic">
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
                <a href="{{ route('pengaturan') }}">
                    <img src="{{ asset('assets/settings.png') }}" alt="">
                    <span>Pengaturan</span>
                </a>
            </li>
        </ul>

        <div class="nav-logout">
            <form action="{{ route('logout') }}" method="POST" style="display: inline;">
                @csrf
                <button type="submit" style="background: none; border: none; color: var(--color-white); font-size: 18px; font-weight: 700; cursor: pointer; display: flex; align-items: center; gap: 16px; padding: 12px 8px; border-radius: 6px; transition: background-color 0.2s; width: 100%;">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"/>
                        <polyline points="16 17 21 12 16 7"/>
                        <line x1="21" y1="12" x2="9" y2="12"/>
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
            <div class="content-header">
                <button type="button" class="btn-add" onclick="openModal()">
                    Tambah Transaksi
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <circle cx="12" cy="12" r="10"/>
                        <line x1="12" y1="8" x2="12" y2="16"/>
                        <line x1="8" y1="12" x2="16" y2="12"/>
                    </svg>
                </button>
            </div>

            <div class="transaction-list">
                @forelse($groupedTransaksis as $date => $transactions)
                    @php
                        $dailyTotal = 0;
                        foreach($transactions as $t) {
                            if($t->tipe == 'pemasukan') {
                                $dailyTotal += $t->nominal;
                            } else {
                                $dailyTotal -= $t->nominal;
                            }
                        }
                    @endphp
                    <div class="transaction-group">
                        <div class="transaction-group-header">
                            <span class="transaction-date">{{ $date }}</span>
                            <span class="transaction-total">Total Rp{{ number_format(abs($dailyTotal), 0, ',', '.') }}</span>
                        </div>
                        @foreach($transactions as $transaksi)
                            <div class="transaction-item">
                                <span class="transaction-time">{{ \Carbon\Carbon::parse($transaksi->waktu_transaksi)->format('H:i') }}</span>
                                <span class="transaction-type">{{ $transaksi->kategori }}</span>
                                <span class="transaction-desc">{{ $transaksi->catatan ?? '-' }}</span>
                                <span class="transaction-amount {{ $transaksi->tipe == 'pengeluaran' ? 'expense' : 'income' }}">
                                    Rp{{ number_format($transaksi->nominal, 0, ',', '.') }}
                                </span>
                            </div>
                        @endforeach
                    </div>
                @empty
                    <div style="text-align: center; padding: 40px; color: #6B7280;">
                        Belum ada transaksi
                    </div>
                @endforelse
            </div>
        </main>
    </div>

    <div class="modal-overlay" id="modalOverlay">
        <div class="modal-form">
            <div class="modal-header">
                <h3 class="modal-title">Tambah Transaksi</h3>
                <button type="button" class="modal-close" onclick="closeModal()">&times;</button>
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
                        <input type="number" name="nominal" id="nominal" class="form-input" placeholder="Rp" required>
                    </div>

                    <div class="form-group">
                        <label class="form-label" for="kategori">Kategori</label>
                        <input type="text" name="kategori" id="kategori" class="form-input neutral" required>
                    </div>

                    <div class="form-group">
                        <label class="form-label">Tanggal dan Waktu</label>
                        <div class="datetime-row">
                            <div class="input-with-icon">
                                <input type="datetime-local" name="waktu_transaksi" id="waktu_transaksi" class="form-input neutral" required>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="form-label" for="catatan">Catatan</label>
                        <textarea name="catatan" id="catatan" class="form-textarea" placeholder="Catatan singkat detail transaksi"></textarea>
                    </div>

                    <button type="submit" class="btn-submit">Konfirmasi</button>
                </form>
            </div>
        </div>
    </div>

    <script>
        function openModal() {
            document.getElementById('modalOverlay').classList.add('active');
            document.body.style.overflow = 'hidden';
        }

        function closeModal() {
            document.getElementById('modalOverlay').classList.remove('active');
            document.body.style.overflow = '';
        }

        document.getElementById('modalOverlay').addEventListener('click', function(e) {
            if (e.target === this) {
                closeModal();
            }
        });

        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape') {
                closeModal();
            }
        });
    </script>
</body>
</html>
