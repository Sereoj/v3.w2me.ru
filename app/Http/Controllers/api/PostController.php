<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Requests\EditThemeRequest;
use App\Http\Requests\ThemeRequest;
use App\Models\Post;
use App\Models\PostCategory;
use Dotenv\Util\Str;
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

    //Отобразить все теги поста
    public function tags(Post $post)
    {
        return $post->tags()->get();
    }

    //Отобразить все категории поста
    public function categories(Post $post)
    {
        return $post->categories()->get();
    }

    //Отобразить связанные изображения
    public function images(Post $post)
    {
        return $post->images()->get();
    }

    //Создание новой страницы
    public function create(ThemeRequest $request)
    {
        //name
        //slug
        //description
        //preview
        //licence
        //
        //brand_id
        //user_id
        //download_link

        $user_id = $request->user()->id;
        $preview = $request->file('preview');
        Image::make($preview->getContent())->resize(3840, 2160)->save(public_path("storage/uploads/" . $preview->getClientOriginalName()));
        Image::make(public_path('storage/uploads/' . $preview->getClientOriginalName()))->resize(416, 234)->save('storage/images/thumb_' . $preview->getClientOriginalName());


        $theme = $request->only('name', 'description', 'licence', 'brand_id', 'download_link') + ['user_id' => $user_id, 'slug' => \Illuminate\Support\Str::slug($request->get('name')),'preview' => '/public/storage/images/thumb_' . $preview->getClientOriginalName()];

        $photos = Post::updateOrCreate($theme);

        if ($photos->exists()) {

            PostCategory::create([
                'post_id' => $photos->id,
                'category_id' => $request->get('category_id')
                ]);

            foreach ($request->get('images') as $key => $image)
            {
                if($request->file('images')[$key] != null)
                {
                    $img = $request->file('images')[$key]['file'];

                    if($img != null)
                    {
                        $original = Image::make($img->getContent())->resize(3840, 2160)->save(public_path("storage/uploads/" . $img->getClientOriginalName()));
                        Image::make(public_path('storage/uploads/' . $img->getClientOriginalName()))->resize(856, 482)->save('storage/images/carousel_' . $img->getClientOriginalName());

                        $photos->images()->updateOrCreate([
                            'type' => $image['type'],
                            'location' => '/public/storage/images/carousel_' . $img->getClientOriginalName(),
                            'photo_type' => $original->mime()
                        ]);
                    }
                }
            }
        }
        return $photos;
    }

    //редактирование новой страницы
    public function edit(Request $request)
    {
        $post = Post::find($request->get('id'));

        if($request->has('name'))
        {
            $slug = \Illuminate\Support\Str::slug($request->get('name'));
            $post->slug = $slug;
        }

        if($request->has('preview') && $request->hasFile('preview'))
        {
            $preview = $request->file('preview');
            Image::make($preview->getContent())->resize(3840, 2160)->save(public_path("storage/uploads/" . $preview->getClientOriginalName()));
            Image::make(public_path('storage/uploads/'. $preview->getClientOriginalName()))->resize(416, 234)->save('storage/images/thumb_'. $preview->getClientOriginalName());

            $post->preview = '/public/storage/images/thumb_'. $preview->getClientOriginalName();
        }

        if($request->has('images'))
        {
            $this->editImages($request->only('images'));
        }

        $post->update($request->only('name', 'description', 'licence', 'brand_id', 'download_link'));
        return $post;
    }

    protected function editTags(array $tags)
    {

    }

    protected function editCategories(array $categories)
    {

    }

    protected function editImages(array $images)
    {

    }

    public function destroy()
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
