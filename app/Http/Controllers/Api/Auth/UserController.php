<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        return UserResource::collection(User::all());
    }

    public function user(Request $request)
    {
        return new UserResource($request->user());
    }

    public function show(User $user)
    {
        return new UserResource($user);
    }

    public function update(Request $request, User $user)
    {
        return $user->update($request->all());
    }

    public function destroy(User $user)
    {
        $user->role()->delete();
        $user->delete();

        return [
            'user' => $user->name,
            'action' => 'deleted',
            'status' => 'success'
        ];
    }
}
