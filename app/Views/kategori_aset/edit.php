
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= esc($title ?? 'Edit Kategori Aset | SIP ASET PAUD-PNF') ?></title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    <style>
        :root {
            --navy: #142d4e;
            --blue: #2563eb;
            --ink: #1c2e49;
            --muted: #7a879b;
            --line: #e7edf5;
            --bg: #f5f8fd;
            --red: #dc515d;
        }

        * { box-sizing: border-box; }

        body {
            margin: 0;
            font-family: Inter, "Segoe UI", Arial, sans-serif;
            background: var(--bg);
            color: var(--ink);
        }

        a { text-decoration: none; }

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
            font-size: 23px;
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
            font-size: 16px;
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

        .sidebar-bottom { margin-top: auto; }

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

        .logout { color: #d04b59; }

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

        /* FORM PANEL */
        .form-panel {
            background: #fff;
            border: 1px solid var(--line);
            border-radius: 15px;
            padding: 25px;
            box-shadow: 0 4px 14px #1b376408;
            max-width: 850px;
        }

        .form-heading {
            margin-bottom: 23px;
        }

        .form-heading h3 {
            margin: 0 0 6px;
            color: var(--navy);
            font-size: 14px;
        }

        .form-heading p {
            margin: 0;
            color: var(--muted);
            font-size: 10px;
            line-height: 1.6;
        }

        .form-group { margin-bottom: 19px; }

        .form-group label {
            display: block;
            margin-bottom: 8px;
            color: #40536d;
            font-size: 11px;
            font-weight: 600;
        }

        .required { color: var(--red); }

        .form-control {
            width: 100%;
            padding: 12px 13px;
            border: 1px solid #e0e6ef;
            border-radius: 9px;
            outline: none;
            color: var(--ink);
            background: #fff;
            font-family: inherit;
            font-size: 11px;
            transition: .2s;
        }

        .form-control:focus {
            border-color: #4385e9;
            box-shadow: 0 0 0 3px #3478e51a;
        }

        textarea.form-control {
            min-height: 115px;
            resize: vertical;
            line-height: 1.6;
        }

        .form-hint {
            display: block;
            margin-top: 7px;
            color: #96a1b1;
            font-size: 10px;
        }

        /* BUTTONS */
        .form-actions {
            display: flex;
            align-items: center;
            gap: 9px;
            padding-top: 5px;
        }

        .btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            padding: 11px 17px;
            border: none;
            border-radius: 9px;
            font-family: inherit;
            font-size: 11px;
            font-weight: 600;
            cursor: pointer;
            transition: .2s;
        }

        .btn-primary {
            color: #fff;
            background: linear-gradient(100deg, #286fe0, #3988f4);
            box-shadow: 0 5px 12px #2563eb25;
        }

        .btn-primary:hover {
            transform: translateY(-1px);
            box-shadow: 0 7px 16px #2563eb35;
        }

        .btn-secondary {
            color: #64748b;
            background: #f1f4f8;
        }

        .btn-secondary:hover { background: #e8edf4; }

        .footer {
            padding-top: 25px;
            text-align: center;
            font-size: 10px;
            color: #a1acbb;
        }

        /* RESPONSIVE */
        @media (max-width: 1050px) {
            main { padding: 24px; }
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

            .date-pill { display: none; }
            h1 { font-size: 22px; }
            .form-panel { padding: 18px; }
        }

        @media (max-width: 440px) {
            .topbar { align-items: flex-start; }
            .avatar { display: none; }

            .form-actions {
                flex-direction: column;
                align-items: stretch;
            }

            .form-actions .btn { width: 100%; }
        }
    </style>
</head>

<body>

    <!-- SIDEBAR -->
    <aside class="sidebar">

        <div class="brand">
            <div class="brand-mark">⌂</div>
            <div class="brand-copy">
                <div class="brand-name">SIP ASET PAUD-PNF</div>
                <div class="brand-sub">SISTEM INFORMASI ASET</div>
            </div>
        </div>

        <div class="nav-label">MENU UTAMA</div>

        <a class="menu" href="<?= site_url('dashboard') ?>">
            <span class="icon">▦</span>
            <span class="menu-text">Dashboard</span>
        </a>

        <a class="menu" href="<?= site_url('lembaga') ?>">
            <span class="icon">⌂</span>
            <span class="menu-text">Lembaga</span>
        </a>

        <a class="menu active" href="<?= site_url('kategori-aset') ?>">
            <span class="icon">▤</span>
            <span class="menu-text">Kategori Aset</span>
        </a>

        <a class="menu" href="<?= site_url('aset') ?>">
            <span class="icon">▣</span>
            <span class="menu-text">Aset</span>
        </a>

        <a class="menu" href="<?= site_url('laporan') ?>">
            <span class="icon">▧</span>
            <span class="menu-text">Laporan</span>
        </a>

        <a class="menu" href="<?= site_url('riwayat') ?>">
            <span class="icon">◷</span>
            <span class="menu-text">Riwayat</span>
        </a>

        <div class="sidebar-bottom">

            <div class="help-card">
                <strong>Butuh bantuan?</strong>
                <p>Gunakan menu di samping untuk mengelola kategori aset lembaga.</p>
            </div>

            <a class="menu logout" href="<?= site_url('logout') ?>">
                <span class="icon">↪</span>
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
                <h1>Edit Kategori Aset</h1>
            </div>

            <div class="top-right">
                <div class="date-pill">
                    <span>▦</span>
                    <span id="todayDate">Memuat tanggal...</span>
                </div>

                <div class="avatar" title="<?= esc($nama_lembaga ?? 'Pengguna') ?>">
                    <?= esc(strtoupper(substr($nama_lembaga ?? 'L', 0, 1))) ?>
                </div>
            </div>
        </header>


        <!-- PAGE INTRO -->
        <section class="page-intro">
            <h2>Formulir Edit Kategori Aset</h2>
            <p>
                Perbarui informasi kategori aset yang tersimpan dalam sistem.
            </p>
        </section>


        <!-- FORM -->
        <section class="form-panel">

            <div class="form-heading">
                <h3>Informasi Kategori Aset</h3>
                <p>Ubah informasi berikut sesuai data kategori aset yang diperlukan.</p>
            </div>

            <form action="<?= site_url('kategori-aset/update/' . $kategori['id_kategori']) ?>" method="post">

                <?= csrf_field() ?>

                <div class="form-group">
                    <label for="nama_kategori">
                        Nama Kategori <span class="required">*</span>
                    </label>

                    <input
                        type="text"
                        id="nama_kategori"
                        name="nama_kategori"
                        class="form-control"
                        placeholder="Contoh: Peralatan Kantor"
                        value="<?= old('nama_kategori', $kategori['nama_kategori']) ?>"
                        maxlength="100"
                        required
                    >

                    <small class="form-hint">
                        Masukkan nama kategori aset.
                    </small>
                </div>

                <div class="form-group">
                    <label for="keterangan">Keterangan</label>

                    <textarea
                        id="keterangan"
                        name="keterangan"
                        class="form-control"
                        placeholder="Tuliskan keterangan kategori aset (opsional)"
                    ><?= old('keterangan', $kategori['keterangan']) ?></textarea>

                    <small class="form-hint">
                        Keterangan dapat dikosongkan jika tidak diperlukan.
                    </small>
                </div>

                <div class="form-actions">
                    <button type="submit" class="btn btn-primary">
                        Simpan Perubahan
                    </button>

                    <a href="<?= site_url('kategori-aset') ?>" class="btn btn-secondary">
                        Batal
                    </a>
                </div>

            </form>
        </section>


        <div class="footer">
            © <?= date('Y') ?> Sistem Informasi Aset PAUD-PNF
            · Pengelolaan aset lebih tertib dan terarah
        </div>

    </main>


    <script>
        // Tanggal hari ini
        const dateEl = document.getElementById('todayDate');

        dateEl.textContent = new Intl.DateTimeFormat('id-ID', {
            day: 'numeric',
            month: 'long',
            year: 'numeric'
        }).format(new Date());
    </script>

</body>
</html>
