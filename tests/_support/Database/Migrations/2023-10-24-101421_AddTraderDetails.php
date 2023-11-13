<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddTraderDetails2 extends Migration
{
    public function up()
    {
        $this->forge->addColumn('fppc', [
            'nama_trader' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true,
            ],
            'alamat_trader' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true,
            ],
            'nama_penerima' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true,
            ],
            'alamat_penerima' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true,
            ],
        ]);
    }



    public function down()
    {
        $this->forge->dropColumn('fppc', 'nama_trader');
        $this->forge->dropColumn('fppc', 'alamat_trader');
        $this->forge->dropColumn('fppc', 'nama_penerima');
        $this->forge->dropColumn('fppc', 'alamat_penerima');
    }
}
