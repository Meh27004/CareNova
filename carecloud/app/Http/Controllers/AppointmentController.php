<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\Doctors;
use App\Models\Hospital;
use Illuminate\Http\Request;
use Mail;
use App\Mail\AppointmentConfirmed;

class AppointmentController extends Controller
{
    public function create()
    {

        return view('patient.appointments.create', [
            'doctors' => Doctors::all(),
            'hospitals' => Hospital::all()
        ]);
    }

    public function store(Request $request)
    {
        $appointment = Appointment::create($request->all());

        Mail::to($request->email)->send(
            new AppointmentConfirmed($appointment)
        );

        return redirect()->route('appointments.index')
            ->with('success', 'Appointment Booked & Email Sent');
    }

    public function index()
    {
        $appointments = Appointment::with('doctor','hospital')->get();
        return view('patient.appointments.index', compact('appointments'));
    }

    public function edit($id)
    {
        return view('patient.appointments.edit', [
            'appointment' => Appointment::findOrFail($id),
            'doctors' => Doctor::all(),
            'hospitals' => Hospital::all()
        ]);
    }

    public function update(Request $request, $id)
    {
        Appointment::findOrFail($id)->update($request->all());
        return redirect()->route('appointments.index');
    }
}
