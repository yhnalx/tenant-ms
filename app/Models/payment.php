<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

    protected $primaryKey = 'payment_id'; 
    public $incrementing = true;
    protected $keyType = 'int';

    protected $fillable = [
        'lease_id',
        'payment_amount',
        'payment_method',
        'payment_date',
        'payment_status',
    ];

    // Relationships
    public function lease()
    {
        return $this->belongsTo(Lease::class, 'lease_id');
    }
}
