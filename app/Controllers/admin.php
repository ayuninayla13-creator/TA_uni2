<?php

namespace App\Controllers;

use App\Models\AdminModel;
use CodeIgniter\Controller;

class admin extends Controller
{
    protected $adminModel;

    public function __construct()
    {
        $this->adminModel = new adminModel();
    }

    public function index()
    {
        $admin = $this->adminModel->findAll();
        $data = [
            'title' => 'Data Admin',
            'admin' => $admin,
        ];

        return view('layout/admin', $data);
    }

    public function create()
    {
        $data = ['title' => 'Form Tambah Admin'];
        return view('layout/tambahadmin', $data);
    }

    public function save()
    {
        $this->adminModel->insert([
            'nama_admin' => $this->request->getVar('1'),
            'umur' => $this->request->getVar('2'),
            
        ]);
        session()->setFlashdata('Pesan', 'Data berhasil ditambahkan');
        return redirect()->to('/admin');
    }

    public function edit($nama_admin)
    {
    $admin = $this->adminModel->find($nama_admin);

    if (empty($admin)) {
        // Handle the case where the record with the given $nama_admin is not found
        return redirect()->to(base_url('admin'))->with('error', 'Admin dengan nama ' . $nama_admin . ' tidak ditemukan')->withInput();
    }

    $data = [
        'title' => 'Form Edit Admin',
        'admin' => $admin
    ];
    return view('layout/editadmin', $data);
    }
    

    public function delete($nama_admin)
    {
        $this->adminModel->delete($nama_admin);

        session()->setFlashdata('pesan', 'artikel Berhasil Dihapus');
        return redirect()->to(base_url('admin'));
    }


    public function update()
    {
        $id_artikel = $this->request->getVar('id_artikel');

        $this->artikelModel->update($id_artikel, [
            'id_artikel' => $this->request->getVar('id_artikel'),
            'judul_artikel' => $this->request->getVar('judul_artikel'),
            'id_author' => $this->request->getVar('id_author'),
            'penulis_ke' => $this->request->getVar('penulis_ke'),
        ]);

        session()->setFlashdata('Pesan', 'Data berhasil diupdate');
        return redirect()->to('/artikel');
}

public function print(){
    $data['artikel'] = $this->artikelModel->findAll();
    return view('layout/print_artikel', $data);
}



}

?>