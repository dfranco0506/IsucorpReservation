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
                'contact'        => rand(1,150),
                'destination'        => rand(1,6),
                'description'        => $faker->text,
                'created_at'  => Time::createFromTimestamp($faker->unixTime()),
                'updated_at'  => Time::now()
            ];

            // Using Query Builder
            $this->db->table('dreservation')->insert($data);
        }
    }
}