<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    protected $fillable = [
        'hospital_id','doctor_id','date','time',
        'name','email','phone','message'
    ];

    public function doctor()
    {
        return $this->belongsTo(Doctors::class);
    }

    public function hospital()
    {
        return $this->belongsTo(Hospital::class);
    }
}
