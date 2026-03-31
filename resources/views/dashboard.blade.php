@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="mb-4">📊 Dashboard</h2>

    <div class="row">

        <div class="col-md-3 mb-4">
            <div class="card text-white bg-success shadow">
                <div class="card-body">
                    <h5>Monthly Revenue</h5>
                    <h3>{{ $monthlyRevenue }} DH</h3>
                </div>
            </div>
        </div>

        <div class="col-md-3 mb-4">
            <div class="card text-white bg-danger shadow">
                <div class="card-body">
                    <h5>Unpaid Students</h5>
                    <h3>{{ $unpaidStudents }}</h3>
                </div>
            </div>
        </div>

        <div class="col-md-3 mb-4">
            <div class="card text-white bg-primary shadow">
                <div class="card-body">
                    <h5>Total Students</h5>
                    <h3>{{ $totalStudents }}</h3>
                </div>
            </div>
        </div>

        <div class="col-md-3 mb-4">
            <div class="card text-white bg-info shadow">
                <div class="card-body">
                    <h5>Total Teachers</h5>
                    <h3>{{ $totalTeachers }}</h3>
                </div>
            </div>
        </div>

    </div>

    <div class="card mb-4 shadow">
        <div class="card-body">
            <h5>Payment Rate This Month</h5>
            <div class="progress" style="height:25px;">
                <div class="progress-bar bg-success" 
                     style="width: {{ $paymentRate }}%;">
                    {{ $paymentRate }}%
                </div>
            </div>
        </div>
    </div>

    <div class="card shadow">
        <div class="card-body">
            <h5>Latest Payments</h5>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Student</th>
                        <th>Amount</th>
                        <th>Month</th>
                        <th>Year</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($latestPayments as $payment)
                    <tr>
                        <td>{{ $payment->student->first_name }} {{ $payment->student->last_name }}</td>
                        <td>{{ $payment->amount }} DH</td>
                        <td>{{ $payment->month }}</td>
                        <td>{{ $payment->year }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

</div>
@endsection