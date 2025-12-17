<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Billing extends Model
{
    protected $fillable = [
        'patient_id',
        'bill_number',
        'total_amount',
        'status',
        'billing_date'
    ];

    public function patient()
    {
        return $this->belongsTo(Patients::class);
    }
}
