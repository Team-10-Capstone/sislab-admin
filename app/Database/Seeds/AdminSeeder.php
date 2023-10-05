<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class AdminSeeder extends Seeder
{
    public function run()
    {
        $data = [
            'email' => 'admin@example.com',
            'password' => password_hash('admin123', PASSWORD_DEFAULT),
            // Hashed password
            'name' => 'Admin User',
            'mobile' => '1234567890',
            'roleId' => 1,
            // Set the appropriate role ID
            'isDeleted' => 0,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ];

        // Using the Query Builder to insert data
        $this->db->table('admin')->insert($data);
    }
}