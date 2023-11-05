<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddBentukToDtlFppc extends Migration
{
    public function up()
    {
        $this->forge->addColumn('dtl_fppc', [
            'id_bentuk' => [
                'type' => 'INT',
                'null' => true,
            ],
        ]);
        $this->forge->addForeignKey('id_bentuk', 'bentuk', 'id');
    }



    public function down()
    {
        //
        $this->forge->dropColumn('dtl_fppc', 'id_bentuk');
    }
}
