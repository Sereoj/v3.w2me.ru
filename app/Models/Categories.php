<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Categories
 *
 * @property int $id
 * @property string $name
 * @property string|null $description
 * @property string|null $icon
 * @property string $tag
 * @property string $status
 * @method static \Illuminate\Database\Eloquent\Builder|Categories newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Categories newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Categories query()
 * @method static \Illuminate\Database\Eloquent\Builder|Categories whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Categories whereIcon($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Categories whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Categories whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Categories whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Categories whereTag($value)
 * @mixin \Eloquent
 */
class Categories extends Model
{
    use HasFactory;

    protected $table = 'categories';
    protected $fillable = ['tag', 'status', 'icon', 'description', 'name', 'id'];
    public $timestamps = false;
}
