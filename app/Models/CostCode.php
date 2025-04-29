<?php
// filepath: app/Models/CostCode.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CostCode extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        // Add your cost code attributes here, e.g.:
        // 'code',
        // 'description',
        // 'budget',
    ];
}