<?php

namespace App\Models;

use CodeIgniter\Model;

class FppcModel extends Model
{
    protected $table = 'fppc';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'no_fppc',
        'no_lhu',
        'tgl_fppc',
        'tgl_lhu',
        'no_ppk',
        'tgl_ppk',
        'id_ppk',
        'id_trader',
        'userId',
        'row_id',
        'sts_print',
        'nip_baru',
        'tgl_monsur',
        'petugas_monsur',
        'sampel',
        'tgl_aju_sampel',
        'status',
    ];

    protected $useTimestamps = false; // Set to true if you have created_at and updated_at fields

    // Add validation rules, callbacks, or other custom model methods if needed
}