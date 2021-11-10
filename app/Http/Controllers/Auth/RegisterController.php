<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string','alpha', 'max:255','min:4'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ], $this->messages());
    }
    protected function messages()
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
    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
    }
}
