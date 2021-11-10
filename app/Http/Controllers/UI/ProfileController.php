<?php

namespace App\Http\Controllers\UI;

use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $user = auth()->user();
        $status = $user->email_verified_at != null;

        return view('layouts.app', ['content' => view('pages.profile', [
            'header' => 'Профиль',
            'meta_title' => '',
            'meta_description' => '',
            'user' => $user,
            'role' => $user->role,
            'type' => $user->type,
            'status' => $status,
            'image' => $user->photo != null ? $user->photo->path : 'https://site112.com/img/200x200.png'
        ])]);
    }

    public function store(Request $request)
    {
        if($request->edit)
            return redirect()->route('user.edit');
        if($request->send)
        {
            $request->user()->sendEmailVerificationNotification();
            return back();
        }

    }
}
