@extends('admin.layouts.dashboard')

@section('title', 'Appointments Overview')

@section('stats')
<div class="bg-white shadow rounded p-6 text-center">
    <h3 class="text-3xl font-bold">{{ count($appointments) }}</h3>
    <p class="text-gray-600 mt-2">Total Appointments</p>
</div>
<div class="bg-white shadow rounded p-6 text-center">
    @php
        $todayAppointments = collect($appointments)->filter(function($app) {
            return $app['day'] === date('l'); // Only today's appointments
        });
    @endphp
    <h3 class="text-3xl font-bold">{{ count($todayAppointments) }}</h3>
    <p class="text-gray-600 mt-2">Appointments Today</p>
</div>
@endsection

@section('content')

@php
    // Group appointments by doctor
    $appointmentsByDoctor = collect($appointments)->groupBy('doctor');
    $today = date('l'); // Current weekday
@endphp

@foreach($appointmentsByDoctor as $doctor => $apps)
<div class="mb-8">
    <h2 class="text-xl font-bold mb-3">{{ $doctor }}'s Appointments</h2>
    
    <div class="overflow-x-auto">
        <table class="min-w-full bg-white shadow rounded">
            <thead class="bg-blue-500 text-white">
                <tr>
                    <th class="py-2 px-4 text-left">Patient</th>
                    <th class="py-2 px-4 text-left">Day</th>
                    <th class="py-2 px-4 text-left">Time</th>
                    <th class="py-2 px-4 text-left">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($apps as $app)
                <tr class="border-b hover:bg-gray-50 {{ $app['day'] === $today ? 'bg-yellow-100' : '' }}">
                    <td class="py-2 px-4">{{ $app['patient'] }}</td>
                    <td class="py-2 px-4">{{ $app['day'] }}</td>
                    <td class="py-2 px-4">{{ $app['time'] }}</td>
                    <td class="py-2 px-4 flex gap-2">
                        <button class="bg-green-500 text-white px-3 py-1 rounded hover:bg-green-600"><i class="fas fa-edit"></i></button>
                        <button class="bg-red-500 text-white px-3 py-1 rounded hover:bg-red-600"><i class="fas fa-trash"></i></button>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endforeach

@endsection
