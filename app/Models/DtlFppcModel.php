<?php

namespace App\Models;

use CodeIgniter\Model;

class DtlFppcModel extends Model
{
    protected $table = 'dtl_fppc';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $allowedFields = [
        'id_fppc',
        'id_ikan',
        'id_wadah',
        'nama_lokal',
        'nama_latin',
        'nama_umum',
        'jenis_ikan',
        'asal_sampel',
        'jumlah_sampel',
        'kode_pelanggan',
        'deskripsi_sampel',
        'kode_sampel',
        'bentuk',
        'kondisi_sampel',
        'status',
    ];

    protected $useTimestamps = true;
    protected $dateFormat = 'datetime';
    protected $createdField = 'created_at';
    protected $updatedField = 'updated_at';

}