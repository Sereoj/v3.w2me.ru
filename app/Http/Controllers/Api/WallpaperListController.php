<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\CatalogResource;
use App\Models\Catalog;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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

    public function getFavoriteWallpaper(Request $request)
    {
            $user = $request->user()->favorite_themes;
            $values = unserialize($user);
            if(is_array($values))
            {
                return Catalog::whereIn('id', $values)->get();
            }else{
                return [];
            }
    }

    public function getInstallWallpaper(Request $request)
    {
        $user = $request->user()->install_themes;
        $values = unserialize($user);
        if(is_array($values))
        {
            return Catalog::whereIn('id', $values)->get();
        }else{
            return [];
        }
    }
    public function getLoadWallpaper(Request $request)
    {
        $user_id = $request->user()->id;
        return CatalogResource::collection(Catalog::whereUserId($user_id)->get()); // get catalogs
    }
}
