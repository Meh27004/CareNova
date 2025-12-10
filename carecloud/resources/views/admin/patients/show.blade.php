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

@section('title', 'Patient Details')

@section('content')
<div class="container mt-4">
    <div class="card shadow">
        <div class="card-header bg-info text-white">
            <h4>{{ $patient->name }}'s Details</h4>
        </div>
        <div class="card-body">
            @foreach (['id','name','age','disease','current_address','gmail','phone_number'] as $field)
                <p><strong>{{ ucfirst(str_replace('_',' ',$field)) }}:</strong> {{ $patient->$field }}</p>
            @endforeach

            <a href="{{ route('patients.index') }}" class="btn btn-secondary">Back</a>
            <a href="{{ route('patients.edit', $patient->id) }}" class="btn btn-warning">Edit</a>
        </div>
    </div>
</div>
@endsection
</body>
</html>