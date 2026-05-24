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
            padding: 32px;
            overflow-y: auto;
        }

        /* Charts Layout */
        .charts-container {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 32px;
            margin-bottom: 40px;
        }

        .chart-card {
            background-color: #fff;
            border: 2px solid var(--color-navy);
            border-radius: 12px;
            padding: 32px 24px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.05);
            display: flex;
            flex-direction: column;
            align-items: stretch;
        }

        .chart-card-title {
            font-size: 16px;
            font-weight: 800;
            color: var(--color-navy);
            margin-bottom: 24px;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .chart-wrapper {
            position: relative;
            width: 100%;
            height: 250px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .chart-wrapper canvas {
            max-height: 100%;
            max-width: 100%;
        }

        .empty-chart-message {
            font-size: 14px;
            font-weight: 600;
            color: var(--color-text-muted);
            text-align: center;
        }

        .chart-legend {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 12px;
            margin-top: 24px;
            justify-items: start;
            padding-left: 20px;
        }

        .legend-item {
            display: flex;
            align-items: center;
            gap: 8px;
            font-size: 14px;
            font-weight: 600;
            color: var(--color-navy);
        }

        .legend-color {
            width: 14px;
            height: 14px;
            border-radius: 2px;
            flex-shrink: 0;
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

        @media (max-width: 1024px) {
            .charts-container {
                grid-template-columns: 1fr;
            }

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
    </style>
</head>

<body class="{{ auth()->user()->mode_tampilan === 'dark' ? 'dark-mode' : '' }}">
    <aside class="sidebar">
        <div class="sidebar-logo">
            <img src="{{ asset('assets/main_logo.png') }}" alt="Nano Tracker Logo">
        </div>

        <div class="profile">
            <img src="{{ auth()->user()->foto_profil ? asset('storage/' . auth()->user()->foto_profil) : asset('assets/icon-profil.png') }}"
                alt="Foto Profil" class="profile-pic" onerror="this.onerror=null; this.src='{{ asset('assets/icon-profil.png') }}';">
            <div class="profile-name">Selamat Datang,<br>{{ auth()->user()->nama_lengkap }}</div>
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
            <!-- Charts Section -->
            <div class="charts-container">
                <div class="chart-card">
                    <h3 class="chart-card-title">PENGELUARAN</h3>
                    <div class="chart-wrapper">
                        <canvas id="pengeluaranChart"></canvas>
                        <div id="pengeluaranEmpty" class="empty-chart-message" style="display: none;">
                            Belum ada data pengeluaran
                        </div>
                    </div>
                    <div class="chart-legend" id="pengeluaranLegend"></div>
                </div>

                <div class="chart-card">
                    <h3 class="chart-card-title">PEMASUKKAN</h3>
                    <div class="chart-wrapper">
                        <canvas id="pemasukanChart"></canvas>
                        <div id="pemasukanEmpty" class="empty-chart-message" style="display: none;">
                            Belum ada data pemasukan
                        </div>
                    </div>
                    <div class="chart-legend" id="pemasukanLegend"></div>
                </div>
            </div>

            <!-- Latest Transactions Section -->
            <div class="transaction-list">
                @forelse($groupedLatestTransaksis as $date => $transactions)
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
                                {{ auth()->user()->formatUang(abs($dailyTotal)) }}</span>
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
                                <span
                                    class="transaction-amount {{ $transaksi->tipe == 'pengeluaran' ? 'expense' : 'income' }}">
                                    {{ auth()->user()->formatUang($transaksi->nominal) }}
                                </span>
                            </div>
                        @endforeach
                    </div>
                @empty
                    <div
                        style="text-align: center; padding: 40px; color: #6B7280; border: 2px solid var(--color-navy); border-radius: 12px; background: #fff;">
                        Belum ada transaksi
                    </div>
                @endforelse
            </div>
        </main>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels@2"></script>

    <script>
        const userCurrency = "{{ auth()->user()->mata_uang ?? 'Rp' }}";
        const colors = [
            '#00E532',
            '#FFC107',
            '#FF3B30',
            '#2196F3',
            '#AF52DE',
            '#FF9500',
            '#5AC8FA',
            '#E91E63',
            '#009688',
            '#795548'
        ];

        Chart.register(ChartDataLabels);

        function generateLegend(containerId, data, colors) {
            const legendContainer = document.getElementById(containerId);
            legendContainer.innerHTML = '';

            data.forEach((item, index) => {
                const color = colors[index % colors.length];

                const legendItem = document.createElement('div');
                legendItem.className = 'legend-item';

                const colorBox = document.createElement('span');
                colorBox.className = 'legend-color';
                colorBox.style.backgroundColor = color;

                const labelText = document.createElement('span');
                labelText.textContent = item.kategori;

                legendItem.appendChild(colorBox);
                legendItem.appendChild(labelText);
                legendContainer.appendChild(legendItem);
            });
        }

        const pengeluaranData = @json($pengeluaranKategori);
        const pemasukanData = @json($pemasukanKategori);

        if (pengeluaranData.length === 0) {
            document.getElementById('pengeluaranChart').style.display = 'none';
            document.getElementById('pengeluaranEmpty').style.display = 'block';
        } else {
            const labels = pengeluaranData.map(item => item.kategori);
            const totals = pengeluaranData.map(item => parseFloat(item.total));

            const ctx = document.getElementById('pengeluaranChart').getContext('2d');
            new Chart(ctx, {
                type: 'pie',
                data: {
                    labels: labels,
                    datasets: [{
                        data: totals,
                        backgroundColor: colors.slice(0, labels.length)
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        legend: {
                            display: false
                        },
                        tooltip: {
                            callbacks: {
                                label: function(context) {
                                    let label = context.label || '';
                                    let value = context.raw || 0;
                                    let formattedVal = new Intl.NumberFormat(userCurrency === 'Rp' ? 'id-ID' : 'en-US').format(value);
                                    return ' ' + label + ': ' + userCurrency + formattedVal;
                                }
                            }
                        },
                        datalabels: {
                            color: '#ffffff',
                            font: {
                                weight: 'bold',
                                size: 12,
                                family: "'Segoe UI', Tahoma, Geneva, Verdana, sans-serif"
                            },
                            formatter: (value, context) => {
                                let sum = 0;
                                let dataArr = context.chart.data.datasets[0].data;
                                dataArr.map(data => {
                                    sum += parseFloat(data);
                                });
                                let percentage = (value * 100 / sum).toFixed(1);
                                if (percentage.endsWith('.0')) {
                                    percentage = percentage.slice(0, -2);
                                }
                                return percentage.replace('.', ',') + '%';
                            }
                        }
                    }
                }
            });

            generateLegend('pengeluaranLegend', pengeluaranData, colors);
        }

        if (pemasukanData.length === 0) {
            document.getElementById('pemasukanChart').style.display = 'none';
            document.getElementById('pemasukanEmpty').style.display = 'block';
        } else {
            const labels = pemasukanData.map(item => item.kategori);
            const totals = pemasukanData.map(item => parseFloat(item.total));

            const ctx = document.getElementById('pemasukanChart').getContext('2d');
            new Chart(ctx, {
                type: 'pie',
                data: {
                    labels: labels,
                    datasets: [{
                        data: totals,
                        backgroundColor: colors.slice(0, labels.length)
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        legend: {
                            display: false
                        },
                        tooltip: {
                            callbacks: {
                                label: function(context) {
                                    let label = context.label || '';
                                    let value = context.raw || 0;
                                    let formattedVal = new Intl.NumberFormat(userCurrency === 'Rp' ? 'id-ID' : 'en-US').format(value);
                                    return ' ' + label + ': ' + userCurrency + formattedVal;
                                }
                            }
                        },
                        datalabels: {
                            color: '#ffffff',
                            font: {
                                weight: 'bold',
                                size: 12,
                                family: "'Segoe UI', Tahoma, Geneva, Verdana, sans-serif"
                            },
                            formatter: (value, context) => {
                                let sum = 0;
                                let dataArr = context.chart.data.datasets[0].data;
                                dataArr.map(data => {
                                    sum += parseFloat(data);
                                });
                                let percentage = (value * 100 / sum).toFixed(1);
                                if (percentage.endsWith('.0')) {
                                    percentage = percentage.slice(0, -2);
                                }
                                return percentage.replace('.', ',') + '%';
                            }
                        }
                    }
                }
            });

            generateLegend('pemasukanLegend', pemasukanData, colors);
        }
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
