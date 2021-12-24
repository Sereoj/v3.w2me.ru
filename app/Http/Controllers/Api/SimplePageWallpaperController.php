<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\CatalogResource;
use App\Http\Resources\SimplePageResource;
use App\Models\Catalog;
use Illuminate\Http\Request;

class SimplePageWallpaperController extends Controller
{
    public function index($nameOrId)
    {
        if(is_numeric($nameOrId))
            return SimplePageResource::collection(Catalog::whereId($nameOrId)->get());
        else
        {
            $str = str_replace(["_", "+", "-"], " ", $nameOrId);
            return SimplePageResource::collection(Catalog::whereName($str)->get());
        }
    }

    public function update(Catalog $id, Request $request)
    {
        $fields = $request->only('like', 'views');

        if(is_numeric($id))
        {
            return Catalog::whereId($id)->update($fields)->save();
        }
        return [];
    }
}
