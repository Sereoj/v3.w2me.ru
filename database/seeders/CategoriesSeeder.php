<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class CategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //name
        //description
        //icon
        //tag
        //status
        \DB::table('categories')->insert([
            [
                'name' => 'Природа',
                'description' => '',
                'icon' => '',
                'tag' => 'wallpapers',
                'status' => 'Active'
            ],
            [
                'name' => 'Космос',
                'description' => '',
                'icon' => '',
                'tag' => 'wallpapers',
                'status' => 'Active'
            ],
            [
                'name' => 'Города',
                'description' => '',
                'icon' => '',
                'tag' => 'wallpapers',
                'status' => 'Active'
            ],
            [
                'name' => 'Иллюстрация',
                'description' => '',
                'icon' => '',
                'tag' => 'wallpapers',
                'status' => 'Active'
            ],
        ]);
    }
}
