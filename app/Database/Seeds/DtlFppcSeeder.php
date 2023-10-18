<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class DtlFppcSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'id_fppc' => 1,
                // Replace with a valid FPPC ID
                'id_ikan' => 'IK001',
                'nama_lokal' => 'Local Name 1',
                'nama_latin' => 'Latin Name 1',
                'nama_umum' => 'Common Name 1',
                'jenis_ikan' => 'Type A',
                'asal_sampel' => 'Sample Source 1',
                'jumlah_sampel' => 10,
                'kode_pelanggan' => 'Cust001',
                'deskripsi_sampel' => 'Sample Description 1',
                'kode_sampel' => 'S001',
                'bentuk' => 'Shape 1',
                'kondisi_sampel' => 'Sample Condition 1',
                'id_wadah' => 1,
            ],
            [
                'id_fppc' => 1,
                // Replace with a valid FPPC ID
                'id_ikan' => 'IK002',
                'nama_lokal' => 'Local Name 2',
                'nama_latin' => 'Latin Name 2',
                'nama_umum' => 'Common Name 2',
                'jenis_ikan' => 'Type B',
                'asal_sampel' => 'Sample Source 2',
                'jumlah_sampel' => 5,
                'kode_pelanggan' => 'Cust002',
                'deskripsi_sampel' => 'Sample Description 2',
                'kode_sampel' => 'S002',
                'bentuk' => 'Shape 2',
                'kondisi_sampel' => 'Sample Condition 2',
                'id_wadah' => 2,
            ],
            // Add more dtl_fppc data as needed
        ];

        // Using the db connection specified in your config
        $this->db->table('dtl_fppc')->insertBatch($data);
    }
}