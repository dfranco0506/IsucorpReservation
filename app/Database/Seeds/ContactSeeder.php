<?php

namespace App\Database\Seeds;

use \CodeIgniter\I18n\Time;

class ContactSeeder extends \CodeIgniter\Database\Seeder
{
    public function run()
    {
        $faker = \Faker\Factory::create('id_contact');

        for ($i = 0; $i < 20; $i++) {
            $data = [
                'contact_type'        => rand(1,3),
                'name'        => $faker->name,
                'phone_number'     => $faker->phoneNumber,
                'birth_date'  => Time::createFromTimestamp($faker->unixTime()),
                'created_at'  => Time::createFromTimestamp($faker->unixTime()),
                'updated_at'  => Time::now()
            ];

            // Using Query Builder
            $this->db->table('dcontact')->insert($data);
        }
    }
}