<?php

namespace App\Models;

use CodeIgniter\Model;

class DtlFppcModel extends Model
{
    protected $table = 'dtl_fppc';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'id_kd_lokal',
        'asal_sampel',
        'Deskripsi_contoh',
        'jumlah_contoh',
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
        'disposisi_penyelia',
        'disposisi_analis',
    ];

    protected $useTimestamps = false; // Set to true if you have created_at and updated_at fields

    // Add validation rules, callbacks, or other custom model methods if needed
}