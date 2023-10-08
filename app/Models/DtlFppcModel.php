<?php

namespace App\Models;

use CodeIgniter\Model;

class DtlFppcModel extends Model
{
    protected $table = 'dtl_fppc';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $allowedFields = [
        'id_kd_lokal',
        'asal_sampel',
        'deskripsi_sampel',
        'jumlah_sampel',
        'bentuk',
        'wadah',
        'kode_sampel',
        'row_id',
        'kode_pelanggan',
        'nm_lokal',
        'kondisi_sampel',
        'jenis_ikan',
        'nm_latin',
        'nm_umum',
        'no_urut',
        'target_uji',
        'status',
    ];

    protected $useTimestamps = false; // Set to true if you have created_at and updated_at fields

    // Add validation rules, callbacks, or other custom model methods if needed
}