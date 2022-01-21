<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Post
 *
 * @property int $id
 * @property string $name
 * @property string $slug
 * @property string|null $description
 * @property string $preview
 * @property string $licence
 * @property int $views
 * @property int $likes
 * @property int $downloads
 * @property int $brand_id
 * @property int $user_id
 * @property string|null $download_link
 * @property string|null $meta
 * @property int $isActive
 * @property int $reported
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Database\Factories\PostFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|Post newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Post newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Post query()
 * @method static \Illuminate\Database\Eloquent\Builder|Post whereBrandId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Post whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Post whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Post whereDownloadLink($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Post whereDownloads($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Post whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Post whereIsActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Post whereLicence($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Post whereLikes($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Post whereMeta($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Post whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Post wherePreview($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Post whereReported($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Post whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Post whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Post whereUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Post whereViews($value)
 * @mixin \Eloquent
 */
class Post extends Model
{
    use HasFactory;

    protected $perPage = 10;

    protected $guarded = [];
    protected $fillable = ['id', 'description', 'user_id', 'reported', 'name', 'downloads', 'likes', 'views', 'isActive', 'brand_id', 'preview', 'slug', 'licence', 'download_link', 'meta'];
    public $timestamps = true;

    public function images()
    {
        return $this->hasMany(Image::class);
    }

    public function categories()
    {
        return $this->belongsToMany(PostCategory::class);
    }

    public function tags()
    {
        return $this->belongsToMany(PostTag::class);
    }
}
