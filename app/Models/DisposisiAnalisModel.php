<?php

namespace App\Models;

use CodeIgniter\Model;
use CodeIgniter\Model\Concerns\SoftDeletes;

class DisposisiAnalis extends Model
{
    use SoftDeletes;
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

    // Define any validation rules or custom behaviors here if needed.

    // Define relationships if needed.
    public function fppc()
    {
        return $this->belongsTo(FppcModel::class, 'id_fppc');
    }

    public function dtlFppc()
    {
        return $this->belongsTo(DtlFppcModel::class, 'id_dtl_fppc');
    }

    public function analis()
    {
        return $this->belongsTo(AdminModel::class, 'analisis_id');
    }

    public function penyelia()
    {
        return $this->belongsTo(AdminModel::class, 'penyelia_id');
    }
}