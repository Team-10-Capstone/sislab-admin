<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class WadahSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'id' => 1,
                'nama_wadah' => 'Wadah 1',
            ],
            [
                'id' => 2,
                'nama_wadah' => 'Wadah 2',
            ],

            // Add more user data as needed
        ];

        // Using the db connection specified in your config
        $this->db->table('wadah')->insertBatch($data);
    }
}