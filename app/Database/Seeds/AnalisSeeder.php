<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class AnalisSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'email' => 'analis@example.com',
                'password' => password_hash('123456', PASSWORD_DEFAULT),
                // Hashed password
                'name' => 'Analis',
                'mobile' => '1234567890',
                'roleId' => 3,
                // Set the appropriate role ID
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'email' => 'analis2@example.com',
                'password' => password_hash('123456', PASSWORD_DEFAULT),
                // Hashed password
                'name' => 'Analis 2',
                'mobile' => '1234567890',
                'roleId' => 3,
                // Set the appropriate role ID
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ]
        ];

        // Using the Query Builder to insert data
        $this->db->table('admin')->insertBatch($data);
    }
}