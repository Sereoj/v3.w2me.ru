<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Catalog extends Model
{
    use HasFactory;

    protected $table = 'catalog';
    protected $fillable = ['id' , 'name', 'description', 'preview', 'images','category_id','brand_id', 'license_type_id', 'user_id', 'catalog_download_id', 'catalog_rating_id'];

    public function category()
    {
        return $this->belongsTo(Categories::class);
    }
    public function brand()
    {
        return $this->belongsTo(Brands::class);
    }

    public function license()
    {
        return $this->hasOne(license_type::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function download()
    {
        return $this->hasMany(catalog_download::class);
    }

    public function rating()
    {
        return $this->hasMany(catalog_rating::class);
    }
}
