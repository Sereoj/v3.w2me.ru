<?php

namespace App\Http\Controllers\UI;

use App\Http\Controllers\Controller;
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
        $status = $user->email_verified_at ?? true;

        return view('layouts.app', ['content' => view('pages.profile', [
            'header' => 'Профиль',
            'meta_title' => '',
            'meta_description' => '',
            'user' => $user,
            'status' => $status,
            'image' => $user->photo != null ? $user->photo->path : 'https://site112.com/img/200x200.png'
        ])]);
    }

    public function store(Request $request)
    {
        return redirect()->route('user.edit');
    }
}
