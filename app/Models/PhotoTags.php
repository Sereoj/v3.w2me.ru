<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\PhotoTags
 *
 * @property int $id
 * @property int $tag_id
 * @property int $photo_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|PhotoTags newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PhotoTags newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PhotoTags query()
 * @method static \Illuminate\Database\Eloquent\Builder|PhotoTags whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PhotoTags whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PhotoTags wherePhotoId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PhotoTags whereTagId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PhotoTags whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class PhotoTags extends Model
{
    use HasFactory;

    protected $table = 'photo_tags';
    protected $fillable = ['id', 'photo_id', 'created_at', 'updated_at', 'tag_id'];
    public $timestamps = true;
}
