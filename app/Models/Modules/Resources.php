<?php

namespace App\Models\Modules\Resources;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'address',
        'city',
        'state',
        'zip_code',
        'country',
        'company_id',
    ];

    public function company()
    {
        return $this->belongsTo(Company::class);
    }
}

class CSIDivision extends Model
{
    use HasFactory;

    protected $fillable = [
        'division_number',
        'division_name',
        'company_id',
    ];

    public function company()
    {
        return $this->belongsTo(Company::class);
    }
}

class CostCode extends Model
{
    use HasFactory;

    protected $fillable = [
        'code',
        'description',
        'company_id',
    ];

    public function company()
    {
        return $this->belongsTo(Company::class);
    }
}

class LaborRate extends Model
{
    use HasFactory;

    protected $fillable = [
        'job_title',
        'rate',
        'company_id',
    ];

    public function company()
    {
        return $this->belongsTo(Company::class);
    }
}

class MaterialRate extends Model
{
    use HasFactory;

    protected $fillable = [
        'material_name',
        'rate',
        'company_id',
    ];

    public function company()
    {
        return $this->belongsTo(Company::class);
    }
}

class EquipmentRate extends Model
{
    use HasFactory;

    protected $fillable = [
        'equipment_name',
        'rate',
        'company_id',
    ];

    public function company()
    {
        return $this->belongsTo(Company::class);
    }
}