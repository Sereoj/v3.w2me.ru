<?php

namespace App\Http\Controllers\UI;

use App\Http\Controllers\Controller;
use App\Http\Resources\CatalogResource;
use App\Models\Photos;
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

    public function index(Request $request)
    {
        $images = Photos::where('isActive', true)->cursorPaginate(10);
        return view('layouts.app', ['content' => view('single', ['images' => $images])]);
    }

    public function index_new()
    {
        $images = Photos::orderBy('id','desc')->get()->where('isActive');
        return view('layouts.app', ['content' => view('pages.index', ['images' => $images, 'header' => 'Новые изображения'])]);
    }
    public function index_popular()
    {
        $images = Photos::orderBy('views','desc')->get()->where('isActive');
        return view('layouts.app', ['content' => view('pages.index', ['images' => $images, 'header' => 'Популярные изображения'])]);
    }
    public function index_wait()
    {
        $images = Photos::all()->where('isActive',false);
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
                $catalog = Photos::whereIn('id', $getFavorite)->get();
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
                $catalog = Photos::whereIn('id', $getInstall)->get();
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
            $catalog = CatalogResource::collection(Photos::whereUserId($user_id)->get()); // get catalogs
        }
        return view('layouts.app', ['content' => view('pages.load', ['catalog' => $catalog, 'header' => 'Вами загружанные изображения'])]);
    }


    public function store_load(Request $request)
    {
        if(isset($request->delete))
        {
            $id = (int)$request->delete;
            Photos::whereId($id)->delete();
        }
        if(isset($request->change))
        {
            $id = (int)$request->change;
            $catalog = new CatalogResource(Photos::whereId($id)->first());

            return view('layouts.app', ['content' => view('pages.item.edit', ['catalog' => $catalog,'header' => 'Изменение коллекции'])]);
        }
        if(isset($request->add))
        {
            return view('layouts.app', ['content' => view('pages.item.add', ['header' => 'Создание коллекции'])]);
        }
    }
}
