<?php
// filepath: app/Models/Modules/Resources/Location.php
<?php

namespace App\Models\Modules\Resources; // Adjust namespace if needed

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'code',
        'description',
        // 'parent_id', // Uncomment if using hierarchy
    ];

    // Optional: Define relationship for hierarchy
    // public function parent()
    // {
    //     return $this->belongsTo(Location::class, 'parent_id');
    // }

    // public function children()
    // {
    //     return $this->hasMany(Location::class, 'parent_id');
    // }
}