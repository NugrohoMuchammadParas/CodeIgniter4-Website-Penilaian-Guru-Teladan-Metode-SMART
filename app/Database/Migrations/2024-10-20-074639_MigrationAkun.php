<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class MigrationAkun extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_akun' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'username' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
            ],
            'password' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
            ],
            'nama' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
            ],
            'file' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
            ],
            'level' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
            ],
            'status' => [
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
        $this->forge->addKey('id_akun', true);
        $this->forge->createTable('akun');
    }

    public function down()
    {
        $this->forge->dropTable('akun');
    }
}
