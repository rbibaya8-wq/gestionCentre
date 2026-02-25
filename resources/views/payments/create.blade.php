@extends('layouts.app')

@section('content')
<div class="container">

<h2>Add Payment for {{ $student->first_name }} {{ $student->last_name }}</h2>

<form action="{{ route('payments.store') }}" method="POST">
    @csrf

    <input type="hidden" name="student_id" value="{{ $student->id }}">

    <div class="mb-3">
        <label>Month</label>
        <input type="number" name="month"
               class="form-control"
               min="1" max="12" required>
    </div>

    <div class="mb-3">
        <label>Year</label>
        <input type="number" name="year"
               value="{{ date('Y') }}"
               class="form-control" required>
    </div>

    <div class="mb-3">
        <label>Amount</label>
        <input type="number" name="amount"
               step="0.01"
               class="form-control" required>
    </div>

    <button class="btn btn-success">Save Payment</button>
    <a href="{{ route('students.show', $student->id) }}"
       class="btn btn-secondary">
       Cancel
    </a>

</form>

</div>
@endsection