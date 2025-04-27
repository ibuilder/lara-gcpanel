<?php

namespace App\Models\Modules\Contracts;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PrimeContract extends Model
{
    use HasFactory;

    protected $fillable = [
        'contract_type',
        'amount',
        'start_date',
        'end_date',
        'status',
        'company_id',
        'user_id',
    ];

    public function company()
    {
        return $this->belongsTo('App\Models\Company');
    }

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    public function comments()
    {
        return $this->hasMany('App\Models\Comment');
    }
}

class Subcontract extends Model
{
    use HasFactory;

    protected $fillable = [
        'contractor_name',
        'amount',
        'start_date',
        'end_date',
        'status',
        'company_id',
        'user_id',
    ];

    public function company()
    {
        return $this->belongsTo('App\Models\Company');
    }

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    public function comments()
    {
        return $this->hasMany('App\Models\Comment');
    }
}

class ProfessionalServiceAgreement extends Model
{
    use HasFactory;

    protected $fillable = [
        'service_provider',
        'amount',
        'start_date',
        'end_date',
        'status',
        'company_id',
        'user_id',
    ];

    public function company()
    {
        return $this->belongsTo('App\Models\Company');
    }

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    public function comments()
    {
        return $this->hasMany('App\Models\Comment');
    }
}

class LienWaiver extends Model
{
    use HasFactory;

    protected $fillable = [
        'contract_id',
        'amount',
        'status',
        'company_id',
        'user_id',
    ];

    public function company()
    {
        return $this->belongsTo('App\Models\Company');
    }

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    public function comments()
    {
        return $this->hasMany('App\Models\Comment');
    }
}

class CertificateOfInsurance extends Model
{
    use HasFactory;

    protected $fillable = [
        'insurance_provider',
        'policy_number',
        'expiration_date',
        'company_id',
        'user_id',
    ];

    public function company()
    {
        return $this->belongsTo('App\Models\Company');
    }

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    public function comments()
    {
        return $this->hasMany('App\Models\Comment');
    }
}

class LetterOfIntent extends Model
{
    use HasFactory;

    protected $fillable = [
        'contract_id',
        'intent_details',
        'company_id',
        'user_id',
    ];

    public function company()
    {
        return $this->belongsTo('App\Models\Company');
    }

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    public function comments()
    {
        return $this->hasMany('App\Models\Comment');
    }
}