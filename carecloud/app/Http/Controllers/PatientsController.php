<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Patients;

class PatientsController extends Controller
{
    public function index(Request $request)
    {
        $query = Patients::query();
        if ($request->search) {
            $query->where('name','like','%'.$request->search.'%')
                  ->orWhere('gmail','like','%'.$request->search.'%')
                  ->orWhere('phone_number','like','%'.$request->search.'%');
        }
        $patients = $query->orderBy('id','desc')->paginate(10);
        return view('admin.patients.index', compact('patients'));
    }

    public function create()
    {
        return view('admin.patients.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'age' => 'required|integer',
            'disease' => 'nullable|string',
            'current_address' => 'nullable|string',
            'gmail' => 'nullable|string',
            'phone_number' => 'nullable|string',
        ]);

        Patients::create($request->all());

        return redirect()->route('patients.index')->with('success', 'Patient added successfully.');
    }

    public function show(Patients $patient)
    {
        return view('admin.patients.show', compact('patient'));
    }

    public function edit(Patients $patient)
    {
        return view('admin.patients.edit', compact('patient'));
    }

    public function update(Request $request, Patients $patient)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'age' => 'required|integer',
            'disease' => 'nullable|string',
            'current_address' => 'nullable|string',
            'gmail' => 'nullable|string',
            'phone_number' => 'nullable|string',
        ]);

        $patient->update($request->all());

        return redirect()->route('patients.index')->with('success', 'Patient updated successfully.');
    }

    public function destroy(Patients $patient)
    {
        $patient->delete();
        return redirect()->route('patients.index')->with('success', 'Patient deleted successfully.');
    }
}
