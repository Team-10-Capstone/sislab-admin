<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class AdminSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'email' => 'super@example.com',
                'password' => password_hash('admin123', PASSWORD_DEFAULT),
                // Hashed password
                'name' => 'Super User',
                'mobile' => '1234567890',
                'roleId' => 0,
                // Set the appropriate role ID
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'email' => 'admin@example.com',
                'password' => password_hash('admin123', PASSWORD_DEFAULT),
                // Hashed password
                'name' => 'Admin User',
                'mobile' => '1234567890',
                'roleId' => 1,
                // Set the appropriate role ID
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'email' => 'penyelia@example.com',
                'password' => password_hash('123456', PASSWORD_DEFAULT),
                // Hashed password
                'name' => 'Penyelia',
                'mobile' => '1234567890',
                'roleId' => 2,
                // Set the appropriate role ID
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ]
        ];

        // Using the Query Builder to insert data
        $this->db->table('admin')->insertBatch($data);
    }
}