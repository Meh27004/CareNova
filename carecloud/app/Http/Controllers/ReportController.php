<?php

namespace App\Http\Controllers;

use App\Models\Patients;

class ReportController extends Controller
{
    public function index()
    {
        $patients = Patients::all();
        return view('admin.reports.index', compact('patients'));
    }

public function show($id)
{
    $patient = Patients::findOrFail($id);
    return view('admin.reports.show', compact('patient'));
}
}
