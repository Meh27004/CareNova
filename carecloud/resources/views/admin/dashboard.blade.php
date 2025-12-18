<!DOCTYPE html>
<html lang="en">
<head>
 <title>dashboard</title>
</head>
<body>
@extends('admin.layouts.dashboard')
@section('title', 'Admin Dashboard')

@section('stats')
{{-- <div class="bg-white shadow rounded p-6 text-center">
    <h3 class="text-3xl font-bold">{{ count($patients) }}</h3>
    <p class="text-gray-600 mt-2">Total Patients</p>
</div> --}}
{{-- <div class="bg-white shadow rounded p-6 text-center">
    <h3 class="text-3xl font-bold">{{ count($doctors) }}</h3>
    <p class="text-gray-600 mt-2">Total Doctors</p>
</div> --}}
{{-- <div class="bg-white shadow rounded p-6 text-center">
    <h3 class="text-3xl font-bold">{{ count($appointments) }}</h3>
    <p class="text-gray-600 mt-2">Today's Appointments</p>
</div> --}}
<div class="bg-white shadow rounded p-6 text-center">
    <h3 class="text-3xl font-bold">12</h3>
    <p class="text-gray-600 mt-2">New Admissions</p>
</div>
@endsection

@section('content')
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
    <div class="bg-white shadow rounded p-5 flex flex-col justify-between">
        <h2 class="text-xl font-bold mb-2">Patients</h2>
        <p class="text-gray-600">All hospital patients overview.</p>
        <button class="bg-blue-600 text-white mt-4 px-4 py-2 rounded hover:bg-blue-700"><i class="fas fa-eye mr-1"></i> View</button>
    </div>
    <div class="bg-white shadow rounded p-5 flex flex-col justify-between">
        <h2 class="text-xl font-bold mb-2">Doctors</h2>
        <p class="text-gray-600">All hospital doctors overview.</p>
        <button class="bg-blue-600 text-white mt-4 px-4 py-2 rounded hover:bg-blue-700"><i class="fas fa-eye mr-1"></i> View</button>
    </div>
    {{-- <div class="bg-white shadow rounded p-5 flex flex-col justify-between">
        <h2 class="text-xl font-bold mb-2">Appointments</h2>
        <p class="text-gray-600">Today's and upcoming appointments.</p>
        <button class="bg-blue-600 text-white mt-4 px-4 py-2 rounded hover:bg-blue-700"><i class="fas fa-eye mr-1"></i> View</button>
    </div> --}}
</div>
@endsection
</body>
</html>