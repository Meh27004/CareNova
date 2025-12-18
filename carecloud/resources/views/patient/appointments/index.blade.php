<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <table class="table">
<tr>
<th>Patient</th><th>Doctor</th><th>Hospital</th><th>Date</th><th>Action</th>
</tr>

@foreach($appointments as $a)
<tr>
<td>{{ $a->name }}</td>
<td>{{ $a->doctor->name }}</td>
<td>{{ $a->hospital->name }}</td>
<td>{{ $a->date }}</td>
<td>
<a href="{{ route('appointments.edit',$a->id) }}">Edit</a>
</td>
</tr>
@endforeach
</table>

</body>
</html>