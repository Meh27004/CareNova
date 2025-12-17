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

@section('content')
<div class="container">
    <h3>Patient Report</h3>

    <table class="table table-bordered">
        <tr>
            <th>Name</th>
            <td>{{ $patient->name }}</td>
        </tr>
        <tr>
            <th>Age</th>
            <td>{{ $patient->age }}</td>
        </tr>
        <tr>
            <th>Disease</th>
            <td>{{ $patient->disease }}</td>
        </tr>
        <tr>
            <th>Phone</th>
            <td>{{ $patient->phone_number }}</td>
        </tr>
        <tr>
            <th>Address</th>
            <td>{{ $patient->current_address }}</td>
        </tr>
    </table>

    <a href="{{ route('reports.index') }}" class="btn btn-secondary">Back to Reports</a>
</div>
@endsection
</body>
</html>