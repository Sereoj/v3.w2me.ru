<?php

namespace App\Http\Controllers\UI;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EditProfileController extends Controller
{
    public function index($params = null)
    {
        $user = auth()->user();

        $args = [
            'header' => 'Редактирование профиля',
            'meta_title' => '',
            'meta_description' => '',
            'user' => $user,
        ];

        $args['style'] = isset($params['validated']) && ($params['validated'] == true) ? 'needs-validation was-validated' : '';
        $args['status'] = isset($params['password']) && ($params['password'] == true);
        $args['status_image'] = isset($params['photo'] ) && ($params['photo'] != null);

        return view('layouts.app',['content' => view('pages.edit_profile',$args)]);
    }

    public function store(Request $request)
    {
        $params = null;

        $user = Auth::user();
        $user->name = $request->name;

        $params['validated'] = true;
        if($request->new_password != null && $request->old_password != null) {
            $params['password'] = true;
        }

        if($request->photo != null)
        {
            $params['photo'] = $request->photo;

            $path = '/storage/'.$request->photo->store('/','public');

            $user->photo()->create([
                'path' => asset($path)
            ]);
        }

        $user->save();
        return $this->index($params);
    }
}
