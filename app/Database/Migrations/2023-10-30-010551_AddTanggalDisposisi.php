<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddTanggalToDisposisi extends Migration
{
    public function up()
    {
        //
        $this->forge->addColumn('disposisi_analis', [
            'tanggal_pengujian' => [
                'type' => 'DATE',
                'null' => true,
            ],
            'waktu_pengujian' => [
                'type' => 'TIME',
                'null' => true,
            ],
        ]);
    }

    public function down()
    {
        //
        $this->forge->dropColumn('disposisi_analis', 'tanggal_pengujian');
        $this->forge->dropColumn('disposisi_analis', 'waktu_pengujian');
    }
}
