@extends('admin.layouts.dashboard')
@section('title', 'Billing Overview')

@section('stats')
<div class="bg-white shadow rounded p-6 text-center">
    <h3 class="text-3xl font-bold">{{ count($billing) }}</h3>
    <p class="text-gray-600 mt-2">Total Bills</p>
</div>
@endsection

@section('content')
<div class="overflow-x-auto">
    <table class="min-w-full bg-white shadow rounded">
        <thead class="bg-green-500 text-white">
            <tr>
                <th class="py-2 px-4 text-left">Patient</th>
                <th class="py-2 px-4 text-left">Amount</th>
                <th class="py-2 px-4 text-left">Status</th>
                <th class="py-2 px-4 text-left">Date</th>
                <th class="py-2 px-4 text-left">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($billing as $bill)
            <tr class="border-b hover:bg-gray-50 {{ $bill['status'] === 'Pending' ? 'bg-yellow-100' : '' }}">
                <td class="py-2 px-4">{{ $bill['patient'] }}</td>
                <td class="py-2 px-4">{{ $bill['amount'] }}</td>
                <td class="py-2 px-4">{{ $bill['status'] }}</td>
                <td class="py-2 px-4">{{ $bill['date'] }}</td>
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
