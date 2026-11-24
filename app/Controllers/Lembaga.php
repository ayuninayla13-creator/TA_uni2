<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\LembagaModel;

class Lembaga extends BaseController
{
    protected $lembagaModel;

    public function __construct()
    {
        $this->lembagaModel = new LembagaModel();
    }

    // Menampilkan seluruh data lembaga
    public function index()
    {
        $keyword = $this->request->getGet('keyword');

        $builder = $this->lembagaModel;

        // Pencarian berdasarkan nama, jenis, atau kecamatan
        if (!empty($keyword)) {
            $builder->groupStart()
                ->like('nama_lembaga', $keyword)
                ->orLike('jenis', $keyword)
                ->orLike('kecamatan', $keyword)
                ->groupEnd();
        }

        // Menampilkan maksimal 10 data per halaman
        $lembaga = $builder->orderBy('id_lembaga', 'DESC')
                        ->paginate(10);

        $data = [
            'title'        => 'Data Lembaga',
            'lembaga'      => $lembaga,
            'pager'        => $this->lembagaModel->pager,
            'keyword'      => $keyword,
            'nama_lembaga' => session()->get('nama_lembaga')
        ];

        return view('lembaga/index', $data);
    }


    // Menampilkan halaman tambah lembaga
    public function tambah()
    {
        return view('lembaga/tambah', [
            'title' => 'Tambah Lembaga'
        ]);
    }

    // Menyimpan data lembaga
    public function simpan()
    {
        $rules = [
            'nama_lembaga' => 'required|max_length[150]',
            'jenis'        => 'required|max_length[100]',
            'kecamatan'    => 'required|max_length[100]'
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()
                ->withInput()
                ->with('errors', $this->validator->getErrors());
        }

        $this->lembagaModel->insert([
            'nama_lembaga' => $this->request->getPost('nama_lembaga'),
            'jenis'        => $this->request->getPost('jenis'),
            'kecamatan'    => $this->request->getPost('kecamatan')
        ]);

        return redirect()->to(site_url('lembaga'))
            ->with('success', 'Data lembaga berhasil ditambahkan.');
    }

    // Menampilkan halaman edit
    public function edit($id)
    {
        $lembaga = $this->lembagaModel->find($id);

        if (!$lembaga) {
            return redirect()->to(site_url('lembaga'))
                ->with('error', 'Data lembaga tidak ditemukan.');
        }

        return view('lembaga/edit', [
            'title'   => 'Edit Lembaga',
            'lembaga' => $lembaga
        ]);
    }

    // Memperbarui data lembaga
    public function update($id)
    {
        $lembaga = $this->lembagaModel->find($id);

        if (!$lembaga) {
            return redirect()->to(site_url('lembaga'))
                ->with('error', 'Data lembaga tidak ditemukan.');
        }

        $rules = [
            'nama_lembaga' => 'required|max_length[150]',
            'jenis'        => 'required|max_length[100]',
            'kecamatan'    => 'required|max_length[100]'
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()
                ->withInput()
                ->with('errors', $this->validator->getErrors());
        }

        $this->lembagaModel->update($id, [
            'nama_lembaga' => $this->request->getPost('nama_lembaga'),
            'jenis'        => $this->request->getPost('jenis'),
            'kecamatan'    => $this->request->getPost('kecamatan')
        ]);

        return redirect()->to(site_url('lembaga'))
            ->with('success', 'Data lembaga berhasil diperbarui.');
    }

    // Menghapus data lembaga
    public function hapus($id)
    {
        $lembaga = $this->lembagaModel->find($id);

        if (!$lembaga) {
            return redirect()->to(site_url('lembaga'))
                ->with('error', 'Data lembaga tidak ditemukan.');
        }

        $this->lembagaModel->delete($id);

        return redirect()->to(site_url('lembaga'))
            ->with('success', 'Data lembaga berhasil dihapus.');
    }
}
