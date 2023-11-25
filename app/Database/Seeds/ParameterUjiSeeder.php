<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class ParameterUjiSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'kode_uji' => 1,
                'jenis_parameter' => 'PARASIT',
                'no_ikm' => 'IKM-001',
                'keterangan_uji' => 'Description for Sample 1',
                'standar_uji' => 'Standard 1',
            ],
            [
                'kode_uji' => 2,
                'jenis_parameter' => 'FISIOLOGI',
                'no_ikm' => 'IKM-002',
                'keterangan_uji' => 'Description for Sample 2',
                'standar_uji' => 'Standard 2',
            ],
            // Add more data rows as needed
        ];

        // Using the db connection specified in your config
        $this->db->table('parameter_uji')->insertBatch($data);
    }
}