<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddTanggalToDisposisi extends Migration
{
    public function up()
    {
        //
        $this->forge->addColumn('disposisi_penyelia', [
            'tanggal_pengujian' => [
                'type' => 'DATE',
                'null' => true,
            ],
        ]);
    }

    public function down()
    {
        //
        $this->forge->dropColumn('disposisi_penyelia', 'tanggal_pengujian');
    }
}
