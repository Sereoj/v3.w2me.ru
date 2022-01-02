<?php

namespace App\Http\Controllers\UI;

use App\Http\Controllers\Controller;
use App\Http\Resources\CatalogResource;
use App\Http\Resources\SimplePageResource;
use App\Models\Photos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SimplePageController extends Controller
{
    public function index()
    {
        return SimplePageResource::collection(Photos::whereId(13)->get());
    }

    public function store(Request $request)
    {
        if($request->save && !$this->Guest())
        {
            $slug = $request->save;
            $this->save($this->Catalog($slug)->id);
        }else{
            return redirect()->route('login');
        }


        if($request->delete && !$this->Guest())
        {
            $slug = $request->delete;
            $this->save($this->Catalog($slug)->id);
        }else{
            return redirect()->route('login');
        }

        if($request->favorite && !$this->Guest())
        {
            $slug = $request->favorite;
            $this->favorite($this->Catalog($slug)->id);
        }else{
            return redirect()->route('login');
        }
        if($request->unset && !$this->Guest())
        {
            $slug = $request->unset;
            $this->favorite($this->Catalog($slug)->id);
        }else{
            return redirect()->route('login');
        }
        return $this->index($slug);
    }

    protected function isFavoriteExist(int $id) : bool
    {
        if(!Auth::guest())
        {
            $themes = unserialize(Auth::user()->favorite_themes);

            if($themes != null)
            {
                if(in_array($id, $themes)) {
                    return true;
                }
                return false;
            }
        }
        return false;
    }

    protected function isInstallExist(int $id) : bool
    {
        if(!Auth::guest())
        {
            $themes = unserialize(Auth::user()->install_themes);

            if($themes != null)
            {
                if(in_array($id, $themes)){
                    return true;
                }
                return false;
            }
        }
        return false;
    }

    protected function save(int $id)
    {
        $themes = unserialize(Auth::user()->install_themes);

        if(!$this->isInstallExist($id))
        {
             $themes[] = $id;
        }else{
            $themes = array_diff($themes,[$id]);
        }
        Auth::user()->install_themes = serialize($themes);
        Auth::user()->save();
    }

    protected function favorite(int $id)
    {
        $themes = unserialize(Auth::user()->favorite_themes);

        if(!$this->isFavoriteExist($id))
        {
            $themes[] = $id;
        }else{
            $themes = array_diff($themes,[$id]);
        }
        Auth::user()->favorite_themes = serialize($themes);
        Auth::user()->save();
    }

    protected function download(string $id)
    {
        $catalog = new CatalogResource(Photos::whereId($id)->first());
        return response()->download('https://site112.com/img/200x200.png');
    }

    protected function Catalog(string $slug)
    {
        $name = str_replace('-', ' ',$slug);
        return Photos::whereName($name)->first();
    }
    protected function Guest(): bool
    {
        return Auth::guest();
    }
}
