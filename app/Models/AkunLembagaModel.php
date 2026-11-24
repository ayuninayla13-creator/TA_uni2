<?php

namespace App\Models;

use CodeIgniter\Model;

class AkunLembagaModel extends Model
{
    protected $table            = 'akun_lembaga';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $protectFields    = true;

    protected $allowedFields = [
        'npsn',
        'nama_lembaga',
        'email',
        'no_whatsapp',
        'provinsi',
        'kabupaten',
        'kecamatan',
        'kelurahan',
        'alamat',
        'pertanyaan_keamanan',
        'jawaban_keamanan',
        'password',
    ];

    protected $useTimestamps = false;
}
