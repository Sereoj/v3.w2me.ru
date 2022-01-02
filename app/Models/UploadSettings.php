<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\UploadSettings
 *
 * @property int $id
 * @property string|null $approve_photos
 * @property string|null $download
 * @property int|null $upload_limit
 * @property string|null $description_length
 * @property string|null $comment_length
 * @property string|null $file_size
 * @property int|null $min_height
 * @property int|null $min_width
 * @property int|null $tags_limit
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|UploadSettings newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|UploadSettings newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|UploadSettings query()
 * @method static \Illuminate\Database\Eloquent\Builder|UploadSettings whereApprovePhotos($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UploadSettings whereCommentLength($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UploadSettings whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UploadSettings whereDescriptionLength($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UploadSettings whereDownload($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UploadSettings whereFileSize($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UploadSettings whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UploadSettings whereMinHeight($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UploadSettings whereMinWidth($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UploadSettings whereTagsLimit($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UploadSettings whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UploadSettings whereUploadLimit($value)
 * @mixin \Eloquent
 */
class UploadSettings extends Model
{
    use HasFactory;

    protected $table = 'upload_settings';
    protected $fillable = ['id', 'created_at', 'updated_at', 'download', 'approve_photos', 'comment_length', 'description_length', 'file_size', 'min_height', 'min_width', 'tags_limit', 'upload_limit'];
    public $timestamps = false;
}
