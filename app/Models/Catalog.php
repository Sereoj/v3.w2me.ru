<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Catalog
 *
 * @property int $id
 * @property string|null $name
 * @property string|null $description
 * @property string|null $meta_title
 * @property string|null $meta_description
 * @property string|null $preview
 * @property string|null $images
 * @property int $category_id
 * @property int $user_id
 * @method static \Illuminate\Database\Eloquent\Builder|Catalog newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Catalog newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Catalog query()
 * @method static \Illuminate\Database\Eloquent\Builder|Catalog whereCategoryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Catalog whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Catalog whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Catalog whereImages($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Catalog whereMetaDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Catalog whereMetaTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Catalog whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Catalog wherePreview($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Catalog whereUserId($value)
 * @mixin \Eloquent
 */
class Catalog extends Model
{
    use HasFactory;

    protected $table = 'catalog';
}
