<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddTimeToDisposisi extends Migration
{
    public function up()
    {
        //
        $this->forge->addColumn('disposisi_penyelia', [
            'waktu_pengujian' => [
                'type' => 'TIME',
                'null' => true,
            ],
        ]);
    }

    public function down()
    {
        //
        $this->forge->dropColumn(
            'disposisi_penyelia',
            'waktu_pengujian'
        );
    }
}
