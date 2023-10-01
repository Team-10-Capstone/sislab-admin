<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Createtradertable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'trader_id' => [
                'type' => 'SMALLINT',
                'auto_increment' => true,
                'unsigned' => true,
            ],
            'username' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
            ],
            'email' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'typeof_document' => [
                'type' => 'ENUM',
                'constraint' => ['NPWP', 'NIK'],
            ],
            'document_number' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'password' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            "avatar" => [
                "type" => "VARCHAR",
                "constraint" => 255,
                "null" => true,
            ],
            "alamat" => [
                "type" => "VARCHAR",
                "constraint" => 255,
                "null" => true,
            ],
            "no_telp" => [
                "type" => "VARCHAR",
                "constraint" => 255,
                "null" => true,
            ],
            "npwp" => [
                "type" => "VARCHAR",
                "constraint" => 255,
                "null" => true,
            ],
            "ktp" => [
                "type" => "VARCHAR",
                "constraint" => 255,
                "null" => true,
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

        $this->forge->addKey('trader_id', true);
        $this->forge->createTable('trader');
    }

    public function down()
    {
        $this->forge->dropTable('trader');
    }
}