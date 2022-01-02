<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Followers
 *
 * @property int $id
 * @property int $user_id
 * @property int $follower_id
 * @property string|null $date
 * @method static \Illuminate\Database\Eloquent\Builder|Followers newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Followers newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Followers query()
 * @method static \Illuminate\Database\Eloquent\Builder|Followers whereDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Followers whereFollowerId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Followers whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Followers whereUserId($value)
 * @mixin \Eloquent
 */
class Followers extends Model
{
    use HasFactory;

    protected $table = 'followers';
    protected $fillable = ['id', 'user_id', 'date', 'follower_id'];
    public $timestamps = false;
}
