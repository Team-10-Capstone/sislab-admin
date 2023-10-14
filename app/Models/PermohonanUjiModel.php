<?php

namespace App\Models;

use CodeIgniter\Model;

class PermohonanUjiModel extends Model
{
    protected $useSoftDeletes = true;
    protected $table = 'permohonan_uji';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $allowedFields = [
        'dtl_fppc_id',
        'parameter_uji_id',
        'hasil_uji_id',
        'status',
    ];

    protected $useTimestamps = true;
    protected $dateFormat = 'datetime';

    protected $createdField = 'created_at';
    protected $updatedField = 'updated_at';
    protected $deletedField = 'deleted_at';

    // Define any validation rules or custom behaviors here if needed.

}