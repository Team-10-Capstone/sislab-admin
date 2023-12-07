<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class UpdateConstraint extends Migration
{
    public function up()
    {
        //
        $this->forge->modifyColumn('wadah', [
            'image' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                // New size
                'null' => true,
            ],
        ]);
    }

    public function down()
    {
        //
        $this->forge->modifyColumn('wadah', [
            'image' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                // New size
                'null' => true,
            ],
        ]);
    }
}
