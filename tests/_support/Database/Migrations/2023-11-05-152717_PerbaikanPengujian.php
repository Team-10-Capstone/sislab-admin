<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class PerbaikanPengujian extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'auto_increment' => true,
            ],
            'id_fppc' => [
                'type' => 'INT',
            ],
            'alasan' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'status' => [
                'type' => 'ENUM',
                'constraint' => ['pending', 'selesai'],
                'default' => 'pending',
            ],
            'created_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
            'updated_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
        ]);

        $this->forge->addPrimaryKey('id');

        $this->forge->createTable('perbaikan_pengujian');
        $this->forge->addForeignKey('id_fppc', 'fppc', 'id');
    }

    public function down()
    {
        $this->forge->dropTable('perbaikan_pengujian');
    }
}
