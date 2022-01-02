<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\CatalogResource;
use App\Http\Resources\SimplePageResource;
use App\Models\Photos;
use Illuminate\Http\Request;

class SimplePageWallpaperController extends Controller
{
    public function index($nameOrId)
    {
        if(is_numeric($nameOrId))
            return SimplePageResource::collection(Photos::whereId($nameOrId)->get());
        else
        {
            $str = str_replace(["_", "+", "-"], " ", $nameOrId);
            return SimplePageResource::collection(Photos::whereName($str)->get());
        }
    }

    public function update(Photos $id, Request $request)
    {
        $fields = $request->only('like', 'views');

        if(is_numeric($id))
        {
            return Photos::whereId($id)->update($fields);
        }
        return [];
    }
}
