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
    ];

    protected $useTimestamps = true; // Set to true if you want to use timestamps

    protected $dateFormat = 'datetime'; // Change the format to 'datetime' instead of 'date'

    protected $createdField = 'created_at'; // Change the created field to 'created_at'

    protected $updatedField = 'updated_at'; // Change the updated field to 'updated_at'

    protected $deletedField = 'deleted_at'; // Change the deleted field to 'deleted_at'

    public function getAllFppcWithDtlFppc()
    {
        $builder = $this->db->table('fppc');
        $builder->select('fppc.*, dtl_fppc.*');
        $builder->join('dtl_fppc', 'dtl_fppc.id_fppc = fppc.id', 'left'); // Assuming it's a left join
        return $builder->get()->getResultArray();
    }
}