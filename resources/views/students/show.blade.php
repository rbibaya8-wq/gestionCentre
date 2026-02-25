@extends('layouts.app')

@section('content')

<h2>Student Details</h2>

<div class="card mb-4">
    <div class="card-body">
        <h4>{{ $student->first_name }} {{ $student->last_name }}</h4>
        <p><strong>Email:</strong> {{ $student->email }}</p>
        <p><strong>Phone:</strong> {{ $student->phone }}</p>
        <p><strong>Level:</strong> {{ $student->level }}</p>

        <hr>

        <p><strong>Total Paid:</strong> {{ $totalPaid }} MAD</p>

        <p>
            <strong>Current Month Status:</strong>
            @if($currentStatus == 'Paid')
                <span class="badge bg-success">Paid</span>
            @else
                <span class="badge bg-danger">Unpaid</span>
            @endif
        </p>

        <p>
            <strong>Late:</strong>
            @if($isLate == 'Yes')
                <span class="badge bg-danger">Yes</span>
            @else
                <span class="badge bg-success">No</span>
            @endif
        </p>
    </div>
</div>

<hr>

<h4>Payment History</h4>

<a href="{{ route('payments.create', ['student' => $student->id]) }}"
   class="btn btn-primary mb-3">
   Add Payment
</a>

<table class="table table-bordered">
    <thead>
        <tr>
            <th>Month</th>
            <th>Year</th>
            <th>Amount</th>
            <th>Date</th>
            <th>Receipt</th>
        </tr>
    </thead>
    <tbody>
        @forelse($student->payments as $payment)
        <tr>
            <td>{{ $payment->month }}</td>
            <td>{{ $payment->year }}</td>
            <td>{{ $payment->amount }} MAD</td>
            <td>{{ \Carbon\Carbon::parse($payment->payment_date)->format('d/m/Y') }}</td>
            <td>
                <a href="{{ route('payments.show', $payment->id) }}"
                   class="btn btn-sm btn-success">
                   Export
                </a>
            </td>
        </tr>
        @empty
        <tr>
            <td colspan="5" class="text-center">No payments found</td>
        </tr>
        @endforelse
    </tbody>
</table>

@endsection