<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class SeedsLaporan extends Seeder
{
    public function run()
    {
        $faker = \Faker\Factory::create("id_ID");

        for ($i = 1; $i < 6; $i++) {
            $created_at = $faker->dateTimeBetween('-1 year', 'now');
            $updated_at = $faker->dateTimeBetween($created_at, 'now');

            $kelamin = $faker->randomElement(['Wanita', 'Pria']);

            $data = [
                'id_akun' => $i,
                'id_guru' => $i,
                'tanggal' => $faker->date(),
                'file' => $faker->name(),
                'created_at' => $created_at->format('Y-m-d H:i:s'),
                'updated_at' => $updated_at->format('Y-m-d H:i:s'),
            ];

            $this->db->table('laporan')->insert($data);
        }
    }
}
