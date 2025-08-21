<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TenantRegistrationRequest extends Model
{
    use HasFactory;

    protected $fillable = [
        'organization_name',
        'contact_person',
        'email',
        'phone',
        'organization_type',
        'address',
        'website',
        'plan',
        'message',
        'status',
        'approved_at',
        'rejected_at',
        'rejection_reason',
        'tenant_id',
    ];

    protected $casts = [
        'approved_at' => 'datetime',
        'rejected_at' => 'datetime',
    ];

    public function tenant()
    {
        return $this->belongsTo(Tenant::class);
    }
}


