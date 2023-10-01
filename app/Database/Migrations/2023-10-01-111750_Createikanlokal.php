<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Createikanlokal extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_kd_lokal' => [
                'type' => 'SMALLINT',
                'auto_increment' => true,
                'unsigned' => true,
            ],
            'nm_lokal' => [
                'type' => 'NVARCHAR',
                'constraint' => 200,
                'null' => true,
            ],
            'nm_umum' => [
                'type' => 'NVARCHAR',
                'constraint' => 200,
                'null' => true,
            ],
            'nm_latin' => [
                'type' => 'NVARCHAR',
                'constraint' => 200,
                'null' => true,
            ],
            'kd_ikan' => [
                'type' => 'NVARCHAR',
                'constraint' => 50,
                'null' => true,
            ],
            'id_ikan' => [
                'type' => 'SMALLINT',
                'null' => true,
            ],
            'id_kel_ikan' => [
                'type' => 'INT',
                'null' => true,
            ],
            'kd_jenis_kel' => [
                'type' => 'NVARCHAR',
                'constraint' => 10,
                'null' => true,
            ],
            'kd_tarif' => [
                'type' => 'NVARCHAR',
                'constraint' => 20,
                'null' => true,
            ],
            'kelas' => [
                'type' => 'VARCHAR',
                'constraint' => 10,
                'null' => true,
            ],
            'kelompok' => [
                'type' => 'TINYINT',
                'null' => true,
            ],
            'konsumsi' => [
                'type' => 'CHAR',
                'constraint' => 1,
                'null' => true,
            ],
            'tawar' => [
                'type' => 'CHAR',
                'constraint' => 1,
                'null' => true,
            ],
            'hidup' => [
                'type' => 'CHAR',
                'constraint' => 1,
                'null' => true,
            ],
            'bentuk' => [
                'type' => 'TINYINT',
                'null' => true,
            ],
            'hias' => [
                'type' => 'CHAR',
                'constraint' => 1,
                'null' => true,
            ],
            'pelagis' => [
                'type' => 'CHAR',
                'constraint' => 1,
                'null' => true,
            ],
            'status' => [
                'type' => 'CHAR',
                'constraint' => 1,
                'null' => true,
            ],
            'hscode' => [
                'type' => 'NVARCHAR',
                'constraint' => 50,
                'null' => true,
            ],
            'no_urut_hs' => [
                'type' => 'TINYINT',
                'null' => true,
            ],
            'aktif' => [
                'type' => 'NCHAR',
                'constraint' => 1,
                'null' => true,
            ],
            'kd_ikan_lokal_ol' => [
                'type' => 'NVARCHAR',
                'constraint' => 20,
                'null' => true,
            ],
            'nilai' => [
                'type' => 'FLOAT',
                'null' => true,
            ],
            'id_satuan' => [
                'type' => 'SMALLINT',
                'null' => true,
            ],
            'created_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
            'updated_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
            'deleted_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
        ]);

        $this->forge->addKey('id_kd_lokal', true);
        $this->forge->createTable('ikan_lokal');
    }

    public function down()
    {
        $this->forge->dropTable('ikan_lokal');
    }
}