<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lead extends Model
{
    use HasFactory;

    protected $fillable = [
        'organization_name',
        'organization_type',
        'contact_person',
        'position',
        'email',
        'phone',
        'status',
        'notes',
        'source',
        'estimated_users',
        'budget_range',
        'timeline',
    ];

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    public function getStatusBadgeAttribute()
    {
        return match($this->status) {
            'pending' => 'warning',
            'contacted' => 'info',
            'converted' => 'success',
            'rejected' => 'danger',
            default => 'secondary'
        };
    }

    public function getStatusTextAttribute()
    {
        return ucfirst($this->status);
    }
}
