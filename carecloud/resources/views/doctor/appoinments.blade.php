@extends('doctor.sidebar')

@section('doctorcontent')

<div class="container">
    <div class="row">
        <div class="col-md-10 offset-1">
            <table class="table">
    <tr>
        <th>id</th>
        <th>patient name</th>
        <th>Hospital</th>
        <th>Data</th>
        <th>Time</th>
        <th>Mail</th>
    </tr>

    @foreach($app as $app)
<tr>
    <td>{{$app->id}}</td>
    <td>{{$app->name}}</td>
    <td>{{$app->hospital_id}}</td>
    <td>{{$app->date}}</td>
    <td>{{$app->time}}</td>
    <td>{{$app->email}}</td>
</tr>
    @endforeach

</table>

        </div>
    </div>
</div>


@endsection