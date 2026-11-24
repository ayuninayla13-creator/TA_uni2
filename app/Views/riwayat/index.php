
<?php
$nama_lembaga = $nama_lembaga ?? 'Admin';
$riwayat = $riwayat ?? [];
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= esc($title ?? 'Riwayat Aktivitas') ?> | SIP ASET PAUD-PNF</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

    <style>
        :root {
            --navy: #142d4e;
            --blue: #2563eb;
            --muted: #7a879b;
            --line: #e7edf5;
            --bg: #f5f8fd;
        }

        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            font-family: Inter, "Segoe UI", Arial, sans-serif;
            background: var(--bg);
            color: #1c2e49;
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

        /* MAIN */
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

        /* INTRO */
        .page-intro {
            margin-bottom: 23px;
        }

        .page-intro h2 {
            margin: 0 0 7px;
            color: var(--navy);
            font-size: 17px;
        }

        .page-intro p {
            margin: 0;
            font-size: 11px;
            color: var(--muted);
            line-height: 1.7;
        }

        /* PANEL */
        .panel {
            background: white;
            border: 1px solid var(--line);
            border-radius: 15px;
            padding: 25px;
            box-shadow: 0 4px 14px #1b376408;
            margin-bottom: 22px;
        }

        /* TABLE */
        .table-heading {
            margin-bottom: 18px;
        }

        .table-heading h3 {
            margin: 0 0 6px;
            color: var(--navy);
            font-size: 15px;
        }

        .table-heading p {
            margin: 0;
            color: var(--muted);
            font-size: 10px;
        }

        .table-wrapper {
            width: 100%;
            overflow-x: auto;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            min-width: 700px;
        }

        thead {
            background: #f4f7fc;
        }

        th {
            padding: 13px 14px;
            color: #53647c;
            font-size: 10px;
            font-weight: 700;
            text-align: left;
            white-space: nowrap;
            border-bottom: 1px solid var(--line);
        }

        td {
            padding: 14px;
            color: #53647c;
            font-size: 10px;
            border-bottom: 1px solid #edf1f6;
        }

        tbody tr:hover {
            background: #f9fbff;
        }

        .text-center {
            text-align: center;
        }

        .activity {
            display: inline-block;
            padding: 6px 10px;
            border-radius: 20px;
            font-size: 9px;
            font-weight: 700;
        }

        .activity.tambah {
            color: #16804a;
            background: #e7f8ef;
        }

        .activity.edit {
            color: #a66a12;
            background: #fff5df;
        }

        .activity.hapus {
            color: #c13d49;
            background: #fff0f1;
        }

        .empty-state {
            padding: 35px 15px;
            text-align: center;
            color: #94a0b2;
            font-size: 11px;
        }

        .empty-state i {
            display: block;
            margin-bottom: 12px;
            font-size: 27px;
            color: #b9c7da;
        }

        .footer {
            padding-top: 25px;
            text-align: center;
            font-size: 10px;
            color: #a1acbb;
        }

        /* RESPONSIVE */
        @media (max-width: 1050px) {
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

            .date-pill {
                display: none;
            }

            h1 {
                font-size: 22px;
            }

            .panel {
                padding: 18px;
            }
        }

        @media (max-width: 440px) {
            .topbar {
                align-items: flex-start;
            }

            .avatar {
                display: none;
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

        <a class="menu" href="<?= site_url('dashboard') ?>">
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

        <a class="menu active" href="<?= site_url('riwayat') ?>">
            <span class="icon"><i class="fas fa-history"></i></span>
            <span class="menu-text">Riwayat</span>
        </a>

        <div class="sidebar-bottom">

            <div class="help-card">
                <strong>Butuh bantuan?</strong>
                <p>Gunakan menu di samping untuk mengelola data aset lembaga.</p>
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
                    Sistem Informasi Aset PAUD-PNF / Master Data
                </div>

                <h1>Riwayat</h1>
            </div>

            <div class="top-right">

                <div class="date-pill">
                    <i class="far fa-calendar-alt"></i>
                    <span id="todayDate">Memuat tanggal...</span>
                </div>

                <div class="avatar" title="<?= esc($nama_lembaga) ?>">
                    <?= esc(strtoupper(substr($nama_lembaga, 0, 1))) ?>
                </div>

            </div>

        </header>


        <!-- PAGE INTRO -->
        <section class="page-intro">
            <h2>Riwayat Aktivitas</h2>
            <p>
                Halaman ini menampilkan catatan aktivitas pengelolaan data
                yang dilakukan dalam sistem.
            </p>
        </section>


        <!-- RIWAYAT TABLE -->
        <section class="panel">

            <div class="table-heading">
                <h3>Daftar Riwayat Aktivitas</h3>
                <p>Catatan aktivitas terbaru ditampilkan pada bagian paling atas.</p>
            </div>

            <div class="table-wrapper">

                <table>

                    <thead>
                        <tr>
                            <th class="text-center">No</th>
                            <th>Tanggal & Waktu</th>
                            <th>Aktivitas</th>
                            <th>Nama Tabel</th>
                            <th>Keterangan</th>
                            <th>Admin</th>
                        </tr>
                    </thead>

                    <tbody>

                        <?php if (!empty($riwayat)) : ?>

                            <?php foreach ($riwayat as $index => $item) : ?>

                                <?php
                                $jenisAktivitas = strtolower($item['aktivitas'] ?? '');

                                $kelasAktivitas = 'tambah';

                                if (str_contains($jenisAktivitas, 'edit')) {
                                    $kelasAktivitas = 'edit';
                                } elseif (str_contains($jenisAktivitas, 'hapus')) {
                                    $kelasAktivitas = 'hapus';
                                }
                                ?>

                                <tr>

                                    <td class="text-center">
                                        <?= $index + 1 ?>
                                    </td>

                                    <td>
                                        <?= !empty($item['tanggal_aktivitas'])
                                            ? esc(date('d-m-Y H:i', strtotime($item['tanggal_aktivitas'])))
                                            : '-' ?>
                                    </td>

                                    <td>
                                        <span class="activity <?= $kelasAktivitas ?>">
                                            <?= esc($item['aktivitas'] ?? '-') ?>
                                        </span>
                                    </td>

                                    <td>
                                        <?= esc($item['nama_tabel'] ?? '-') ?>
                                    </td>

                                    <td>
                                        <?= esc($item['keterangan'] ?? '-') ?>
                                    </td>

                                    <td>
                                        <?= esc($item['nama_admin'] ?? 'Admin') ?>
                                    </td>

                                </tr>

                            <?php endforeach; ?>

                        <?php else : ?>

                            <tr>
                                <td colspan="6">
                                    <div class="empty-state">
                                        <i class="fas fa-clock"></i>
                                        Belum ada riwayat aktivitas yang tercatat.
                                    </div>
                                </td>
                            </tr>

                        <?php endif; ?>

                    </tbody>

                </table>

            </div>

        </section>


        <!-- FOOTER -->
        <div class="footer">
            © <?= date('Y') ?> Sistem Informasi Aset PAUD-PNF
            · Pengelolaan aset lebih tertib dan terarah
        </div>

    </main>


    <script>
        // TANGGAL REALTIME
        const dateEl = document.getElementById('todayDate');

        dateEl.textContent = new Intl.DateTimeFormat('id-ID', {
            day: 'numeric',
            month: 'long',
            year: 'numeric'
        }).format(new Date());
    </script>

</body>
</html>
