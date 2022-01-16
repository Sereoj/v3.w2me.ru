<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\UserFavorite;
use App\Models\UserFriend;
use App\Models\UserInstall;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

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
                'friend_id' => $request->friend_id
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
            return UserFriend::query()->where('user_id',$request->user()->id)->where('friend_id', $request->friend_id)->delete();
        }
        return $validator->messages();
    }

    public function token(Request $request)
    {

        return $request->user() ?? [''];
    }

    public function profile(User $user) : User
    {
        return $user;
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
        return $request->user()->favorites()->get();
    }

    public function store_favorite(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'post_id' => 'required|integer|unique:posts,id|exists:posts,id',
        ]);

        if(!$validator->fails())
        {
            return UserFavorite::create([
                'user_id' => $request->user()->id,
                'post_id' => $request->post_id
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
            return UserFavorite::query()->where('user_id',$request->user()->id)->where('post_id', $request->post_id)->delete();
        }
        return $validator->messages();
    }

    public function install(Request $request)
    {
        return $request->user()->installs()->get();
    }

    public function store_install(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'post_id' => 'required|integer|unique:posts,id|exists:posts,id',
        ]);

        if(!$validator->fails())
        {
            return UserInstall::create([
                'user_id' => $request->user()->id,
                'post_id' => $request->post_id
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
            return UserInstall::query()->where('user_id',$request->user()->id)->where('post_id', $request->post_id)->delete();
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
        return $user->loads()->get();
    }

    //Изменить фотографию
    public function store(Request $request, User $user)
    {

    }

    public function show(User $user)
    {
        return $user;
    }
    public function update(Request $request, User $user)
    {
        return $user->update($request->all());
    }

    public function destroy(User $user)
    {
        return $user->delete();
    }
}
