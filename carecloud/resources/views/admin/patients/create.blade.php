
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
        <div class="card-header bg-primary text-dark">
            <h4>Add New Patient</h4>
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
            <form action="{{ route('patients.store') }}" method="POST">
     @csrf

            <div class="mb-3">
                <label>Your Name</label>
                <input type="text" class="form-control" name="name" required placeholder="Enter your name">
            </div>
            <div class="mb-3">
                <label>Age</label>
                <input type="number" class="form-control" name="age" required placeholder="Enter your Age">
            </div><div class="mb-3">
                <label>disease</label>
                <input type="text" class="form-control" name="disease" required placeholder="Enter your disease">
            </div>
            <div class="mb-3">
                <label>Current Address</label>
                <input type="text" class="form-control" name="current_address" required placeholder="Enter your address">
            </div>
            <div class="mb-3">
                <label>Email</label>
                <input type="text" class="form-control" name="gmail" required placeholder="Enter your email">
            </div>
              
               <div class="mb-3">
                <label>Phone</label>
                <input type="text" class="form-control" name="phone_number" required placeholder="Enter number">
            </div>
<button type="submit" class="btn btn-success">Save</button>
            <a href="{{ route('patients.index') }}" class="btn btn-dark">Back</a>
</form>
 </div>
        </div>
    </div>
</div>
@endsection
</body>
</html>