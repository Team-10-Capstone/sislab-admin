<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddPerulangan2 extends Migration
{
    public function up()
    {
        //
        $this->forge->addColumn('fppc', [
            'no_fppc_sebelumnya' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true,
            ],
            'is_perulangan' => [
                'type' => 'BOOLEAN',
                'default' => false,
            ],
        ]);
    }

    public function down()
    {
        //
        $this->forge->dropColumn('fppc', 'no_fppc_sebelumnya');
        $this->forge->dropColumn('fppc', 'is_perulangan');
    }
}