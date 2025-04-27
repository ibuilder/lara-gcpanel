<?php

namespace App\Models\Modules\Engineering;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RFI extends Model
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

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'issued_by');
    }
}

class MeetingAgenda extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'date',
        'location',
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
}

class Transmittal extends Model
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
}