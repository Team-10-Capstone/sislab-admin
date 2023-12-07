<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreatePasswordResetTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'email' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'token' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'created_at' => [
                'type' => 'INT',
            ],
            'used' => [
                'type' => 'INT',
                'default' => 0, // Default value 0 means the token is not used.
            ],
        ]);

        $this->forge->addKey('email', true);
        $this->forge->createTable('password_resets');
    }

    public function down()
    {
        $this->forge->dropTable('password_resets');
    }
}