<?php

namespace App\Models\Modules\Cost;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Budget extends Model
{
    use HasFactory;

    protected $fillable = [
        'project_id',
        'amount',
        'description',
        'status',
        'created_by',
        'updated_by',
    ];

    public function project()
    {
        return $this->belongsTo(Project::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'created_by');
    }
}

class Invoice extends Model
{
    use HasFactory;

    protected $fillable = [
        'project_id',
        'amount',
        'invoice_date',
        'due_date',
        'status',
        'created_by',
        'updated_by',
    ];

    public function project()
    {
        return $this->belongsTo(Project::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'created_by');
    }
}

class DirectCost extends Model
{
    use HasFactory;

    protected $fillable = [
        'project_id',
        'cost_type',
        'amount',
        'description',
        'status',
        'created_by',
        'updated_by',
    ];

    public function project()
    {
        return $this->belongsTo(Project::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'created_by');
    }
}

class ChangeOrder extends Model
{
    use HasFactory;

    protected $fillable = [
        'project_id',
        'description',
        'amount',
        'status',
        'created_by',
        'updated_by',
    ];

    public function project()
    {
        return $this->belongsTo(Project::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'created_by');
    }
}

class ApprovalLetter extends Model
{
    use HasFactory;

    protected $fillable = [
        'project_id',
        'description',
        'status',
        'created_by',
        'updated_by',
    ];

    public function project()
    {
        return $this->belongsTo(Project::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'created_by');
    }
}

class TimeMaterialTicket extends Model
{
    use HasFactory;

    protected $fillable = [
        'project_id',
        'description',
        'hours',
        'rate',
        'status',
        'created_by',
        'updated_by',
    ];

    public function project()
    {
        return $this->belongsTo(Project::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'created_by');
    }
}