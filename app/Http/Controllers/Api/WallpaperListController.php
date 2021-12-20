<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\CatalogResource;
use App\Models\Catalog;
use App\Models\User;
use Illuminate\Http\Request;

class WallpaperListController extends Controller
{
    public function getAllWallpapers()
    {
        return CatalogResource::collection(Catalog::all()->where('isActive'));
    }

    public function getNewWallpaper()
    {
        return CatalogResource::collection(Catalog::orderBy('id','desc')->get()->where('isActive'));
    }

    public function getPopularWallpaper()
    {
        return CatalogResource::collection(Catalog::orderBy('views','desc')->get()->where('isActive'));
    }

    public function getWaitWallpaper()
    {
        return CatalogResource::collection(Catalog::all()->where('isActive',false));
    }

    public function getLoadWallpapers($user_id)
    {
        $user = User::find($user_id);

        if($user != null)
            return Catalog::find($user)->all();
    }
}
