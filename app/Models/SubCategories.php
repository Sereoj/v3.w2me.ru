<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\SubCategories
 *
 * @property int $id
 * @property string $name
 * @property string|null $description
 * @property string|null $icon
 * @property string $tag
 * @property string $status
 * @property int $category_id
 * @method static \Illuminate\Database\Eloquent\Builder|SubCategories newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|SubCategories newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|SubCategories query()
 * @method static \Illuminate\Database\Eloquent\Builder|SubCategories whereCategoryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SubCategories whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SubCategories whereIcon($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SubCategories whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SubCategories whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SubCategories whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SubCategories whereTag($value)
 * @mixin \Eloquent
 */
class SubCategories extends Model
{
    use HasFactory;

    protected $table = 'sub_categories';
    protected $fillable = ['description', 'name', 'id', 'status', 'icon', 'tag', 'category_id'];
    public $timestamps = false;
}
