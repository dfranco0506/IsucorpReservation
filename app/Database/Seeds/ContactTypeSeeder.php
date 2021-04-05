<?php

namespace App\Database\Seeds;

use \CodeIgniter\I18n\Time;

class ContactTypeSeeder extends \CodeIgniter\Database\Seeder
{
    public function run()
    {
        $data = [
            [
                'name'        => 'Contact Type 1',
                'created_at'  => Time::now(),
                'updated_at'  => Time::now()
            ],
            [
                'name'        => 'Contact Type 2',
                'created_at'  => Time::now(),
                'updated_at'  => Time::now()
            ],
            [
                'name'        => 'Contact Type 3',
                'created_at'  => Time::now(),
                'updated_at'  => Time::now()
            ]
        ];

        // Using Query Builder
        $this->db->table('ncontacttype')->insertBatch($data);
    }
}