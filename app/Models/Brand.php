<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Brand
 *
 * @property int $id
 * @property string $name
 * @property string|null $description
 * @property string|null $icon
 * @property string $tag
 * @method static \Database\Factories\BrandFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|Brand newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Brand newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Brand query()
 * @method static \Illuminate\Database\Eloquent\Builder|Brand whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Brand whereIcon($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Brand whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Brand whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Brand whereTag($value)
 * @mixin \Eloquent
 */
class Brand extends Model
{
    use HasFactory;
    protected $table = 'brands';

    protected $fillable = ['name', 'id', 'description', 'tag', 'icon'];
    public $timestamps = false;
}
