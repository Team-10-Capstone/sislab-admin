<?php

namespace App\Models;

use CodeIgniter\Model;

class PembatalanFppcModel extends Model
{
    protected $useSoftDeletes = true;
    protected $table = 'pembatalan_fppc';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $allowedFields = [
        'id_fppc',
        'id_admin',
        'dibatalkan_oleh',
        'alasan',
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

    public function admin()
    {
        return $this->belongsTo(AdminModel::class, 'id_admin');
    }
}