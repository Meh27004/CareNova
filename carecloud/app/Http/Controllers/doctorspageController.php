<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Doctor;

class DoctorspageController extends Controller
{
    public function index()
    {
        $doctors = Doctor::with('availabilities')->get();
        return view('patient.doctor', compact('doctors'));
    }
}

