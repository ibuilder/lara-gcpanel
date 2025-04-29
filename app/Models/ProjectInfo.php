<?php // Removed duplicate opening tag
// filepath: app/Models/ProjectInfo.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProjectInfo extends Model
{
    use HasFactory;

    // Since we expect only one row, prevent mass assignment issues
    // by explicitly allowing fields or using guarded = [] carefully.
    protected $fillable = [
        'project_name',
        'project_number',
        'project_address',
        'client_name',
        'project_manager_name',
        // Add other fields here
    ];
}