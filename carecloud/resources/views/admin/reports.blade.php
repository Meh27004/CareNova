@extends('admin.layouts.dashboard')
@section('title', 'Reports Overview')

@section('stats')
<div class="bg-white shadow rounded p-6 text-center">
    <h3 class="text-3xl font-bold">{{ count($reports) }}</h3>
    <p class="text-gray-600 mt-2">Total Reports</p>
</div>
@endsection

@section('content')
<div class="overflow-x-auto">
    <table class="min-w-full bg-white shadow rounded">
        <thead class="bg-blue-500 text-white">
            <tr>
                <th class="py-2 px-4 text-left">Title</th>
                <th class="py-2 px-4 text-left">Type</th>
                <th class="py-2 px-4 text-left">Date</th>
                <th class="py-2 px-4 text-left">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($reports as $report)
            <tr class="border-b hover:bg-gray-50">
                <td class="py-2 px-4">{{ $report['title'] }}</td>
                <td class="py-2 px-4">{{ $report['type'] }}</td>
                <td class="py-2 px-4">{{ $report['date'] }}</td>
                <td class="py-2 px-4 flex gap-2">
                    <button class="bg-green-500 text-white px-3 py-1 rounded hover:bg-green-600"><i class="fas fa-eye"></i></button>
                    <button class="bg-red-500 text-white px-3 py-1 rounded hover:bg-red-600"><i class="fas fa-trash"></i></button>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
