<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;

class AuthenticationController extends Controller
{
    public function __construct()
    {
    }

    public function login(Request $request)
    {
        $validator = Validator::make($request->only('email','password'), [
            'email' => ['required', 'string', 'email', 'max:255'],
            'password' => ['required', 'string', 'min:0'],
        ], $this->loginMessages());

        if(!$validator->fails())
        {
            $user = User::whereEmail($request->email)->first();

            if($user && Hash::check($request->password, $user->password))
            {
                $user->api_token = Str::random(32);
                $user->save();
                return [new UserResource($user), 'token' => $user->api_token];
            }
            return $this->sendFailedLoginResponse($request);
        }
        return $validator->messages();
    }
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => ['required', 'string','alpha', 'max:255','min:4'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ], $this->registerMessages());

        if(!$validator->fails())
        {
            event(new Registered($user = $this->create($request->all())));

            $user->type()->create([
                'type' => 1,
                'gift_time' => now()->toDate(),
                'cost' => '10000'
            ]);

            $user->role()->create([
                'role' => 'user'
            ]);
            return $user;
        }
        return $validator->messages();
    }

    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
    }

    protected function sendFailedLoginResponse(Request $request)
    {
        return ['auth.failed' => 'Ошибка входа. Возможно введен неверный пароль'];
    }

    protected function registerMessages()
    {
        return [
            'name.required' => 'Поле имя обязательное',
            'name.alpha' => 'Данное поле должно состоять полностью из букв',
            'name.string' => 'Данное поле должно содержать строку',
            'name.max' => 'Максимальное количество символов 255',
            'name.min' => 'Минимальное количество символов 4',
            'email.required' => 'Поле email обязательное',
            'email.email' => 'Данное поле принимает только email',
            'email.string' => 'Данное поле должно быть строкой',
            'email.max' => 'Максимальное количество символов 255',
            'email.unique' => 'Данный email уже существует',
            'password.required' => 'Обязательное поле',
            'password.string' => 'Принимает только строку',
            'password.min' => 'Минимальное количество символов 8',
            'password.confirmed' => 'Подтвердите пароль правильно',
        ];
    }

    protected function loginMessages(){
        return [
            'email.required' => 'Поле email обязательное',
            'email.email' => 'Данное поле принимает только email',
            'email.string' => 'Данное поле должно быть строкой',
            'email.max' => 'Максимальное количество символов 255',
            'password.required' => 'Обязательное поле',
            'password.string' => 'Принимает только строку',
            'password.min' => 'Минимальное количество символов 8',
            'auth.failed' => 'Ошибка входа. Возможно введен неверный пароль'
        ];
    }
}
