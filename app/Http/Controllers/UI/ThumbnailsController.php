<?php

namespace App\Http\Controllers\UI;

use App\Http\Controllers\Controller;
use App\Http\Resources\CatalogResource;
use App\Models\Catalog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

class ThumbnailsController extends Controller
{
    public function __construct()
    {
        //$this->middleware('auth');
        //$this->middleware('guest');
    }

    public function index()
    {
        $images = Catalog::all();
        return view('layouts.app', ['content' => view('pages.index', ['images' => $images])]);
    }

    public function index_new()
    {
        $images = Catalog::orderBy('id','desc')->take(10)->get();
        return view('layouts.app', ['content' => view('pages.index', ['images' => $images, 'header' => 'Новые изображения'])]);
    }
    public function index_popular()
    {
        $images = Catalog::all();
        return view('layouts.app', ['content' => view('pages.index', ['images' => $images, 'header' => 'Популярные изображения'])]);
    }
    public function index_wait()
    {
        $images = Catalog::all();
        return view('layouts.app', ['content' => view('pages.index', ['images' => $images, 'header' => 'Ожидающие изображения'])]);
    }

    public function index_favorite()
    {
        $catalog = null;
        if(Auth::check())
        {
            $getFavorite = unserialize(Auth::user()->favorite_themes);
            if(is_array($getFavorite))
            {
                $catalog = Catalog::whereIn('id', $getFavorite)->get();
            }else{
                $catalog = func_get_args();
            }
        }
        return view('layouts.app', ['content' => view('pages.favorite', ['images' => $catalog, 'header' => 'Любимые изображения'])]);
    }
    public function index_install()
    {
        $catalog = null;

        if(Auth::check())
        {
            $getInstall = unserialize(Auth::user()->install_themes);

            if(is_array($getInstall))
            {
                $catalog = Catalog::whereIn('id', $getInstall)->get();
            }else{
                $catalog = func_get_args();
            }
        }
        return view('layouts.app', ['content' => view('pages.install', ['images' => $catalog, 'header' => 'Установленные изображения'])]);
    }
    public function index_load()
    {
        // id, name, count download

        $catalog = null;

        if(Auth::check())
        {
            $user_id = Auth::user()->id; // id user
            $catalog = CatalogResource::collection(Catalog::whereUserId($user_id)->get()); // get catalogs
        }
        return view('layouts.app', ['content' => view('pages.load', ['catalog' => $catalog, 'header' => 'Вами загружанные изображения'])]);
    }


    public function store_load(Request $request)
    {
        if(isset($request->delete))
        {
            $id = (int)$request->delete;
            Catalog::whereId($id)->delete();
        }
        if(isset($request->change))
        {
            return view('pages.item.edit', ['content' => view('pages.load', ['header' => 'Изменение коллекции'])]);
        }
        if(isset($request->add))
        {
            return view('pages.item.edit', ['content' => view('pages.load', ['header' => 'Создание коллекции'])]);
        }
    }

    public function index_simple($slug = null)
    {
        if($slug != null)
        {
            $name = str_replace('-', ' ',$slug);
            $image = new CatalogResource(Catalog::where('name', $name)->first());

            return view('layouts.app', ['content' => view('pages.simple', [
                'image' => $image,
                'url' => Route::currentRouteName() != 'index' ? Route::current()->uri . '/images/' : Route::current()->domain().'/images/'
            ])]);
        }
        return false;
    }
}
