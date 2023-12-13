<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddNpwpNumber extends Migration
{
    public function up()
    {
        //
        $this->forge->addColumn('fppc', [
            'no_npwp' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true,
            ]
        ]);
    }

    public function down()
    {
        //
        $this->forge->dropColumn('fppc', 'no_npwp');
    }
}
