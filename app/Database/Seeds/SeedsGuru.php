<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class SeedsGuru extends Seeder
{
    public function run()
    {
        $faker = \Faker\Factory::create("id_ID");

        for ($i = 1; $i < 6; $i++) {
            $created_at = $faker->dateTimeBetween('-1 year', 'now');
            $updated_at = $faker->dateTimeBetween($created_at, 'now');

            $data = [
                'id_akun' => $i,
                'nama' => $faker->name(),
                'lahir' => $faker->date(),
                'telepon' => $faker->phoneNumber(),
                'email' => $faker->email(),
                'alamat'    => $faker->address(),
                'created_at' => $created_at->format('Y-m-d H:i:s'),
                'updated_at' => $updated_at->format('Y-m-d H:i:s'),
            ];

            $this->db->table('guru')->insert($data);
        }
    }
}
