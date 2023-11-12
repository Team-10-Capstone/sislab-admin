<?php

namespace App\Models;

use CodeIgniter\Model;

class FppcModel extends Model
{
    protected $useSoftDeletes = true;
    protected $table = 'fppc';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $allowedFields = [
        'no_fppc',
        'no_ppk',
        'tgl_ppk',
        'id_ppk',
        'id_trader',
        'id_petugas',
        'nip_baru',
        'tgl_monsur',
        'petugas_monsur',
        'status',
        'tipe_permohonan',
        'nama_trader',
        'alamat_trader',
        'nama_penerima',
        'alamat_penerima',
    ];

    protected $useTimestamps = true; // Set to true if you want to use timestamps

    protected $dateFormat = 'datetime'; // Change the format to 'datetime' instead of 'date'

    protected $createdField = 'created_at'; // Change the created field to 'created_at'

    protected $updatedField = 'updated_at'; // Change the updated field to 'updated_at'

    protected $deletedField = 'deleted_at'; // Change the deleted field to 'deleted_at's

    public function getTipeCountsByMonth()
    {
        $this->select('CAST(tipe_permohonan AS VARCHAR) as tipe_permohonan, MONTH(created_at) as month, COUNT(CAST(tipe_permohonan AS VARCHAR)) as tipe_permohonan_count')
            ->groupBy(['CAST(tipe_permohonan AS VARCHAR)', 'MONTH(created_at)']); // Use the same expression in GROUP BY

        return $this->findAll();
    }

    public function getStatusCountsByMonth()
    {
        $this->select('CAST(status AS VARCHAR) as status, MONTH(created_at) as month, COUNT(CAST(status AS VARCHAR)) as status_count')
            ->groupBy(['CAST(status AS VARCHAR)', 'MONTH(created_at)']); // Use the same expression in GROUP BY

        return $this->findAll();
    }
}