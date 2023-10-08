<?php

namespace App\Models;

use CodeIgniter\Model;
use CodeIgniter\Model\Concerns\SoftDeletes;

class FppcModel extends Model
{
    use SoftDeletes;
    protected $table = 'fppc';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $allowedFields = [
        'no_fppc',
        'no_lhu',
        'tgl_fppc',
        'no_ppk',
        'tgl_ppk',
        'id_ppk',
        'id_trader',
        'userId',
        'sts_print',
        'nip_baru',
        'tgl_monsur',
        'petugas_monsur',
        'sampel',
        'tgl_aju_sampel',
        'status',
    ];
    protected $deletedField = 'deleted_at';
    protected $useTimestamps = true;
    protected $dateFormat = 'datetime';
    protected $createdField = 'created_at';
    protected $updatedField = 'updated_at';

    // Add validation rules, callbacks, or other custom model methods if needed
}