<?php namespace App\Models;
 
use CodeIgniter\Model;
 
class adminModel extends Model
{
    protected $table = 'admin';
    protected $allowedFields = [
        'nama_lengkap',
        'umur',


        /* All other fields */
    ];

  protected $primaryKey = 'nama_admin';
    public function getadmin()
    {
        return $this->findAll();
    }
 
}