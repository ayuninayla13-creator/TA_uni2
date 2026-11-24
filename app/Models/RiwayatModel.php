<?php

namespace App\Models;

use CodeIgniter\Model;

class RiwayatModel extends Model
{
    protected $table            = 'riwayat_aktivitas';
    protected $primaryKey       = 'id_riwayat';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';

    protected $allowedFields = [
        'aktivitas',
        'nama_tabel',
        'keterangan',
        'tanggal_aktivitas',
        'nama_admin'
    ];

    protected $useTimestamps = false;
}
