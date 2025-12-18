<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Appointment;

class DoctorController extends Controller
{
    public function create()
    {
        return view('doctors.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'city' => 'required',
            'qualification' => 'required',
            'hospital' => 'required',
            'current_city' => 'required',
        ]);

        Doctor::create($request->all());

        return redirect()->back()->with('success', 'Doctor added successfully!');
    }




function doctordashboard(){
    return view('doctor.sidebar');
}

function doctorappoinment(){


// $userid=Auth::user()->id;
//     $app=Appointment::find($userid);
    $app=Appointment::all();

    return view('doctor.appoinments',compact('app'));
}




}

