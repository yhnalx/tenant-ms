<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ApprovalSubmitTenantPending extends Model
{
    protected $table = 'approvalsubmittenantpending';

    protected $fillable = [
    'user_id',                // ✅ idinagdag para ma-link sa tenant
    'full_name', 
    'email', 
    'contact_number',
    'id_file', 
    'photo_file',
    'current_address', 
    'birthdate', 
    'preferred_unit_type',
    'preferred_movein_date', 
    'reason_renting', 
    'employment_status',
    'employer_name', 
    'emergency_name', 
    'emergency_contact',
    'emergency_relationship', 
    'status',
];
}
