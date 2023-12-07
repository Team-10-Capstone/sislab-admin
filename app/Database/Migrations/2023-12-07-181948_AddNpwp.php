<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddNpwp extends Migration
{
    public function up()
    {
        //
        $this->forge->addColumn('fppc', [
            'npwp' => [
                'type' => 'VARCHAR',
                'null' => true,
            ]
        ]);
    }

    public function down()
    {
        //
        $this->forge->dropColumn('fppc', 'npwp');
    }
}
