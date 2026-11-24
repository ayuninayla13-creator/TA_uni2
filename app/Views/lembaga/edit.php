
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Edit Lembaga | SIAP ASET PAUD-PNF</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    <style>
        :root {
            --navy: #142d4e;
            --blue: #2563eb;
            --muted: #7a879b;
            --line: #e7edf5;
            --bg: #f5f8fd;
        }

        * { box-sizing: border-box; }

        body {
            margin: 0;
            font-family: Inter, Arial, sans-serif;
            background: var(--bg);
            color: #1c2e49;
        }

        a { text-decoration: none; }

        .sidebar {
            position: fixed;
            inset: 0 auto 0 0;
            width: 250px;
            padding: 27px 18px;
            background: white;
            border-right: 1px solid var(--line);
            display: flex;
            flex-direction: column;
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
            font-size: 23px;
        }

        .brand-name {
            font-size: 13px;
            font-weight: 800;
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
        }

        .menu .icon {
            width: 20px;
            text-align: center;
            font-size: 16px;
        }

        .menu:hover { background: #f3f7ff; }

        .menu.active {
            color: white;
            background: linear-gradient(100deg, #286fe0, #3988f4);
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

        main {
            margin-left: 250px;
            padding: 28px 34px 36px;
        }

        .topbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 30px;
        }

        .eyebrow {
            font-size: 10px;
            color: var(--muted);
            margin-bottom: 7px;
        }

        h1 {
            margin: 0;
            color: var(--navy);
            font-size: 25px;
        }

        .top-right {
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .date-pill {
            background: white;
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
        }

        .page-intro { margin-bottom: 23px; }

        .page-intro h2 {
            margin: 0 0 7px;
            font-size: 17px;
            color: var(--navy);
        }

        .page-intro p {
            margin: 0;
            font-size: 11px;
            color: var(--muted);
            line-height: 1.7;
        }

        .form-panel {
            background: white;
            border: 1px solid var(--line);
            border-radius: 15px;
            padding: 25px;
            box-shadow: 0 4px 14px #1b376408;
            max-width: 850px;
        }

        .form-heading {
            padding-bottom: 19px;
            margin-bottom: 23px;
            border-bottom: 1px solid var(--line);
        }

        .form-heading h3 {
            margin: 0 0 6px;
            color: var(--navy);
            font-size: 14px;
        }

        .form-heading p {
            margin: 0;
            color: var(--muted);
            font-size: 11px;
        }

        .form-group { margin-bottom: 21px; }

        .form-group label {
            display: block;
            margin-bottom: 9px;
            color: #344760;
            font-size: 11px;
            font-weight: 600;
        }

        .required { color: #e05260; }

        .form-control {
            width: 100%;
            padding: 12px 14px;
            border: 1px solid #dfe6f0;
            border-radius: 9px;
            outline: none;
            font-family: inherit;
            font-size: 11px;
            color: #334660;
            background: white;
        }

        .form-control:focus {
            border-color: #4385e9;
            box-shadow: 0 0 0 3px #3478e51a;
        }

        .form-actions {
            display: flex;
            justify-content: flex-end;
            gap: 10px;
            padding-top: 20px;
            border-top: 1px solid var(--line);
        }

        .btn {
            padding: 11px 19px;
            border-radius: 9px;
            font-family: inherit;
            font-size: 11px;
            font-weight: 600;
            cursor: pointer;
            border: none;
        }

        .btn-back {
            color: #64748b;
            background: #f1f4f8;
        }

        .btn-save {
            color: white;
            background: linear-gradient(100deg, #286fe0, #3988f4);
        }

        .alert {
            padding: 13px 15px;
            border-radius: 9px;
            margin-bottom: 20px;
            font-size: 11px;
            background: #fff1f2;
            border: 1px solid #ffd5d9;
            color: #bd3443;
        }

        .footer {
            padding-top: 25px;
            text-align: center;
            font-size: 10px;
            color: #a1acbb;
        }

        @media (max-width: 760px) {
            .sidebar { width: 76px; padding: 22px 10px; }
            .brand { justify-content: center; padding: 0; }
            .brand-copy, .nav-label, .menu .menu-text, .help-card { display: none; }
            .menu { justify-content: center; padding: 13px 8px; }
            .menu .icon { width: auto; }
            main { margin-left: 76px; padding: 20px 15px; }
            .date-pill { display: none; }
            .form-panel { padding: 18px; }
        }

        @media (max-width: 440px) {
            .avatar { display: none; }
            .form-actions { flex-direction: column-reverse; }
            .btn { width: 100%; }
        }
    </style>
</head>

<body>

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
        <span class="icon">▦</span><span class="menu-text">Dashboard</span>
    </a>

    <a class="menu active" href="<?= site_url('lembaga') ?>">
        <span class="icon">⌂</span><span class="menu-text">Lembaga</span>
    </a>

    <a class="menu" href="<?= site_url('kategori-aset') ?>">
        <span class="icon">▤</span><span class="menu-text">Kategori Aset</span>
    </a>

    <a class="menu" href="<?= site_url('aset') ?>">
        <span class="icon">▣</span><span class="menu-text">Aset</span>
    </a>

    <a class="menu" href="<?= site_url('laporan') ?>">
        <span class="icon">▧</span><span class="menu-text">Laporan</span>
    </a>

    <a class="menu" href="<?= site_url('riwayat') ?>">
        <span class="icon">◷</span><span class="menu-text">Riwayat</span>
    </a>

    <div class="sidebar-bottom">
        <div class="help-card">
            <strong>Butuh bantuan?</strong>
            <p>Gunakan menu di samping untuk mengelola informasi aset lembaga.</p>
        </div>

        <a class="menu logout" href="<?= site_url('logout') ?>">
            <span class="icon">↪</span><span class="menu-text">Logout</span>
        </a>
    </div>
</aside>

<main>

    <header class="topbar">
        <div>
            <div class="eyebrow">Sistem Informasi Aset PAUD-PNF / Data Lembaga / Edit</div>
            <h1>Edit Lembaga</h1>
        </div>

        <div class="top-right">
            <div class="date-pill" id="todayDate"></div>
            <div class="avatar">A</div>
        </div>
    </header>

    <section class="page-intro">
        <h2>Perbarui Data Lembaga</h2>
        <p>Ubah informasi lembaga sesuai dengan data terbaru.</p>
    </section>

    <section class="form-panel">

        <div class="form-heading">
            <h3>Formulir Edit Lembaga</h3>
            <p>Pastikan informasi yang diperbarui sudah benar.</p>
        </div>

        <?php if (session()->getFlashdata('errors')) : ?>
            <div class="alert">
                <strong>Periksa kembali data yang dimasukkan:</strong>
                <ul>
                    <?php foreach (session()->getFlashdata('errors') as $error) : ?>
                        <li><?= esc($error) ?></li>
                    <?php endforeach; ?>
                </ul>
            </div>
        <?php endif; ?>

        <form action="<?= site_url('lembaga/update/' . $lembaga['id_lembaga']) ?>" method="post">

            <?= csrf_field() ?>

            <div class="form-group">
                <label for="nama_lembaga">Nama Lembaga <span class="required">*</span></label>
                <input
                    type="text"
                    id="nama_lembaga"
                    name="nama_lembaga"
                    class="form-control"
                    value="<?= esc(old('nama_lembaga') ?? $lembaga['nama_lembaga']) ?>"
                    maxlength="150"
                    required
                >
            </div>

            <div class="form-group">
                <label for="jenis">Jenis Lembaga <span class="required">*</span></label>
                <input
                    type="text"
                    id="jenis"
                    name="jenis"
                    class="form-control"
                    value="<?= esc(old('jenis') ?? $lembaga['jenis']) ?>"
                    maxlength="100"
                    required
                >
            </div>

            <div class="form-group">
                <label for="kecamatan">Kecamatan <span class="required">*</span></label>
                <input
                    type="text"
                    id="kecamatan"
                    name="kecamatan"
                    class="form-control"
                    value="<?= esc(old('kecamatan') ?? $lembaga['kecamatan']) ?>"
                    maxlength="100"
                    required
                >
            </div>

            <div class="form-actions">
                <a href="<?= site_url('lembaga') ?>" class="btn btn-back">Kembali</a>
                <button type="submit" class="btn btn-save">Simpan Perubahan</button>
            </div>

        </form>

    </section>

    <div class="footer">
        © <?= date('Y') ?> Sistem Informasi Aset PAUD-PNF
        · Pengelolaan aset lebih tertib dan terarah
    </div>

</main>

<script>
    document.getElementById('todayDate').textContent =
        new Intl.DateTimeFormat('id-ID', {
            day: 'numeric',
            month: 'long',
            year: 'numeric'
        }).format(new Date());
</script>

</body>
</html>
