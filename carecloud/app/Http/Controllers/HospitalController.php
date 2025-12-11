<?php

namespace App\Http\Controllers;

use App\Models\Hospital;
use Illuminate\Http\Request;

class HospitalController extends Controller
{
    public function index()
    {
        $hospital = Hospital::orderBy('id', 'desc')->paginate(10);
        return view('admin.hospital.index', compact('hospital'));
    }

    public function create()
    {
        return view('admin.hospital.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'city' => 'required|string',
        ]);

        Hospital::create($request->all());

        return redirect()->route('hospital.index')->with('success', 'Hospital Added Successfully');
    }

    public function edit(Hospital $hospital)
    {
        return view('admin.hospital.edit', compact('hospital'));
    }

    public function update(Request $request, Hospital $hospital)
    {
        $request->validate([
               'name' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'city' => 'required|string',
        ]);

        $hospital->update($request->all());

        return redirect()->route('admin.hospital.index')->with('success', 'Hospital Updated Successfully');
    }

    public function destroy(Hospital $hospital)
    {
        $city->delete();
        return redirect()->route('admin.hospital.index')->with('success', 'Hospital Deleted Successfully');
    }
}
