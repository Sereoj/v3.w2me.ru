<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\RoleUser
 *
 * @method static \Illuminate\Database\Eloquent\Builder|RoleUser newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|RoleUser newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|RoleUser query()
 * @mixin \Eloquent
 * @property int $id
 * @property int $user_id
 * @property string $role
 * @method static \Illuminate\Database\Eloquent\Builder|RoleUser whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RoleUser whereRole($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RoleUser whereUserId($value)
 */
class RoleUser extends Model
{
    use HasFactory;

    protected $table = 'role_user';
    protected $fillable = ['role', 'user_id', 'id'];
    public $timestamps = false;
}
