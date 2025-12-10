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

@section('title', 'Edit Doctor')

@section('content')
<div class="container mt-4">
    <h3 class="mb-4">Edit Doctor</h3>

    <form action="{{ route('doctors.update', $doctor->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="row">

            <div class="col-md-6 mb-3">
                <label>Name</label>
                <input type="text" name="name" value="{{ $doctor->name }}" class="form-control" required>
            </div>

            <div class="col-md-3 mb-3">
                <label>Age</label>
                <input type="number" name="age" value="{{ $doctor->age }}" class="form-control" required>
            </div>

            <div class="col-md-6 mb-3">
                <label>Specialization</label>
                <input type="text" name="specialization" value="{{ $doctor->specialization }}" class="form-control" required>
            </div>

            <div class="col-md-6 mb-3">
                <label>Hospital</label>
                <select name="hospital" class="form-select">
                    @foreach($hospitals as $hospital)
                        <option value="{{ $hospital->name }}" {{ $doctor->hospital == $hospital->name ? 'selected':'' }}>{{ $hospital->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="col-md-6 mb-3">
                <label>City</label>
                <select name="city" class="form-select">
                    @foreach($cities as $city)
                        <option value="{{ $city->name }}" {{ $doctor->city == $city->name ? 'selected':'' }}>{{ $city->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="col-md-6 mb-3">
                <label>Phone</label>
                <input type="text" name="phone" value="{{ $doctor->phone }}" class="form-control" required>
            </div>

            <div class="col-md-6 mb-3">
                <label>Email</label>
                <input type="email" name="gmail" value="{{ $doctor->gmail }}" class="form-control" required>
            </div>

            <h4>Availability</h4>
            <div id="availability-section">
                @foreach($doctor->availabilities as $index => $avail)
                    <div class="row g-2 mb-2 availability-row">
                        <div class="col-md-4">
                            <input type="text" name="days[]" value="{{ $avail->day }}" class="form-control">
                        </div>
                        <div class="col-md-4">
                            <input type="time" name="start_time[]" value="{{ $avail->start_time }}" class="form-control">
                        </div>
                        <div class="col-md-4">
                            <input type="time" name="end_time[]" value="{{ $avail->end_time }}" class="form-control">
                        </div>
                    </div>
                @endforeach
            </div>
            <button type="button" id="addRow" class="btn btn-secondary btn-sm mt-2">Add More</button>

        </div>

        <button type="submit" class="btn btn-warning">Update</button>
        <a href="{{ route('doctors.index') }}" class="btn btn-dark">Back</a>

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