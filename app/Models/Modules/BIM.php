<?php

namespace App\Models\Modules\BIM;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rfi extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'status',
        'created_by',
        'updated_by',
        'project_id',
    ];

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function project()
    {
        return $this->belongsTo(Project::class);
    }
}

class Submittal extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'status',
        'created_by',
        'updated_by',
        'project_id',
    ];

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function project()
    {
        return $this->belongsTo(Project::class);
    }
}

class Drawing extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'file_path',
        'status',
        'created_by',
        'updated_by',
        'project_id',
    ];

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function project()
    {
        return $this->belongsTo(Project::class);
    }
}

class Specification extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'file_path',
        'status',
        'created_by',
        'updated_by',
        'project_id',
    ];

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function project()
    {
        return $this->belongsTo(Project::class);
    }
}

class FileExplorer extends Model
{
    use HasFactory;

    protected $fillable = [
        'file_name',
        'file_path',
        'uploaded_by',
        'project_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'uploaded_by');
    }

    public function project()
    {
        return $this->belongsTo(Project::class);
    }
}

class Permitting extends Model
{
    use HasFactory;

    protected $fillable = [
        'permit_number',
        'description',
        'status',
        'issued_by',
        'project_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'issued_by');
    }

    public function project()
    {
        return $this->belongsTo(Project::class);
    }
}

class MeetingAgenda extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'date',
        'status',
        'created_by',
        'project_id',
    ];

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function project()
    {
        return $this->belongsTo(Project::class);
    }
}

class Transmittal extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'status',
        'created_by',
        'project_id',
    ];

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function project()
    {
        return $this->belongsTo(Project::class);
    }
}