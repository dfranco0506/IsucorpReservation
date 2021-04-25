<?php

namespace App\Database\Seeds;

use \CodeIgniter\I18n\Time;

class ReservationSeeder extends \CodeIgniter\Database\Seeder
{
    public function run()
    {
        $faker = \Faker\Factory::create('id_contact');

        for ($i = 0; $i < 5; $i++) {
            $data = [
                'contact'        => rand(1,20),
                'id_destination' => rand(1,6),
                'description'    => $faker->text,
                'date'           => Time::createFromTimestamp($faker->unixTime()),
                'time'           => $faker->dateTimeBetween('-2 month', '-1 days')->format('H:i:s'),
                'favorite'       => $faker->boolean,
                'rating'         => rand(0,5),
                'created_at'     => Time::createFromTimestamp($faker->unixTime()),
                'updated_at'     => Time::now()
            ];

            // Using Query Builder
            $this->db->table('dreservation')->insert($data);
        }
    }
}