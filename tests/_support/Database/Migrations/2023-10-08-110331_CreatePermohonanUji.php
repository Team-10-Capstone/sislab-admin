<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreatePermohonanUji2 extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'auto_increment' => true,
            ],
            'dtl_fppc_id' => [
                'type' => 'INT',
                'null' => true,
            ],
            'parameter_uji_id' => [
                'type' => 'INT',
                'null' => true,
            ],
            'hasil_uji_id' => [
                'type' => 'INT',
                'null' => true,
            ],
            'status' => [
                'type' => 'ENUM',
                'constraint' => ['pending', 'diproses', 'selesai'],
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
        $this->forge->addForeignKey('dtl_fppc_id', 'dtl_fppc', 'id');
        $this->forge->addForeignKey('parameter_uji_id', 'parameter_uji', 'id');
        $this->forge->addForeignKey('hasil_uji_id', 'hasil_uji', 'id');
        $this->forge->createTable('permohonan_uji');
    }

    public function down()
    {
        $this->forge->dropTable('permohonan_uji');
    }
}