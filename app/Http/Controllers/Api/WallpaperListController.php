<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\ThemeRequest;
use App\Http\Resources\CatalogResource;
use App\Http\Resources\UserResource;
use App\Models\Brands;
use App\Models\Categories;
use App\Models\Pages;
use App\Models\Photos;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Intervention\Image\Facades\Image;
use Str;

class WallpaperListController extends Controller
{
    public function getAllWallpapers(Request $request): AnonymousResourceCollection
    {
        $query  = Photos::query()->where('isActive', true);

        if($request->filled('category_id'))
        {
            $query->where('cat_id', $request->category_id);
        }
        if($request->filled('brand_id'))
        {
            $query->where('brand_id', $request->brand_id);
        }
        if($request->filled('user_id'))
        {
            $query->where('user_id', $request->user_id);
        }
        return CatalogResource::collection($query->get());
    }

    public function getNewWallpaper(): AnonymousResourceCollection
    {
        return CatalogResource::collection(Photos::orderBy('id','desc')->get()->where('isActive'));
    }

    public function getPopularWallpaper(): AnonymousResourceCollection
    {
        return CatalogResource::collection(Photos::orderBy('views','desc')->get()->where('isActive'));
    }

    public function getWaitWallpaper(): AnonymousResourceCollection
    {
        return CatalogResource::collection(Photos::all()->where('isActive',false));
    }

    public function getFavoriteWallpaper(Request $request)
    {
            $user = $request->user()->favorite_themes;
            $values = unserialize($user);
            return is_array($values) ? Photos::whereIn('id', $values)->get() : [];
    }

    public function getInstallWallpaper(Request $request)
    {
        $user = $request->user()->install_themes;
        $values = unserialize($user);
        return is_array($values) ? Photos::whereIn('id', $values)->get() : [];
    }

    public function getLoadWallpaper(Request $request): AnonymousResourceCollection
    {
        $user_id = $request->user()->id;
        return CatalogResource::collection(Photos::whereUserId($user_id)->get()); // get catalogs
    }

    public function theme(Request $request)
    {
        $user_id = new UserResource($request->user());
        $preview = $request->file('preview');
        Image::make($preview->getContent())->resize(3840, 2160)->save(public_path("storage/uploads/" . $preview->getClientOriginalName()));
        Image::make(public_path('storage/uploads/' . $preview->getClientOriginalName()))->resize(416, 234)->save('storage/images/thumb_' . $preview->getClientOriginalName());

        $theme = $request->only('name', 'description', 'licence', 'cat_id', 'brand_id', 'download_link') + ['user_id' => $user_id['id'], 'preview' => '/public/storage/images/thumb_' . $preview->getClientOriginalName()];

        $photos = Photos::updateOrCreate($theme);

        if ($photos->exists()) {
            $images = $request->only('images');

            for ($i = 0; $i < count($images['images']); $i++) {
                $type = $images['images'][$i]['type'];
                $img = $request->file('images')[$i]['file'];
                $original = Image::make($img->getContent())->resize(3840, 2160)->save(public_path("storage/uploads/" . $img->getClientOriginalName()));
                Image::make(public_path('storage/uploads/' . $img->getClientOriginalName()))->resize(416, 234)->save('storage/images/thumb_' . $img->getClientOriginalName());
                Image::make(public_path('storage/uploads/' . $img->getClientOriginalName()))->resize(856, 482)->save('storage/images/carousel_' . $img->getClientOriginalName());

                $photos->images()->updateOrCreate([
                    'name' => $theme['name'],
                    'type' => $type,
                    'location' => '/public/storage/images/carousel_' . $img->getClientOriginalName(),
                    'photo_type' => $original->mime()
                ]);
            }
        }
        return $photos;
    }

    public function page($name, $content)
    {
        Pages::create([
            'title' => $name,
            'slug' => Str::slug($name),
            'content' => $content,
            'show_in_footer' => false,
        ]);
    }

    public function CreateThemeWallpaper(ThemeRequest $request)
    {
        return $this->theme($request);
    }

    public function ChangeThemeWallpaper(Request $request)
    {
        return $this->theme($request);
    }
}
