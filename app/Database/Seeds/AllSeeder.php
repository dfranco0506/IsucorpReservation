<?php namespace App\Database\Seeds;

class AllSeeder extends \CodeIgniter\Database\Seeder
{
    public function run()
    {
        $this->call('ContactTypeSeeder');
        $this->call('ContactSeeder');
        $this->call('DestinationSeeder');
        $this->call('ReservationSeeder');
    }
}