<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <title>Document</title>
</head>
<body>

@extends('admin.layouts.dashboard')

@section('title', 'Patients List')

@section('content')
<div class="container mt-4">
    <div class="card shadow">
        <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
            <h4>Patients List</h4>
            <a href="{{ route('patients.create') }}" class="btn btn-success">Add New Patient</a>
        </div>
        <div class="card-body">
            <!-- Search -->
            <form action="{{ route('patients.index') }}" method="GET" class="mb-3">
                <div class="input-group">
                    <input type="text" name="search" class="form-control" placeholder="Search patients..." value="{{ request()->search }}">
                    <button class="btn btn-outline-primary" type="submit">Search</button>
                </div>
            </form>

            <!-- Patients Table -->
            <table class="table table-striped table-bordered">
                <thead class="table-dark">
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Age</th>
                        <th>Disease</th>
                        <th>Phone</th>
                        <th>Current Address</th>
                        <th>Gmail</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($patients as $patient)
                        <tr>
                            <td>{{ $patient->id }}</td>
                            <td>{{ $patient->name }}</td>
                            <td>{{ $patient->age }}</td>
                            <td>{{ $patient->disease }}</td>
                            <td>{{ $patient->current_address }}</td>
                             <td>{{ $patient->gmail }}</td>
                           <td>{{ $patient->phone_number }}</td>

                            <td>
                                <a href="{{ route('patients.show', $patient->id) }}" class="btn btn-info btn-sm" style="margin-top:3px;">View</a>
                                <a href="{{ route('patients.edit', $patient->id) }}" class="btn btn-warning btn-sm" style="margin-top:3px;">Edit</a>
                                <form action="{{ route('patients.destroy', $patient->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger btn-sm" style="margin-top:3px;" onclick="return confirm('Are you sure?')">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center">No patients found.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>

            <!-- Pagination -->
            <div class="d-flex justify-content-end">
                {{ $patients->withQueryString()->links() }}
            </div>
        </div>
    </div>
</div>
@endsection
</body>
</html>
