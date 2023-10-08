<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateAdminTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'adminId' => [
                'type' => 'INT',
                'constraint' => 11,
                'auto_increment' => true,
            ],
            'email' => [
                'type' => 'VARCHAR',
                'constraint' => 128,
            ],
            'password' => [
                'type' => 'VARCHAR',
                'constraint' => 128,
            ],
            'name' => [
                'type' => 'VARCHAR',
                'constraint' => 128,
                'null' => true,
            ],
            'mobile' => [
                'type' => 'VARCHAR',
                'constraint' => 20,
                'null' => true,
            ],
            'roleId' => [
                'type' => 'INT',
                'constraint' => 11,
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

        $this->forge->addKey('adminId', true);
        $this->forge->createTable('admin');
    }

    public function down()
    {
        $this->forge->dropTable('admin');
    }
}