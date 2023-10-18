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
                'type' => 'INT',
                'null' => true,
            ],
            'id_petugas' => [
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
            'status' => [
                'type' => 'ENUM',
                'constraint' => ['pending', 'diterima', 'ditolak', 'proses-pengujian', 'selesai-pengujian', 'terbit-lhu', 'selesai'],
                'default' => 'pending'
            ],
            'created_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
            'updated_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
            'deleted_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
        ]);

        $this->forge->addPrimaryKey('id');

        $this->forge->createTable('fppc');
        // relation with trader
        $this->forge->addForeignKey('id_trader', 'users', 'user_id');
        $this->forge->addForeignKey('id_petugas', 'admin', 'adminId');

    }

    public function down()
    {
        $this->forge->dropTable('fppc');
    }
}