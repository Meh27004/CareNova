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

@section('title', 'Add Doctor')

@section('content')
<div class="container mt-4">
    <h3 class="mb-4">Add Doctor</h3>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                   <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('doctors.store') }}" method="POST">
        @csrf

        <div class="row">

            <div class="col-md-6 mb-3">
                <label>Name</label>
                <input type="text" name="name" class="form-control" required>
            </div>

            <div class="col-md-3 mb-3">
                <label>Age</label>
                <input type="number" name="age" class="form-control" required>
            </div>

            <div class="col-md-6 mb-3">
                <label>Specialization</label>
                <input type="text" name="specialization" class="form-control" required>
            </div>

            <div class="col-md-6 mb-3">
                <label>Hospital</label>
                <select name="hospital" class="form-select" required>
                    <option value="">Select Hospital</option>
                    @foreach($hospitals as $hospital)
                        <option value="{{ $hospital->name }}">{{ $hospital->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="col-md-6 mb-3">
                <label>City</label>
                <select name="city" class="form-select" required>
                    <option value="">Select City</option>
                    @foreach($cities as $city)
                        <option value="{{ $city->name }}">{{ $city->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="col-md-6 mb-3">
                <label>Phone</label>
                <input type="text" name="phone" class="form-control" required>
            </div>

            <div class="col-md-6 mb-3">
                <label>Email</label>
                <input type="email" name="gmail" class="form-control" required>
            </div>

            <div class="mb-3">
                <label>Availability</label>
                <div id="availability-section">
                    <div class="row g-2 mb-2 availability-row">
                        <div class="col-md-4">
                            <input type="text" name="days[]" placeholder="Day (e.g. Monday)" class="form-control">
                        </div>
                        <div class="col-md-4">
                            <input type="time" name="start_time[]" class="form-control">
                        </div>
                        <div class="col-md-4">
                            <input type="time" name="end_time[]" class="form-control">
                        </div>
                    </div>
                </div>
                <button type="button" id="addRow" class="btn btn-secondary btn-sm mt-2">Add More</button>
            </div>

        </div>

        <button type="submit" class="btn btn-primary">Save</button>
        <a href="{{ route('doctors.index') }}" class="btn btn-dark">Cancel</a>

    </form>
</div>

<script>
document.getElementById('addRow').addEventListener('click', function() {
    let rows = document.querySelector('.availability-row');
    let clone = rows.cloneNode(true);
    document.getElementById('availability-section').appendChild(clone);
});
</script>
@endsection

</body>
</html>