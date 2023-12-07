<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddPermohonanHasilRelation extends Migration
{
    public function up()
    {
        //
        $this->forge->addColumn('hasil_uji', [
            'permohonan_uji_id' => [
                'type' => 'INT',
                'null' => true,
            ],
        ]);

        $this->forge->addForeignKey('permohonan_uji_id', 'hasil_uji', 'id');
    }

    public function down()
    {
        //
        $this->forge->dropColumn('hasil_uji', 'permohonan_uji_id');
    }
}
