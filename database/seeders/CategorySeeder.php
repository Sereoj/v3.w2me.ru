<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('categories')->insert([
            [
                "id" => 1,
                "Name" => 'Природа',
                'description' => '',
                'meta_name' => '',
                'meta_description' => '',
                'Icon' => '',
                'Tag' => 'wallpapers'
            ],
            [
                "id" => 2,
                "Name" => 'Космос',
                'description' => '',
                'meta_name' => '',
                'meta_description' => '',
                'Icon' => '',
                'Tag' => 'wallpapers'
            ],
            [
                "id" => 3,
                "Name" => 'Города',
                'description' => '',
                'meta_name' => '',
                'meta_description' => '',
                'Icon' => '',
                'Tag' => 'wallpapers'
            ],
            [
                "id" => 4,
                "Name" => 'Иллюстрация',
                'description' => '',
                'meta_name' => '',
                'meta_description' => '',
                'Icon' => '',
                'Tag' => 'wallpapers'
            ]
        ]);
    }
}
