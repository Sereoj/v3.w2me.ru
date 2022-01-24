<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Faker\Provider\kk_KZ\Person;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class AuthenticationController extends Controller
{
    public function login(Request $request)
    {
        $validator = Validator::make($request->only('email','password'), [
            'email' => ['required', 'string', 'email', 'max:255'],
            'password' => ['required', 'string', 'min:0'],
        ]);

        if(!$validator->fails())
        {
            $user = User::whereEmail($request->get('email'))->first();
            if($user && Hash::check($request->get('password'), $user->password))
            {
                $token = $user->createToken($user->name);
                $user->setRememberToken($token->plainTextToken);
                $user->save();
                return [
                    'token' => $token->plainTextToken,
                    'id' => $user->id,
                ];
            }
        }
        return $validator->messages();
    }
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => ['required', 'string','alpha', 'max:255','min:4'],
            'email' => ['required', 'string', 'email:rfc,dns', 'max:255', 'unique:users,email'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        if(!$validator->fails())
        {
            $user = $this->create($request->all());
            $token = $user->createToken($user->name);
            $user->setRememberToken($token->plainTextToken);
            $user->save();
            return [
                'token' => $token->plainTextToken,
                'id' => $user->id,
            ];
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

}
