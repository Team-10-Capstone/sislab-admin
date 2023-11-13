<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateParameterUji2 extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'auto_increment' => true,
            ],
            'kode_uji' => [
                'type' => 'INT',
                'null' => true,
            ],
            'jenis_parameter' => [
                'type' => 'VARCHAR',
                'constraint' => 20,
                'null' => true,
            ],
            'no_ikm' => [
                'type' => 'VARCHAR',
                'constraint' => 20,
                'null' => true,
            ],
            'keterangan_uji' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
                'null' => true,
            ],
            'standar_uji' => [
                'type' => 'VARCHAR',
                'constraint' => 50,
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

        $this->forge->addPrimaryKey('id');

        $this->forge->createTable('parameter_uji');
    }

    public function down()
    {
        $this->forge->dropTable('parameter_uji');
    }
}