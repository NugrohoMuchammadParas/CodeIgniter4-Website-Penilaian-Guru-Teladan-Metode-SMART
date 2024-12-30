<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class SeedsAlternatif extends Seeder
{
    public function run()
    {
        $faker = \Faker\Factory::create("id_ID");

        for ($i = 1; $i < 6; $i++) {
            $created_at = $faker->dateTimeBetween('-1 year', 'now');
            $updated_at = $faker->dateTimeBetween($created_at, 'now');

            $data = [
                'id_akun'     => $i,
                'id_guru' => $i,
                'rencana_pelaksanaan_pembelajaran'     => $faker->numberBetween(10, 50),
                'kriteria_ketuntasan_minimal'  => $faker->numberBetween(10, 50),
                'pembuatan_soal'   => $faker->numberBetween(10, 50),
                'absensi_kehadiran' => $faker->numberBetween(10, 50),
                'ketepatan_waktu'    => $faker->numberBetween(10, 50),
                'created_at'  => $created_at->format('Y-m-d H:i:s'),
                'updated_at'  => $updated_at->format('Y-m-d H:i:s'),
            ];

            $this->db->table('alternatif')->insert($data);
        }
    }
}
