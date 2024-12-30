<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class MigrationGuru extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_guru' => [
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
            'nama' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
            ],
            'lahir' => [
                'type'       => 'DATE',
            ],
            'telepon' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
            ],
            'email' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
            ],
            'alamat' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
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

        $this->forge->addKey('id_guru', true);
        $this->forge->addForeignKey('id_akun', 'akun', 'id_akun', 'CASCADE', 'CASCADE');
        $this->forge->createTable('guru');
    }

    public function down()
    {
        $this->forge->dropTable('guru');
    }
}
