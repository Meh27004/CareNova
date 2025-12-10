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
<div class="card shadow-sm">
    <div class="card-header bg-warning">
        <h4 class="mb-0">Edit City</h4>
    </div>
    <div class="card-body">

        @if($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        
        <form action="{{ route('cities.update', $city->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label>City Name</label>
                <input type="text" class="form-control" name="name" value="{{ $city->name }}" required>
            </div>

            <div class="mb-3">
                <label>State / Province</label>
                <input type="text" class="form-control" name="state" value="{{ $city->state }}" required>
            </div>

            <div class="mb-3">
                <label>Description (Optional)</label>
                <textarea name="description" rows="3" class="form-control">{{ $city->description }}</textarea>
            </div>

            <button type="submit" class="btn btn-success">Update</button>
            <a href="{{ route('cities.index') }}" class="btn btn-dark">Back</a>
        </form>
    </div>
</div>
@endsection
</body>
</html>