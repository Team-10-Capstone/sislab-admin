<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddAnalisToDisposisiAnalis extends Migration
{
    public function up()
    {
        //
        $this->forge->addColumn('disposisi_analis', [
            'analis_id' => [
                'type' => 'INT',
                'null' => true,
            ],
        ]);
    }

    public function down()
    {
        //
        $this->forge->dropColumn('disposisi_analis', 'analis_id');
    }
}
