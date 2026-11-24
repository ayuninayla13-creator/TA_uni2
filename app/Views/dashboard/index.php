
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= esc($title ?? 'Dashboard | SIP ASET PAUD-PNF') ?></title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <style>
        :root {
            --navy: #142d4e;
            --blue: #2563eb;
            --blue-light: #eaf2ff;
            --ink: #1c2e49;
            --muted: #7a879b;
            --line: #e7edf5;
            --bg: #f5f8fd;
            --white: #fff;
            --green: #0f9f79;
        }

        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            font-family: Inter, "Segoe UI", Arial, sans-serif;
            background: var(--bg);
            color: var(--ink);
        }

        a {
            text-decoration: none;
        }

        /* SIDEBAR */
        .sidebar {
            position: fixed;
            inset: 0 auto 0 0;
            width: 250px;
            padding: 27px 18px;
            background: #fff;
            border-right: 1px solid var(--line);
            display: flex;
            flex-direction: column;
            z-index: 5;
        }

        .brand {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 0 9px;
            margin-bottom: 39px;
        }

        .brand-mark {
            width: 44px;
            height: 44px;
            display: grid;
            place-items: center;
            border-radius: 14px;
            color: white;
            background: linear-gradient(145deg, #286fe0, #164b9e);
            box-shadow: 0 8px 18px #2563eb30;
            font-size: 19px;
        }

        .brand-name {
            font-size: 13px;
            font-weight: 800;
            letter-spacing: .03em;
            color: var(--navy);
        }

        .brand-sub {
            margin-top: 5px;
            font-size: 9px;
            letter-spacing: .1em;
            color: #8c9ab0;
        }

        .nav-label {
            margin: 0 12px 12px;
            color: #a0aabc;
            font-size: 10px;
            font-weight: 800;
            letter-spacing: .13em;
        }

        .menu {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 12px 14px;
            margin-bottom: 6px;
            border-radius: 11px;
            color: #66758c;
            font-size: 12px;
            font-weight: 600;
            transition: .2s;
        }

        .menu .icon {
            width: 20px;
            text-align: center;
            font-size: 15px;
        }

        .menu:hover {
            background: #f3f7ff;
            color: var(--blue);
        }

        .menu.active {
            color: #fff;
            background: linear-gradient(100deg, #286fe0, #3988f4);
            box-shadow: 0 7px 16px #2563eb2b;
        }

        .sidebar-bottom {
            margin-top: auto;
        }

        .help-card {
            background: #f4f8ff;
            border: 1px solid #e3edff;
            padding: 14px;
            border-radius: 13px;
            margin: 15px 3px 18px;
        }

        .help-card strong {
            font-size: 11px;
            display: block;
            margin-bottom: 6px;
            color: var(--navy);
        }

        .help-card p {
            margin: 0;
            font-size: 10px;
            line-height: 1.6;
            color: var(--muted);
        }

        .logout {
            color: #d04b59;
        }

        .logout:hover {
            color: #b42332;
            background: #fff1f2;
        }

        /* MAIN CONTENT */
        main {
            margin-left: 250px;
            padding: 28px 34px 36px;
            max-width: 1700px;
            min-height: 100vh;
        }

        .topbar {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 18px;
            margin-bottom: 30px;
        }

        .eyebrow {
            font-size: 10px;
            color: var(--muted);
            margin-bottom: 7px;
        }

        h1 {
            font-size: 25px;
            letter-spacing: -.04em;
            margin: 0;
            color: var(--navy);
        }

        .top-right {
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .date-pill {
            display: flex;
            align-items: center;
            gap: 8px;
            background: #fff;
            border: 1px solid var(--line);
            padding: 10px 13px;
            border-radius: 11px;
            color: #687890;
            font-size: 11px;
            white-space: nowrap;
        }

        .avatar {
            width: 39px;
            height: 39px;
            display: grid;
            place-items: center;
            border-radius: 13px;
            color: #245bb4;
            background: #dceaff;
            font-weight: 800;
            font-size: 13px;
        }

        /* WELCOME BANNER */
        .welcome-banner {
            position: relative;
            overflow: hidden;
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 20px;
            padding: 26px 29px;
            margin-bottom: 24px;
            border-radius: 18px;
            color: white;
            background: linear-gradient(112deg, #15365f 0%, #205da7 65%, #3988df 100%);
            box-shadow: 0 12px 28px #173c6818;
        }

        .welcome-banner::after {
            content: "";
            position: absolute;
            width: 230px;
            height: 230px;
            right: 35px;
            top: -130px;
            border: 1px solid #ffffff22;
            border-radius: 50%;
            box-shadow: 0 0 0 30px #ffffff08, 0 0 0 60px #ffffff06;
        }

        .welcome-content {
            position: relative;
            z-index: 1;
        }

        .welcome-tag {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            font-size: 10px;
            letter-spacing: .08em;
            text-transform: uppercase;
            color: #d4e8ff;
            margin-bottom: 12px;
        }

        .welcome-banner h2 {
            margin: 0 0 9px;
            font-size: 22px;
            letter-spacing: -.03em;
        }

        .welcome-banner p {
            margin: 0;
            color: #d7e7fa;
            font-size: 12px;
            line-height: 1.7;
        }

        .banner-symbol {
            position: relative;
            z-index: 1;
            width: 88px;
            height: 88px;
            display: grid;
            place-items: center;
            flex-shrink: 0;
            border-radius: 24px;
            background: #ffffff15;
            border: 1px solid #ffffff2c;
            font-size: 40px;
        }

        /* SECTION HEADING */
        .section-heading {
            display: flex;
            align-items: end;
            justify-content: space-between;
            gap: 12px;
            margin: 28px 0 15px;
        }

        .section-heading h3 {
            font-size: 14px;
            margin: 0 0 5px;
            color: var(--navy);
        }

        .section-heading p {
            margin: 0;
            font-size: 11px;
            color: var(--muted);
        }

        /* STATISTICS */
        .stats {
            display: grid;
            grid-template-columns: repeat(3, minmax(0, 1fr));
            gap: 16px;
        }

        .stat-card {
            padding: 20px;
            border-radius: 15px;
            border: 1px solid var(--line);
            background: white;
            box-shadow: 0 4px 14px #1b376408;
        }

        .stat-top {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 19px;
        }

        .stat-icon {
            width: 43px;
            height: 43px;
            display: grid;
            place-items: center;
            border-radius: 13px;
            font-size: 19px;
        }

        .stat-icon.blue {
            color: #2563eb;
            background: #eaf2ff;
        }

        .stat-icon.green {
            color: #0f9f79;
            background: #e6faf3;
        }

        .stat-icon.purple {
            color: #805ad5;
            background: #f1ebff;
        }

        .stat-caption {
            font-size: 10px;
            color: #8390a4;
            background: #f7f9fc;
            border-radius: 20px;
            padding: 6px 8px;
        }

        .stat-label {
            font-size: 12px;
            color: #718096;
            margin-bottom: 7px;
        }

        .stat-number {
            font-size: 29px;
            font-weight: 800;
            letter-spacing: -.04em;
            color: var(--navy);
        }

        .stat-note {
            font-size: 10px;
            color: #9aa5b5;
            margin-top: 8px;
        }

        /* CONTENT GRID */
        .content-grid {
            display: grid;
            grid-template-columns: minmax(0, 1.55fr) minmax(250px, 1fr);
            gap: 16px;
            margin-top: 18px;
        }

        .panel {
            background: white;
            border: 1px solid var(--line);
            border-radius: 15px;
            padding: 21px;
            box-shadow: 0 4px 14px #1b376408;
            min-width: 0;
        }

        .panel-heading {
            display: flex;
            justify-content: space-between;
            align-items: start;
            gap: 12px;
            margin-bottom: 18px;
        }

        .panel-heading h3 {
            margin: 0 0 6px;
            font-size: 13px;
            color: var(--navy);
        }

        .panel-heading p {
            margin: 0;
            font-size: 10px;
            color: var(--muted);
        }

        .chart-wrap {
            position: relative;
            height: 235px;
        }

        /* QUICK LINKS */
        .quick-links {
            display: grid;
            gap: 10px;
        }

        .quick-link {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 13px;
            border: 1px solid #edf1f7;
            border-radius: 11px;
            transition: .2s;
        }

        .quick-link:hover {
            background: #f7faff;
            border-color: #d8e6ff;
            transform: translateY(-1px);
        }

        .quick-icon {
            width: 38px;
            height: 38px;
            display: grid;
            place-items: center;
            border-radius: 11px;
            background: #edf4ff;
            color: #2d68c6;
            font-size: 16px;
            flex-shrink: 0;
        }

        .quick-link strong {
            display: block;
            color: #334660;
            font-size: 11px;
            margin-bottom: 4px;
        }

        .quick-link span {
            color: #8a97aa;
            font-size: 10px;
        }

        .quick-arrow {
            margin-left: auto;
            color: #a0adbf;
            font-size: 17px;
        }

        /* FOOTER */
        .footer {
            padding-top: 25px;
            text-align: center;
            font-size: 10px;
            color: #a1acbb;
        }

        /* RESPONSIVE */
        @media (max-width: 1050px) {
            .content-grid {
                grid-template-columns: 1fr;
            }

            main {
                padding: 24px;
            }
        }

        @media (max-width: 760px) {
            .sidebar {
                width: 76px;
                padding: 22px 10px;
            }

            .brand {
                justify-content: center;
                padding: 0;
                margin-bottom: 30px;
            }

            .brand-copy,
            .nav-label,
            .menu .menu-text,
            .help-card {
                display: none;
            }

            .menu {
                justify-content: center;
                padding: 13px 8px;
            }

            .menu .icon {
                width: auto;
                font-size: 18px;
            }

            main {
                margin-left: 76px;
                padding: 20px 15px;
            }

            .stats {
                grid-template-columns: 1fr;
            }

            .welcome-banner {
                padding: 22px;
            }

            .banner-symbol {
                display: none;
            }

            .date-pill {
                display: none;
            }

            h1 {
                font-size: 22px;
            }
        }

        @media (max-width: 440px) {
            .topbar {
                align-items: flex-start;
            }

            .avatar {
                display: none;
            }

            .welcome-banner h2 {
                font-size: 19px;
            }

            .panel {
                padding: 16px;
            }
        }
    </style>
</head>

<body>

    <!-- SIDEBAR -->
    <aside class="sidebar">

        <div class="brand">
            <div class="brand-mark">
                <i class="fas fa-house"></i>
            </div>

            <div class="brand-copy">
                <div class="brand-name">SIP ASET PAUD-PNF</div>
                <div class="brand-sub">SISTEM INFORMASI ASET</div>
            </div>
        </div>

        <div class="nav-label">MENU UTAMA</div>

        <a class="menu active" href="<?= site_url('dashboard') ?>">
            <span class="icon"><i class="fas fa-th-large"></i></span>
            <span class="menu-text">Dashboard</span>
        </a>

        <a class="menu" href="<?= site_url('lembaga') ?>">
            <span class="icon"><i class="fas fa-school"></i></span>
            <span class="menu-text">Lembaga</span>
        </a>

        <a class="menu" href="<?= site_url('kategori-aset') ?>">
            <span class="icon"><i class="fas fa-layer-group"></i></span>
            <span class="menu-text">Kategori Aset</span>
        </a>

        <a class="menu" href="<?= site_url('aset') ?>">
            <span class="icon"><i class="fas fa-box"></i></span>
            <span class="menu-text">Aset</span>
        </a>

        <a class="menu" href="<?= site_url('laporan') ?>">
            <span class="icon"><i class="fas fa-chart-bar"></i></span>
            <span class="menu-text">Laporan</span>
        </a>

        <a class="menu" href="<?= site_url('riwayat') ?>">
            <span class="icon"><i class="fas fa-history"></i></span>
            <span class="menu-text">Riwayat</span>
        </a>

        <div class="sidebar-bottom">

            <div class="help-card">
                <strong>Butuh bantuan?</strong>
                <p>Gunakan menu di samping untuk mengelola informasi aset lembaga.</p>
            </div>

            <a class="menu logout" href="<?= site_url('logout') ?>">
                <span class="icon"><i class="fas fa-sign-out-alt"></i></span>
                <span class="menu-text">Logout</span>
            </a>

        </div>

    </aside>


    <!-- MAIN CONTENT -->
    <main>

        <!-- HEADER -->
        <header class="topbar">

            <div>
                <div class="eyebrow">
                    Sistem Informasi Aset PAUD-PNF / Ringkasan
                </div>

                <h1>Dashboard</h1>
            </div>

            <div class="top-right">

                <div class="date-pill">
                    <i class="far fa-calendar-alt"></i>
                    <span id="todayDate">Memuat tanggal...</span>
                </div>

                <div class="avatar" title="<?= esc($nama_lembaga ?? 'Pengguna') ?>">
                    <?= esc(strtoupper(substr($nama_lembaga ?? 'L', 0, 1))) ?>
                </div>

            </div>

        </header>


        <!-- WELCOME BANNER -->
        <section class="welcome-banner">

            <div class="welcome-content">

                <div class="welcome-tag">
                    <i class="fas fa-star"></i>
                    PORTAL PENGELOLAAN ASET
                </div>

                <h2>
                    Selamat datang, <?= esc($nama_lembaga ?? 'Pengguna') ?>!
                </h2>

                <p>
                    Pantau dan kelola informasi aset lembaga dengan lebih mudah.<br>
                    Semua ringkasan penting tersedia dalam satu dashboard.
                </p>

            </div>

            <div class="banner-symbol">
                <i class="fas fa-house"></i>
            </div>

        </section>


        <!-- SECTION HEADING -->
        <div class="section-heading">

            <div>
                <h3>Ringkasan Data</h3>
                <p>Ikhtisar data yang tercatat dalam sistem</p>
            </div>

        </div>


        <!-- STATISTICS -->
        <section class="stats">

            <div class="stat-card">

                <div class="stat-top">
                    <div class="stat-icon blue">
                        <i class="fas fa-school"></i>
                    </div>

                    <span class="stat-caption">Data terdaftar</span>
                </div>

                <div class="stat-label">Total Lembaga</div>

                <div class="stat-number">
                    <?= esc($totalLembaga ?? '1') ?>
                </div>

                <div class="stat-note">
                    Lembaga yang terdaftar dalam sistem
                </div>

            </div>


            <div class="stat-card">

                <div class="stat-top">
                    <div class="stat-icon green">
                        <i class="fas fa-box"></i>
                    </div>

                    <span class="stat-caption">Inventaris</span>
                </div>

                <div class="stat-label">Total Aset</div>

                <div class="stat-number">
                    <?= esc($totalAset ?? '0') ?>
                </div>

                <div class="stat-note">
                    Jumlah aset yang tercatat
                </div>

            </div>


            <div class="stat-card">

                <div class="stat-top">
                    <div class="stat-icon purple">
                        <i class="fas fa-layer-group"></i>
                    </div>

                    <span class="stat-caption">Klasifikasi</span>
                </div>

                <div class="stat-label">Kategori Aset</div>

                <div class="stat-number">
                    <?= esc($totalKategori ?? '0') ?>
                </div>

                <div class="stat-note">
                    Kategori untuk pengelompokan aset
                </div>

            </div>

        </section>


        <!-- CONTENT GRID -->
        <section class="content-grid">

            <!-- ASSET CHART -->
            <div class="panel">

                <div class="panel-heading">

                    <div>
                        <h3>Rekapitulasi Aset per Kategori</h3>
                        <p>Visualisasi jumlah aset berdasarkan kategori</p>
                    </div>

                    <span class="stat-caption">Ringkasan</span>

                </div>

                <div class="chart-wrap">
                    <canvas
                        id="assetChart"
                        aria-label="Grafik rekapitulasi aset per kategori">
                    </canvas>
                </div>

            </div>


            <!-- QUICK LINKS -->
            <div class="panel">

                <div class="panel-heading">

                    <div>
                        <h3>Akses Cepat</h3>
                        <p>Pilih menu untuk mulai bekerja</p>
                    </div>

                </div>

                <div class="quick-links">

                    <a class="quick-link" href="<?= site_url('lembaga') ?>">

                        <div class="quick-icon">
                            <i class="fas fa-school"></i>
                        </div>

                        <div>
                            <strong>Data Lembaga</strong>
                            <span>Lihat informasi lembaga</span>
                        </div>

                        <span class="quick-arrow">›</span>

                    </a>


                    <a class="quick-link" href="<?= site_url('aset') ?>">

                        <div class="quick-icon">
                            <i class="fas fa-box"></i>
                        </div>

                        <div>
                            <strong>Kelola Aset</strong>
                            <span>Periksa data inventaris</span>
                        </div>

                        <span class="quick-arrow">›</span>

                    </a>


                    <a class="quick-link" href="<?= site_url('laporan') ?>">

                        <div class="quick-icon">
                            <i class="fas fa-chart-bar"></i>
                        </div>

                        <div>
                            <strong>Laporan Aset</strong>
                            <span>Lihat ringkasan laporan</span>
                        </div>

                        <span class="quick-arrow">›</span>

                    </a>

                </div>

            </div>

        </section>


        <!-- FOOTER -->
        <div class="footer">
            © <?= date('Y') ?> Sistem Informasi Aset PAUD-PNF
            · Pengelolaan aset lebih tertib dan terarah
        </div>

    </main>


    <!-- SCRIPT TANGGAL DAN GRAFIK -->
    <script>
        const dateEl = document.getElementById('todayDate');

        dateEl.textContent = new Intl.DateTimeFormat('id-ID', {
            day: 'numeric',
            month: 'long',
            year: 'numeric'
        }).format(new Date());


        // Data kategori dan jumlah aset dari controller
        const labels = <?= json_encode($kategoriLabels ?? ['Belum ada data']) ?>;
        const values = <?= json_encode($kategoriValues ?? [0]) ?>;

        const canvas = document.getElementById('assetChart');

        if (window.Chart && canvas) {
            new Chart(canvas, {
                type: 'bar',

                data: {
                    labels: labels,

                    datasets: [{
                        label: 'Jumlah aset',
                        data: values,
                        backgroundColor: [
                            '#3478e5',
                            '#36b89a',
                            '#9a7be7',
                            '#f2b65d',
                            '#e879a9',
                            '#65b6dc'
                        ],
                        borderRadius: 7,
                        borderSkipped: false,
                        maxBarThickness: 42
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
                            backgroundColor: '#142d4e',
                            padding: 11,
                            displayColors: false
                        }
                    },

                    scales: {
                        x: {
                            grid: {
                                display: false
                            },

                            ticks: {
                                color: '#8390a4',
                                font: {
                                    family: 'Inter',
                                    size: 10
                                }
                            },

                            border: {
                                display: false
                            }
                        },

                        y: {
                            beginAtZero: true,

                            ticks: {
                                precision: 0,
                                color: '#8390a4',
                                font: {
                                    family: 'Inter',
                                    size: 10
                                }
                            },

                            grid: {
                                color: '#edf1f7'
                            },

                            border: {
                                display: false
                            }
                        }
                    }
                }
            });
        }
    </script>

</body>
</html>
