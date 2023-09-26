<?php

namespace App\Models;

use CodeIgniter\Model;

class IkanModel extends Model
{
    protected $table = 'tb_r_ikan_lokal';
    protected $primaryKey = 'id_kd_lokal';
    protected $allowedFields = [
        'nm_lokal',
        'nm_umum',
        'nm_latin',
        'kd_ikan',
        'id_ikan',
        'id_kel_ikan',
        'kd_jenis_kel',
        'kd_tarif',
        'kelas',
        'kelompok',
        'konsumsi',
        'tawar',
        'hidup',
        'bentuk',
        'hias',
        'pelagis',
        'status',
        'hscode',
        'no_urut_hs',
        'aktif',
        'kd_ikan_lokal_ol',
        'nilai',
        'id_satuan'
    ];

    public function daftarIkanCount($searchText = '')
    {
        $builder = $this->db->table($this->table);

        if (!empty($searchText)) {
            $builder->like('nm_lokal', $searchText);
            $builder->orLike('nm_umum', $searchText);
            $builder->orLike('nm_latin', $searchText);
        }

        return $builder->countAllResults();
    }

    public function daftarIkan($searchText = '', $page = 0, $segment = 10)
    {
        $builder = $this->db->table($this->table);

        if (!empty($searchText)) {
            $builder->like('nm_lokal', $searchText);
            $builder->orLike('nm_umum', $searchText);
            $builder->orLike('nm_latin', $searchText);
        }

        $builder->orderBy('id_kd_lokal', 'DESC');
        $builder->limit($segment, $page);

        return $builder->get()->getResult();
    }

    // Other functions can be similarly updated.
}