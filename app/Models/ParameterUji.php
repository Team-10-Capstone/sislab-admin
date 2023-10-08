<?php

namespace App\Models;

use CodeIgniter\Model;
use CodeIgniter\Model\Concerns\SoftDeletes;

class ParameterUjiModel extends Model
{
    use SoftDeletes;
    protected $table = 'parameter_uji';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $allowedFields = [
        'kode_uji',
        'jenis_parameter',
        'no_ikm',
        'keterangan_uji',
        'standar_uji',
    ];

    protected $useTimestamps = true;
    protected $createdField = 'created_at';
    protected $updatedField = 'updated_at';
    protected $deletedField = 'deleted_at';
    protected $dateFormat = 'datetime';

    // Define any validation rules or custom behaviors here if needed.

}