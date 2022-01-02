<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class BrandsSeeder extends Seeder
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
        \DB::table('brands')->insert([
            [
                'name' => 'Windows',
                'description' => '',
                'icon' => '',
                'tag' => 'windows',
                'status' => 'Active'
            ],
            [
                'name' => 'MacOS',
                'description' => '',
                'icon' => '',
                'tag' => 'macos',
                'status' => 'Active'
            ],
            [
                'name' => 'Linux',
                'description' => '',
                'icon' => '',
                'tag' => 'linux',
                'status' => 'Active'
            ],
            [
                'name' => 'Другие',
                'description' => '',
                'icon' => '',
                'tag' => 'others',
                'status' => 'Active'
            ],
        ]);
    }
}
