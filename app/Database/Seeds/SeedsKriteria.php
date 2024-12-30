<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class SeedsKriteria extends Seeder
{
    public function run()
    {
        $faker = \Faker\Factory::create("id_ID");

        for ($i = 1; $i < 6; $i++) {
            $created_at = $faker->dateTimeBetween('-1 year', 'now');
            $updated_at = $faker->dateTimeBetween($created_at, 'now');

            $data = [
                'id_akun' => $i,
                'kriteria' => $faker->randomElement(['Rencana Pelaksanaan Pembelajaran', 'Kriteria Ketuntasan Minimal', 'Pembuatan Soal', 'Absensi Kehadiran', 'Ketepatan Waktu']),
                'keterangan' => $faker->randomElement(['Benefit', 'Cost']),
                'bobot' => $faker->numberBetween(10, 50),
                'created_at' => $created_at->format('Y-m-d H:i:s'),
                'updated_at' => $updated_at->format('Y-m-d H:i:s'),
            ];

            $this->db->table('kriteria')->insert($data);
        }
    }
}
