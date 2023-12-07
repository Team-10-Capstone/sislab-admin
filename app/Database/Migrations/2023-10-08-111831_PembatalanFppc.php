<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class PembatalanFppc extends Migration
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
            'id_admin' => [
                'type' => 'INT',
                'null' => true,
            ],
            'alasan' => [
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
        $this->forge->addForeignKey('id_admin', 'admin', 'adminId');
        $this->forge->createTable('pembatalan_fppc');
    }

    public function down()
    {
        $this->forge->dropTable('pembatalan_fppc');
    }
}