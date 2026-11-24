<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\AsetModel;

class Laporan extends BaseController
{
    protected $asetModel;
    protected $db;

    public function __construct()
    {
        $this->asetModel = new AsetModel();
        $this->db = \Config\Database::connect();
    }

    public function index()
    {
        $jenisLaporan = $this->request->getGet('jenis_laporan');
        $tanggalMulai = $this->request->getGet('tanggal_mulai');
        $tanggalSelesai = $this->request->getGet('tanggal_selesai');

        $laporan = [];

        switch ($jenisLaporan) {

            case 'data_aset':
                $builder = $this->asetModel
                    ->select('
                        aset.*,
                        kategori_aset.nama_kategori,
                        lembaga.nama_lembaga
                    ')
                    ->join(
                        'kategori_aset',
                        'kategori_aset.id_kategori = aset.id_kategori',
                        'left'
                    )
                    ->join(
                        'lembaga',
                        'lembaga.id_lembaga = aset.id_lembaga',
                        'left'
                    );

                if (!empty($tanggalMulai)) {
                    $builder->where(
                        'aset.created_at >=',
                        $tanggalMulai . ' 00:00:00'
                    );
                }

                if (!empty($tanggalSelesai)) {
                    $builder->where(
                        'aset.created_at <=',
                        $tanggalSelesai . ' 23:59:59'
                    );
                }

                $laporan = $builder->findAll();
                break;

            case 'data_lembaga':
                $laporan = $this->db->table('lembaga')->get()->getResultArray();
                break;

            case 'data_kategori':
                $laporan = $this->db->table('kategori_aset')->get()->getResultArray();
                break;

            case 'rekap_aset':
                $laporan = $this->db->table('aset')
                    ->select('kategori_aset.nama_kategori, SUM(aset.jumlah) AS total_jumlah')
                    ->join('kategori_aset', 'kategori_aset.id_kategori = aset.id_kategori', 'left')
                    ->groupBy('aset.id_kategori')
                    ->get()
                    ->getResultArray();
                break;

            case 'kondisi_aset':
                $laporan = $this->db->table('aset')
                    ->select('kondisi, COUNT(*) AS total_data, SUM(jumlah) AS total_jumlah')
                    ->groupBy('kondisi')
                    ->get()
                    ->getResultArray();
                break;
        }

        $data = [
            'title'          => 'Laporan',
            'nama_lembaga'   => session()->get('nama_lembaga') ?? 'Admin',
            'jenisLaporan'   => $jenisLaporan,
            'tanggalMulai'   => $tanggalMulai,
            'tanggalSelesai' => $tanggalSelesai,
            'laporan'        => $laporan,
        ];

        return view('laporan/index', $data);
    }
}
