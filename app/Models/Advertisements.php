<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Advertisements
 *
 * @property int $id
 * @property string|null $leaderboard
 * @property string|null $rectangle
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Advertisements newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Advertisements newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Advertisements query()
 * @method static \Illuminate\Database\Eloquent\Builder|Advertisements whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Advertisements whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Advertisements whereLeaderboard($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Advertisements whereRectangle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Advertisements whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Advertisements extends Model
{
    use HasFactory;

    protected $table = 'advertisements';
    protected $fillable = ['id', 'leaderboard', 'rectangle', 'created_at', 'updated_at'];
    public $timestamps = true;
}
