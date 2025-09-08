<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Tenant extends Authenticatable
{
    use Notifiable;

    protected $fillable = [
        'user_id',
        'tenant_name',
        'email',
        'password',
        'room_number',
        'contact_number',
        'room_type',
        'lease_start',
        'lease_end',
        'status',
        'action',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    // Relation to User
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
