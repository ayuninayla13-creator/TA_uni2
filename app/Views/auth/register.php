fix full code<!DOCTYPE html>
<html lang="id">
 <head>
  <meta charset="utf-8"/>
  <meta content="width=device-width, initial-scale=1" name="viewport"/>
  <title>
   <?= esc($title ?? 'Daftar Akun') ?>
  </title>
  <link href="https://fonts.googleapis.com" rel="preconnect"/>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&amp;display=swap" rel="stylesheet"/>
  <style>
:root {
    --navy:#142d4e;
    --blue:#2563eb;
    --sky:#eaf3ff;
    --ink:#172b4d;
    --muted:#718096;
    --line:#e3eaf3;
    --white:#fff;
    --green:#12a889
}
* {
    box-sizing:border-box
}
html,body {
    margin:0;
    min-height:100%;
    font-family:Inter,"Segoe UI",Arial,sans-serif;
    color:var(--ink)
}
body {
    background:#f4f7fc
}
.auth-shell {
    min-height:100vh;
    display:grid;
    grid-template-columns:minmax(320px,1fr) minmax(420px,1fr);
    background:#fff
}
.visual-panel {
    position:relative;
    overflow:hidden;
    display:flex;
    flex-direction:column;
    justify-content:space-between;
    padding:42px clamp(28px,5vw,76px);
    color:#fff;
    background:linear-gradient(145deg,#12315b 0%,#1d4d87 52%,#2877b9 100%)
}
.visual-panel:before,.visual-panel:after {
    content:"";
    position:absolute;
    border:1px solid rgba(255,255,255,.13);
    border-radius:50%;
    pointer-events:none
}
.visual-panel:before {
    width:520px;
    height:520px;
    right:-210px;
    top:8%
}
.visual-panel:after {
    width:360px;
    height:360px;
    right:-130px;
    top:20%
}
.brand {
    display:flex;
    align-items:center;
    gap:12px;
    position:relative;
    z-index:1
}
.brand-mark {
    width:44px;
    height:44px;
    border-radius:14px;
    display:grid;
    place-items:center;
    background:rgba(255,255,255,.16);
    border:1px solid rgba(255,255,255,.25);
    font-size:23px
}
.brand-name {
    font-size:14px;
    font-weight:800;
    letter-spacing:.04em
}
.brand-sub {
    font-size:11px;
    opacity:.72;
    margin-top:4px;
    letter-spacing:.08em
}
.visual-copy {
    position:relative;
    z-index:1;
    max-width:520px;
    margin:60px 0
}
.eyebrow {
    font-size:11px;
    font-weight:800;
    letter-spacing:.16em;
    text-transform:uppercase;
    color:#b8ddff
}
.visual-copy h1 {
    font-size:clamp(32px,3.7vw,53px);
    line-height:1.12;
    letter-spacing:-.04em;
    margin:18px 0
}
.visual-copy p {
    font-size:15px;
    line-height:1.85;
    color:rgba(255,255,255,.78);
    max-width:440px
}
.feature-list {
    display:grid;
    gap:15px;
    margin-top:30px
}
.feature {
    display:flex;
    align-items:center;
    gap:12px;
    font-size:13px;
    color:rgba(255,255,255,.9)
}
.feature-icon {
    width:31px;
    height:31px;
    display:grid;
    place-items:center;
    border-radius:10px;
    background:rgba(255,255,255,.13);
    font-size:15px
}
.visual-footer {
    position:relative;
    z-index:1;
    font-size:11px;
    color:rgba(255,255,255,.62)
}
.form-panel {
    display:flex;
    align-items:center;
    justify-content:center;
    padding:38px 28px;
    background:#fff
}
.form-wrap {
    width:100%;
    max-width:430px
}
.mobile-brand {
    display:none
}
.form-heading .tag {
    display:inline-flex;
    align-items:center;
    gap:7px;
    padding:7px 11px;
    border-radius:99px;
    background:#eff6ff;
    color:#245ab7;
    font-size:11px;
    font-weight:800;
    letter-spacing:.04em
}
.form-heading h2 {
    font-size:30px;
    letter-spacing:-.035em;
    margin:20px 0 8px;
    color:#152b49
}
.form-heading p {
    font-size:13px;
    line-height:1.7;
    color:var(--muted);
    margin:0 0 26px
}
.field {
    margin-bottom:17px
}
.field label {
    display:block;
    font-size:12px;
    font-weight:700;
    margin-bottom:8px;
    color:#344663
}
.field input,.field select {
    width:100%;
    height:47px;
    border:1px solid #dce4ef;
    border-radius:11px;
    background:#fbfdff;
    padding:0 14px;
    color:#243954;
    font:inherit;
    font-size:13px;
    outline:none;
    transition:.2s
}
.field input:focus,.field select:focus {
    border-color:#4384ee;
    box-shadow:0 0 0 4px rgba(37,99,235,.1);
    background:#fff
}
.field input::placeholder {
    color:#a4afbf
}
.field select:invalid {
    color:#a4afbf
}
.field-grid {
    display:grid;
    grid-template-columns:1fr 1fr;
    gap:0 14px
}
.field small {
    display:block;
    margin-top:6px;
    color:#8491a5;
    font-size:10px
}
.password-wrap {
    position:relative
}
.password-wrap input {
    padding-right:45px
}
.toggle-password {
    position:absolute;
    right:12px;
    top:50%;
    transform:translateY(-50%);
    border:0;
    background:transparent;
    color:#8290a5;
    cursor:pointer;
    font-size:12px
}
.form-options {
    display:flex;
    align-items:center;
    justify-content:space-between;
    gap:12px;
    font-size:11px;
    color:#65748b;
    margin:4px 0 20px
}
.checkline {
    display:flex;
    align-items:flex-start;
    gap:8px;
    line-height:1.5
}
.checkline input {
    accent-color:var(--blue);
    margin-top:2px
}
.text-link {
    color:#2563eb;
    text-decoration:none;
    font-weight:700
}
.text-link:hover {
    text-decoration:underline
}
.primary-btn {
    width:100%;
    height:49px;
    border:0;
    border-radius:11px;
    background:linear-gradient(100deg,#2672e8,#3389f4);
    color:#fff;
    font-size:13px;
    font-weight:800;
    letter-spacing:.02em;
    cursor:pointer;
    box-shadow:0 8px 18px rgba(37,99,235,.2);
    transition:transform .2s,box-shadow .2s
}
.primary-btn:hover {
    transform:translateY(-1px);
    box-shadow:0 11px 22px rgba(37,99,235,.27)
}
.divider {
    display:flex;
    align-items:center;
    gap:12px;
    color:#a2adbd;
    font-size:10px;
    margin:22px 0
}
.divider:before,.divider:after {
    content:"";
    height:1px;
    background:#e8edf4;
    flex:1
}
.switch-copy {
    text-align:center;
    font-size:12px;
    color:#758197;
    margin-top:20px
}
.secure-note {
    display:flex;
    justify-content:center;
    gap:7px;
    align-items:center;
    color:#8b97a9;
    font-size:10px;
    margin-top:26px
}
.notice {
    display:none;
    padding:11px 13px;
    border-radius:10px;
    background:#ecfdf5;
    color:#047857;
    font-size:12px;
    margin-bottom:17px;
    line-height:1.5
}
.notice.show {
    display:block
}
.form-footer {
    margin-top:20px;
    text-align:center;
    font-size:10px;
    color:#a0aaba
}
@media(max-width:850px) {
    .auth-shell {
        grid-template-columns:1fr
    }
    .visual-panel {
        display:none
    }
    .form-panel {
        min-height:100vh;
        padding:30px 22px
    }
    .mobile-brand {
        display:flex;
        align-items:center;
        gap:10px;
        margin-bottom:35px
    }
    .mobile-brand .brand-mark {
        background:#eaf2ff;
        color:#2461c4;
        border:0
    }
    .mobile-brand .brand-name {
        color:#183253
    }
    .mobile-brand .brand-sub {
        color:#8290a5
    }
    .form-wrap {
        max-width:480px
    }
}
@media(max-width:520px) {
    .form-heading h2 {
        font-size:27px
    }
    .field-grid {
        grid-template-columns:1fr;
        gap:0
    }
    .form-panel {
        padding:24px 19px
    }
    .mobile-brand {
        margin-bottom:28px
    }
}
  </style>
 </head>
 <body>
  <div class="auth-shell">
   <aside class="visual-panel">
    <div class="brand">
     <div class="brand-mark">
      ⌂
     </div>
     <div>
      <div class="brand-name">
       SIP ASET PAUD-PNF
      </div>
      <div class="brand-sub">
       SISTEM INFORMASI ASET
      </div>
     </div>
    </div>
    <div class="visual-copy">
     <div class="eyebrow">
      Pendaftaran akun lembaga
     </div>
     <h1>
      Mulai kelola data aset dengan lebih mudah.
     </h1>
     <p>
      Lengkapi informasi lembaga dan buat akun agar Anda dapat menggunakan portal Sistem Informasi Aset PAUD-PNF.
     </p>
     <div class="feature-list">
      <div class="feature">
       <span class="feature-icon">
        ✓
       </span>
       Isi data lembaga dengan benar
      </div>
      <div class="feature">
       <span class="feature-icon">
        ⌁
       </span>
       Simpan informasi akun dengan aman
      </div>
      <div class="feature">
       <span class="feature-icon">
        ▣
       </span>
       Gunakan NPSN lembaga yang terdaftar
      </div>
     </div>
    </div>
    <div class="visual-footer">
     © <?= date('Y') ?> Sistem Informasi Aset PAUD-PNF
    </div>
   </aside>
   <main class="form-panel">
    <div class="form-wrap">
     <div class="mobile-brand">
      <div class="brand-mark">
       ⌂
      </div>
      <div>
       <div class="brand-name">
        SIP ASET PAUD-PNF
       </div>
       <div class="brand-sub">
        SISTEM INFORMASI ASET
       </div>
      </div>
     </div>
     <div class="form-heading">
      <span class="tag">
       ✦ REGISTRASI LEMBAGA
      </span>
      <h2>
       Buat akun baru
      </h2>
      <p>
       Lengkapi formulir berikut untuk mendaftarkan lembaga Anda.
      </p>
     </div>
     <?php if (session()->has('errors')): ?>
      <div class="notice show" role="alert">
       <strong>Periksa kembali data pendaftaran:</strong>
       <ul>
        <?php foreach (session('errors') as $error): ?>
         <li><?= esc($error) ?></li>
        <?php endforeach; ?>
       </ul>
      </div>
      <?php endif; ?>
      <div class="notice" id="formNotice" role="status"></div>
     <form
        id="registerForm"
        action="<?= site_url('daftar/simpan') ?>"
        method="post"
    >
        <?= csrf_field() ?>
      <div class="field-grid">
       <div class="field">
        <label for="npsn">
         NPSN
        </label>
        <input id="npsn" name="npsn" type="text" inputmode="numeric" maxlength="8" value="<?= esc(old('npsn')) ?>" placeholder="8 digit NPSN" required/>
       </div>
       <div class="field">
        <label for="whatsapp">
         No. WhatsApp
        </label>
        <input id="whatsapp" name="no_whatsapp" type="tel" value="<?= esc(old('no_whatsapp')) ?>" placeholder="08xxxxxxxxxx" required/>
       </div>
       <div class="field">
        <label for="nama">
         Nama Lembaga
        </label>
        <input id="nama" name="nama_lembaga" value="<?= esc(old('nama_lembaga')) ?>" placeholder="Nama resmi lembaga" required/>
       </div>
       <div class="field">
        <label for="email">
         Email Lembaga
        </label>
        <input id="email" name="email" type="email" value="<?= esc(old('email')) ?>" placeholder="nama@lembaga.sch.id" required/>
       </div>
      </div>
      <div class="field">
       <label for="provinsi">
        Alamat Lembaga
       </label>
       <div class="field-grid">
        <div class="field">
         <select id="provinsi" name="provinsi" required="">
          <option disabled="" selected="" value="">
           Pilih Provinsi
          </option>
          <option>
           Sumatera Barat
          </option>
          <option>
           Riau
          </option>
          <option>
           Sumatera Utara
          </option>
          <option>
           Jambi
          </option>
          <option>
           Sumatera Selatan
          </option>
          <option>
           DKI Jakarta
          </option>
          <option>
           Jawa Barat
          </option>
          <option>
           Jawa Tengah
          </option>
          <option>
           Jawa Timur
          </option>
          <option>
           Daerah Istimewa Yogyakarta
          </option>
          <option>
           Bali
          </option>
          <option>
           Kalimantan Barat
          </option>
          <option>
           Kalimantan Timur
          </option>
          <option>
           Sulawesi Selatan
          </option>
          <option>
           Papua
          </option>
          <option>
           Lainnya
          </option>
         </select>
        </div>
        <div class="field">
         <input id="kabupaten" name="kabupaten" value="<?= esc(old('kabupaten')) ?>" placeholder="Kabupaten / Kota" required/>
        </div>
       </div>
       <div class="field-grid">
        <div class="field">
         <input id="kecamatan" name="kecamatan" value="<?= esc(old('kecamatan')) ?>" placeholder="Kecamatan" required/>
        </div>
        <div class="field">
         <input id="kelurahan" name="kelurahan" value="<?= esc(old('kelurahan')) ?>" placeholder="Kelurahan / Nagari" required/>
        </div>
       </div>
       <input id="alamat" name="alamat" value="<?= esc(old('alamat')) ?>" placeholder="Jalan, nomor, RT/RW" required/>
      </div>
      <div class="field-grid">
       <div class="field">
        <label for="question">
         Pertanyaan Keamanan
        </label>
        <select id="question" name="pertanyaan_keamanan" required="">
         <option disabled="" selected="" value="">
          Pilih pertanyaan
         </option>
         <option>
          Siapa nama panggilan Anda?
         </option>
         <option>
          Di kota mana lembaga didirikan?
         </option>
         <option>
          Siapa nama kepala lembaga?
         </option>
        </select>
       </div>
       <div class="field">
        <label for="answer">
         Jawaban Keamanan
        </label>
        <input id="answer" name="jawaban_keamanan" placeholder="Masukkan jawaban" required=""/>
       </div>
      </div>
      <div class="field-grid">
       <div class="field">
        <label for="password">
         Password
        </label>
        <div class="password-wrap">
         <input id="password" minlength="8" name="password" placeholder="Minimal 8 karakter" required="" type="password"/>
         <button class="toggle-password" data-target="password" type="button">
          Lihat
         </button>
        </div>
       </div>
       <div class="field">
        <label for="confirm">
         Konfirmasi Password
        </label>
        <div class="password-wrap">
         <input id="confirm" minlength="8" name="konfirmasi_password" placeholder="Ulangi password" required="" type="password"/>
         <button class="toggle-password" data-target="confirm" type="button">
          Lihat
         </button>
        </div>
       </div>
      </div>
      <div class="form-options">
       <label class="checkline">
        <input id="agree" required="" type="checkbox"/>
        Saya memastikan data yang dimasukkan benar dan dapat dipertanggungjawabkan.
       </label>
      </div>
      <button class="primary-btn" type="submit">
       Buat Akun
       <span aria-hidden="true">
        →
       </span>
      </button>
     </form>
     <div class="switch-copy">
      Sudah memiliki akun?
      <a class="text-link" href="<?= site_url('login') ?>">
       Masuk di sini
      </a>
     </div>
     <div class="secure-note">
      ♢ Data lembaga harus sesuai dengan informasi resmi
     </div>
     <div class="form-footer">
      Sistem Informasi Aset PAUD-PNF
     </div>
    </div>
   </main>
  </div>
  <script>
   document.querySelectorAll('.toggle-password').forEach((button) => {
    button.addEventListener('click', () => {
     const input = document.getElementById(button.dataset.target);
     input.type = input.type === 'password' ? 'text' : 'password';
     button.textContent = input.type === 'password' ? 'Lihat' : 'Tutup';
    });
   });

   document.getElementById('registerForm').addEventListener('submit', (event) => {
    const password = document.getElementById('password').value;
    const confirmation = document.getElementById('confirm').value;
    const notice = document.getElementById('formNotice');

    if (password !== confirmation) {
     event.preventDefault();
     notice.textContent = 'Konfirmasi password belum sama dengan password.';
     notice.classList.add('show');
     document.getElementById('confirm').focus();
    }
   });
  </script>
 </body>
</html>