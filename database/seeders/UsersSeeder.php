<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //name
        //email
        //email_verified_at
        //password
        //description
        //country
        //dob
        //cover
        //avatar
        //favorite_themes
        //install_themes
        //lang
        //api_token
        //upload
        //facebook
        //twitter
        //google
        //status
        //reported

        DB::table('users')->insert([
            [
                'name' => 'Admin',
                'email' => 'admin@w2me.ru',
                'email_verified_at' => Carbon::today(),
                'password' => Hash::make('admin'),
                'description' => 'По всем вопросам: help@w2me.ru',
                'country' => 'Russia',
                'dob' => '1999-01-14',
                'cover' => '',
                'avatar' => '',
                'favorite_themes' => serialize([1, 3, 5]),
                'install_themes' => serialize([1, 3, 5]),
                'lang' => 'ru',
                'api_token' => '',
                'facebook' => '',
                'twitter' => '',
                'google' => '',
                'status' => 'Active'
            ],
            [
                'name' => 'Helper',
                'email' => 'help@w2me.ru',
                'email_verified_at' => Carbon::today(),
                'password' => Hash::make('helper'),
                'description' => 'По всем вопросам: help@w2me.ru',
                'country' => 'Russia',
                'dob' => '1998-10-14',
                'cover' => '',
                'avatar' => '',
                'favorite_themes' => '',
                'install_themes' => '',
                'lang' => 'ru',
                'api_token' => '',
                'facebook' => '',
                'twitter' => '',
                'google' => '',
                'status' => 'Active'
            ]
        ]);
    }
}
