<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class MigrationKriteria extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_kriteria' => [
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
            'kriteria' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
            ],
            'keterangan' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
            ],
            'bobot' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
            ],
            'created_at'  => [
                'type'    => 'DATETIME',
                'null'    => true,
            ],
            'updated_at'  => [
                'type'    => 'DATETIME',
                'null'    => true,
            ],
        ]);

        $this->forge->addKey('id_kriteria', true);
        $this->forge->addForeignKey('id_akun', 'akun', 'id_akun', 'CASCADE', 'CASCADE');
        $this->forge->createTable('kriteria');
    }

    public function down()
    {
        $this->forge->dropTable('kriteria');
    }
}
