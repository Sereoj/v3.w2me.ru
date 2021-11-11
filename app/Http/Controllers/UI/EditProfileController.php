<?php

namespace App\Http\Controllers\UI;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

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
        $user = $request->user();

        $args = [
            'header' => 'Редактирование профиля',
            'meta_title' => '',
            'meta_description' => '',
            'user' => $user,
        ];
        $args['style'] = 'needs-validation was-validated';
        $args['status'] = false;
        $args['status_image'] = false;

        $this->validator($request->all())->validate();

        if($this->isName($request))
        {
            $this->ChangeName($user, $request->name);
        }

        if($this->isPhoto($request))
        {
            $path = '/storage/'.$request->photo->store('/','public');
            $this->createPhoto($user, $path);
            $args['status_image'] = true;
        }

        if($this->isPasswords($request))
        {
            $args['status'] = $this->Password($user, $request->old_password, $request->new_password);
        }

        $user->save();

        return view('layouts.app',['content' => view('pages.edit_profile',$args)]);
    }
    protected function isName($request)
    {
        return $request->name ?? null;
    }

    protected function ChangeName(User $user, $text)
    {
        $user->name = $text;
    }

    protected function isPhoto($request)
    {
        return $request->photo ?? null;
    }
    protected function isPasswords($request)
    {
        if($request->old_password && $request->new_password)
            return true;
        return false;
    }

    protected function getHashPassword($pass)
    {
        return Hash::make($pass);
    }

    protected function Password($user, $oldpass, $newpass) : bool
    {
        if(Hash::check($oldpass,$user->password))
        {
            $user->fill([
                'password' => $this->getHashPassword($newpass)
            ]);
            $this->guard()->login($user);

            return true;
        }
        return false;
    }

    protected function createPhoto($user, $path)
    {
      return $user->photo()->create(['path' => asset($path)]);
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|alpha_dash|min:4|max:64',
            'photo'  =>  'nullable|image|mimes:jpeg,jpg,png,gif|max:1027',
//            'old_password'  =>  'nullable|min:0|max:255',
//            'new_password'  =>  'nullable|min:0|max:255',
            'old_password'  =>  'nullable|min:8|max:255',
            'new_password'  =>  'nullable|min:8|max:255',
        ], $this->messages());
    }
    protected function messages()
    {
        return [
            'name.required' => 'Данное поле является обязательным',
            'name.alpha' => 'Данное поле должно состоять полностью из букв',
            'name.min' => 'Минимальное количество символов 4',
            'name.max' => 'Максимальное количество символов 64',
            'photo.mimes' => 'Принимает только: jpeg,jpg,png,gif',
            'photo.max' => 'Максимальный размер 1027 Кб',
            'old_password.min' => 'Минимальное количество символов 8',
            'old_password.max' => 'Максимальное количество символов 255',
            'new_password.min' => 'Минимальное количество символов 8',
            'new_password.max' => 'Максимальное количество символов 255',
        ];
    }

    protected function guard()
    {
        return Auth::guard();
    }
}
