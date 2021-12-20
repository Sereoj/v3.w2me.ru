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
Route::patch('/wallpapers/one/{id}', [SimplePageWallpaperController::class, 'store']);
Route::get('/wallpapers/new', [WallpaperListController::class, 'getNewWallpaper']);
Route::get('/wallpapers/new/{id}', [WallpaperListController::class, 'getOneNewWallpaper']);
Route::get('/wallpapers/popular', [WallpaperListController::class, 'getPopularWallpaper']);
Route::get('/wallpapers/popular/{id}', [WallpaperListController::class, 'getOnePopularWallpaper']);
Route::get('/wallpapers/wait', [WallpaperListController::class, 'getWaitWallpaper']);
Route::get('/wallpapers/wait/{id}', [WallpaperListController::class, 'getOneWaitWallpaper']);
Route::get('/wallpapers/{id}/load', [WallpaperListController::class, 'getLoadWallpaper']);
Route::get('/wallpapers/{id}/install', [WallpaperListController::class, 'getInstallWallpaper']);

Route::middleware('api')->group(function (){
    Route::get('/users', [UserController::class, 'index']);
    Route::get('/users/{user}', [UserController::class, 'show']);
    Route::patch('/users/{user}', [UserController::class, 'update']);
    Route::delete('/users/{user}', [UserController::class, 'destroy']);
});


Route::get('/wallpapers/add', function ()
{
    return "auth";
});
Route::post('/wallpapers/add', [WallpaperListController::class, 'SetOneWallpaper']);

Route::get('/brands', [BrandsListController::class, 'getBrands']);
Route::get('/brands/{id}', [BrandsListController::class, 'getBrand']);
Route::post('/brands', [BrandsListController::class, 'getBrands']);

Route::get('/categories', [CategoriesListController::class, 'getCategories']);
Route::get('/categories/{id}', [CategoriesListController::class, 'getCategory']);
Route::post('/categories', [CategoriesListController::class, 'addCategory']);
