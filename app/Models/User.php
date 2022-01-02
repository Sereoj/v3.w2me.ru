<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $table = 'users';
    protected $fillable = [
        'name',
        'email',
        'password',
        'updated_at',
        'created_at',
        'id',
        'status',
        'description',
        'twitter',
        'facebook',
        'reported',
        'install_themes',
        'favorite_themes',
        'api_token',
        'email_verified_at',
        'avatar',
        'country',
        'cover',
        'dob',
        'google',
        'lang',
        'notifications_count',
        'remember_token',
        'tokens_count',
        'upload'
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function role(): \Illuminate\Database\Eloquent\Relations\HasOne
    {
        return $this->hasOne(RoleUser::class);
    }
}
