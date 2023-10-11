<?php

namespace App\Models;

use CodeIgniter\Model;

class HasilUjiModel extends Model
{
    protected $useSoftDeletes = true;
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
    ];

    protected $useTimestamps = true;
    protected $dateFormat = 'datetime';

    // Define any validation rules or custom behaviors here if needed.

    // Define relationships if needed.
    public function fppc()
    {
        return $this->belongsTo(FppcModel::class, 'fppc_id');
    }

    public function dtlFppc()
    {
        return $this->belongsTo(DtlFppcModel::class, 'dtl_fppc_id');
    }

    public function analis()
    {
        return $this->belongsTo(AdminModel::class, 'analis_id');
    }
}