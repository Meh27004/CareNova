<?php

namespace App\Http\Controllers;

use App\Models\Doctors;
use App\Models\DoctorAvailability;
use App\Models\Hospital;
use App\Models\City;
use Illuminate\Http\Request;

class DoctorsController extends Controller
{
    public function index(Request $request)
    {
        $query = Doctors::with('availabilities');

        if ($request->search) {
            $query->where(function($q) use ($request) {
                $q->where('name', 'like', '%' . $request->search . '%')
                  ->orWhere('specialization', 'like', '%' . $request->search . '%')
                  ->orWhere('hospital', 'like', '%' . $request->search . '%');
            });
        }

        $doctors = $query->orderBy('id', 'desc')->paginate(5);
        return view('admin.doctors.index', compact('doctors'));
    }

    public function create()
    {
        $hospitals = Hospital::all();
        $cities    = City::all();
        return view('admin.doctors.create', compact('hospitals', 'cities'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'age' => 'required|integer',
            'specialization' => 'required|string',
            'hospital' => 'required|string',
            'city' => 'required|string',
            'phone' => 'required|string',
            'gmail' => 'required|email',
            'days.*' => 'nullable|string',
            'start_time.*' => 'nullable',
            'end_time.*' => 'nullable',
        ]);

        $doctor = Doctors::create($request->only([
            'name','age','specialization','hospital','city','phone','gmail'
        ]));

        if ($request->days) {
            foreach ($request->days as $index => $day) {
                if (!empty($day)) {
                    DoctorAvailability::create([
                        'doctor_id' => $doctor->id,
                        'day' => $day,
                        'start_time' => $request->start_time[$index] ?? null,
                        'end_time'   => $request->end_time[$index] ?? null,
                    ]);
                }
            }
        }

        return redirect()->route('doctors.index')->with('success', 'Doctor added successfully!');
    }

    public function edit($id)
    {
        $doctor = Doctors::with('availabilities')->findOrFail($id);
        $hospitals = Hospital::all();
        $cities = City::all();
        return view('admin.doctors.edit', compact('doctor','hospitals','cities'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string',
            'age' => 'required|integer',
            'specialization' => 'required|string',
            'hospital' => 'required|string',
            'city' => 'required|string',
            'phone' => 'required|string',
            'gmail' => 'required|email',
        ]);

        $doctor = Doctors::findOrFail($id);
        $doctor->update($request->only([
            'name','age','specialization','hospital','city','phone','gmail'
        ]));

        DoctorAvailability::where('doctor_id', $id)->delete();

        if ($request->days) {
            foreach ($request->days as $index => $day) {
                if (!empty($day)) {
                    DoctorAvailability::create([
                        'doctor_id' => $doctor->id,
                        'day' => $day,
                        'start_time' => $request->start_time[$index] ?? null,
                        'end_time' => $request->end_time[$index] ?? null,
                    ]);
                }
            }
        }

        return redirect()->route('doctors.index')->with('success', 'Doctor updated successfully!');
    }

    public function destroy($id)
    {
        $doctor = Doctors::findOrFail($id);
        DoctorAvailability::where('doctor_id', $id)->delete();
        $doctor->delete();

        return redirect()->route('doctors.index')->with('success', 'Doctor deleted successfully!');
    }
}
