@extends('layouts.app')

@section('content')
<h2>Edit Teacher</h2>

<form action="{{ route('teachers.update', $teacher) }}" method="POST">
    @csrf
    @method('PUT')
    <div class="mb-3">
        <label>First Name</label>
        <input type="text" name="first_name" value="{{ $teacher->first_name }}" class="form-control" required>
    </div>
    <div class="mb-3">
        <label>Last Name</label>
        <input type="text" name="last_name" value="{{ $teacher->last_name }}" class="form-control" required>
    </div>
    <div class="mb-3">
        <label>Subject Specialization</label>
        <input type="text" name="subject_specialization" value="{{ $teacher->subject_specialization }}" class="form-control" required>
    </div>
    <div class="mb-3">
        <label>Phone</label>
        <input type="text" name="phone" value="{{ $teacher->phone }}" class="form-control">
    </div>
    <div class="mb-3">
        <label>Salary</label>
        <input type="number" name="salary" value="{{ $teacher->salary }}" class="form-control" step="0.01">
    </div>
    <button class="btn btn-primary">Update</button>
</form>
@endsection