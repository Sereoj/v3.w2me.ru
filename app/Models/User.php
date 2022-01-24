<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

/**
 * App\Models\User
 *
 * @property int $id
 * @property string $name
 * @property string $email
 * @property string|null $email_verified_at
 * @property string $password
 * @property string|null $description
 * @property string|null $country
 * @property string|null $dob
 * @property string|null $cover
 * @property string|null $avatar
 * @property string|null $lang
 * @property string|null $facebook
 * @property string|null $twitter
 * @property string|null $github
 * @property string|null $vk
 * @property int $role
 * @property int $reported
 * @property string|null $remember_token
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Post[] $favorite
 * @property-read int|null $favorite_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Post[] $friends
 * @property-read int|null $friends_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Post[] $installs
 * @property-read int|null $installs_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Post[] $likes
 * @property-read int|null $likes_count
 * @property-read \App\Models\Post $loads
 * @method static \Database\Factories\UserFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User query()
 * @method static \Illuminate\Database\Eloquent\Builder|User whereAvatar($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereCountry($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereCover($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereDob($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmailVerifiedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereFacebook($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereGithub($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereLang($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereReported($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereRole($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereTwitter($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereVk($value)
 * @mixin \Eloquent
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Post[] $favorites
 * @property-read int|null $favorites_count
 * @property-read int|null $loads_count
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 * @property-read int|null $notifications_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\Laravel\Sanctum\PersonalAccessToken[] $tokens
 * @property-read int|null $tokens_count
 */

class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable;


    public const MEMBER = 0;
    public const HELPER = 1;
    public const ADMIN = 2;

    protected $perPage = 10;

    protected $fillable = ['name', 'id', 'description', 'remember_token', 'lang', 'dob', 'cover' ,'country', 'avatar', 'reported', 'facebook', 'twitter', 'email', 'role', 'password', 'github', 'vk'];

    public $timestamps = true;
    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function favorites()
    {
        return $this->belongsToMany(Post::class, 'user_favorites');
    }

    public function likes()
    {
        return $this->belongsToMany(Post::class,'user_likes');
    }

    public function installs()
    {
        return $this->belongsToMany(Post::class,'user_installs');
    }

    public function loads()
    {
        return $this->hasMany(Post::class);
    }

    public function friends()
    {
        return $this->belongsToMany(User::class, 'user_friends', 'friend_id');
    }

    public function subscriptions()
    {
        return $this->belongsToMany(User::class, 'user_friends', 'user_id', 'friend_id');
    }

    public function getIsMemberAttribute(): bool
    {
        return $this->role === self::MEMBER;
    }

    public function getIsHelperAttribute(): bool
    {
        return $this->role === self::HELPER;
    }

    public function getIsAdminAttribute(): bool
    {
        return $this->role === self::ADMIN;
    }
}
