<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserFavorite extends Model
{
    use HasFactory;

    protected $table = 'user_favorites';
    protected $fillable = ['user_id', 'post_id'];
    public $timestamps = false;
}
