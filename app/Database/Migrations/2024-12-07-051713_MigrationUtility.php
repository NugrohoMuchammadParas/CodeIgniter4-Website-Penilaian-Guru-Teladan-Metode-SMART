<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class MigrationUtility extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_utility' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'id_alternatif' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'null'           => true,
            ],
            'id_guru' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'null'           => true,
            ],
            'rencana_pelaksanaan_pembelajaran' => [
                'type'           => 'FLOAT',
                'constraint'     => 5.3,
                'unsigned'       => true,
            ],
            'kriteria_ketuntasan_minimal' => [
                'type'           => 'FLOAT',
                'constraint'     => 5.3,
                'unsigned'       => true,
            ],
            'pembuatan_soal' => [
                'type'           => 'FLOAT',
                'constraint'     => 5.3,
                'unsigned'       => true,
            ],
            'absensi_kehadiran' => [
                'type'           => 'FLOAT',
                'constraint'     => 5.3,
                'unsigned'       => true,
            ],
            'ketepatan_waktu' => [
                'type'           => 'FLOAT',
                'constraint'     => 5.3,
                'unsigned'       => true,
            ],
            'created_at'  => [
                'type'    => 'TIMESTAMP',
                'null'    => true,
            ],
            'updated_at'  => [
                'type'    => 'TIMESTAMP',
                'null'    => true,
            ],
        ]);

        $this->forge->addKey('id_utility', true);
        $this->forge->addForeignKey('id_alternatif', 'alternatif', 'id_alternatif', 'CASCADE', 'CASCADE');
        $this->forge->createTable('utility');
    }

    public function down()
    {
        $this->forge->dropTable('utility');
    }
}
