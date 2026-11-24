
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= esc($title ?? 'Data Kategori Aset | SIAP ASET PAUD-PNF') ?></title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

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
            --red: #dc515d;
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
            flex-shrink: 0;
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
            flex-shrink: 0;
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

        .date-pill i {
            color: #3478df;
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
            letter-spacing: -.02em;
        }

        .page-intro p {
            margin: 0;
            font-size: 11px;
            color: var(--muted);
            line-height: 1.7;
        }

        /* TABLE PANEL */
        .table-panel {
            background: white;
            border: 1px solid var(--line);
            border-radius: 15px;
            padding: 22px;
            box-shadow: 0 4px 14px #1b376408;
        }

        .table-heading {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 15px;
            margin-bottom: 20px;
        }

        .table-heading h3 {
            margin: 0 0 6px;
            color: var(--navy);
            font-size: 13px;
        }

        .table-heading p {
            margin: 0;
            font-size: 10px;
            color: var(--muted);
        }

        .btn-add {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            padding: 11px 17px;
            border: none;
            border-radius: 9px;
            background: linear-gradient(100deg, #286fe0, #3988f4);
            color: white;
            font-family: inherit;
            font-size: 11px;
            font-weight: 600;
            box-shadow: 0 5px 12px #2563eb25;
            transition: .2s;
            white-space: nowrap;
        }

        .btn-add:hover {
            transform: translateY(-2px);
            box-shadow: 0 7px 16px #2563eb35;
        }

        /* SEARCH */
        .table-tools {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 12px;
            margin-bottom: 18px;
        }

        .search-form {
            display: flex;
            align-items: center;
            gap: 8px;
            width: 100%;
            max-width: 390px;
        }

        .search-input {
            flex: 1;
            min-width: 0;
            padding: 11px 13px;
            border: 1px solid #e0e6ef;
            border-radius: 9px;
            outline: none;
            font-family: inherit;
            font-size: 11px;
        }

        .search-input:focus {
            border-color: #4385e9;
            box-shadow: 0 0 0 3px #3478e51a;
        }

        .btn-search {
            padding: 11px 15px;
            border: none;
            border-radius: 9px;
            background: #286fe0;
            color: white;
            font-family: inherit;
            font-size: 11px;
            font-weight: 600;
            cursor: pointer;
        }

        .btn-reset {
            padding: 11px 13px;
            border-radius: 9px;
            background: #f1f4f8;
            color: #64748b;
            font-size: 11px;
            font-weight: 600;
        }

        /* TABLE */
        .table-responsive {
            width: 100%;
            overflow-x: auto;
            border: 1px solid var(--line);
            border-radius: 10px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            min-width: 650px;
        }

        thead {
            background: #f5f8fd;
        }

        th {
            padding: 15px 17px;
            color: #687890;
            font-size: 10px;
            font-weight: 700;
            text-align: left;
            white-space: nowrap;
            border-bottom: 1px solid var(--line);
        }

        td {
            padding: 15px 17px;
            font-size: 11px;
            color: #52637b;
            border-bottom: 1px solid #edf1f7;
        }

        tbody tr:last-child td {
            border-bottom: none;
        }

        tbody tr:hover {
            background: #f9fbff;
        }

        .number {
            color: #8a97aa;
            width: 55px;
        }

        .category-name {
            color: var(--navy);
            font-weight: 600;
        }

        .description {
            color: #64748b;
            line-height: 1.6;
        }

        .action-group {
            display: flex;
            align-items: center;
            gap: 7px;
        }

        .action-group form {
            margin: 0;
        }

        .btn-action {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 6px;
            padding: 7px 10px;
            border-radius: 7px;
            font-family: inherit;
            font-size: 10px;
            font-weight: 600;
            transition: .2s;
        }

        .btn-edit {
            color: #2866c1;
            background: #edf4ff;
        }

        .btn-edit:hover {
            background: #dceaff;
        }

        .btn-delete {
            color: var(--red);
            background: #fff0f1;
            border: none;
            cursor: pointer;
        }

        .btn-delete:hover {
            background: #ffe0e2;
        }

        .empty-data {
            padding: 55px 15px;
            text-align: center;
        }

        .empty-icon {
            width: 52px;
            height: 52px;
            display: grid;
            place-items: center;
            margin: 0 auto 13px;
            border-radius: 15px;
            background: #edf4ff;
            color: #3478df;
            font-size: 21px;
        }

        .empty-data strong {
            display: block;
            margin-bottom: 6px;
            font-size: 12px;
            color: var(--navy);
        }

        .empty-data p {
            margin: 0;
            color: var(--muted);
            font-size: 10px;
        }

        /* ALERT */
        .alert {
            display: flex;
            align-items: center;
            gap: 10px;
            padding: 14px 17px;
            margin-bottom: 20px;
            border-radius: 10px;
            font-size: 11px;
            font-weight: 500;
            animation: fadeIn .3s ease;
        }

        .alert-success {
            color: #087f5b;
            background: #e8f8f1;
            border: 1px solid #bcebd7;
        }

        .alert-error {
            color: #bd3443;
            background: #fff1f2;
            border: 1px solid #ffd5d9;
        }

        .alert-icon {
            font-size: 17px;
            font-weight: 700;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(-5px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* PAGINATION */
        .table-footer {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 12px;
            margin-top: 20px;
        }

        .data-info {
            color: #8995a8;
            font-size: 10px;
        }

        .pagination {
            display: flex;
            align-items: center;
            gap: 7px;
            margin: 0;
            padding: 0;
            list-style: none;
        }

        .pagination li a,
        .pagination li span {
            min-width: 35px;
            height: 35px;
            display: grid;
            place-items: center;
            padding: 0 10px;
            border: 1px solid #e0e6ef;
            border-radius: 8px;
            color: #687890;
            background: white;
            font-size: 10px;
            transition: .2s;
        }

        .pagination li.active span,
        .pagination li.active a {
            color: white;
            background: #3478df;
            border-color: #3478df;
            box-shadow: 0 4px 10px #2563eb25;
        }

        .pagination li a:hover {
            color: var(--blue);
            border-color: #9dbdf0;
            background: #f4f8ff;
        }

        .pagination li.disabled span {
            opacity: .4;
            cursor: not-allowed;
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

            .table-panel {
                padding: 16px;
            }
        }

        @media (max-width: 600px) {
            .table-tools {
                align-items: stretch;
                flex-direction: column;
            }

            .search-form {
                max-width: 100%;
            }
        }

        @media (max-width: 440px) {
            .topbar {
                align-items: flex-start;
            }

            .avatar {
                display: none;
            }

            .table-heading {
                align-items: flex-start;
                flex-direction: column;
            }

            .btn-add {
                width: 100%;
            }

            .table-footer {
                align-items: flex-start;
                flex-direction: column;
            }

            .pagination {
                flex-wrap: wrap;
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

        <a class="menu active" href="<?= site_url('kategori-aset') ?>">
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
                <p>Gunakan menu di samping untuk mengelola kategori aset lembaga.</p>
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

                <h1>Data Kategori Aset</h1>
            </div>

            <div class="top-right">

                <div class="date-pill">
                    <span><i class="far fa-calendar-alt"></i></span>
                    <span id="todayDate">Memuat tanggal...</span>
                </div>

                <div class="avatar" title="<?= esc($nama_lembaga ?? 'Pengguna') ?>">
                    <?= esc(strtoupper(substr($nama_lembaga ?? 'L', 0, 1))) ?>
                </div>

            </div>
        </header>

        <!-- PAGE INTRO -->
        <section class="page-intro">
            <h2>Pengelolaan Data Kategori Aset</h2>
            <p>
                Kelola informasi kategori aset yang digunakan dalam sistem informasi aset PAUD-PNF.
            </p>
        </section>

        <!-- TABLE -->
        <section class="table-panel">

            <!-- NOTIFIKASI -->
            <?php if ($success = session()->getFlashdata('success')) : ?>
                <div class="alert alert-success">
                    <span class="alert-icon">✓</span>
                    <?= esc($success) ?>
                </div>
            <?php endif; ?>

            <?php if ($error = session()->getFlashdata('error')) : ?>
                <div class="alert alert-error">
                    <span class="alert-icon">!</span>
                    <?= esc($error) ?>
                </div>
            <?php endif; ?>

            <!-- TABLE HEADING -->
            <div class="table-heading">

                <div>
                    <h3>Daftar Kategori Aset</h3>
                    <p>Informasi nama dan keterangan kategori aset</p>
                </div>

                <a href="<?= site_url('kategori-aset/tambah') ?>" class="btn-add">
                    <i class="fas fa-plus"></i>
                    Tambah Kategori
                </a>

            </div>

            <!-- SEARCH -->
            <div class="table-tools">

                <form action="<?= site_url('kategori-aset') ?>" method="get" class="search-form">

                    <input
                        type="text"
                        name="keyword"
                        class="search-input"
                        placeholder="Cari nama kategori atau keterangan..."
                        value="<?= esc($keyword ?? '') ?>"
                    >

                    <button type="submit" class="btn-search">
                        <i class="fas fa-search"></i>
                        Cari
                    </button>

                    <?php if (!empty($keyword)) : ?>
                        <a href="<?= site_url('kategori-aset') ?>" class="btn-reset">
                            Reset
                        </a>
                    <?php endif; ?>

                </form>

            </div>

            <!-- DATA TABLE -->
            <div class="table-responsive">

                <table>
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Kategori</th>
                            <th>Keterangan</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>

                    <tbody>

                        <?php if (!empty($kategori)) : ?>

                            <?php $no = 1; ?>

                            <?php foreach ($kategori as $item) : ?>

                                <tr>

                                    <td class="number">
                                        <?= $no++ ?>
                                    </td>

                                    <td class="category-name">
                                        <?= esc($item['nama_kategori']) ?>
                                    </td>

                                    <td class="description">
                                        <?= esc($item['keterangan'] ?? '-') ?>
                                    </td>

                                    <td>
                                        <div class="action-group">

                                            <a
                                                href="<?= site_url('kategori-aset/edit/' . $item['id_kategori']) ?>"
                                                class="btn-action btn-edit"
                                            >
                                                <i class="fas fa-pen"></i>
                                                Edit
                                            </a>

                                            <form
                                                action="<?= site_url('kategori-aset/hapus/' . $item['id_kategori']) ?>"
                                                method="post"
                                                onsubmit="return confirm('Apakah Anda yakin ingin menghapus kategori aset ini?')"
                                            >

                                                <?= csrf_field() ?>

                                                <button type="submit" class="btn-action btn-delete">
                                                    <i class="fas fa-trash"></i>
                                                    Hapus
                                                </button>

                                            </form>

                                        </div>
                                    </td>

                                </tr>

                            <?php endforeach; ?>

                        <?php else : ?>

                            <tr>
                                <td colspan="4">

                                    <div class="empty-data">
                                        <div class="empty-icon">
                                            <i class="fas fa-layer-group"></i>
                                        </div>

                                        <strong>Belum Ada Data Kategori Aset</strong>

                                        <p>
                                            Silakan tambahkan kategori aset terlebih dahulu.
                                        </p>
                                    </div>

                                </td>
                            </tr>

                        <?php endif; ?>

                    </tbody>
                </table>

            </div>

            <!-- FOOTER TABLE -->
            <div class="table-footer">

                <div class="data-info">
                    Menampilkan <?= count($kategori ?? []) ?> data kategori aset
                </div>

                <?php if (isset($pager) && $pager->getPageCount() > 1) : ?>
                    <?= $pager->links('default', 'default_full') ?>
                <?php endif; ?>

            </div>

        </section>

        <!-- FOOTER -->
        <div class="footer">
            © <?= date('Y') ?> Sistem Informasi Aset PAUD-PNF
            · Pengelolaan aset lebih tertib dan terarah
        </div>

    </main>

    <!-- JAVASCRIPT -->
    <script>
        const dateEl = document.getElementById('todayDate');

        dateEl.textContent = new Intl.DateTimeFormat('id-ID', {
            day: 'numeric',
            month: 'long',
            year: 'numeric'
        }).format(new Date());
    </script>

</body>
</html>
