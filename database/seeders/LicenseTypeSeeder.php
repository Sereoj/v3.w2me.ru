<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LicenseTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('license_type')->insert([
            [
                'id' => 1,
                'catalog_id' => 1,
                'cost' => '500.5',
                'currency' => 'RUB',
                'type' => 'pay',
            ],
            [
                'id' => 2,
                'catalog_id' => 2,
                'cost' => '50',
                'currency' => 'USD',
                'type' => 'pay',
            ],
            [
                'id' => 3,
                'catalog_id' => 3,
                'cost' => '',
                'currency' => 'RUB',
                'type' => 'free',
            ],
            [
                'id' => 4,
                'catalog_id' => 4,
                'cost' => '',
                'currency' => 'RUB',
                'type' => 'free',
            ],
            [
                'id' => 5,
                'catalog_id' => 5,
                'cost' => '',
                'currency' => 'USD',
                'type' => 'free',
            ],
            [
                'id' => 6,
                'catalog_id' => 6,
                'cost' => '',
                'currency' => 'USD',
                'type' => 'free',
            ],
            [
                'id' => 7,
                'catalog_id' => 7,
                'cost' => '',
                'currency' => 'USD',
                'type' => 'free',
            ],
            [
                'id' => 8,
                'catalog_id' => 8,
                'cost' => '',
                'currency' => 'USD',
                'type' => 'free',
            ],
            [
                'id' => 9,
                'catalog_id' => 9,
                'cost' => '',
                'currency' => 'USD',
                'type' => 'free',
            ],
            [
                'id' => 10,
                'catalog_id' => 10,
                'cost' => '',
                'currency' => 'USD',
                'type' => 'free',
            ],
        ]);
    }
}
