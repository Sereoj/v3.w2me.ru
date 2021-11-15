<?php

use App\Http\Controllers\Api\Auth\AuthenticationController;
use App\Http\Controllers\Api\Auth\UserController;
use App\Http\Controllers\Api\WallpaperListController;
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
Route::get('/wallpapers/load/{id}', [WallpaperListController::class, 'getLoadWallpapers']);
Route::get('/wallpapers/{id}', [WallpaperListController::class, 'getOneWallpaper']);

Route::middleware('api')->group(function (){
    Route::get('/users', [UserController::class, 'index']);
    Route::get('/users/{user}', [UserController::class, 'show']);
    Route::patch('/users/{user}', [UserController::class, 'update']);
    Route::delete('/users/{user}', [UserController::class, 'destroy']);
});
