<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class NewDisposisiTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'auto_increment' => true,
            ],
            'id_fppc' => [
                'type' => 'INT',
                'null' => true,
            ],
            'id_permohonan_uji' => [
                'type' => 'INT',
                'null' => true,
            ],
            'manajer_teknis_id' => [
                'type' => 'INT',
                'null' => true,
            ],
            'penyelia_id' => [
                'type' => 'INT',
                'null' => true,
            ],
            'status' => [
                'type' => 'ENUM',
                'constraint' => ['pending', 'diterima', 'ditolak'],
                'default' => 'pending',
            ],
            'created_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
            'updated_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
        ]);

        $this->forge->addPrimaryKey('id');
        $this->forge->addForeignKey('id_fppc', 'fppc', 'id');
        $this->forge->addForeignKey('id_permohonan_uji', 'permohonan_uji', 'id');
        $this->forge->addForeignKey('manajer_teknis_id', 'admin', 'adminId');
        $this->forge->addForeignKey('penyelia_id', 'admin', 'adminId');
        $this->forge->createTable('disposisi_analis');
    }

    public function down()
    {
        $this->forge->dropTable('disposisi_analis');
    }
}