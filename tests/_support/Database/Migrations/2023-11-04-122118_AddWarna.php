<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddWarna2 extends Migration
{
    public function up()
    {
        //
        $this->forge->addColumn('hasil_uji', [
            'warna' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true
            ],
        ]);
    }

    public function down()
    {
        //
        $this->forge->dropColumn('hasil_uji', 'warna');
    }
}
