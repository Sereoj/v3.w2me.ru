<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Requests\EditThemeRequest;
use App\Http\Requests\SinglePageRequest;
use App\Http\Requests\ThemeRequest;
use App\Http\Resources\CatalogResource;
use App\Http\Resources\SimplePageResource;
use App\Http\Resources\SinglePageShortResource;
use App\Models\Category;
use App\Models\Post;
use App\Models\PostCategory;
use App\Models\UserFavorite;
use App\Models\UserInstall;
use App\Models\UserLike;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class PostController extends Controller
{
    //Отображение всех активных
    public function index(Request $request)
    {
        $query = Post::query()->where('isActive', true);

        if($request->has('brand_id'))
        {
            $query->where('brand_id', $request->get('brand_id'));
        }

        if($request->has('category_id'))
        {
          return  CatalogResource::collection(Category::find($request->get('category_id'))->posts()->where('isActive', true)->get());
        }

        return CatalogResource::collection($query->get());
    }

    //Отображение одной страницы
    public function show(Post $post)
    {
        $post->views ++;
        $post->save();
        $post->posts = CatalogResource::collection(Post::inRandomOrder()->take(5)->get());
        return new SimplePageResource($post);
    }

    //Авторизованный пользователь! Обновление страницы, лайки и т.д
    public function update(SinglePageRequest $request, Post $post)
    {
        $user_id = $request->user()->id;
        $post_id = $post->id;
        if($request->has('reaction'))
        {
            switch ($request->get('reaction'))
            {
                case "true":

                    if(!UserLike::where('user_id', $user_id)->where('post_id', $post_id)->exists())
                    {
                        UserLike::updateOrCreate([
                            'user_id' => $user_id,
                            'post_id' => $post_id
                        ]);
                        $post->likes ++;
                    }
                    break;
                case "false":
                    if(UserLike::where('user_id', $user_id)->where('post_id', $post_id)->exists())
                    {
                        UserLike::query()->where('user_id', $user_id)->where('post_id', $post_id)->delete();
                        if($post->likes > 0)
                            $post->likes --;
                    }
                    break;
            }
        }

        if($request->has('download'))
        {
            //Учитывается популярность, дабы избежать низкие рейтинги, counter только прибавляется
            switch ($request->get('download'))
            {
                case "true":
                    UserInstall::updateOrCreate([
                        'user_id' => $user_id,
                        'post_id' => $post_id
                    ]);
                    $post->downloads ++;
                    break;
                case "false":
                    UserInstall::query()->where('user_id', $user_id)->where('post_id', $post_id)->delete();
                    break;
            }
        }

        if($request->has('favorite'))
        {
            switch ($request->get('favorite'))
            {
                case "true":
                    UserFavorite::updateOrCreate([
                        'user_id' => $user_id,
                        'post_id' => $post_id
                    ]);
                    break;
                case "false":
                    UserFavorite::query()->where('user_id', $user_id)->where('post_id', $post_id)->delete();
                    break;
            }
        }
        $post->save();
        return new SinglePageShortResource($post);
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

    //Отобразить лайки пользователей
    public function likes(Post $post)
    {
        return $post->likes()->get();
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
