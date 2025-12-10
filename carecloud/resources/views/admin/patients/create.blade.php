
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

@section('title', 'Add Patient')

@section('content')
<div class="container mt-2">
    <div class="card shadow">
        <div class="card-header text-dark">
            <h4>Add New Patient</h4>
        </div>
        <div class="card-body g-4">
            <form action="{{ route('patients.store') }}" method="POST">
    @csrf
    <input type="text" name="name" placeholder="Name" value="{{ old('name') }}" required>
    <input type="number" name="age" placeholder="Age" value="{{ old('age') }}" required>
    <input type="text" name="disease" placeholder="Disease" value="{{ old('disease') }}" required>
    <input type="text" name="current_address" placeholder="Address" value="{{ old('current_address') }}">
    <input type="gmail" name="gmail" placeholder="gmail" value="{{ old('gmail') }}">
    <input type="text" name="phone_number" placeholder="Phone" value="{{ old('phone_number') }}" required>
    <button type="submit">Add Patient</button>
</form>

        </div>
    </div>
</div>
@endsection
</body>
</html>