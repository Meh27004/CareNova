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

@section('title', 'Doctors Management')

@section('content')
<div class="container mt-4">
    <div class="d-flex justify-content-between mb-3">
        <h3>Doctors Dashboard</h3>
        <a href="{{ route('doctors.create') }}" class="btn btn-primary">+ Add Doctor</a>
    </div>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered table-striped">
        <thead class="table-dark">
            <tr>
                <th>Name</th>
                <th>Age</th>
                <th>Specialization</th>
                <th>Hospital</th>
                <th>City</th>
                <th>Phone</th>
                <th>Email</th>
                <th>Availability</th>
                <th width="120px">Action</th>
            </tr>
        </thead>

        <tbody>
            @foreach($doctors as $doctor)
                <tr>
                    <td>{{ $doctor->name }}</td>
                    <td>{{ $doctor->age }}</td>
                    <td>{{ $doctor->specialization }}</td>
                    <td>{{ $doctor->hospital }}</td>
                    <td>{{ $doctor->city }}</td>
                    <td>{{ $doctor->phone }}</td>
                    <td>{{ $doctor->gmail }}</td>

                    <td>
                        @foreach($doctor->availabilities as $availability)
                            <span class="badge bg-success">{{ $availability->day }} : {{ $availability->start_time }} - {{ $availability->end_time }}</span><br>
                        @endforeach
                    </td>

                    <td>
                        <a href="{{ route('doctors.edit', $doctor->id) }}" class="btn btn-sm btn-warning">Edit</a>

                        <form action="{{ route('doctors.destroy', $doctor->id) }}"
                              method="POST" class="d-inline">
                              @csrf
                              @method('DELETE')
                              <button class="btn btn-sm btn-danger"
                                      onclick="return confirm('Are you sure?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <div class="d-flex justify-content-center mt-3">
    {{ $doctors->links('pagination::bootstrap-5') }}
</div>
</div>
@endsection

</body>
</html>