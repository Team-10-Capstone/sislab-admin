<?php

namespace App\Models;

use CodeIgniter\Model;

class LhuModel extends Model
{
    protected $useSoftDeletes = true;
    protected $table = 'lhus';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $allowedFields = [
        'id_fppc',
        'id_dtl_fppc',
        'id_penyelia',
        'id_trader',
        'tgl_terbit',
        'no_lhu',
        'status',
    ];

    protected $useTimestamps = true;
    protected $dateFormat = 'date';

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

    public function penyelia()
    {
        return $this->belongsTo(AdminModel::class, 'id_penyelia');
    }

    public function trader()
    {
        return $this->belongsTo(UserModel::class, 'id_trader');
    }
}