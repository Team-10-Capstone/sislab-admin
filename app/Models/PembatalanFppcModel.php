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


}