<?php

namespace App\Controllers;

use App\Models\AkunLembagaModel;
use CodeIgniter\Controller;

class Auth extends Controller
{
    public function login()
    {
        return view('auth/login', [
            'title' => 'Masuk | Sistem Informasi Aset PAUD-PNF',
        ]);
    }

    public function register()
    {
        return view('auth/register', [
            'title' => 'Daftar Akun | Sistem Informasi Aset PAUD-PNF',
        ]);
    }

    public function simpanDaftar()
    {
        $rules = [
            'npsn' => [
                'label' => 'NPSN',
                'rules' => 'required|numeric|exact_length[8]|is_unique[akun_lembaga.npsn]',
                'errors' => [
                    'is_unique' => 'NPSN sudah terdaftar.',
                ],
            ],
            'nama_lembaga' => 'required|max_length[150]',
            'email' => [
                'label' => 'Email',
                'rules' => 'required|valid_email|max_length[150]|is_unique[akun_lembaga.email]',
                'errors' => [
                    'is_unique' => 'Email sudah terdaftar.',
                ],
            ],
            'no_whatsapp' => 'required|max_length[20]',
            'provinsi' => 'required|max_length[100]',
            'kabupaten' => 'required|max_length[100]',
            'kecamatan' => 'required|max_length[100]',
            'kelurahan' => 'required|max_length[100]',
            'alamat' => 'required',
            'pertanyaan_keamanan' => 'required|max_length[255]',
            'jawaban_keamanan' => 'required|max_length[255]',
            'password' => 'required|min_length[8]',
            'konfirmasi_password' => 'required|matches[password]',
        ];

        if (! $this->validate($rules)) {
            return redirect()->back()
                ->withInput()
                ->with('errors', $this->validator->getErrors());
        }

        $model = new AkunLembagaModel();

        $model->insert([
            'npsn' => trim($this->request->getPost('npsn')),
            'nama_lembaga' => trim($this->request->getPost('nama_lembaga')),
            'email' => strtolower(trim($this->request->getPost('email'))),
            'no_whatsapp' => trim($this->request->getPost('no_whatsapp')),
            'provinsi' => trim($this->request->getPost('provinsi')),
            'kabupaten' => trim($this->request->getPost('kabupaten')),
            'kecamatan' => trim($this->request->getPost('kecamatan')),
            'kelurahan' => trim($this->request->getPost('kelurahan')),
            'alamat' => trim($this->request->getPost('alamat')),
            'pertanyaan_keamanan' => trim(
                $this->request->getPost('pertanyaan_keamanan')
            ),
            'jawaban_keamanan' => password_hash(
                strtolower(trim($this->request->getPost('jawaban_keamanan'))),
                PASSWORD_DEFAULT
            ),
            'password' => password_hash(
                $this->request->getPost('password'),
                PASSWORD_DEFAULT
            ),
        ]);

        return redirect()->to(site_url('login'))
            ->with('success', 'Pendaftaran berhasil! Silakan masuk.');
    }

    public function prosesLogin()
    {
        $npsn = trim((string) $this->request->getPost('npsn'));
        $password = (string) $this->request->getPost('password');

        $model = new \App\Models\AkunLembagaModel();
        $akun = $model->where('npsn', $npsn)->first();

        if (!$akun) {
            return redirect()->to(site_url('login'))
                ->withInput()
                ->with('error', 'NPSN tidak ditemukan.');
        }

        if (!password_verify($password, $akun['password'])) {
            return redirect()->to(site_url('login'))
                ->withInput()
                ->with('error', 'Password tidak sesuai.');
        }

        session()->regenerate();

        session()->set([
            'logged_in' => true,
            'akun_id' => $akun['id'],
            'nama_lembaga' => $akun['nama_lembaga'],
            'npsn' => $akun['npsn'],
        ]);

        return redirect()->to(site_url('dashboard'));
    }

    public function dashboard()
    {
        if (!session()->get('logged_in')) {
            return redirect()->to(site_url('login'))
                ->with('error', 'Silakan login terlebih dahulu.');
        }

        return view('dashboard/index', [
            'title' => 'Dashboard | Sistem Informasi Aset PAUD-PNF',
            'nama_lembaga' => session()->get('nama_lembaga'),
        ]);
    }

    public function logout()
    {
        session()->destroy();

        return redirect()->to(site_url('login'))
            ->with('success', 'Kamu berhasil logout.');
    }
}
