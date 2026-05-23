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

        /* Settings Layout */
        .settings-container {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            gap: 80px;
            max-width: 1000px;
        }

        /* Form Section */
        .settings-form {
            flex: 1;
            max-width: 400px;
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

        .profile-photo-large {
            width: 220px;
            height: 220px;
            border-radius: 50%;
            object-fit: cover;
            border: 4px solid #E5E7EB;
            background-color: #fff;
        }

        .change-photo-btn {
            font-size: 24px;
            font-weight: 700;
            color: var(--color-teal);
            background: none;
            border: none;
            cursor: pointer;
            transition: opacity 0.2s;
        }

        .change-photo-btn:hover {
            opacity: 0.8;
        }

        /* Hidden file input */
        .hidden-input {
            display: none;
        }

        /* Responsive */
        @media (max-width: 1024px) {
            .settings-container {
                flex-direction: column-reverse;
                align-items: center;
                gap: 40px;
            }

            .settings-form {
                max-width: 100%;
                width: 100%;
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
            @if(session('error'))
                <div style="background-color: #fee2e2; color: #dc2626; padding: 16px; border-radius: 8px; margin-bottom: 24px; border: 1px solid #fecaca;">
                    {{ session('error') }}
                </div>
            @endif

            @if(session('success'))
                <div style="background-color: #dcfce7; color: #16a34a; padding: 16px; border-radius: 8px; margin-bottom: 24px; border: 1px solid #bbf7d0;">
                    {{ session('success') }}
                </div>
            @endif

            @if($errors->any())
                <div style="background-color: #fee2e2; color: #dc2626; padding: 16px; border-radius: 8px; margin-bottom: 24px; border: 1px solid #fecaca;">
                    <ul style="margin: 0; padding-left: 20px;">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class="settings-container">
                <form action="{{ route('pengaturan.update') }}" method="POST" class="settings-form" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="form-group">
                        <label class="form-label" for="nama_lengkap">Nama Lengkap</label>
                        <input type="text" name="nama_lengkap" id="nama_lengkap" class="form-input" value="{{ auth()->user()->nama_lengkap }}">
                    </div>

                    <div class="form-group">
                        <label class="form-label" for="email">Email</label>
                        <input type="email" name="email" id="email" class="form-input" value="{{ auth()->user()->email }}">
                    </div>

                    <div class="form-group">
                        <label class="form-label" for="password">New password</label>
                        <input type="password" name="password" id="password" class="form-input" placeholder="">
                    </div>

                    <div class="form-group">
                        <label class="form-label" for="password_confirmation">Confirm password</label>
                        <input type="password" name="password_confirmation" id="password_confirmation" class="form-input" placeholder="">
                    </div>

                    <div class="form-group">
                        <label class="form-label" for="foto_profil">Foto Profil</label>
                        <input type="file" name="foto_profil" id="fotoProfilInput" class="form-input" accept="image/*">
                        <input type="hidden" name="foto_profil_base64" id="fotoProfilBase64">
                    </div>

                    <button type="submit" class="btn-submit">Konfirmasi</button>

                    <button type="button" class="btn-danger" id="btnShowDeleteModal">Hapus Akun</button>
                </form>

                <div class="profile-section">
                    <img src="{{ auth()->user()->foto_profil ? asset('storage/' . auth()->user()->foto_profil) : asset('assets/icon-profil.png') }}" alt="Foto Profil" class="profile-photo-large" id="profilePhotoPreview">
                </div>
            </div>
        </main>
    </div>

    <div id="deleteAccountModal" class="modal-overlay" style="display: none;">
        <div class="modal-box">
            <h3 class="modal-title">Hapus Akun Permanen?</h3>
            <p class="modal-text">Tindakan ini tidak dapat dibatalkan. Semua data transaksi Anda akan dihapus secara permanen.</p>

            <div class="modal-actions">
                <button type="button" class="btn-cancel" id="btnCancelDelete">Batal</button>
                <form action="{{ route('pengaturan.destroy') }}" method="POST" style="display: inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn-confirm-delete">Ya, Hapus AKun</button>
                </form>
            </div>
        </div>
    </div>

    <script>
        document.getElementById('fotoProfilInput').addEventListener('change', function(e) {
            const file = e.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    document.getElementById('profilePhotoPreview').src = e.target.result;
                    document.getElementById('fotoProfilBase64').value = e.target.result;
                };
                reader.readAsDataURL(file);
            }
        });

        const deleteModal = document.getElementById('deleteAccountModal');
        const btnShowDelete = document.getElementById('btnShowDeleteModal');
        const btnCancelDelete = document.getElementById('btnCancelDelete');

        btnShowDelete.addEventListener('click', function(){
            deleteModal.style.display = 'flex';
        });

        btnCancelDelete.addEventListener('click', function() {
            deleteModal.style.display = 'none';
        });

        window.addEventListener('click', function(e) {
            if (e.target === deleteModal) {
                deleteModal.style.display = 'none';
            }
        });
    </script>
</body>
</html>
