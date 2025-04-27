<?php

namespace App\Models\Modules\Preconstruction;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QualifiedBidder extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'contact_info',
        'status',
        'company_id',
        'created_by',
    ];

    public function company()
    {
        return $this->belongsTo('App\Models\Company');
    }

    public function user()
    {
        return $this->belongsTo('App\Models\User', 'created_by');
    }
}

class BidPackage extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'due_date',
        'status',
        'company_id',
        'created_by',
    ];

    public function company()
    {
        return $this->belongsTo('App\Models\Company');
    }

    public function user()
    {
        return $this->belongsTo('App\Models\User', 'created_by');
    }
}

class BidManual extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'file_path',
        'company_id',
        'created_by',
    ];

    public function company()
    {
        return $this->belongsTo('App\Models\Company');
    }

    public function user()
    {
        return $this->belongsTo('App\Models\User', 'created_by');
    }
}