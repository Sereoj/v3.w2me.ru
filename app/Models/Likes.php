<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Likes
 *
 * @property int $id
 * @property int $photo_id
 * @property int $user_id
 * @method static \Illuminate\Database\Eloquent\Builder|Likes newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Likes newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Likes query()
 * @method static \Illuminate\Database\Eloquent\Builder|Likes whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Likes wherePhotoId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Likes whereUserId($value)
 * @mixin \Eloquent
 */
class Likes extends Model
{
    use HasFactory;

    protected $table = 'likes';
    protected $fillable = ['user_id', 'id', 'photo_id'];
    public $timestamps = false;
}
