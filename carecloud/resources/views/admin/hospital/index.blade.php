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
    <div class="card-header d-flex justify-content-between align-items-center bg-primary text-white">
        <h4 class="mb-0">Hospitals List</h4>
        <a href="{{ route('hospital.create') }}" class="btn btn-light btn-sm">Add New Hospital</a>
    </div>

    <div class="card-body">
        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <table class="table table-bordered table-hover">
            <thead class="table-dark">
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Address</th>
                    <th>City</th>
                    <th width="170">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($hospital as $hospital)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $hospital->name }}</td>
                    <td>{{ $hospital->address }}</td>
                    <td>{{ $hospital->city }}</td>
                    <td>
                        <a href="{{ route('hospital.edit', $hospital->id) }}" class="btn btn-sm btn-warning">Edit</a>

                        <form action="{{ route('hospital.destroy', $hospital->id) }}" 
                              method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button onclick="return confirm('Are you sure?')" 
                                    class="btn btn-danger btn-sm">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

        {{-- <div class="mt-3">
            {{ $Hospital->links() }}
        </div> --}}
    </div>
</div>

@endsection

</body>
</html>
