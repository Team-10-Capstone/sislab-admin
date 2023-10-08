<?php

namespace App\Models;

use CodeIgniter\Model;
use CodeIgniter\Model\Concerns\SoftDeletes;

class PermohonanUjiModel extends Model
{
    use SoftDeletes;
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

    // Define relationships if needed.
    public function dtlFppc()
    {
        return $this->belongsTo(DtlFppcModel::class, 'dtl_fppc_id');
    }

    public function parameterUji()
    {
        return $this->belongsTo(ParameterUjiModel::class, 'parameter_uji_id');
    }

    public function hasilUji()
    {
        return $this->belongsTo(HasilUjiModel::class, 'hasil_uji_id');
    }
}