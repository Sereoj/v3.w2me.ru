<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Brands
 *
 * @property int $id
 * @property string $name
 * @property string|null $description
 * @property string|null $icon
 * @property string $tag
 * @property string $status
 * @method static \Illuminate\Database\Eloquent\Builder|Brands newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Brands newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Brands query()
 * @method static \Illuminate\Database\Eloquent\Builder|Brands whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Brands whereIcon($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Brands whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Brands whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Brands whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Brands whereTag($value)
 * @mixin \Eloquent
 */
class Brands extends Model
{
    use HasFactory;

    protected $table = 'brands';
    protected $fillable = ['id', 'name', 'description', 'icon', 'status', 'tag'];
    public $timestamps = false;
}
