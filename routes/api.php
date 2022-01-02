<?php

use App\Http\Controllers\Api\Auth\AuthenticationController;
use App\Http\Controllers\Api\Auth\UserController;
use App\Http\Controllers\Api\BrandsListController;
use App\Http\Controllers\Api\CategoriesListController;
use App\Http\Controllers\Api\SimplePageWallpaperController;
use App\Http\Controllers\Api\WallpaperListController;
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
Route::post('/register',[AuthenticationController::class,'register']); // Регистрация
Route::post('/login',[AuthenticationController::class,'login']); // Авторизация

Route::get('/wallpapers', [WallpaperListController::class, 'getAllWallpapers']); // Вывод всех
Route::get('/wallpapers/one/{id}', [SimplePageWallpaperController::class, 'index']); // Отображение одного поста
Route::patch('/wallpapers/one/{id}', [SimplePageWallpaperController::class, 'update']); // Редактирование поста, изменение лайков, просмотров и т.д
Route::get('/wallpapers/new', [WallpaperListController::class, 'getNewWallpaper']); // отображение всех новых изображений по просмотрам.
Route::get('/wallpapers/popular', [WallpaperListController::class, 'getPopularWallpaper']); // Отображение всех популярных
Route::get('/wallpapers/wait', [WallpaperListController::class, 'getWaitWallpaper']); // Отображение всех ожидающий, не прошедшие проверку администратором

Route::get('/brands', [BrandsListController::class, 'getBrands']); // Отображение всех брендов
Route::get('/brands/{id}', [BrandsListController::class, 'getBrand']); // Отображение одного

Route::get('/categories', [CategoriesListController::class, 'getCategories']); // Отображение всех категорий
Route::get('/categories/{id}', [CategoriesListController::class, 'getCategory']); // Отображение одного

// Только при авторизированном пользователе
Route::middleware('auth:api')->group(function () {
    Route::get('/wallpapers/favorite', [WallpaperListController::class, 'getFavoriteWallpaper']); // Отображение избранных
    Route::get('/wallpapers/install', [WallpaperListController::class, 'getInstallWallpaper']); // Отображение установленных
    Route::get('/wallpapers/load', [WallpaperListController::class, 'getLoadWallpaper']); // Отображение загружанных
    Route::post('/wallpapers/load', [WallpaperListController::class, 'CreateThemeWallpaper']); // Создание новой темы
    Route::patch('/wallpapers/load', [WallpaperListController::class, 'ChangeThemeWallpaper']); // Редактирование темы
});

// Только для привилегированных
Route::middleware('auth:api, can:admin,moderator')->group(function (){
    Route::get('/users', [UserController::class, 'index']);
    Route::get('/users/{user}', [UserController::class, 'show']);
    Route::patch('/users/{user}', [UserController::class, 'update']);
    Route::delete('/users/{user}', [UserController::class, 'destroy']);

    Route::post('/brands', [BrandsListController::class, 'store']); // Создание бренда
    Route::patch('/brands/{brands}', [BrandsListController::class, 'update']); // Редактирование бренда
    Route::delete('/brands', [BrandsListController::class, 'destroy']); // Удаление бренда

    Route::post('/categories', [CategoriesListController::class, 'store']); // Создание категорий
    Route::patch('/categories/{categories}', [CategoriesListController::class, 'update']); // Редактирование категорий
    Route::delete('/categories', [CategoriesListController::class, 'destroy']); // Удаление категорий
});
