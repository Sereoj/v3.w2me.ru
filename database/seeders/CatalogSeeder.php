<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CatalogSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //id	name	description	meta_title	meta_description	preview	images	category_id	license_type_id	user_id	catalog_download_id	catalog_rating_id
        DB::table('catalog')->insert(
            [
                [
                    'id' => 1,
                    'name' => 'Abstract Cloth',
                    'description' => 'Данный текст используется для шаблона и не несёт важную ключевую информацию. Читая не информативный текст в пустую потратите время.',
                    'meta_title' => 'Abstract Cloth | Wallpaper for Windows 10',
                    'meta_description' => 'Abstract Cloth - Тема',
                    'views' => 100,
                    'like' => 10,
                    'preview' => 'https://raw.githubusercontent.com/t1m0thyj/WDD-website/master/themes/previews/Abstract_Cloth_day.jpg',
                    'images' => serialize([
                        'sunrise' => [],
                        'day' => [
                            0 => 'https://raw.githubusercontent.com/t1m0thyj/WDD-website/master/themes/previews/Abstract_Cloth_day.jpg'
                        ],
                        'sunset' => [],
                        'night' => [
                            1 => 'https://raw.githubusercontent.com/t1m0thyj/WDD-website/master/themes/previews/Abstract_Cloth_night.jpg'
                        ],
                    ]),
                    'category_id' => 1,
                    'brand_id' => 2,
                    'user_id' => 1,
                    'isActive' => true,
                ],
                [
                    'id' => 2,
                    'name' => 'Apple Ocean',
                    'description' => 'Данный текст используется для шаблона и не несёт важную ключевую информацию. Читая не информативный текст в пустую потратите время.',
                    'meta_title' => 'Apple Ocean | Wallpaper for Windows 10',
                    'meta_description' => 'Apple Ocean - Тема',
                    'views' => 100,
                    'like' => 10,
                    'preview' => 'https://raw.githubusercontent.com/t1m0thyj/WDD-website/master/themes/previews/Apple_Ocean_day.jpg',
                    'images' => serialize([
                        'sunrise' => [
                            0 => 'https://raw.githubusercontent.com/t1m0thyj/WDD-website/master/themes/previews/Apple_Ocean_sunrise.jpg',
                        ],
                        'day' => [
                            1 => 'https://raw.githubusercontent.com/t1m0thyj/WDD-website/master/themes/previews/Apple_Ocean_day.jpg'
                        ],
                        'sunset' => [
                            2 => 'https://raw.githubusercontent.com/t1m0thyj/WDD-website/master/themes/previews/Apple_Ocean_sunset.jpg'
                        ],
                        'night' => [
                            3 => 'https://raw.githubusercontent.com/t1m0thyj/WDD-website/master/themes/previews/Apple_Ocean_night.jpg'
                        ],
                    ]),
                    'category_id' => 1,
                    'brand_id' => 2,
                    'user_id' => 1,
                    'isActive' => true,
                ],
                [
                    'id' => 3,
                    'name' => 'Automation Hyper Turning Left',
                    'description' => 'Данный текст используется для шаблона и не несёт важную ключевую информацию. Читая не информативный текст в пустую потратите время.',
                    'meta_title' => 'Automation Hyper Turning Left | Wallpaper for Windows 10',
                    'meta_description' => 'Automation Hyper Turning Left - Тема',
                    'views' => 100,
                    'like' => 10,
                    'preview' => 'https://raw.githubusercontent.com/t1m0thyj/WDD-website/master/themes/previews/Automation_Hyper_Turning_Left_day.jpg',
                    'images' => serialize([
                        'sunrise' => [
                            0 => 'https://raw.githubusercontent.com/t1m0thyj/WDD-website/master/themes/previews/Automation_Hyper_Turning_Left_sunrise.jpg',
                        ],
                        'day' => [
                            1 => 'https://raw.githubusercontent.com/t1m0thyj/WDD-website/master/themes/previews/Automation_Hyper_Turning_Left_day.jpg'
                        ],
                        'sunset' => [
                            2 => 'https://raw.githubusercontent.com/t1m0thyj/WDD-website/master/themes/previews/Automation_Hyper_Turning_Left_sunset.jpg'
                        ],
                        'night' => [
                            3 => 'https://raw.githubusercontent.com/t1m0thyj/WDD-website/master/themes/previews/Automation_Hyper_Turning_Left_night.jpg'
                        ],
                    ]),
                    'category_id' => 1,
                    'brand_id' => 2,
                    'user_id' => 1,
                    'isActive' => true,
                ],
                [
                    'id' => 4,
                    'name' => 'Big Sur Abstract',
                    'description' => 'Данный текст используется для шаблона и не несёт важную ключевую информацию. Читая не информативный текст в пустую потратите время.',
                    'meta_title' => 'Big Sur Abstract | Wallpaper for Windows 10',
                    'meta_description' => 'Big Sur Abstract - Тема',
                    'views' => 100,
                    'like' => 10,
                    'preview' => 'https://raw.githubusercontent.com/t1m0thyj/WDD-website/master/themes/previews/Big_Sur_Abstract_day.jpg',
                    'images' => serialize([
                        'sunrise' => [],
                        'day' => [
                            0 => 'https://raw.githubusercontent.com/t1m0thyj/WDD-website/master/themes/previews/Big_Sur_Abstract_day.jpg'
                        ],
                        'sunset' => [],
                        'night' => [
                            1 => 'https://raw.githubusercontent.com/t1m0thyj/WDD-website/master/themes/previews/Big_Sur_Abstract_night.jpg'
                        ],
                    ]),
                    'category_id' => 4,
                    'brand_id' => 2,
                    'user_id' => 1,
                    'isActive' => false,
                ],
                [
                    'id' => 5,
                    'name' => 'Big Sur',
                    'description' => 'Данный текст используется для шаблона и не несёт важную ключевую информацию. Читая не информативный текст в пустую потратите время.',
                    'meta_title' => 'Big Sur | Wallpaper for Windows 10',
                    'meta_description' => 'Big Sur - Тема',
                    'views' => 111,
                    'like' => 10,
                    'preview' => 'https://raw.githubusercontent.com/t1m0thyj/WDD-website/master/themes/previews/Big_Sur_day.jpg',
                    'images' => serialize([
                        'sunrise' => [
                            0 => 'https://raw.githubusercontent.com/t1m0thyj/WDD-website/master/themes/previews/Big_Sur_sunrise.jpg',
                        ],
                        'day' => [
                            1 => 'https://raw.githubusercontent.com/t1m0thyj/WDD-website/master/themes/previews/Big_Sur_day.jpg'
                        ],
                        'sunset' => [
                            2 => 'https://raw.githubusercontent.com/t1m0thyj/WDD-website/master/themes/previews/Big_Sur_sunset.jpg'
                        ],
                        'night' => [
                            3 => 'https://raw.githubusercontent.com/t1m0thyj/WDD-website/master/themes/previews/Big_Sur_night.jpg'
                        ],
                    ]),
                    'category_id' => 1,
                    'brand_id' => 2,
                    'user_id' => 1,
                    'isActive' => true,
                ],
                [
                    'id' => 6,
                    'name' => 'Catalina',
                    'description' => 'Данный текст используется для шаблона и не несёт важную ключевую информацию. Читая не информативный текст в пустую потратите время.',
                    'meta_title' => 'Catalina | Wallpaper for Windows 10',
                    'meta_description' => 'Catalina - Тема',
                    'views' => 99,
                    'like' => 100,
                    'preview' => 'https://raw.githubusercontent.com/t1m0thyj/WDD-website/master/themes/previews/Catalina_day.jpg',
                    'images' => serialize([
                        'sunrise' => [
                            0 => 'https://raw.githubusercontent.com/t1m0thyj/WDD-website/master/themes/previews/Catalina_sunrise.jpg',
                        ],
                        'day' => [
                            1 => 'https://raw.githubusercontent.com/t1m0thyj/WDD-website/master/themes/previews/Catalina_day.jpg'
                        ],
                        'sunset' => [
                            2 => 'https://raw.githubusercontent.com/t1m0thyj/WDD-website/master/themes/previews/Catalina_sunset.jpg'
                        ],
                        'night' => [
                            3 => 'https://raw.githubusercontent.com/t1m0thyj/WDD-website/master/themes/previews/Catalina_night.jpg'
                        ],
                    ]),
                    'category_id' => 4,
                    'brand_id' => 2,
                    'user_id' => 1,
                    'isActive' => true,
                ],
                [
                    'id' => 7,
                    'name' => 'Dome',
                    'description' => 'Данный текст используется для шаблона и не несёт важную ключевую информацию. Читая не информативный текст в пустую потратите время.',
                    'meta_title' => 'Dome | Wallpaper for Windows 10',
                    'meta_description' => 'Dome - Тема',
                    'views' => 20,
                    'like' => 10,
                    'preview' => 'https://raw.githubusercontent.com/t1m0thyj/WDD-website/master/themes/previews/Dome_day.jpg',
                    'images' => serialize([
                        'sunrise' => [],
                        'day' => [
                            0 => 'https://raw.githubusercontent.com/t1m0thyj/WDD-website/master/themes/previews/Dome_day.jpg'
                        ],
                        'sunset' => [],
                        'night' => [
                            1 => 'https://raw.githubusercontent.com/t1m0thyj/WDD-website/master/themes/previews/Dome_night.jpg'
                        ],
                    ]),
                    'category_id' => 4,
                    'brand_id' => 2,
                    'user_id' => 1,
                    'isActive' => true,
                ],
                [
                'id' => 8,
                'name' => 'Iridescence',
                'description' => 'Данный текст используется для шаблона и не несёт важную ключевую информацию. Читая не информативный текст в пустую потратите время.',
                'meta_title' => 'Iridescence | Wallpaper for Windows 10',
                'meta_description' => 'Iridescence - Тема',
                'views' => 100,
                'like' => 10,
                'preview' => 'https://raw.githubusercontent.com/t1m0thyj/WDD-website/master/themes/previews/Iridescence_day.jpg',
                'images' => serialize([
                    'sunrise' => [],
                    'day' => [
                        0 => 'https://raw.githubusercontent.com/t1m0thyj/WDD-website/master/themes/previews/Iridescence_day.jpg'
                    ],
                    'sunset' => [],
                    'night' => [
                        1 => 'https://raw.githubusercontent.com/t1m0thyj/WDD-website/master/themes/previews/Iridescence_night.jpg'
                    ],
                    ]),
                    'category_id' => 4,
                    'brand_id' => 2,
                    'user_id' => 1,
                    'isActive' => true,
                ],
                [
                    'id' => 9,
                    'name' => 'Monterey Abstract',
                    'description' => 'Данный текст используется для шаблона и не несёт важную ключевую информацию. Читая не информативный текст в пустую потратите время.',
                    'meta_title' => 'Monterey Abstract | Wallpaper for Windows 10',
                    'meta_description' => 'Monterey Abstract - Тема',
                    'views' => 100,
                    'like' => 10,
                    'preview' => 'https://raw.githubusercontent.com/t1m0thyj/WDD-website/master/themes/previews/Monterey_Abstract_day.jpg',
                    'images' => serialize([
                        'sunrise' => [],
                        'day' => [
                            0 => 'https://raw.githubusercontent.com/t1m0thyj/WDD-website/master/themes/previews/Monterey_Abstract_day.jpg'
                        ],
                        'sunset' => [],
                        'night' => [
                            1 => 'https://raw.githubusercontent.com/t1m0thyj/WDD-website/master/themes/previews/Monterey_Abstract_night.jpg'
                        ],
                    ]),
                    'category_id' => 2,
                    'brand_id' => 2,
                    'user_id' => 1,
                    'isActive' => true,
                ],
                [
                    'id' => 10,
                    'name' => 'Peak',
                    'description' => 'Данный текст используется для шаблона и не несёт важную ключевую информацию. Читая не информативный текст в пустую потратите время.',
                    'meta_title' => 'Peak | Wallpaper for Windows 10',
                    'meta_description' => 'Peak - Тема',
                    'views' => 100,
                    'like' => 10,
                    'preview' => 'https://raw.githubusercontent.com/t1m0thyj/WDD-website/master/themes/previews/Peak_day.jpg',
                    'images' => serialize([
                        'sunrise' => [],
                        'day' => [
                            0 => 'https://raw.githubusercontent.com/t1m0thyj/WDD-website/master/themes/previews/Peak_day.jpg'
                        ],
                        'sunset' => [],
                        'night' => [
                            1 => 'https://raw.githubusercontent.com/t1m0thyj/WDD-website/master/themes/previews/Peak_day.jpg'
                        ],
                    ]),
                    'category_id' => 4,
                    'brand_id' => 2,
                    'user_id' => 1,
                    'isActive' => true,
                ],
            ]
        );
    }
}
