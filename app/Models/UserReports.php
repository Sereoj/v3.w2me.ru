<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\UserReports
 *
 * @property int $id
 * @property int $user_id
 * @property int $reported_by
 * @property string|null $reason
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|UserReports newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|UserReports newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|UserReports query()
 * @method static \Illuminate\Database\Eloquent\Builder|UserReports whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserReports whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserReports whereReason($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserReports whereReportedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserReports whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserReports whereUserId($value)
 * @mixin \Eloquent
 */
class UserReports extends Model
{
    use HasFactory;

    protected $table = 'user_reports';
    protected $fillable = ['id', 'created_at', 'updated_at', 'user_id', 'reported_by', 'reason'];
    public $timestamps = true;
}
