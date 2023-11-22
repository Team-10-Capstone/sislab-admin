<?php

namespace App\Models;

use CodeIgniter\Model;

class DisposisiAnalisModel extends Model
{
    protected $useSoftDeletes = true;
    protected $table = 'disposisi_analis_baru';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $allowedFields = [
        'id_fppc',
        'id_dtl_fppc',
        'id_permohonan_uji',
        'analis_id',
        'penyelia_id',
    ];

    protected $useTimestamps = true;
    protected $dateFormat = 'datetime';
    protected $createdField = 'created_at';
    protected $updatedField = 'updated_at';
    protected $deletedField = 'deleted_at';


}