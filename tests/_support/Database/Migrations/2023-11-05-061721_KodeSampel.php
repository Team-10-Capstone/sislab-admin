<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class KodeSampel2 extends Migration
{
    public function up()
    {
        //
        $this->forge->addColumn('permohonan_uji', [
            'kode_sampel' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true
            ],
        ]);
    }

    public function down()
    {
        //
        $this->forge->dropColumn('permohonan_uji', 'kode_sampel');
    }
}
