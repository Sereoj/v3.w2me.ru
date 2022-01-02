<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Nette\Utils\Random;

class PhotosSeeder extends Seeder
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
        //preview
        //licence
        //views
        //likes
        //downloads
        //cat_id
        //brand_id
        //user_id
        //isActive
        //reported

        DB::table('photos')->insert([
            [
                'name' => 'Abstract Cloth',
                'description' => 'Данный текст используется для шаблона и не несёт важную ключевую информацию. Читая не информативный текст в пустую потратите время.',
                'preview' => 'https://raw.githubusercontent.com/t1m0thyj/WDD-website/master/themes/previews/Abstract_Cloth_day.jpg',
                'licence' => 'free',
                'views' => rand(10,100),
                'likes' => rand(10,100),
                'downloads' => rand(10,100),
                'cat_id' => 1,
                'brand_id' => 2,
                'user_id' => 1,
                'isActive' => true,
                'download_link' => 'https://w2me.ru/download',
            ],
            [
                'name' => 'Apple Ocean',
                'description' => 'Данный текст используется для шаблона и не несёт важную ключевую информацию. Читая не информативный текст в пустую потратите время.',
                'preview' => 'https://raw.githubusercontent.com/t1m0thyj/WDD-website/master/themes/previews/Apple_Ocean_day.jpg',
                'licence' => 'free',
                'views' => rand(10,100),
                'likes' => rand(10,100),
                'downloads' => rand(10,100),
                'cat_id' => 1,
                'brand_id' => 2,
                'user_id' => 1,
                'isActive' => true,
                'download_link' => 'https://w2me.ru/download',
            ],
            [
                'name' => 'Abstract Cloth',
                'description' => 'Данный текст используется для шаблона и не несёт важную ключевую информацию. Читая не информативный текст в пустую потратите время.',
                'preview' => 'https://raw.githubusercontent.com/t1m0thyj/WDD-website/master/themes/previews/Abstract_Cloth_day.jpg',
                'licence' => 'free',
                'views' => rand(10,100),
                'likes' => rand(10,100),
                'downloads' => rand(10,100),
                'cat_id' => 1,
                'brand_id' => 2,
                'user_id' => 1,
                'isActive' => true,
                'download_link' => 'https://w2me.ru/download',
            ],
            [
                'name' => 'Automation Hyper Turning Left',
                'description' => 'Данный текст используется для шаблона и не несёт важную ключевую информацию. Читая не информативный текст в пустую потратите время.',
                'preview' => 'https://raw.githubusercontent.com/t1m0thyj/WDD-website/master/themes/previews/Automation_Hyper_Turning_Left_day.jpg',
                'licence' => 'free',
                'views' => rand(10,100),
                'likes' => rand(10,100),
                'downloads' => rand(10,100),
                'cat_id' => 1,
                'brand_id' => 2,
                'user_id' => 1,
                'isActive' => true,
                'download_link' => 'https://w2me.ru/download',
            ],
            [
                'name' => 'Big Sur Abstract',
                'description' => 'Данный текст используется для шаблона и не несёт важную ключевую информацию. Читая не информативный текст в пустую потратите время.',
                'preview' => 'https://raw.githubusercontent.com/t1m0thyj/WDD-website/master/themes/previews/Big_Sur_Abstract_day.jpg',
                'licence' => 'free',
                'views' => rand(10,100),
                'likes' => rand(10,100),
                'downloads' => rand(10,100),
                'cat_id' => 1,
                'brand_id' => 2,
                'user_id' => 1,
                'isActive' => true,
                'download_link' => 'https://w2me.ru/download',
            ],
            [
                'name' => 'Big Sur',
                'description' => 'Данный текст используется для шаблона и не несёт важную ключевую информацию. Читая не информативный текст в пустую потратите время.',
                'preview' => 'https://raw.githubusercontent.com/t1m0thyj/WDD-website/master/themes/previews/Big_Sur_day.jpg',
                'licence' => 'free',
                'views' => rand(10,100),
                'likes' => rand(10,100),
                'downloads' => rand(10,100),
                'cat_id' => 1,
                'brand_id' => 2,
                'user_id' => 1,
                'isActive' => true,
                'download_link' => 'https://w2me.ru/download',
            ],
            [
                'name' => 'Catalina',
                'description' => 'Данный текст используется для шаблона и не несёт важную ключевую информацию. Читая не информативный текст в пустую потратите время.',
                'preview' => 'https://raw.githubusercontent.com/t1m0thyj/WDD-website/master/themes/previews/Catalina_day.jpg',
                'licence' => 'free',
                'views' => rand(10,100),
                'likes' => rand(10,100),
                'downloads' => rand(10,100),
                'cat_id' => 1,
                'brand_id' => 2,
                'user_id' => 1,
                'isActive' => true,
                'download_link' => 'https://w2me.ru/download',
            ],
            [
                'name' => 'Dome',
                'description' => 'Данный текст используется для шаблона и не несёт важную ключевую информацию. Читая не информативный текст в пустую потратите время.',
                'preview' => 'https://raw.githubusercontent.com/t1m0thyj/WDD-website/master/themes/previews/Dome_day.jpg',
                'licence' => 'free',
                'views' => rand(10,100),
                'likes' => rand(10,100),
                'downloads' => rand(10,100),
                'cat_id' => 1,
                'brand_id' => 2,
                'user_id' => 1,
                'isActive' => true,
                'download_link' => 'https://w2me.ru/download',
            ],
            [
                'name' => 'Iridescence',
                'description' => 'Данный текст используется для шаблона и не несёт важную ключевую информацию. Читая не информативный текст в пустую потратите время.',
                'preview' => 'https://raw.githubusercontent.com/t1m0thyj/WDD-website/master/themes/previews/Iridescence_day.jpg',
                'licence' => 'free',
                'views' => rand(10,100),
                'likes' => rand(10,100),
                'downloads' => rand(10,100),
                'cat_id' => 1,
                'brand_id' => 2,
                'user_id' => 1,
                'isActive' => true,
                'download_link' => 'https://w2me.ru/download',
            ],
            [
                'name' => 'Monterey Abstract',
                'description' => 'Данный текст используется для шаблона и не несёт важную ключевую информацию. Читая не информативный текст в пустую потратите время.',
                'preview' => 'https://raw.githubusercontent.com/t1m0thyj/WDD-website/master/themes/previews/Monterey_Abstract_day.jpg',
                'licence' => 'free',
                'views' => rand(10,100),
                'likes' => rand(10,100),
                'downloads' => rand(10,100),
                'cat_id' => 1,
                'brand_id' => 2,
                'user_id' => 1,
                'isActive' => true,
                'download_link' => 'https://w2me.ru/download',
            ],
            [
                'name' => 'Peak',
                'description' => 'Данный текст используется для шаблона и не несёт важную ключевую информацию. Читая не информативный текст в пустую потратите время.',
                'preview' => 'https://raw.githubusercontent.com/t1m0thyj/WDD-website/master/themes/previews/Peak_day.jpg',
                'licence' => 'free',
                'views' => rand(10,100),
                'likes' => rand(10,100),
                'downloads' => rand(10,100),
                'cat_id' => 1,
                'brand_id' => 2,
                'user_id' => 1,
                'isActive' => true,
                'download_link' => 'https://w2me.ru/download',
            ],
        ]);
    }
}
