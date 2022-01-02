<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Collections
 *
 * @property int $id
 * @property int $photo_id
 * @property int $user_id
 * @method static \Illuminate\Database\Eloquent\Builder|Collections newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Collections newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Collections query()
 * @method static \Illuminate\Database\Eloquent\Builder|Collections whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Collections wherePhotoId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Collections whereUserId($value)
 * @mixin \Eloquent
 */
class Collections extends Model
{
    use HasFactory;

    protected $table = 'collections';
    protected $fillable = ['id', 'user_id', 'photo_id'];
    public $timestamps = false;
}
