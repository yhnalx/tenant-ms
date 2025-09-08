<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
        'role', // 'tenant' or 'manager'
        'status',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    // Tenant -> Maintenance Requests
    public function maintenanceRequests()
    {
        return $this->hasMany(MaintenanceRequest::class, 'tenant_id');
    }

    // Helper
    public function isTenant()
    {
        return $this->role === 'tenant';
    }

    public function isManager()
{
    return $this->role === 'manager';
}
}