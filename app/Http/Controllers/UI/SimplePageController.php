<?php

namespace App\Http\Controllers\UI;

use App\Http\Controllers\Controller;
use App\Http\Resources\CatalogResource;
use App\Models\Catalog;
use Illuminate\Http\Request;

class SimplePageController extends Controller
{
    public function __construct()
    {
    }

    public function index($slug)
    {
        if($slug != null)
        {
            $name = str_replace('-', ' ',$slug);
            $catalog = Catalog::where('name', $name);

            if($catalog->exists())
            {
                $image = new CatalogResource($catalog->first());
                return view('layouts.app', ['content' => view('pages.simple', [
                    'image' => $image,
                ])]);
            }
            return view('layouts.app', ['content' => view('pages.errors.not-found')]);
        }
        return view('layouts.app', ['content' => view('pages.errors.not-found')]);
    }

    public function store(Request $request)
    {

    }
}
