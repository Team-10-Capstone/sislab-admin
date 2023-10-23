<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class BentukSeeder extends Seeder
{
    public function run()
    {
        // Sample data for the "bentuk" table
        $data = [
            [
                'nama_bentuk' => 'Sample Shape 1',
                'created_at' => date('Y-m-d H:i:s'),
            ],
            [
                'nama_bentuk' => 'Sample Shape 2',
                'created_at' => date('Y-m-d H:i:s'),
            ],
            // Add more sample data

        ];

        // Simple Queries
        $this->db->table('bentuk')->insertBatch($data);
    }
}