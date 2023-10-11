<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class FppcSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'no_fppc' => 'FPPC001/01.0/20230925/033142',
                'no_ppk' => 'E/E/01.0/20230925/033142',
                'tgl_ppk' => '2023-10-11',
                'id_ppk' => 711572,
                // Replace with a valid PPK ID
                'id_trader' => 1,
                // Replace with a valid trader ID
                'id_petugas' => 1,
                // Replace with a valid petugas ID
                'nip_baru' => '123456789012345678',
                'tgl_monsur' => '2023-10-12',
                'petugas_monsur' => 'Petugas ABC',
                'status' => 'Approved',
            ],

            // Add more FPPC data as needed
        ];

        // Using the db connection specified in your config
        $this->db->table('fppc')->insertBatch($data);
    }
}