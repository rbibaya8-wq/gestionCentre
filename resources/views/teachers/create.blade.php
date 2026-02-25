@extends('layouts.app')

@section('content')
<h2>Add Teacher</h2>

<form action="{{ route('teachers.store') }}" method="POST">
    @csrf
    <div class="mb-3">
        <label>First Name</label>
        <input type="text" name="first_name" class="form-control" required>
    </div>
    <div class="mb-3">
        <label>Last Name</label>
        <input type="text" name="last_name" class="form-control" required>
    </div>
    <div class="mb-3">
        <label>Subject Specialization</label>
        <input type="text" name="subject_specialization" class="form-control" required>
    </div>
    <div class="mb-3">
        <label>Phone</label>
        <input type="text" name="phone" class="form-control">
    </div>
    <div class="mb-3">
        <label>Salary</label>
        <input type="number" name="salary" class="form-control" step="0.01">
    </div>
    <button class="btn btn-primary">Save</button>
</form>
@endsection