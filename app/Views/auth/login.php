<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= esc($title ?? 'Masuk') ?></title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        :root {
            --navy: #142d4e; --blue: #2563eb; --sky: #eaf3ff;
            --ink: #172b4d; --muted: #718096; --line: #e3eaf3;
            --white: #fff; --green: #12a889;
        }
        * { box-sizing: border-box; }
        html, body { margin: 0; min-height: 100%; font-family: Inter, "Segoe UI", Arial, sans-serif; color: var(--ink); }
        body { background: #f4f7fc; }
        .auth-shell { min-height: 100vh; display: grid; grid-template-columns: minmax(320px, 1fr) minmax(420px, 1fr); background: #fff; }
        .visual-panel { position: relative; overflow: hidden; display: flex; flex-direction: column; justify-content: space-between; padding: 42px clamp(28px, 5vw, 76px); color: #fff; background: linear-gradient(145deg, #12315b 0%, #1d4d87 52%, #2877b9 100%); }
        .visual-panel::before, .visual-panel::after { content: ""; position: absolute; border: 1px solid rgba(255,255,255,.13); border-radius: 50%; pointer-events: none; }
        .visual-panel::before { width: 520px; height: 520px; right: -210px; top: 8%; }
        .visual-panel::after { width: 360px; height: 360px; right: -130px; top: 20%; }
        .brand { display: flex; align-items: center; gap: 12px; position: relative; z-index: 1; }
        .brand-mark { width: 44px; height: 44px; border-radius: 14px; display: grid; place-items: center; background: rgba(255,255,255,.16); border: 1px solid rgba(255,255,255,.25); font-size: 23px; }
        .brand-name { font-size: 14px; font-weight: 800; letter-spacing: .04em; }
        .brand-sub { font-size: 11px; opacity: .72; margin-top: 4px; letter-spacing: .08em; }
        .visual-copy { position: relative; z-index: 1; max-width: 520px; margin: 60px 0; }
        .eyebrow { font-size: 11px; font-weight: 800; letter-spacing: .16em; text-transform: uppercase; color: #b8ddff; }
        .visual-copy h1 { font-size: clamp(32px, 3.7vw, 53px); line-height: 1.12; letter-spacing: -.04em; margin: 18px 0; }
        .visual-copy p { font-size: 15px; line-height: 1.85; color: rgba(255,255,255,.78); max-width: 440px; }
        .feature-list { display: grid; gap: 15px; margin-top: 30px; }
        .feature { display: flex; align-items: center; gap: 12px; font-size: 13px; color: rgba(255,255,255,.9); }
        .feature-icon { width: 31px; height: 31px; display: grid; place-items: center; border-radius: 10px; background: rgba(255,255,255,.13); font-size: 15px; }
        .visual-footer { position: relative; z-index: 1; font-size: 11px; color: rgba(255,255,255,.62); }
        .form-panel { display: flex; align-items: center; justify-content: center; padding: 38px 28px; background: #fff; }
        .form-wrap { width: 100%; max-width: 430px; }
        .mobile-brand { display: none; }
        .form-heading .tag { display: inline-flex; align-items: center; gap: 7px; padding: 7px 11px; border-radius: 99px; background: #eff6ff; color: #245ab7; font-size: 11px; font-weight: 800; letter-spacing: .04em; }
        .form-heading h2 { font-size: 30px; letter-spacing: -.035em; margin: 20px 0 8px; color: #152b49; }
        .form-heading p { font-size: 13px; line-height: 1.7; color: var(--muted); margin: 0 0 26px; }
        .field { margin-bottom: 17px; }
        .field label { display: block; font-size: 12px; font-weight: 700; margin-bottom: 8px; color: #344663; }
        .field input, .field select { width: 100%; height: 47px; border: 1px solid #dce4ef; border-radius: 11px; background: #fbfdff; padding: 0 14px; color: #243954; font: inherit; font-size: 13px; outline: none; transition: .2s; }
        .field input:focus, .field select:focus { border-color: #4384ee; box-shadow: 0 0 0 4px rgba(37,99,235,.1); background: #fff; }
        .field input::placeholder { color: #a4afbf; }
        .password-wrap { position: relative; }
        .password-wrap input { padding-right: 45px; }
        .toggle-password { position: absolute; right: 12px; top: 50%; transform: translateY(-50%); border: 0; background: transparent; color: #8290a5; cursor: pointer; font-size: 12px; }
        .form-options { display: flex; align-items: center; justify-content: space-between; gap: 12px; font-size: 11px; color: #65748b; margin: 4px 0 20px; }
        .checkline { display: flex; align-items: flex-start; gap: 8px; line-height: 1.5; }
        .checkline input { accent-color: var(--blue); margin-top: 2px; }
        .text-link { color: #2563eb; text-decoration: none; font-weight: 700; }
        .text-link:hover { text-decoration: underline; }
        .primary-btn { width: 100%; height: 49px; border: 0; border-radius: 11px; background: linear-gradient(100deg,#2672e8,#3389f4); color: #fff; font-size: 13px; font-weight: 800; letter-spacing: .02em; cursor: pointer; box-shadow: 0 8px 18px rgba(37,99,235,.2); transition: transform .2s, box-shadow .2s; }
        .primary-btn:hover { transform: translateY(-1px); box-shadow: 0 11px 22px rgba(37,99,235,.27); }
        .divider { display: flex; align-items: center; gap: 12px; color: #a2adbd; font-size: 10px; margin: 22px 0; }
        .divider::before, .divider::after { content: ""; height: 1px; background: #e8edf4; flex: 1; }
        .switch-copy { text-align: center; font-size: 12px; color: #758197; margin-top: 20px; }
        .secure-note { display: flex; justify-content: center; gap: 7px; align-items: center; color: #8b97a9; font-size: 10px; margin-top: 26px; }
        .notice { display: none; padding: 11px 13px; border-radius: 10px; font-size: 12px; margin-bottom: 17px; line-height: 1.5; }
        .notice.show { display: block; }
        .notice.success { background: #ecfdf5; color: #047857; }
        .notice.error { background: #fef2f2; color: #b91c1c; }
        .form-footer { margin-top: 20px; text-align: center; font-size: 10px; color: #a0aaba; }
        @media (max-width: 850px) {
            .auth-shell { grid-template-columns: 1fr; } .visual-panel { display: none; }
            .form-panel { min-height: 100vh; padding: 30px 22px; }
            .mobile-brand { display: flex; align-items: center; gap: 10px; margin-bottom: 35px; }
            .mobile-brand .brand-mark { background: #eaf2ff; color: #2461c4; border: 0; }
            .mobile-brand .brand-name { color: #183253; } .mobile-brand .brand-sub { color: #8290a5; }
            .form-wrap { max-width: 480px; }
        }
        @media (max-width: 520px) {
            .form-heading h2 { font-size: 27px; } .form-panel { padding: 24px 19px; }
            .mobile-brand { margin-bottom: 28px; }
        }
    </style>
</head>
<body>
    <div class="auth-shell">
        <aside class="visual-panel">
            <div class="brand">
                <div class="brand-mark">⌂</div>
                <div><div class="brand-name">SIP ASET PAUD-PNF</div><div class="brand-sub">SISTEM INFORMASI ASET</div></div>
            </div>
            <div class="visual-copy">
                <div class="eyebrow">Satu sistem, pengelolaan lebih mudah</div>
                <h1>Kelola aset pendidikan dengan lebih terarah.</h1>
                <p>Platform informasi untuk membantu pengelolaan data aset PAUD-PNF secara tertib, praktis, dan terintegrasi.</p>
                <div class="feature-list">
                    <div class="feature"><span class="feature-icon">✓</span>Data aset tersusun rapi dan mudah ditelusuri</div>
                    <div class="feature"><span class="feature-icon">⌁</span>Akses informasi dari satu tempat</div>
                    <div class="feature"><span class="feature-icon">▣</span>Antarmuka sederhana dan nyaman digunakan</div>
                </div>
            </div>
            <div class="visual-footer">© <?= date('Y') ?> Sistem Informasi Aset PAUD-PNF</div>
        </aside>

        <main class="form-panel">
            <div class="form-wrap">
                <div class="mobile-brand">
                    <div class="brand-mark">⌂</div>
                    <div><div class="brand-name">SIP ASET PAUD-PNF</div><div class="brand-sub">SISTEM INFORMASI ASET</div></div>
                </div>
                <div class="form-heading">
                    <span class="tag">✦ PORTAL PENGGUNA</span>
                    <h2>Selamat datang!</h2>
                    <p>Masuk ke akun Anda untuk melanjutkan ke Sistem Informasi Aset PAUD-PNF.</p>
                </div>

                <?php if (session()->has('success')): ?>
                    <div class="notice success show" role="status"><?= esc(session('success')) ?></div>
                <?php endif; ?>

                <?php if (session()->has('error')): ?>
                    <div class="notice error show" role="alert"><?= esc(session('error')) ?></div>
                <?php endif; ?>

                <div class="notice" id="formNotice" role="status"></div>

                <form id="loginForm" action="<?= site_url('login/proses') ?>" method="post" autocomplete="on">
                    <?= csrf_field() ?>
                    <div class="field">
                        <label for="npsn">Username / NPSN</label>
                        <input id="npsn" name="npsn" type="text"
                            value="<?= esc(old('npsn') ?? '') ?>"
                            placeholder="Masukkan username atau NPSN"
                            autocomplete="username" inputmode="numeric" maxlength="8" required>
                    </div>
                    <div class="field">
                        <label for="password">Password</label>
                        <div class="password-wrap">
                            <input id="password" name="password" type="password"
                                placeholder="Masukkan password" autocomplete="current-password" required>
                            <button class="toggle-password" type="button" data-target="password">Lihat</button>
                        </div>
                    </div>
                    <div class="form-options">
                        <label class="checkline"><input type="checkbox" name="remember">Ingat saya</label>
                        <a class="text-link" href="#" id="forgotLink">Lupa password?</a>
                    </div>
                    <button class="primary-btn" type="submit">Masuk ke Akun <span aria-hidden="true">→</span></button>
                </form>

                <div class="divider">PENGGUNA BARU?</div>
                <div class="switch-copy">Belum memiliki akun? <a class="text-link" href="<?= site_url('daftar') ?>">Daftar sekarang</a></div>
                <div class="secure-note">♢ Akses aman · Gunakan akun resmi lembaga Anda</div>
                <div class="form-footer">Sistem Informasi Aset PAUD-PNF</div>
            </div>
        </main>
    </div>
    <script>
        document.querySelectorAll('.toggle-password').forEach((button) => {
            button.addEventListener('click', () => {
                const input = document.getElementById(button.dataset.target);
                const isPassword = input.type === 'password';
                input.type = isPassword ? 'text' : 'password';
                button.textContent = isPassword ? 'Tutup' : 'Lihat';
            });
        });

        document.getElementById('forgotLink').addEventListener('click', (event) => {
            event.preventDefault();
            const notice = document.getElementById('formNotice');
            notice.className = 'notice error show';
            notice.textContent = 'Silakan hubungi administrator sistem untuk bantuan pemulihan password.';
        });
    </script>
</body>
</html>
