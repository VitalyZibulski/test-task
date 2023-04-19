<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'uuid' => 'c539792e-7773-4a39-9cf6-f273b2581438',
                'first_name' => 'Pupa',
                'last_name' => 'Lupa',
                'ssn' => '0987654321',
                'email' => 'pupa.lupa@example.com'
            ],
            [
                'uuid' => 'd275ce5e-91c8-49fe-9407-1700b59efe80',
                'first_name' => 'John',
                'last_name' => 'Doe',
                'ssn' => '1234509876',
                'phone' => '+44123456789',
            ],
            [
                'uuid' => 'a5c50ea9-9a24-4c8b-b4ae-c47ee007081e',
                'first_name' => 'Biba',
                'last_name' => 'Boba',
                'ssn' => '1234567890',
                'email' => 'biba@example.com'
            ],
            [
                'uuid' => 'c5c05eeb-ff02-4de6-b92e-a1b7f02320df',
                'first_name' => 'Lorem',
                'last_name' => 'Ipsum',
                'ssn' => '6789054321',
                'email' => 'lorem@ipsum'
            ],
        ];

        DB::table('customers')->insert($data);
    }
}
