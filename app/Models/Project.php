<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    // Add fillable property if you intend to create/update projects via mass assignment
    // protected $fillable = ['name', 'number', 'location', ...];

    /**
     * Get the deficiencies for the project.
     */
    public function deficiencies()
    {
        return $this->hasMany(Deficiency::class);
    }

    // Add other relationships (e.g., CostCodes, Submittals, etc.) here
}