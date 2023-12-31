<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'username' => 'user1',
                'fullname' => 'User 1 Lengkap',
                'email' => 'user1@example.com',
                'password' => password_hash('password123', PASSWORD_DEFAULT),
                'avatar' => 'user1.jpg',
                'alamat' => '123 Main St, City',
                'no_telp' => '555-123-4567',
                'npwp' => '31.286.497.8-412.000',
                'ktp' => '123-45-6789',
                'pt' => 'Company A',
            ],
            [
                'username' => 'user2',
                'fullname' => 'User 2 Lengkap',
                'email' => 'user2@example.com',
                'password' => password_hash('password456', PASSWORD_DEFAULT),
                'avatar' => 'user2.jpg',
                'alamat' => '456 Elm St, Town',
                'no_telp' => '555-987-6543',
                'npwp' => '31.523.512.7-418.000',
                'ktp' => '987-65-4321',
                'pt' => 'Company B',
            ],
            // Add more user data as needed
        ];

        // Using the db connection specified in your config
        $this->db->table('users')->insertBatch($data);
    }
}
