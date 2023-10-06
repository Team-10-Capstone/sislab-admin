<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateDtlFppcTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'auto_increment' => true,
            ],
            'id_kd_lokal' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true,
            ],
            'asal_sampel' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true,
            ],
            'deskripsi_contoh' => [
                'type' => 'VARCHAR',
                'constraint' => 50,
                'null' => true,
            ],
            'jumlah_contoh' => [
                'type' => 'INT',
                'null' => true,
            ],
            'bentuk' => [
                'type' => 'VARCHAR',
                'constraint' => 50,
                'null' => true,
            ],
            'wadah' => [
                'type' => 'VARCHAR',
                'constraint' => 50,
                'null' => true,
            ],
            'kode_sampel' => [
                'type' => 'VARCHAR',
                'constraint' => 50,
                'null' => true,
            ],
            'kode_pelanggan' => [
                'type' => 'VARCHAR',
                'constraint' => 50,
                'null' => true,
            ],
            'nm_lokal' => [
                'type' => 'VARCHAR',
                'constraint' => 50,
                'null' => true,
            ],
            'kondisi_sampel' => [
                'type' => 'VARCHAR',
                'constraint' => 50,
                'null' => true,
            ],
            'jenis_ikan' => [
                'type' => 'VARCHAR',
                'constraint' => 50,
                'null' => true,
            ],
            'nm_latin' => [
                'type' => 'VARCHAR',
                'constraint' => 50,
                'null' => true,
            ],
            'nm_umum' => [
                'type' => 'VARCHAR',
                'constraint' => 50,
                'null' => true,
            ],
            'no_urut' => [
                'type' => 'INT',
                'null' => true,
            ],
            'target_uji' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
                'null' => true,
            ],
            'disposisi_penyelia' => [
                'type' => 'INT',
                'null' => true,
            ],
            'disposisi_analis' => [
                'type' => 'INT',
                'null' => true,
            ],
        ]);

        $this->forge->createTable('dtl_fppc');
    }

    public function down()
    {
        $this->forge->dropTable('dtl_fppc');
    }
}