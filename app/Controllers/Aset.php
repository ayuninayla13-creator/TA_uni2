<?php

namespace App\Controllers;

use App\Models\AsetModel;
use App\Models\KategoriAsetModel;
use App\Models\LembagaModel;
use App\Models\RiwayatModel;

class Aset extends BaseController
{
    protected $asetModel;
    protected $kategoriModel;
    protected $lembagaModel;
    protected $riwayatModel;

    public function __construct()
    {
        $this->asetModel = new AsetModel();
        $this->kategoriModel = new KategoriAsetModel();
        $this->lembagaModel = new LembagaModel();
        $this->riwayatModel = new RiwayatModel();
    }

    // Menampilkan data aset
    public function index()
    {
        $keyword = $this->request->getGet('keyword');

        $builder = $this->asetModel
            ->select('aset.*, kategori_aset.nama_kategori, lembaga.nama_lembaga')
            ->join('kategori_aset', 'kategori_aset.id_kategori = aset.id_kategori')
            ->join('lembaga', 'lembaga.id_lembaga = aset.id_lembaga');

        if (!empty($keyword)) {
            $builder->groupStart()
                ->like('aset.nama_aset', $keyword)
                ->orLike('kategori_aset.nama_kategori', $keyword)
                ->orLike('lembaga.nama_lembaga', $keyword)
                ->orLike('aset.kondisi', $keyword)
                ->groupEnd();
        }

        $aset = $builder
            ->orderBy('aset.id_aset', 'DESC')
            ->paginate(10);

        $data = [
            'title' => 'Data Aset',
            'aset' => $aset,
            'pager' => $this->asetModel->pager,
            'keyword' => $keyword,
            'nama_lembaga' => session()->get('nama_lembaga')
        ];

        return view('aset/index', $data);
    }

    // Menampilkan form tambah aset
    public function tambah()
    {
        $data = [
            'title' => 'Tambah Aset',
            'kategori' => $this->kategoriModel->findAll(),
            'lembaga' => $this->lembagaModel->findAll(),
            'nama_lembaga' => session()->get('nama_lembaga')
        ];

        return view('aset/tambah', $data);
    }

    // Menyimpan data aset
    public function simpan()
    {
        $dataAset = [
            'nama_aset' => $this->request->getPost('nama_aset'),
            'id_kategori' => $this->request->getPost('id_kategori'),
            'id_lembaga' => $this->request->getPost('id_lembaga'),
            'kondisi' => $this->request->getPost('kondisi')
        ];

        $this->asetModel->save($dataAset);

        $this->riwayatModel->insert([
            'aktivitas' => 'Tambah',
            'nama_tabel' => 'Aset',
            'keterangan' => 'Menambahkan aset ' . $dataAset['nama_aset'],
            'nama_admin' => session()->get('nama_lembaga') ?? 'Admin'
        ]);

        return redirect()->to(site_url('aset'))
            ->with('success', 'Data aset berhasil ditambahkan.');
    }

    // Menampilkan form edit aset
    public function edit($id)
    {
        $aset = $this->asetModel->find($id);

        if (!$aset) {
            return redirect()->to(site_url('aset'))
                ->with('error', 'Data aset tidak ditemukan.');
        }

        $data = [
            'title' => 'Edit Aset',
            'aset' => $aset,
            'kategori' => $this->kategoriModel->findAll(),
            'lembaga' => $this->lembagaModel->findAll(),
            'nama_lembaga' => session()->get('nama_lembaga')
        ];

        return view('aset/edit', $data);
    }

    // Memperbarui data aset
    public function update($id)
    {
        $aset = $this->asetModel->find($id);

        if (!$aset) {
            return redirect()->to(site_url('aset'))
                ->with('error', 'Data aset tidak ditemukan.');
        }

        $dataAset = [
            'nama_aset' => $this->request->getPost('nama_aset'),
            'id_kategori' => $this->request->getPost('id_kategori'),
            'id_lembaga' => $this->request->getPost('id_lembaga'),
            'kondisi' => $this->request->getPost('kondisi')
        ];

        $this->asetModel->update($id, $dataAset);

        $this->riwayatModel->insert([
            'aktivitas' => 'Edit',
            'nama_tabel' => 'Aset',
            'keterangan' => 'Memperbarui data aset ' . $dataAset['nama_aset'],
            'nama_admin' => session()->get('nama_lembaga') ?? 'Admin'
        ]);

        return redirect()->to(site_url('aset'))
            ->with('success', 'Data aset berhasil diperbarui.');
    }

    // Menghapus data aset
    public function hapus($id)
    {
        $aset = $this->asetModel->find($id);

        if (!$aset) {
            return redirect()->to(site_url('aset'))
                ->with('error', 'Data aset tidak ditemukan.');
        }

        $this->asetModel->delete($id);

        $this->riwayatModel->insert([
            'aktivitas' => 'Hapus',
            'nama_tabel' => 'Aset',
            'keterangan' => 'Menghapus aset ' . $aset['nama_aset'],
            'nama_admin' => session()->get('nama_lembaga') ?? 'Admin'
        ]);

        return redirect()->to(site_url('aset'))
            ->with('success', 'Data aset berhasil dihapus.');
    }
}
