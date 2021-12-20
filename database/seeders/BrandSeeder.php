<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class BrandSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('brands')->insert([
            [
                "id" => 1,
                "Name" => 'Windows',
                'Icon' => '',
                'Tag' => 'Windows'
            ],
            [
                "id" => 2,
                "Name" => 'MacOS',
                'Icon' => '',
                'Tag' => 'MacOS'
            ],
            [
                "id" => 3,
                "Name" => 'Linux',
                'Icon' => '',
                'Tag' => 'Linux'
            ],
            [
                "id" => 4,
                "Name" => 'Пользователь',
                'Icon' => '',
                'Tag' => 'User'
            ]
        ]);
    }
}
