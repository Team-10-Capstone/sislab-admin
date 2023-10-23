<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateUserTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'user_id' => [
                'type' => 'INT',
                'auto_increment' => true,
            ],
            'username' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
            ],
            'fullname' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'email' => [
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
            "pt" => [
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
            'deleted_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
        ]);

        $this->forge->addKey('user_id', true);
        $this->forge->createTable('users');
    }

    public function down()
    {
        $this->forge->dropTable('users');
    }
}
