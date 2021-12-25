<?php

use App\Http\Controllers\Api\Auth\AuthenticationController;
use App\Http\Controllers\Api\Auth\UserController;
use App\Http\Controllers\Api\BrandsListController;
use App\Http\Controllers\Api\CategoriesListController;
use App\Http\Controllers\Api\SimplePageWallpaperController;
use App\Http\Controllers\Api\WallpaperListController;
use App\Http\Controllers\UI\SimplePageController;
use Illuminate\Http\Request;
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

Route::post('/register',[AuthenticationController::class,'register']);
Route::post('/login',[AuthenticationController::class,'login']);

Route::get('/wallpapers', [WallpaperListController::class, 'getAllWallpapers']);
Route::get('/wallpapers/one/{id}', [SimplePageWallpaperController::class, 'index']);
Route::patch('/wallpapers/one/{id}', [SimplePageWallpaperController::class, 'update']);
Route::get('/wallpapers/new', [WallpaperListController::class, 'getNewWallpaper']);
Route::get('/wallpapers/popular', [WallpaperListController::class, 'getPopularWallpaper']);
Route::get('/wallpapers/wait', [WallpaperListController::class, 'getWaitWallpaper']);

Route::middleware('auth:api')->group(function () {
    Route::get('/wallpapers/favorite/{user}', [WallpaperListController::class, 'getFavoriteWallpaper']);
    Route::get('/wallpapers/install/{user}', [WallpaperListController::class, 'getInstallWallpaper']);
    Route::get('/wallpapers/load/{user}', [WallpaperListController::class, 'getLoadWallpaper']);

    Route::post('/wallpapers', [WallpaperListController::class, 'SetOneWallpaper']);

    Route::get('/users', [UserController::class, 'index']);
    Route::get('/users/{user}', [UserController::class, 'show']);
    Route::patch('/users/{user}', [UserController::class, 'update']);
    Route::delete('/users/{user}', [UserController::class, 'destroy']);

    Route::post('/categories', [CategoriesListController::class, 'addCategory']);
    Route::post('/brands', [BrandsListController::class, 'getBrands']);
});

Route::get('/brands', [BrandsListController::class, 'getBrands']);
Route::get('/brands/{id}', [BrandsListController::class, 'getBrand']);

Route::get('/categories', [CategoriesListController::class, 'getCategories']);
Route::get('/categories/{id}', [CategoriesListController::class, 'getCategory']);
