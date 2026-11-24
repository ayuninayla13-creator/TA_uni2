<?php

namespace App\Controllers;

use App\Models\KategoriAsetModel;

class KategoriAset extends BaseController
{
    protected $kategoriModel;

    public function __construct()
    {
        $this->kategoriModel = new KategoriAsetModel();
    }

    // Menampilkan data kategori aset
    public function index()
    {
        $data = [
            'title' => 'Data Kategori Aset',
            'kategori' => $this->kategoriModel
                ->orderBy('id_kategori', 'DESC')
                ->findAll(),
            'nama_lembaga' => session()->get('nama_lembaga')
        ];

        return view('kategori_aset/index', $data);
    }

    // Menampilkan form tambah
    public function tambah()
    {
        $data = [
            'title' => 'Tambah Kategori Aset',
            'nama_lembaga' => session()->get('nama_lembaga')
        ];

        return view('kategori_aset/tambah', $data);
    }

    // Menyimpan kategori baru
    public function simpan()
    {
        $this->kategoriModel->save([
            'nama_kategori' => $this->request->getPost('nama_kategori'),
            'keterangan' => $this->request->getPost('keterangan')
        ]);

        return redirect()->to(site_url('kategori-aset'))
            ->with('success', 'Kategori aset berhasil ditambahkan.');
    }

    // Menampilkan form edit
    public function edit($id)
    {
        $kategori = $this->kategoriModel->find($id);

        if (!$kategori) {
            return redirect()->to(site_url('kategori-aset'))
                ->with('error', 'Data kategori aset tidak ditemukan.');
        }

        $data = [
            'title' => 'Edit Kategori Aset',
            'kategori' => $kategori,
            'nama_lembaga' => session()->get('nama_lembaga')
        ];

        return view('kategori_aset/edit', $data);
    }

    // Memperbarui kategori
    public function update($id)
    {
        $kategori = $this->kategoriModel->find($id);

        if (!$kategori) {
            return redirect()->to(site_url('kategori-aset'))
                ->with('error', 'Data kategori aset tidak ditemukan.');
        }

        $this->kategoriModel->update($id, [
            'nama_kategori' => $this->request->getPost('nama_kategori'),
            'keterangan' => $this->request->getPost('keterangan')
        ]);

        return redirect()->to(site_url('kategori-aset'))
            ->with('success', 'Kategori aset berhasil diperbarui.');
    }

    // Menghapus kategori
    public function hapus($id)
    {
        $kategori = $this->kategoriModel->find($id);

        if (!$kategori) {
            return redirect()->to(site_url('kategori-aset'))
                ->with('error', 'Data kategori aset tidak ditemukan.');
        }

        $this->kategoriModel->delete($id);

        return redirect()->to(site_url('kategori-aset'))
            ->with('success', 'Kategori aset berhasil dihapus.');
    }
}
