<?php

namespace App\Http\Controllers;

use App\Models\City;
use Illuminate\Http\Request;

class CityController extends Controller
{
    public function index()
    {
        $cities = City::orderBy('id', 'desc')->paginate(10);
        return view('admin.cities.index', compact('cities'));
    }

    public function create()
    {
        return view('admin.cities.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'state' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        City::create($request->all());

        return redirect()->route('cities.index')->with('success', 'City Added Successfully');
    }

    public function edit(City $city)
    {
        return view('admin.cities.edit', compact('city'));
    }

    public function update(Request $request, City $city)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'state' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        $city->update($request->all());

        return redirect()->route('cities.index')->with('success', 'City Updated Successfully');
    }

    public function destroy(City $city)
    {
        $city->delete();
        return redirect()->route('cities.index')->with('success', 'City Deleted Successfully');
    }
}
