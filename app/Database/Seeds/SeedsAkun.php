<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class SeedsAkun extends Seeder
{
    public function run()
    {
        $faker = \Faker\Factory::create("id_ID");

        for ($i = 1; $i < 6; $i++) {
            $created_at = $faker->dateTimeBetween('-1 year', 'now');
            $updated_at = $faker->dateTimeBetween($created_at, 'now');

            $data = [
                'username' => $faker->userName(),
                'password' => $faker->password(),
                'nama' => $faker->name(),
                'file' => $faker->randomElement(['default.png', 'default.png']),
                'level' => $faker->randomElement(['admin', 'user']),
                'status' => $faker->randomElement(['active', 'inactive']),
                'created_at' => $created_at->format('Y-m-d H:i:s'),
                'updated_at' => $updated_at->format('Y-m-d H:i:s'),
            ];

            $this->db->table('akun')->insert($data);
        }
    }
}
