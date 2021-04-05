<?php

namespace App\Database\Seeds;

use \CodeIgniter\I18n\Time;

class DestinationSeeder extends \CodeIgniter\Database\Seeder
{
    public function run()
    {
        $data = [
            [
                'name'        => 'Second Dog',
                'rating'        => 4.5,
                'favorite'        => true,
                'name'        => 'img/banner.jpg',
                'description'        => 'Second Dog',
                'created_at'  => Time::now(),
                'updated_at'  => Time::now()
            ],
            [
                'name'        => 'Primer Puerto',
                'rating'        => 5,
                'favorite'        => true,
                'name'        => 'img/primer_puerto.jpg',
                'description'        => 'Primer Puerto',
                'created_at'  => Time::now(),
                'updated_at'  => Time::now()
            ],
            [
                'name'        => 'Stella',
                'rating'        => 2,
                'favorite'        => false,
                'name'        => 'img/stella.jpg',
                'description'        => 'Stella',
                'created_at'  => Time::now(),
                'updated_at'  => Time::now()
            ],
            [
                'name'        => 'Island Creek',
                'rating'        => 3.5,
                'favorite'        => false,
                'name'        => 'img/blog1.jpg',
                'description'        => 'Island Creek',
                'created_at'  => Time::now(),
                'updated_at'  => Time::now()
            ],
            [
                'name'        => 'Fogo the Chao',
                'rating'        => 4,
                'favorite'        => true,
                'name'        => 'img/blog2.jpg',
                'description'        => 'Fogo the Chao',
                'created_at'  => Time::now(),
                'updated_at'  => Time::now()
            ],
            [
                'name'        => 'Fontana',
                'rating'        => 5,
                'favorite'        => true,
                'name'        => 'img/blog3.jpg',
                'description'        => 'Fontana',
                'created_at'  => Time::now(),
                'updated_at'  => Time::now()
            ]
        ];

        // Using Query Builder
        $this->db->table('ddestination')->insertBatch($data);
    }
}