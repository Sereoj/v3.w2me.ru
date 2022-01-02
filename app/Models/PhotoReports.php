<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\PhotoReports
 *
 * @property int $id
 * @property int $photo_id
 * @property int $reported_by
 * @property string|null $reason
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|PhotoReports newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PhotoReports newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PhotoReports query()
 * @method static \Illuminate\Database\Eloquent\Builder|PhotoReports whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PhotoReports whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PhotoReports wherePhotoId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PhotoReports whereReason($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PhotoReports whereReportedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PhotoReports whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class PhotoReports extends Model
{
    use HasFactory;

    protected $table = 'photo_reports';
    protected $fillable = ['id', 'updated_at', 'created_at', 'photo_id', 'reason', 'reported_by'];
    public $timestamps = true;
}
