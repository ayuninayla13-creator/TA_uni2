
<?php
$nama_lembaga = $nama_lembaga ?? 'Admin';
$jenisLaporan = $jenisLaporan ?? '';
$tanggalMulai = $tanggalMulai ?? '';
$tanggalSelesai = $tanggalSelesai ?? '';
$laporan = $laporan ?? [];

$judulLaporan = [
    'data_aset'     => 'Laporan Data Aset',
    'data_lembaga'  => 'Laporan Data Lembaga',
    'data_kategori' => 'Laporan Data Kategori Aset',
    'rekap_aset'    => 'Laporan Rekapitulasi Aset',
    'kondisi_aset'  => 'Laporan Kondisi Aset',
];

$judulHasil = $judulLaporan[$jenisLaporan] ?? 'Laporan';
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= esc($title ?? 'Laporan') ?> | SIP ASET PAUD-PNF</title>

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
            --red: #dc515d;
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

        /* PAGE INTRO */
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

        /* FILTER */
        .filter-type {
            display: grid;
            grid-template-columns: 1fr;
        }

        .date-filter {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 16px;
        }

        .form-group {
            margin-bottom: 18px;
        }

        .form-group label {
            display: block;
            margin-bottom: 9px;
            color: #344761;
            font-size: 11px;
            font-weight: 700;
        }

        .form-control {
            width: 100%;
            padding: 12px 14px;
            border: 1px solid #dfe6f0;
            border-radius: 9px;
            outline: none;
            background: white;
            color: #344761;
            font-family: inherit;
            font-size: 11px;
            transition: .2s;
        }

        .form-control:focus {
            border-color: #4385e9;
            box-shadow: 0 0 0 3px #3478e51a;
        }

        .form-actions {
            display: flex;
            align-items: center;
            gap: 10px;
            padding-top: 18px;
            border-top: 1px solid var(--line);
            margin-top: 7px;
        }

        .btn-submit,
        .btn-reset {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            padding: 11px 18px;
            border: none;
            border-radius: 9px;
            font-family: inherit;
            font-size: 11px;
            font-weight: 600;
            cursor: pointer;
            transition: .2s;
        }

        .btn-submit {
            color: white;
            background: linear-gradient(100deg, #286fe0, #3988f4);
            box-shadow: 0 5px 12px #2563eb25;
        }

        .btn-submit:hover {
            transform: translateY(-2px);
            box-shadow: 0 7px 16px #2563eb35;
        }

        .btn-reset {
            color: #64748b;
            background: #f1f4f8;
        }

        .btn-reset:hover {
            background: #e5eaf1;
        }

        /* REPORT TABLE */
        .report-title {
            margin-bottom: 18px;
        }

        .report-title h3 {
            margin: 0 0 6px;
            color: var(--navy);
            font-size: 15px;
        }

        .report-title p {
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
            min-width: 650px;
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

        .condition {
            display: inline-block;
            padding: 5px 9px;
            border-radius: 20px;
            font-size: 9px;
            font-weight: 600;
        }

        .condition.baik {
            color: #16804a;
            background: #e7f8ef;
        }

        .condition.ringan {
            color: #a66a12;
            background: #fff5df;
        }

        .condition.berat {
            color: #c13d49;
            background: #fff0f1;
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

            .date-filter {
                grid-template-columns: 1fr;
                gap: 0;
            }
        }

        @media (max-width: 440px) {
            .topbar {
                align-items: flex-start;
            }

            .avatar {
                display: none;
            }

            .form-actions {
                flex-direction: column;
                align-items: stretch;
            }

            .btn-submit,
            .btn-reset {
                width: 100%;
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

        <a class="menu active" href="<?= site_url('laporan') ?>">
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

                <h1>Laporan</h1>
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
            <h2>Laporan Data</h2>
            <p>
                Pilih jenis laporan dan periode tanggal untuk melihat data
                yang tercatat dalam sistem.
            </p>
        </section>


        <!-- FILTER PANEL -->
        <section class="panel">

            <form action="<?= site_url('laporan') ?>" method="get">

                <!-- JENIS LAPORAN -->
                <div class="filter-type">

                    <div class="form-group">
                        <label for="jenis_laporan">Jenis Laporan</label>

                        <select
                            name="jenis_laporan"
                            id="jenis_laporan"
                            class="form-control"
                            required
                        >
                            <option value="">-- Pilih Jenis Laporan --</option>

                            <option value="data_aset" <?= $jenisLaporan === 'data_aset' ? 'selected' : '' ?>>
                                Laporan Data Aset
                            </option>

                            <option value="data_lembaga" <?= $jenisLaporan === 'data_lembaga' ? 'selected' : '' ?>>
                                Laporan Data Lembaga
                            </option>

                            <option value="data_kategori" <?= $jenisLaporan === 'data_kategori' ? 'selected' : '' ?>>
                                Laporan Data Kategori Aset
                            </option>

                            <option value="rekap_aset" <?= $jenisLaporan === 'rekap_aset' ? 'selected' : '' ?>>
                                Laporan Rekapitulasi Aset
                            </option>

                            <option value="kondisi_aset" <?= $jenisLaporan === 'kondisi_aset' ? 'selected' : '' ?>>
                                Laporan Kondisi Aset
                            </option>
                        </select>
                    </div>

                </div>


                <!-- FILTER TANGGAL -->
                <div class="date-filter">

                    <div class="form-group">
                        <label for="tanggal_mulai">Dari Tanggal</label>

                        <input
                            type="date"
                            name="tanggal_mulai"
                            id="tanggal_mulai"
                            class="form-control"
                            value="<?= esc($tanggalMulai) ?>"
                        >
                    </div>

                    <div class="form-group">
                        <label for="tanggal_selesai">Sampai Tanggal</label>

                        <input
                            type="date"
                            name="tanggal_selesai"
                            id="tanggal_selesai"
                            class="form-control"
                            value="<?= esc($tanggalSelesai) ?>"
                        >
                    </div>

                </div>


                <!-- TOMBOL -->
                <div class="form-actions">

                    <button type="submit" class="btn-submit">
                        <i class="fas fa-search"></i>
                        Tampilkan Laporan
                    </button>

                    <a href="<?= site_url('laporan') ?>" class="btn-reset">
                        <i class="fas fa-undo"></i>
                        Reset
                    </a>

                </div>

            </form>

        </section>


        <!-- HASIL LAPORAN -->
        <?php if (!empty($jenisLaporan)) : ?>

            <section class="panel">

                <div class="report-title">
                    <h3><?= esc($judulHasil) ?></h3>

                    <?php if ($jenisLaporan === 'data_aset') : ?>
                        <p>
                            Periode:
                            <?= $tanggalMulai ? esc(date('d-m-Y', strtotime($tanggalMulai))) : 'Semua tanggal' ?>
                            sampai
                            <?= $tanggalSelesai ? esc(date('d-m-Y', strtotime($tanggalSelesai))) : 'Semua tanggal' ?>
                        </p>
                    <?php endif; ?>
                </div>


                <div class="table-wrapper">

                    <table>

                        <thead>
                            <tr>
                                <th class="text-center">No</th>

                                <?php if ($jenisLaporan === 'data_aset') : ?>

                                    <th>Nama Aset</th>
                                    <th>Kategori</th>
                                    <th>Lembaga</th>
                                    <th class="text-center">Jumlah</th>
                                    <th>Kondisi</th>

                                <?php elseif ($jenisLaporan === 'rekap_aset') : ?>

                                    <th>Kategori Aset</th>
                                    <th class="text-center">Total Jumlah Aset</th>

                                <?php elseif ($jenisLaporan === 'kondisi_aset') : ?>

                                    <th>Kondisi Aset</th>
                                    <th class="text-center">Jumlah Data</th>
                                    <th class="text-center">Total Jumlah Aset</th>

                                <?php elseif (
                                    in_array($jenisLaporan, ['data_lembaga', 'data_kategori'])
                                    && !empty($laporan)
                                ) : ?>

                                    <?php foreach (array_keys($laporan[0]) as $kolom) : ?>
                                        <th><?= esc(ucwords(str_replace('_', ' ', $kolom))) ?></th>
                                    <?php endforeach; ?>

                                <?php endif; ?>

                            </tr>
                        </thead>


                        <tbody>

                            <?php if (!empty($laporan)) : ?>

                                <?php foreach ($laporan as $index => $item) : ?>

                                    <tr>

                                        <td class="text-center">
                                            <?= $index + 1 ?>
                                        </td>


                                        <?php if ($jenisLaporan === 'data_aset') : ?>

                                            <?php
                                            $kondisiClass = 'baik';

                                            if (($item['kondisi'] ?? '') === 'Rusak Ringan') {
                                                $kondisiClass = 'ringan';
                                            } elseif (($item['kondisi'] ?? '') === 'Rusak Berat') {
                                                $kondisiClass = 'berat';
                                            }
                                            ?>

                                            <td>
                                                <?= esc($item['nama_aset'] ?? '-') ?>
                                            </td>

                                            <td>
                                                <?= esc($item['nama_kategori'] ?? '-') ?>
                                            </td>

                                            <td>
                                                <?= esc($item['nama_lembaga'] ?? '-') ?>
                                            </td>

                                            <td class="text-center">
                                                <?= esc($item['jumlah'] ?? 0) ?>
                                            </td>

                                            <td>
                                                <span class="condition <?= $kondisiClass ?>">
                                                    <?= esc($item['kondisi'] ?? '-') ?>
                                                </span>
                                            </td>


                                        <?php elseif ($jenisLaporan === 'rekap_aset') : ?>

                                            <td>
                                                <?= esc($item['nama_kategori'] ?? '-') ?>
                                            </td>

                                            <td class="text-center">
                                                <?= esc($item['total_jumlah'] ?? 0) ?>
                                            </td>


                                        <?php elseif ($jenisLaporan === 'kondisi_aset') : ?>

                                            <?php
                                            $kondisiClass = 'baik';

                                            if (($item['kondisi'] ?? '') === 'Rusak Ringan') {
                                                $kondisiClass = 'ringan';
                                            } elseif (($item['kondisi'] ?? '') === 'Rusak Berat') {
                                                $kondisiClass = 'berat';
                                            }
                                            ?>

                                            <td>
                                                <span class="condition <?= $kondisiClass ?>">
                                                    <?= esc($item['kondisi'] ?? '-') ?>
                                                </span>
                                            </td>

                                            <td class="text-center">
                                                <?= esc($item['total_data'] ?? 0) ?>
                                            </td>

                                            <td class="text-center">
                                                <?= esc($item['total_jumlah'] ?? 0) ?>
                                            </td>


                                        <?php elseif (
                                            in_array($jenisLaporan, ['data_lembaga', 'data_kategori'])
                                        ) : ?>

                                            <?php foreach ($item as $nilai) : ?>
                                                <td><?= esc($nilai ?? '-') ?></td>
                                            <?php endforeach; ?>

                                        <?php endif; ?>

                                    </tr>

                                <?php endforeach; ?>


                            <?php else : ?>

                                <?php
                                $jumlahKolom = 1;

                                if ($jenisLaporan === 'data_aset') {
                                    $jumlahKolom = 6;
                                } elseif ($jenisLaporan === 'rekap_aset') {
                                    $jumlahKolom = 3;
                                } elseif ($jenisLaporan === 'kondisi_aset') {
                                    $jumlahKolom = 4;
                                } elseif ($jenisLaporan === 'data_lembaga' || $jenisLaporan === 'data_kategori') {
                                    $jumlahKolom = 2;
                                }
                                ?>

                                <tr>
                                    <td colspan="<?= $jumlahKolom ?>">
                                        <div class="empty-state">
                                            <i class="fas fa-folder-open"></i>
                                            Tidak ada data yang dapat ditampilkan.
                                        </div>
                                    </td>
                                </tr>

                            <?php endif; ?>

                        </tbody>

                    </table>

                </div>

            </section>

        <?php endif; ?>


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


        // VALIDASI RENTANG TANGGAL
        const tanggalMulai = document.getElementById('tanggal_mulai');
        const tanggalSelesai = document.getElementById('tanggal_selesai');

        tanggalMulai.addEventListener('change', function () {
            tanggalSelesai.min = this.value;

            if (tanggalSelesai.value && tanggalSelesai.value < this.value) {
                tanggalSelesai.value = '';
            }
        });

        tanggalSelesai.addEventListener('change', function () {
            tanggalMulai.max = this.value;

            if (tanggalMulai.value && tanggalMulai.value > this.value) {
                tanggalMulai.value = '';
            }
        });
    </script>

</body>
</html>
