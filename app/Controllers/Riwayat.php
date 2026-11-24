<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\RiwayatModel;

class Riwayat extends BaseController
{
    protected $riwayatModel;

    public function __construct()
    {
        $this->riwayatModel = new RiwayatModel();
    }

    public function index()
    {
        $data = [
            'title'        => 'Riwayat Aktivitas',
            'nama_lembaga' => session()->get('nama_lembaga') ?? 'Admin',
            'riwayat'      => $this->riwayatModel
                ->orderBy('tanggal_aktivitas', 'DESC')
                ->findAll()
        ];

        return view('riwayat/index', $data);
    }
}
