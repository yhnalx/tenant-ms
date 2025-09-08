<?php

namespace App\Models;

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lease extends Model
{
    protected $table = 'leases';

   protected $fillable = [
        'user_id',
        'room_number',
        'room_type',
        'lease_start',
        'lease_end',
        'lease_file',
        'status',
        'renewal_requested'
    ];
}
