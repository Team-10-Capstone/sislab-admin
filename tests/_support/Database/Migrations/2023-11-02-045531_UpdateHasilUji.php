<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class UpdateHasilUji2 extends Migration
{
    public function up()
    {
        //
        $this->forge->addColumn('hasil_uji', [
            'ct' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true,
            ],
            'kontrol_positif_warna' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true,
            ],
            'kontrol_negatif_warna' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true,
            ],
            'kontrol_positif_hasil' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true,
            ],
            'kontrol_negatif_hasil' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true,
            ],
            'image' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true,
            ],
            'kontrol_positif_ct' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true,
            ],
            'kontrol_negatif_ct' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true,
            ],
        ]);
    }

    public function down()
    {
        //
        $this->forge->dropColumn('hasil_uji', 'ct');
        $this->forge->dropColumn('hasil_uji', 'kontrol_positif_warna');
        $this->forge->dropColumn('hasil_uji', 'kontrol_negatif_warna');
        $this->forge->dropColumn('hasil_uji', 'kontrol_positif_hasil');
        $this->forge->dropColumn('hasil_uji', 'kontrol_negatif_hasil');
        $this->forge->dropColumn('hasil_uji', 'image');
        $this->forge->dropColumn('hasil_uji', 'kontrol_positif_ct');
        $this->forge->dropColumn('hasil_uji', 'kontrol_negatif_ct');
    }
}
