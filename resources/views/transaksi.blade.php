<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Transaksi - Nano Tracker</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
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
            grid-template-columns: 80px 280px 1fr auto;
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

        .transaction-info {
            display: flex;
            flex-direction: row;
            align-items: center;
            gap: 24px;
        }

        .transaction-title {
            font-size: 15px;
            color: var(--color-navy);
            font-weight: 600;
            width: 120px;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }

        .transaction-badge {
            font-size: 15px;
            font-weight: 600;
            color: var(--color-navy);
            background-color: rgba(0, 34, 68, 0.08);
            padding: 3px 10px;
            border-radius: 20px;
            text-transform: capitalize;
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

        .time-input-container {
            display: flex;
            align-items: center;
            gap: 8px;
            width: 100%;
        }

        .time-box {
            text-align: center !important;
            flex: 1;
            padding: 12px 8px !important;
        }

        .time-separator {
            font-size: 18px;
            font-weight: 700;
            color: var(--color-navy);
            user-select: none;
        }

        /* Custom Flatpickr Styling */
        .flatpickr-calendar {
            border: 2px solid var(--color-navy) !important;
            border-radius: 12px !important;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.15) !important;
            font-family: inherit !important;
        }

        .flatpickr-day.selected,
        .flatpickr-day.selected:focus,
        .flatpickr-day.selected:hover {
            background: var(--color-navy) !important;
            border-color: var(--color-navy) !important;
        }

        .flatpickr-months .flatpickr-month {
            background: var(--color-navy) !important;
            color: #fff !important;
            border-top-left-radius: 10px !important;
            border-top-right-radius: 10px !important;
        }

        .flatpickr-current-month .flatpickr-monthDropdown-months {
            background: var(--color-navy) !important;
        }

        .flatpickr-weekdays {
            background: var(--color-navy) !important;
        }

        span.flatpickr-weekday {
            background: var(--color-navy) !important;
            color: #fff !important;
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

        .delete-modal-box {
            background-color: #fff;
            padding: 32px;
            border-radius: 16px;
            max-width: 450px;
            width: 90%;
            text-align: center;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.2);
            border: 2px solid var(--color-navy);
            animation: modalSlideIn 0.3s ease;
            margin: auto;
        }

        .delete-modal-title {
            color: var(--color-navy);
            font-size: 20px;
            font-weight: 700;
            margin-bottom: 12px;
        }

        .delete-modal-text {
            color: var(--color-text-muted);
            font-size: 14px;
            line-height: 1.6;
            margin-bottom: 24px;
        }

        .delete-modal-actions {
            display: flex;
            justify-content: center;
            gap: 16px;
        }

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

        .form-group {
            margin-bottom: 20px;
        }

        .form-label {
            display: flex;
            justify-content: space-between;
            align-items: center;
            font-size: 14px;
            font-weight: 600;
            color: var(--color-navy);
            margin-bottom: 8px;
        }

        .char-counter {
            font-size: 11px;
            color: var(--color-text-muted);
            font-weight: normal;
        }

        .char-counter.limit-reached {
            color: var(--color-expense);
            font-weight: 700;
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

        .type-toggle input[value="pengeluaran"]:checked+label {
            background-color: var(--color-expense);
            color: #fff;
        }

        .type-toggle input[value="pemasukan"]:checked+label {
            background-color: var(--color-income);
            color: #fff;
        }

        .form-input {
            width: 100%;
            padding: 12px 16px;
            border: 2px solid #E5E7EB;
            border-radius: 8px;
            font-size: 14px;
            color: var(--color-navy);
            outline: none;
            transition: border-color 0.2s;
        }

        .form-input.is-invalid {
            border-color: var(--color-expense) !important;
        }

        .form-input:user-invalid {
            border-color: var(--color-expense) !important;
        }

        input::-webkit-outer-spin-button,
        input::-webkit-inner-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }

        input[type=number] {
            -moz-appearance: textfield;
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
            <img src="{{ auth()->user()->foto_profil ? asset('storage/' . auth()->user()->foto_profil) : asset('assets/icon-profil.png') }}"
                alt="Foto Profil" class="profile-pic">
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
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"
                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round">
                        <circle cx="12" cy="12" r="10" />
                        <line x1="12" y1="8" x2="12" y2="16" />
                        <line x1="8" y1="12" x2="16" y2="12" />
                    </svg>
                </button>
            </div>

            <div class="transaction-list">
                @forelse($groupedTransaksis as $date => $transactions)
                    @php
                        $dailyTotal = 0;
                        foreach ($transactions as $t) {
                            if ($t->tipe == 'pemasukan') {
                                $dailyTotal += $t->nominal;
                            } else {
                                $dailyTotal -= $t->nominal;
                            }
                        }
                    @endphp
                    <div class="transaction-group">
                        <div class="transaction-group-header">
                            <span
                                class="transaction-date">{{ \Carbon\Carbon::createFromFormat('d-m-Y', $date)->locale('id')->translatedFormat('l, d-m-Y') }}</span>
                            <span class="transaction-total">Total
                                Rp{{ number_format(abs($dailyTotal), 0, ',', '.') }}</span>
                        </div>
                        @foreach ($transactions as $transaksi)
                            <div class="transaction-item">
                                <span
                                    class="transaction-time">{{ \Carbon\Carbon::parse($transaksi->waktu_transaksi)->format('H:i') }}</span>
                                <div class="transaction-info">
                                    <span class="transaction-title">{{ $transaksi->nama_transaksi }}</span>
                                    <span class="transaction-badge">{{ $transaksi->kategori }}</span>
                                </div>
                                <span class="transaction-desc">{{ $transaksi->catatan ?? '-' }}</span>
                                <div style="display: flex; align-items: center; gap: 16px; justify-self: end;">
                                    <span
                                        class="transaction-amount {{ $transaksi->tipe == 'pengeluaran' ? 'expense' : 'income' }}">
                                        Rp{{ number_format($transaksi->nominal, 0, ',', '.') }}
                                    </span>
                                    <button type="button"
                                        onclick="openEditModal('{{ $transaksi->id }}', '{{ addslashes($transaksi->nama_transaksi) }}', '{{ $transaksi->tipe }}', '{{ $transaksi->nominal }}', '{{ $transaksi->kategori }}', '{{ $transaksi->waktu_transaksi }}', '{{ $transaksi->catatan }}')"
                                        style="background: none; border: none; cursor: pointer; display: flex; align-items: center; justify-content: center;
                                        padding: 6px; border-radius: 50%; color: var(--color-navy); transition: all 0.2s;"
                                        onmouseover="this.style.backgroundColor='rgba(0, 34, 68, 0.08)'"
                                        onmouseout="this.style.backgroundColor='transparent'" title="Edit Transaksi">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                            viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                            stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                                            <path d="M12 20h9" />
                                            <path d="M16.5 3.5a2.12 2.12 0 0 1 3 3L7 19l-4 1 1-4Z" />
                                        </svg>
                                    </button>
                                    <button type="button" onclick="confirmDelete('{{ $transaksi->id }}')"
                                        style="background: none; border: none; cursor: pointer; display: flex; align-items: center; justify-content: center;
                                        padding: 6px; border-radius: 50%; color: var(--color-expense); transition: all 0.2s;"
                                        onmouseover="this.style.backgroundColor='rgba(211, 47, 47, 0.08)'"
                                        onmouseout="this.style.backgroundColor='transparent'" title="Hapus Transaksi">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                            viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                            stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                                            <path d="M3 6h18" />
                                            <path d="M19 6v14c0 1-1 2-2 2H7c-1 0-2-1-2-2V6" />
                                            <path d="M8 6V4c0-1 1-2 2-2h4c1 0 2 1 2 2v2" />
                                        </svg>
                                    </button>
                                </div>
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
                <h3 class="modal-title" id="modalTitle">Tambah Transaksi</h3>
                <button type="button" class="modal-close" onclick="closeModal()">&times;</button>
            </div>
            <div class="modal-body">
                <form id="transaksiForm" action="{{ route('transaksi.store') }}" method="POST">
                    @csrf
                    <input type="hidden" name="_method" id="formMethod" value="POST">
                    <div class="form-group">
                        <label class="form-label" for="nama_transaksi">
                            Nama Transaksi
                            <span class="char-counter" id="nama_transaksi_counter">0/50</span>
                        </label>
                        <input type="text" name="nama_transaksi" id="nama_transaksi"
                            class="form-input neutral @error('nama_transaksi') is-invalid @enderror"
                            placeholder="Contoh: Beli Kopi, Gaji Bulanan" maxlength="50" required>
                    </div>

                    <div class="form-group">
                        <label class="form-label">Jenis Transaksi</label>
                        <div class="type-toggle">
                            <input type="radio" name="tipe" id="pengeluaran" value="pengeluaran" checked>
                            <label for="pengeluaran">Pengeluaran</label>
                            <input type="radio" name="tipe" id="pemasukan" value="pemasukan">
                            <label for="pemasukan">Pemasukan</label>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="form-label" for="nominal">Nominal Transaksi</label>
                        <input type="number" name="nominal" id="nominal"
                            class="form-input @error('nominal') is-invalid @enderror" placeholder="Rp" required>
                    </div>

                    <div class="form-group">
                        <label class="form-label" for="kategori">
                            Kategori
                            <span class="char-counter" id="kategori_counter">0/30</span>
                        </label>
                        <input type="text" name="kategori" id="kategori"
                            class="form-input neutral @error('kategori') is-invalid @enderror" maxlength="30" required>
                    </div>

                    <div class="form-group">
                        <label class="form-label">Tanggal dan Waktu</label>
                        <input type="hidden" name="waktu_transaksi" id="waktu_transaksi" required>
                        <div class="datetime-row">
                            <input type="text" id="tanggal_transaksi" class="form-input neutral"
                                placeholder="Pilih Tanggal" required style="background-color: #fff;">
                            <div class="time-input-container">
                                <input type="text" id="jam_transaksi_hour" class="form-input neutral time-box"
                                    placeholder="HH" maxlength="2" required>
                                <span class="time-separator">:</span>
                                <input type="text" id="jam_transaksi_minute" class="form-input neutral time-box"
                                    placeholder="MM" maxlength="2" required>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="form-label" for="catatan">
                            Catatan
                            <span class="char-counter" id="catatan_counter">0/50</span>
                        </label>
                        <textarea name="catatan" id="catatan" class="form-textarea" placeholder="Catatan singkat detail transaksi" maxlength="50"></textarea>
                    </div>

                    <button type="submit" class="btn-submit">Konfirmasi</button>
                </form>
            </div>
        </div>
    </div>

    <div id="deleteTransactionModal" class="modal-overlay">
        <div class="delete-modal-box">
            <h3 class="delete-modal-title">Hapus Transaksi?</h3>
            <p class="delete-modal-text">Yakin ingin menghapus transaksi ini? Data yang dihapus tidak dapat
                dikembalikan.</p>

            <div class="delete-modal-actions">
                <button type="button" class="btn-cancel" onclick="closeDeleteModal()">Batal</button>
                <form id="deleteTransactionForm" action="" method="POST" style="display: inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn-confirm-delete">Ya, Hapus Transaksi</button>
                </form>
            </div>
        </div>
    </div>

    <script>
        const tanggalPicker = flatpickr("#tanggal_transaksi", {
            dateFormat: "d-m-Y",
            allowInput: true
        });

        function updateCounter(inputId, counterId, maxLength) {
            const input = document.getElementById(inputId);
            const counter = document.getElementById(counterId);
            const length = input ? input.value.length : 0;
            if (counter) {
                counter.innerText = `${length}/${maxLength}`;
                if (length >= maxLength) {
                    counter.classList.add('limit-reached');
                } else {
                    counter.classList.remove('limit-reached');
                }
            }
        }

        document.getElementById('nama_transaksi').addEventListener('input', function() {
            updateCounter('nama_transaksi', 'nama_transaksi_counter', 50);
        });
        document.getElementById('kategori').addEventListener('input', function() {
            updateCounter('kategori', 'kategori_counter', 30);
        });
        document.getElementById('catatan').addEventListener('input', function() {
            updateCounter('catatan', 'catatan_counter', 50);
        });

        function openModal() {
            document.getElementById('modalTitle').innerText = 'Tambah Transaksi';

            const form = document.getElementById('transaksiForm');
            form.action = "{{ route('transaksi.store') }}";

            document.getElementById('formMethod').value = 'POST';

            form.reset();

            const now = new Date();
            const currentHour = String(now.getHours()).padStart(2, '0');
            const currentMinute = String(now.getMinutes()).padStart(2, '0');

            tanggalPicker.setDate(now);
            document.getElementById('jam_transaksi_hour').value = currentHour;
            document.getElementById('jam_transaksi_minute').value = currentMinute;

            updateCounter('nama_transaksi', 'nama_transaksi_counter', 50);
            updateCounter('kategori', 'kategori_counter', 30);
            updateCounter('catatan', 'catatan_counter', 50);

            document.getElementById('modalOverlay').classList.add('active');
            document.body.style.overflow = 'hidden';
        }

        function openEditModal(id, namaTransaksi, tipe, nominal, kategori, waktuTransaksi, catatan) {
            document.getElementById('modalTitle').innerText = 'Edit Transaksi';
            const form = document.getElementById('transaksiForm');
            form.action = '/transaksi/' + id;

            document.getElementById('formMethod').value = 'PUT';

            document.getElementById('nama_transaksi').value = namaTransaksi;
            document.getElementById('nominal').value = nominal;
            document.getElementById('kategori').value = kategori;
            document.getElementById('catatan').value = catatan || '';

            const parts = waktuTransaksi.split(' ');
            const datePart = parts[0];

            const timePart = parts[1] ? parts[1].substring(0, 5) : '00:00';
            const timeParts = timePart.split(':');
            const hourPart = timeParts[0] || '00';
            const minutePart = timeParts[1] || '00';

            const dateSplit = datePart.split('-');
            const year = parseInt(dateSplit[0]);
            const month = parseInt(dateSplit[1]) - 1;
            const day = parseInt(dateSplit[2]);
            const safeDate = new Date(year, month, day);

            tanggalPicker.setDate(safeDate);
            document.getElementById('jam_transaksi_hour').value = hourPart;
            document.getElementById('jam_transaksi_minute').value = minutePart;

            if (tipe === 'pemasukan') {
                document.getElementById('pemasukan').checked = true;
            } else {
                document.getElementById('pengeluaran').checked = true;
            }

            updateCounter('nama_transaksi', 'nama_transaksi_counter', 50);
            updateCounter('kategori', 'kategori_counter', 30);
            updateCounter('catatan', 'catatan_counter', 50);

            document.getElementById('modalOverlay').classList.add('active');
            document.body.style.overflow = 'hidden';
        }

        document.getElementById('transaksiForm').addEventListener('submit', function(e) {
            const selectedDate = tanggalPicker.selectedDates[0] || new Date();
            const yyyy = selectedDate.getFullYear();
            const mm = String(selectedDate.getMonth() + 1).padStart(2, '0');
            const dd = String(selectedDate.getDate()).padStart(2, '0');
            const tanggal = `${yyyy}-${mm}-${dd}`;

            const hour = document.getElementById('jam_transaksi_hour').value.padStart(2, '0');
            const minute = document.getElementById('jam_transaksi_minute').value.padStart(2, '0');
            const jam = hour + ':' + minute;

            document.getElementById('waktu_transaksi').value = tanggal + ' ' + jam;
        });

        // Event listener auto-tabbing & validasi input jam-menit
        document.getElementById('jam_transaksi_hour').addEventListener('input', function(e) {
            let value = e.target.value.replace(/\D/g, '');
            if (value.length > 2) value = value.slice(0, 2);

            // Validasi agar angka jam tidak lebih dari 23
            if (value.length === 2 && parseInt(value) > 23) {
                value = '23';
            }
            e.target.value = value;

            // Auto fokus ke kolom menit jika sudah diisi 2 angka
            if (value.length === 2) {
                document.getElementById('jam_transaksi_minute').focus();
                document.getElementById('jam_transaksi_minute').select();
            }
        });

        document.getElementById('jam_transaksi_minute').addEventListener('input', function(e) {
            let value = e.target.value.replace(/\D/g, '');
            if (value.length > 2) value = value.slice(0, 2);

            // Validasi agar angka menit tidak lebih dari 59
            if (value.length === 2 && parseInt(value) > 59) {
                value = '59';
            }
            e.target.value = value;
        });

        document.getElementById('jam_transaksi_minute').addEventListener('keydown', function(e) {
            // Kembali fokus ke kolom jam jika menekan Backspace di kolom menit yang kosong
            if (e.key === 'Backspace' && e.target.value.length === 0) {
                document.getElementById('jam_transaksi_hour').focus();
            }
        });

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
                closeDeleteModal();
            }
        });

        function confirmDelete(id) {
            const form = document.getElementById('deleteTransactionForm');
            form.action = '/transaksi/' + id;
            document.getElementById('deleteTransactionModal').classList.add('active');
            document.body.style.overflow = 'hidden';
        }

        function closeDeleteModal() {
            document.getElementById('deleteTransactionModal').classList.remove('active');
            document.body.style.overflow = '';
        }

        document.getElementById('deleteTransactionModal').addEventListener('click', function(e) {
            if (e.target === this) {
                closeDeleteModal();
            }
        });
    </script>
</body>

</html>
