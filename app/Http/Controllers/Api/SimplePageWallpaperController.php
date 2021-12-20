<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\CatalogResource;
use App\Models\Catalog;
use Illuminate\Http\Request;

class SimplePageWallpaperController extends Controller
{
    public function index($nameOrId)
    {
        if(is_numeric($nameOrId))
            return Catalog::find($nameOrId);
        else
        {
            $str = str_replace(["_", "+", "-"], " ", $nameOrId);
            return CatalogResource::collection(Catalog::where("name", $str)->get());
        }
    }

    public function update(Catalog $id, Request $request)
    {
        $fields = $request->only('like', 'views');

        if(is_numeric($id))
        {
            return Catalog::find($id)->update($fields)->save();
        }
        return [];
    }
}
