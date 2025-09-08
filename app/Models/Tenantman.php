<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Tenantman extends Authenticatable
{
    use Notifiable;

    protected $table = 'tenantman';

    protected $fillable = [
    'user_id', 'tenant_name', 'email', 'room_number', 'contact_number',
    'room_type', 'lease_start', 'lease_end', 'status', 'action', 'password'
];


    protected $hidden = ['password'];

    public function maintenanceRequests()
    {
        return $this->hasMany(MaintenanceRequest::class, 'tenant_id');
    }
}
