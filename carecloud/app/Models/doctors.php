<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Doctors extends Model
{
    protected $fillable = ['name','age' ,'specialization', 'hospital','city','phone','gmail'];
     

  public function availabilities()
{
    return $this->hasMany(DoctorAvailability::class, 'doctor_id');
}
}