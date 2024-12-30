<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class MigrationLaporan extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_laporan' => [
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
            'tanggal' => [
                'type'       => 'DATE',
            ],
            'file' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
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

        $this->forge->addKey('id_laporan', true);
        $this->forge->addForeignKey('id_akun', 'akun', 'id_akun', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('id_guru', 'guru', 'id_guru', 'CASCADE', 'CASCADE');
        $this->forge->createTable('laporan');
    }

    public function down()
    {
        $this->forge->dropTable('laporan');
    }
}
