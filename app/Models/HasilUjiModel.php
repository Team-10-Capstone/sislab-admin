<?php

namespace App\Models;

use CodeIgniter\Model;

class HasilUjiModel extends Model
{
    protected $table = 'hasil_uji';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $allowedFields = [
        'fppc_id',
        'dtl_fppc_id',
        'analis_id',
        'hasil_uji',
        'keterangan',
        'nilai',
        'permohonan_uji_id',
        'ct',
        'kontrol_positif_warna',
        'kontrol_negatif_warna',
        'kontrol_positif_hasil',
        'kontrol_negatif_hasil',
        'image',
        'kontrol_positif_ct',
        'kontrol_negatif_ct',
        'warna'
    ];

    protected $useTimestamps = true;
    protected $dateFormat = 'datetime';

    // Define any validation rules or custom behaviors here if needed.


}