<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FollowersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //user_id
        //follower_id
        DB::table('followers')->insert([
            [
                'user_id' => '1',
                'follower_id' => '2',
                'date' => '2021-01-01'
            ],
            [
                'user_id' => '2',
                'follower_id' => '1',
                'date' => '2021-01-01'
            ]
        ]);
    }
}
