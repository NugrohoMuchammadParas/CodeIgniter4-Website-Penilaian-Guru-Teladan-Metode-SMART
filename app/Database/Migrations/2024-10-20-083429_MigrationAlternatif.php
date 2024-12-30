<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class MigrationAlternatif extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_alternatif' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'id_akun' => [
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
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
            ],
            'kriteria_ketuntasan_minimal' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
            ],
            'pembuatan_soal' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
            ],
            'absensi_kehadiran' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
            ],
            'ketepatan_waktu' => [
                'type'           => 'INT',
                'constraint'     => 11,
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

        $this->forge->addKey('id_alternatif', true);
        $this->forge->addForeignKey('id_akun', 'akun', 'id_akun', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('id_guru', 'guru', 'id_guru', 'CASCADE', 'CASCADE');
        $this->forge->createTable('alternatif');
    }

    public function down()
    {
        $this->forge->dropTable('alternatif');
    }
}
