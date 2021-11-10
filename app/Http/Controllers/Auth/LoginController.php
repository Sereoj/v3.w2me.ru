<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Validator;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
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
        $this->middleware('guest')->except('logout');
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'email' => ['required', 'string', 'email', 'max:255'],
            'password' => ['required', 'string', 'min:0'],
        ], $this->messages());
    }
    protected function messages(){
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
