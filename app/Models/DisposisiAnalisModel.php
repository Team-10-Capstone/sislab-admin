<?php

namespace App\Models;

use CodeIgniter\Model;

class DisposisiAnalis extends Model
{
    protected $useSoftDeletes = true;
    protected $table = 'disposisi_analis';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $allowedFields = [
        'id_fppc',
        'id_dtl_fppc',
        'analisis_id',
        'penyelia_id',
        'status',
    ];

    protected $useTimestamps = true;
    protected $dateFormat = 'datetime';
    protected $createdField = 'created_at';
    protected $updatedField = 'updated_at';
    protected $deletedField = 'deleted_at';


}