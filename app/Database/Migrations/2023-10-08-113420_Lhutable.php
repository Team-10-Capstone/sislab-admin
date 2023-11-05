<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Lhutable extends Migration
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
                'null' => true,
            ],
            'id_dtl_fppc' => [
                'type' => 'INT',
                'null' => true,
            ],
            'id_penyelia' => [
                'type' => 'INT',
                'null' => true,
            ],
            'id_trader' => [
                'type' => 'INT',
                'null' => true,
            ],
            'tgl_terbit' => [
                'type' => 'DATE',
                'null' => true,
            ],
            'no_lhu' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
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
        ]);

        $this->forge->addPrimaryKey('id');
        $this->forge->addForeignKey('id_fppc', 'fppc', 'id');
        $this->forge->addForeignKey('id_dtl_fppc', 'dtl_fppc', 'id');
        $this->forge->addForeignKey('id_penyelia', 'admin', 'adminId');
        $this->forge->addForeignKey('id_trader', 'users', 'user_id');
        $this->forge->createTable('lhus');
    }

    public function down()
    {
        $this->forge->dropTable('lhus');
    }
}