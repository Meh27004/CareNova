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
<div class="container-fluid">

    <h3 class="mb-4">Billing Dashboard</h3>

    <div class="row mb-4">
        <div class="col-md-3">
            <div class="card text-white bg-primary">
                <div class="card-body">
                    <h6>Total Bills</h6>
                    <h3>{{ $totalBills }}</h3>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card text-white bg-success">
                <div class="card-body">
                    <h6>Total Revenue</h6>
                    <h3>${{ number_format($totalRevenue, 2) }}</h3>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card text-white bg-info">
                <div class="card-body">
                    <h6>Paid Bills</h6>
                    <h3>{{ $paidBills }}</h3>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card text-white bg-danger">
                <div class="card-body">
                    <h6>Pending Bills</h6>
                    <h3>{{ $pendingBills }}</h3>
                </div>
            </div>
        </div>
    </div>

    <!-- Recent Bills -->
    <div class="card">
        <div class="card-header">
            <strong>Recent Bills</strong>
        </div>

        <div class="card-body p-0">
            <table class="table table-bordered mb-0">
                <thead>
                    <tr>
                        <th>Bill #</th>
                        <th>Patient</th>
                        <th>Date</th>
                        <th>Total</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($recentBills as $billing)
                        <tr>
                            <td>{{ $billing->bill_number }}</td>
                            <td>{{ $billing->patient->name ?? 'N/A' }}</td>
                            <td>{{ $bill->billing_date }}</td>
                            <td>${{ number_format($bill->total_amount, 2) }}</td>
                            <td>
                                <span class="badge 
                                    {{ $bill->status == 'paid' ? 'bg-success' : 'bg-warning' }}">
                                    {{ ucfirst($bill->status) }}
                                </span>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-center">No bills found</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

</div>
@endsection
</body>
</html>