<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Deposit extends Model
{
    use HasFactory;

    protected $primaryKey = 'deposit_id';
    public $incrementing = true;
    protected $keyType = 'int';

    protected $fillable = [
        'lease_id',
        'deposit_amount',
        'deposit_method',
        'deposit_date',
    ];

    // Relationships
    public function lease()
    {
        return $this->belongsTo(Lease::class, 'lease_id');
    }
}
