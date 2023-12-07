<?php

namespace App\Models;

use CodeIgniter\Model;

class DisposisiAnalisModel extends Model
{
    protected $table = 'disposisi_analis';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $allowedFields = [
        'id_fppc',
        'id_dtl_fppc',
        'analis_id',
        'penyelia_id',
        'status',
        'id_permohonan_uji',
        'tanggal_pengujian',
        'waktu_pengujian',
    ];

    protected $useTimestamps = true;
    protected $dateFormat = 'datetime';
    protected $createdField = 'created_at';
    protected $updatedField = 'updated_at';
}