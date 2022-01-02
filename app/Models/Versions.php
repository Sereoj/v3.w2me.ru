<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Versions
 *
 * @property int $id
 * @property string|null $name
 * @property int $photo_id
 * @property string|null $size
 * @property string|null $image_size
 * @property string|null $dimension
 * @method static \Illuminate\Database\Eloquent\Builder|Versions newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Versions newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Versions query()
 * @method static \Illuminate\Database\Eloquent\Builder|Versions whereDimension($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Versions whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Versions whereImageSize($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Versions whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Versions wherePhotoId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Versions whereSize($value)
 * @mixin \Eloquent
 */
class Versions extends Model
{
    use HasFactory;

    protected $table = 'versions';
    protected $fillable = ['id', 'name', 'photo_id', 'dimension', 'image_size', 'size'];
    public $timestamps = false;
}
