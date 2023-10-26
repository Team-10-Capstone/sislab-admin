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

        $this->forge->addForeignKey('permohonan_uji_id', 'permohonan_uji', 'id');
    }

    public function down()
    {
        //
        $this->forge->dropForeignKey('hasil_uji', 'permohonan_uji_id');
        $this->forge->dropColumn('hasil_uji', 'permohonan_uji_id');
    }
}
