<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Photo
 *
 * @property int $id
 * @property string $name
 * @property string $type
 * @property string|null $location
 * @property string|null $photo_type
 * @method static \Illuminate\Database\Eloquent\Builder|Photo newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Photo newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Photo query()
 * @method static \Illuminate\Database\Eloquent\Builder|Photo whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Photo whereLocation($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Photo whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Photo wherePhotoType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Photo whereType($value)
 * @mixin \Eloquent
 */
class Photo extends Model
{
    use HasFactory;

    protected $table = 'photo';
    protected $fillable = ['id', 'name', 'type', 'location', 'photo_type', 'photos_id'];
    public $timestamps = false;
}
