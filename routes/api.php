<?php

use App\Http\Controllers\api\AuthenticationController;
use App\Http\Controllers\api\BrandController;
use App\Http\Controllers\api\CategoryController;
use App\Http\Controllers\api\PostController;
use App\Http\Controllers\api\UserController;
use Illuminate\Support\Facades\Route;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get('/server/telescope', function () {
    Artisan::call('storage:link');
    Artisan::call('config:cache');
    Artisan::call('config:clear');
    Artisan::call('migrate');
});


//Общедоступные

Route::post('/register',[AuthenticationController::class,'register']); // Регистрация
Route::post('/login',[AuthenticationController::class,'login']); // Авторизация

Route::get('/wallpapers', [PostController::class, 'index']); // Вывод всех
Route::get('/wallpapers/one/{post}', [PostController::class, 'show']); // Отображение одного поста
Route::get('/wallpapers/one/{post}/images', [PostController::class, 'images']); // Отобразить связанные изображения
Route::get('/wallpapers/one/{post}/tags', [PostController::class, 'tags']); // Отобразить все теги поста
Route::get('/wallpapers/one/{post}/categories', [PostController::class, 'categories']); // Отобразить все категории поста
Route::get('/wallpapers/one/{post}/likes', [PostController::class, 'likes']); // Отобразить все категории поста

Route::get('/wallpapers/new', [PostController::class, 'new']); // отображение всех новых изображений по просмотрам.
Route::get('/wallpapers/popular', [PostController::class, 'popular']); // Отображение всех популярных
Route::get('/wallpapers/wait', [PostController::class, 'wait']); // Отображение всех ожидающий, не прошедшие проверку администратором

Route::get('/brands', [BrandController::class, 'index']); // Отображение всех брендов
Route::get('/brands/{brand}', [BrandController::class, 'show']); // Отображение одного

Route::get('/categories', [CategoryController::class, 'index']); // Отображение всех категорий
Route::get('/categories/{category}', [CategoryController::class, 'show']); // Отображение одного

Route::get('/user/{user}/profile', [UserController::class, 'profile']);
Route::get('/user/{user}/friends', [UserController::class, 'friends']);
Route::get('/user/{user}/subs', [UserController::class, 'subscriptions']);
Route::get('/user/{user}/loads', [UserController::class, 'loads']);


Route::get('/app/version', function (){ return ['version' => '1.0']; });

// Только при авторизированном пользователе
Route::middleware('auth:sanctum')->group(function () {

    //Каждый пользователь может авторизироваться по ключу
    Route::get('/user/token', [UserController::class, 'token']);
    Route::get('/user', [UserController::class, 'user']); //old

    Route::post('/wallpapers/one/{post}', [PostController::class, 'update']); // Редактирование поста, изменение лайков, просмотров и т.д

    //Свой аккаунт
    Route::get('/wallpapers/favorite', [UserController::class, 'favorite']); // Отображение избранных
    Route::post('/wallpapers/favorite', [UserController::class, 'store_favorite']); // Добавление в избранные
    Route::delete('/wallpapers/favorite', [UserController::class, 'destroy_favorite']); // удаление из избранных

    Route::get('/wallpapers/install', [UserController::class, 'install']); // Отображение установленных
    Route::post('/wallpapers/install', [UserController::class, 'store_install']); // Добавление в установленные
    Route::delete('/wallpapers/install', [UserController::class, 'destroy_install']); // удаление из установленных

    Route::get('/wallpapers/load', [UserController::class, 'load']); // Отображение загружанных
    Route::post('/wallpapers/load', [PostController::class, 'create']); // Создание новой темы

    //При этом, пользователь может редактировать только свои темы
    Route::post('/wallpapers/load', [PostController::class, 'edit']); // Редактирование темы

    //Тихое удаление, тема должна оставаться в базе данных, но при этом не отображаться
    Route::delete('/wallpapers/load', [PostController::class, 'destroy']); // Редактирование темы

    Route::post('/user/{user}/add', [UserController::class, 'append']); // Добавить друга
    Route::post('/user/{user}/remove', [UserController::class, 'remove']); // Удалить друга

    Route::post('/user/profile/edit', [UserController::class, 'update']); //Может редактировать профиль

// Только для привилегированных
    Route::middleware('can:admin')->group(function (){
        Route::get('/users', [UserController::class, 'index']);
        Route::get('/users/{user}', [UserController::class, 'show']);
        Route::post('/users/{user}', [UserController::class, 'store']);
        Route::delete('/users/{user}', [UserController::class, 'destroy']);

        Route::post('/brands', [BrandController::class, 'store']); // Создание бренда
        Route::patch('/brands/{brand}', [BrandController::class, 'update']); // Редактирование бренда
        Route::delete('/brands/{brand}', [BrandController::class, 'destroy']); // Удаление бренда

        Route::post('/categories', [CategoryController::class, 'store']); // Создание категорий
        Route::patch('/categories/{category}', [CategoryController::class, 'update']); // Редактирование категорий
        Route::delete('/categories/{category}', [CategoryController::class, 'destroy']); // Удаление категорий
    });
});


