<?php

namespace App\Models;

use CodeIgniter\Model;

class DisposisiPenyeliaModel extends Model
{
    protected $table = 'disposisi_penyelia_baru';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $allowedFields = [
        'id_fppc',
        'id_permohonan_uji',
        'manajer_teknis_id',
        'penyelia_id',
        'status',
        'tanggal_pengujian',
        'waktu_pengujian',
    ];

    protected $useTimestamps = true;
    protected $dateFormat = 'datetime';

    protected $createdField = 'created_at';
    protected $updatedField = 'updated_at';

    // Define any validation rules or custom behaviors here if needed.


}