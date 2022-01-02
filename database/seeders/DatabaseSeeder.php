<?php

namespace Database\Seeders;

use App\Models\Categories;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UsersSeeder::class);
        $this->call(BrandsSeeder::class);
        $this->call(CategoriesSeeder::class);
        $this->call(FollowersSeeder::class);

        $this->call(PhotosSeeder::class);
        $this->call(PhotoSeeder::class);
    }
}
