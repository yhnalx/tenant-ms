<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    use HasFactory;

    protected $table = 'tbl_property'; // Ensure correct table name
    protected $primaryKey = 'pro_id';  // Matches migration
    public $incrementing = true;
    protected $keyType = 'int';

    // Columns that can be mass-assigned
    protected $fillable = [
        'pro_type',
        'pro_room_number',
        'pro_monthly_rent',
        'pro_status', // Added status column
    ];

    // Relationship with Lease
    public function leases()
    {
        return $this->hasMany(Lease::class, 'pro_id', 'pro_id');
    }
}
