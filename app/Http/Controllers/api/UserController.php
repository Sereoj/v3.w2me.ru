<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Resources\CatalogResource;
use App\Http\Resources\ProfileResource;
use App\Http\Resources\ProfileShortResource;
use App\Http\Resources\UserResource;
use App\Models\User;
use App\Models\UserFavorite;
use App\Models\UserFriend;
use App\Models\UserInstall;
use App\Models\UserLike;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use PhpParser\Node\Stmt\Return_;

class UserController extends Controller
{

    public function index(Request $request)
    {
        return User::all();
    }

    public function append(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'friend_id' => 'required|integer|unique:user_friends,friend_id|exists:users,id',
        ]);

        if(!$validator->fails())
        {
            return UserFriend::create([
                'user_id' => $request->user()->id,
                'friend_id' => $request->get('friend_id')
            ]);
        }
        return $validator->messages();
    }

    public function remove(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'friend_id' => 'required|integer|exists:users,id',
        ]);

        if(!$validator->fails())
        {
            return UserFriend::query()->where('user_id',$request->user()->id)->where('friend_id', $request->get('friend_id'))->delete();
        }
        return $validator->messages();
    }

    public function token(Request $request)
    {

        return $request->user()->id ? [
            'id' => $request->user()->id,
            'status' => 'true'
        ] : [
            'id' => $request->user()->id,
            'status' => 'false'
        ];
    }

    public function user(Request $request)
    {
        return new UserResource($request->user());
    }

    public function profile(User $user)
    {
        $user->users_likes = UserLike::query()->whereIn('post_id', $user->loads()->select('id'))->count();
        return new ProfileShortResource($user);
    }

    public function information(Request $request, User $user)
    {
        $user->users_likes = UserLike::query()->whereIn('post_id', $user->loads()->select('id'))->count();
        $user->getIsFriendAttribute($request->user()->friends()->count() > 0);
        return new ProfileResource($user);
    }

    public function subscriptions(User $user)
    {
        return $user->subscriptions()->get();
    }

    public function friends(User $user)
    {
        return $user->friends()->get();
    }

    public function favorite(Request $request)
    {
        return CatalogResource::collection($request->user()->favorites()->get());
    }

    public function store_favorite(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'post_id' => 'required|integer|unique:user_favorites,post_id|exists:posts,id',
        ]);

        if(!$validator->fails())
        {
            return UserFavorite::create([
                'user_id' => $request->user()->id,
                'post_id' => $request->get('post_id')
            ]);
        }
        return $validator->messages();
    }

    public function destroy_favorite(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'post_id' => 'required|integer|exists:posts,id',
        ]);

        if(!$validator->fails())
        {
            return UserFavorite::query()->where('user_id',$request->user()->id)->where('post_id', $request->get('post_id'))->delete();
        }
        return $validator->messages();
    }

    public function install(Request $request)
    {
        return CatalogResource::collection($request->user()->installs()->get());
    }

    public function store_install(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'post_id' => 'required|integer|unique:user_installs,post_id|exists:posts,id',
        ]);

        if(!$validator->fails())
        {
            return UserInstall::create([
                'user_id' => $request->user()->id,
                'post_id' => $request->get('post_id')
            ]);
        }
        return $validator->messages();
    }

    public function destroy_install(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'post_id' => 'required|integer|exists:posts,id',
        ]);

        if(!$validator->fails())
        {
            return UserInstall::query()->where('user_id',$request->user()->id)->where('post_id', $request->get('post_id'))->delete();
        }
        return $validator->messages();
    }

    //Более подробная информация
    public function load(Request $request)
    {
        return $request->user()->loads()->get();
    }

    //Сокращенная информация
    public function loads(User $user)
    {
        return CatalogResource::collection($user->loads()->get());
    }

    //пользователь может редактированить свои данные
    public function update(Request $request)
    {
        return $request->user()->update($request->all());
    }

    //отобразить 1 пользователя
    public function show(User $user)
    {
        return $user;
    }

    //админ редактирование 1 пользователя
    public function store(Request $request, User $user)
    {
        return $user->update($request->all());
    }

    public function destroy(User $user)
    {
        return $user->delete();
    }
}
