<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Deficiency extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'project_id',
        'description',
        'location',
        // Add other fields like 'status', 'assigned_to', 'due_date' if applicable
    ];

    /**
     * Get the project that owns the deficiency.
     */
    public function project()
    {
        return $this->belongsTo(Project::class);
    }
}