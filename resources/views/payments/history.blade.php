@extends('layouts.app')

@section('content')
<h2>Payment History - {{ $student->first_name }} {{ $student->last_name }}</h2>

<form method="GET" class="mb-3">
    <input type="number" name="month" placeholder="Month" value="{{ request('month') }}" class="form-control mb-2">
    <input type="number" name="year" placeholder="Year" value="{{ request('year') }}" class="form-control mb-2">
    <button class="btn btn-primary">Filter</button>
</form>

<table class="table">
    <thead>
        <tr>
            <th>Month</th>
            <th>Year</th>
            <th>Amount</th>
            <th>Payment Date</th>
            <th>Receipt</th>
        </tr>
    </thead>
    <tbody>
        @foreach($student->payments as $payment)
        <tr>
            <td>{{ $payment->month }}</td>
            <td>{{ $payment->year }}</td>
            <td>{{ $payment->amount }} MAD</td>
            <td>{{ \Carbon\Carbon::parse($payment->payment_date)->format('d/m/Y') }}</td>
            <td>
                <a href="{{ route('payments.receipt', $payment->id) }}"
                   class="btn btn-sm btn-primary">
                   Export
                </a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

<p>Total Paid: {{ $totalPaid }}</p>
<p>Unpaid Months: 
    @foreach($unpaidRecords as $unpaid)
        {{ $unpaid->month }} / {{ $unpaid->year }},
    @endforeach
</p>
@endsection