<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateFppcTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'auto_increment' => true,
            ],
            'no_fppc' => [
                'type' => 'VARCHAR',
                'constraint' => 50,
                'null' => true,
            ],
            'no_lhu' => [
                'type' => 'VARCHAR',
                'constraint' => 50,
                'null' => true,
            ],
            'tgl_fppc' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
            'tgl_lhu' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
            'no_ppk' => [
                'type' => 'VARCHAR',
                'constraint' => 50,
                'null' => true,
            ],
            'tgl_ppk' => [
                'type' => 'DATE',
                'null' => true,
            ],
            'id_ppk' => [
                'type' => 'INT',
                'null' => true,
            ],
            'id_trader' => [
                'type' => 'VARCHAR',
                'constraint' => 50,
                'null' => true,
            ],
            'userId' => [
                'type' => 'INT',
                'null' => true,
            ],
            'row_id' => [
                'type' => 'INT',
                'null' => true,
            ],
            'sts_print' => [
                'type' => 'INT',
                'null' => true,
            ],
            'nip_baru' => [
                'type' => 'VARCHAR',
                'constraint' => 18,
                'null' => true,
            ],
            'tgl_monsur' => [
                'type' => 'DATE',
                'null' => true,
            ],
            'petugas_monsur' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
                'null' => true,
            ],
            'sampel' => [
                'type' => 'VARCHAR',
                'constraint' => 50,
                'null' => true,
            ],
            'tgl_aju_sampel' => [
                'type' => 'DATE',
                'null' => true,
            ],
            'status' => [
                'type' => 'VARCHAR',
                'constraint' => 50,
                'null' => true,
            ],
        ]);

        $this->forge->createTable('fppc');
    }

    public function down()
    {
        $this->forge->dropTable('fppc');
    }
}