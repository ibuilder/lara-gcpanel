<?php

namespace App\Models\Modules\Field;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DailyReport extends Model
{
    use HasFactory;

    protected $fillable = [
        'date',
        'weather',
        'notes',
        'user_id',
        'project_id',
    ];

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    public function project()
    {
        return $this->belongsTo('App\Models\Project');
    }

    public function photos()
    {
        return $this->hasMany('App\Models\Photo');
    }
}

class Photo extends Model
{
    use HasFactory;

    protected $fillable = [
        'file_path',
        'daily_report_id',
    ];

    public function dailyReport()
    {
        return $this->belongsTo(DailyReport::class);
    }
}

class Checklist extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'completed',
        'daily_report_id',
    ];

    public function dailyReport()
    {
        return $this->belongsTo(DailyReport::class);
    }
}

class Punchlist extends Model
{
    use HasFactory;

    protected $fillable = [
        'issue',
        'status',
        'daily_report_id',
    ];

    public function dailyReport()
    {
        return $this->belongsTo(DailyReport::class);
    }
}

class PullPlanning extends Model
{
    use HasFactory;

    protected $fillable = [
        'task',
        'scheduled_date',
        'daily_report_id',
    ];

    public function dailyReport()
    {
        return $this->belongsTo(DailyReport::class);
    }
}