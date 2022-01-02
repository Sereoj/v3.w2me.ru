<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

/**
 * App\Models\Pages
 *
 * @property int $id
 * @property string|null $title
 * @property string $slug
 * @property string|null $content
 * @property string|null $show_in_footer
 * @property string|null $status
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Pages newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Pages newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Pages query()
 * @method static \Illuminate\Database\Eloquent\Builder|Pages whereContent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Pages whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Pages whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Pages whereShowInFooter($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Pages whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Pages whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Pages whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Pages whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Pages extends Model
{
    use HasFactory;

    protected $table = 'pages';
    protected $fillable = ['id', 'created_at', 'updated_at', 'status', 'slug', 'content', 'show_in_footer', 'title'];
    public $timestamps = true;
}
