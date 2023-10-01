<?php

namespace App\Models;

use CodeIgniter\Model;
use CodeIgniter\Model\Concerns\SoftDeletes;

class IkanLokalModel extends Model
{
    use SoftDeletes;
    protected $table = 'tb_r_ikan_lokal';
    protected $primaryKey = 'id_kd_lokal';
    protected $useAutoIncrement = true;
    protected $insertID = 0;
    protected $returnType = 'array';
    protected $protectFields = true;
    protected $allowedFields = [
        'nm_lokal',
        'nm_umum',
        'nm_latin',
        'kd_ikan',
        'id_ikan',
        'id_kel_ikan',
        'kd_jenis_kel',
        'kd_tarif',
        'kelas',
        'kelompok',
        'konsumsi',
        'tawar',
        'hidup',
        'bentuk',
        'hias',
        'pelagis',
        'status',
        'hscode',
        'no_urut_hs',
        'aktif',
        'kd_ikan_lokal_ol',
        'nilai',
        'id_satuan',
    ];
    // Dates
    protected $useTimestamps = true;
    protected $dateFormat = 'datetime';
    protected $createdField = 'created_at';
    protected $updatedField = 'updated_at';
    protected $deletedField = 'deleted_at';

}