<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Image
 *
 * @property int $id
 * @property int $post_id
 * @property string $type
 * @property string|null $location
 * @property string|null $photo_type
 * @method static \Database\Factories\ImageFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|Image newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Image newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Image query()
 * @method static \Illuminate\Database\Eloquent\Builder|Image whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Image whereLocation($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Image wherePhotoType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Image wherePostId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Image whereType($value)
 * @mixin \Eloquent
 */
class Image extends Model
{
    use HasFactory;
    protected $table = 'images';

    protected $fillable = ['id', 'type', 'location', 'photo_type', 'post_id'];
    public $timestamps = false;
}
