<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LoanSeeder extends Seeder
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
                'uuid' => '51ed9314-955c-4014-8be2-b0e2b13588a5',
                'customer_id' => 'c539792e-7773-4a39-9cf6-f273b2581438',
                'reference' => 'LN12345678',
                'state' => 'active',
                'amount_issued' => '100.00',
                'amount_to_pay' => '120.00'
            ],
            [
                'uuid' => 'a54b0796-2fcb-4547-b23d-125786600ec3',
                'customer_id' => 'c539792e-7773-4a39-9cf6-f273b2581438',
                'reference' => 'LN22345678',
                'state' => 'active',
                'amount_issued' => '200.00',
                'amount_to_pay' => '250.00'
            ],
            [
                'uuid' => 'f7f81281-64a9-47a7-af60-5c6896896d1f',
                'customer_id' => 'd275ce5e-91c8-49fe-9407-1700b59efe80',
                'reference' => 'LN55522533',
                'state' => 'active',
                'amount_issued' => '50.00',
                'amount_to_pay' => '70.00'
            ],
            [
                'uuid' => 'b8d26e7b-1607-441d-8bb0-87517a874572',
                'customer_id' => 'c5c05eeb-ff02-4de6-b92e-a1b7f02320df',
                'reference' => 'LN20221212',
                'state' => 'active',
                'amount_issued' => '66.00',
                'amount_to_pay' => '100.00'
            ],
        ];

        DB::table('loans')->insert($data);
    }
}
