<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreatePermohonanUjiTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'auto_increment' => true,
            ],
            'fppc_id' => [
                'type' => 'INT',
                'null' => true,
            ],
            'dtl_fppc_id' => [
                'type' => 'INT',
                'null' => true,
            ],
            'analis_id' => [
                'type' => 'INT',
                'null' => true,
            ],
            'hasil_uji' => [
                'type' => 'VARCHAR',
                'constraint' => 50,
                'null' => true,
            ],
            'keterangan' => [
                'type' => 'VARCHAR',
                'constraint' => 128,
                'null' => true,
            ],
            'nilai' => [
                'type' => 'VARCHAR',
                'constraint' => 128,
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
        $this->forge->addForeignKey('fppc_id', 'fppc', 'id');
        $this->forge->addForeignKey('dtl_fppc_id', 'dtl_fppc', 'id');
        $this->forge->createTable('hasil_uji');
    }

    public function down()
    {
        $this->forge->dropTable('hasil_uji');
    }
}