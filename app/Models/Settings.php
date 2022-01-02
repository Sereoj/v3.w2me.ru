<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Settings
 *
 * @property int $id
 * @property string|null $title
 * @property string|null $search_heading
 * @property string|null $search_text
 * @property string|null $meta_keywords
 * @property string|null $meta_description
 * @property string|null $email
 * @property string|null $ads
 * @property string|null $facebook
 * @property string|null $twitter
 * @property string|null $google_plus
 * @property string|null $linkedin
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Settings newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Settings newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Settings query()
 * @method static \Illuminate\Database\Eloquent\Builder|Settings whereAds($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Settings whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Settings whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Settings whereFacebook($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Settings whereGooglePlus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Settings whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Settings whereLinkedin($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Settings whereMetaDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Settings whereMetaKeywords($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Settings whereSearchHeading($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Settings whereSearchText($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Settings whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Settings whereTwitter($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Settings whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Settings extends Model
{
    use HasFactory;

    protected $table = 'settings';
    protected $fillable = ['updated_at', 'created_at', 'id', 'title', 'ads', 'email', 'facebook', 'google_plus', 'linkedin', 'meta_description', 'meta_keywords', 'search_heading', 'search_text', 'twitter'];
    public $timestamps = true;
}
