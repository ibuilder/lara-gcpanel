php
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'project_number',
        'description',
        'client',
        'project_manager',
        'superintendent',
        'start_date',
        'end_date',
        'address',
        'city',
        'state',
        'zip',
    ];

    public function company()
    {
        return $this->belongsTo(Company::class);
    }
}