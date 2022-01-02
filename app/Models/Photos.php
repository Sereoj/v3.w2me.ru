<?php

namespace App\Models;

use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * App\Models\Photos
 *
 * @property int $id
 * @property string $name
 * @property string|null $description
 * @property string $preview
 * @property string $licence
 * @property int $views
 * @property int $likes
 * @property int $downloads
 * @property int $cat_id
 * @property int $brand_id
 * @property int $user_id
 * @property int $isActive
 * @property string|null $reported
 * @method static Builder|Photos newModelQuery()
 * @method static Builder|Photos newQuery()
 * @method static Builder|Photos query()
 * @method static Builder|Photos whereBrandId($value)
 * @method static Builder|Photos whereCatId($value)
 * @method static Builder|Photos whereDescription($value)
 * @method static Builder|Photos whereDownloads($value)
 * @method static Builder|Photos whereId($value)
 * @method static Builder|Photos whereIsActive($value)
 * @method static Builder|Photos whereLicence($value)
 * @method static Builder|Photos whereLikes($value)
 * @method static Builder|Photos whereName($value)
 * @method static Builder|Photos wherePreview($value)
 * @method static Builder|Photos whereReported($value)
 * @method static Builder|Photos whereUserId($value)
 * @method static Builder|Photos whereViews($value)
 * @mixin Eloquent
 */
class Photos extends Model
{
    use HasFactory;

    protected $table = 'photos';
    protected $fillable = ['id', 'name', 'description', 'user_id', 'brand_id', 'cat_id', 'downloads', 'isActive', 'licence', 'likes', 'preview', 'reported', 'views', 'download_link'];
    public $timestamps = false;

    public function images(): HasMany
    {
        return $this->hasMany(Photo::class);
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(Categories::class, 'cat_id');
    }

    public function brand(): BelongsTo
    {
        return $this->belongsTo(Brands::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
