<?php

class Appointment extends Model
{
    protected $fillable = [
        'hospital',
        'doctor',
        'date',
        'time',
        'name',
        'phone',
        'message'
    ];
}
