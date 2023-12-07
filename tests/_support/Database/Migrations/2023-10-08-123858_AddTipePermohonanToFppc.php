<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddTipePermohonanToFppc extends Migration
{
    public function up()
    {
        //
        $this->forge->addColumn('fppc', [
            'tipe_permohonan' => [
                'type' => 'ENUM',
                'constraint' => ['mandiri', 'monsur', 'lalulintas'],
                'default' => 'mandiri',
            ],
        ]);
    }

    public function down()
    {
        //
        $this->forge->dropColumn('fppc', 'tipe_permohonan');
    }
}