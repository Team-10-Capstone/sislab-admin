<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class DisposisiAnalis2 extends Migration
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
            'analis_id' => [
                'type' => 'INT',
                'null' => true,
            ],
            'penyelia_id' => [
                'type' => 'INT',
                'null' => true,
            ],
            'status' => [
                'type' => 'ENUM',
                'constraint' => ['pending', 'diterima', 'ditolak'],
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
        $this->forge->addForeignKey('id_fppc', 'fppc', 'id');
        $this->forge->addForeignKey('id_dtl_fppc', 'dtl_fppc', 'id');
        $this->forge->addForeignKey('analis_id', 'admin', 'adminId');
        $this->forge->addForeignKey('penyelia_id', 'admin', 'adminId');
        $this->forge->createTable('disposisi_analis');
    }

    public function down()
    {
        $this->forge->dropTable('disposisi_analis');
    }
}