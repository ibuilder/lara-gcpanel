<?php

namespace App\Models\Modules\Closeout;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OmManual extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'file_path',
        'created_by',
        'company_id',
    ];

    public function user()
    {
        return $this->belongsTo('App\Models\User', 'created_by');
    }

    public function company()
    {
        return $this->belongsTo('App\Models\Company');
    }

    public function comments()
    {
        return $this->hasMany('App\Models\Comment');
    }
}

class Warranty extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'expiration_date',
        'created_by',
        'company_id',
    ];

    public function user()
    {
        return $this->belongsTo('App\Models\User', 'created_by');
    }

    public function company()
    {
        return $this->belongsTo('App\Models\Company');
    }

    public function comments()
    {
        return $this->hasMany('App\Models\Comment');
    }
}

class AtticStock extends Model
{
    use HasFactory;

    protected $fillable = [
        'item_name',
        'quantity',
        'location',
        'created_by',
        'company_id',
    ];

    public function user()
    {
        return $this->belongsTo('App\Models\User', 'created_by');
    }

    public function company()
    {
        return $this->belongsTo('App\Models\Company');
    }

    public function comments()
    {
        return $this->hasMany('App\Models\Comment');
    }
}