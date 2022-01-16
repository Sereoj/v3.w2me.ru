<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class PostController extends Controller
{
    //Отображение всех активных
    public function index()
    {
        return Post::where('isActive', true)->get();
    }

    //Отображение одной страницы
    public function show(Post $post)
    {
        return $post;
    }

    //Создание новой страницы
    public function create(Request $request)
    {
        $user_id = $request->user()->id;
        $preview = $request->file('preview');
        Image::make($preview->getContent())->resize(3840, 2160)->save(public_path("storage/uploads/" . $preview->getClientOriginalName()));
        Image::make(public_path('storage/uploads/' . $preview->getClientOriginalName()))->resize(416, 234)->save('storage/images/thumb_' . $preview->getClientOriginalName());

        $theme = $request->only('name', 'description', 'licence', 'brand_id', 'download_link') + ['user_id' => $user_id, 'preview' => '/public/storage/images/thumb_' . $preview->getClientOriginalName()];

        $photos = Post::updateOrCreate($theme);

        if ($photos->exists()) {
            $images = $request->only('images');

            for ($i = 0; $i < count($images['images']); $i++) {
                $type = $images['images'][$i]['type'];
                $img = $request->file('images')[$i]['file'];
                $original = Image::make($img->getContent())->resize(3840, 2160)->save(public_path("storage/uploads/" . $img->getClientOriginalName()));

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

    //редактирование новой страницы
    public function edit(Request $request)
    {

    }

    //Обновление страницы, просмотры и т.д
    public function update(Request $request, Post $post)
    {
        $post->update($request->only('views', 'downloads', 'likes'));
        return $post;
    }


    public function popular()
    {
        return Post::query()->orderBy('downloads')->where('isActive', true)->get();
    }

    public function new()
    {
        return Post::query()->orderBy('id')->where('isActive', true)->get();
    }

    public function wait()
    {
        return Post::query()->where('isActive', false)->get();
    }

}
