@extends('layouts.app')

@section('content')
<h2>Edit Student</h2>

<form action="{{ route('students.update', $student) }}" method="POST">
    @csrf
    @method('PUT')
    <div class="mb-3">
        <label>First Name</label>
        <input type="text" name="first_name" value="{{ $student->first_name }}" class="form-control" required>
    </div>
    <div class="mb-3">
        <label>Last Name</label>
        <input type="text" name="last_name" value="{{ $student->last_name }}" class="form-control" required>
    </div>
    <div class="mb-3">
        <label>Level</label>
        <input type="text" name="level" value="{{ $student->level }}" class="form-control" required>
    </div>
    <select name="group_id" class="form-control">
    <option value="">-- Choose Group --</option>
    @foreach($groups as $group)
        <option value="{{ $group->id }}"
            {{ $student->group_id == $group->id ? 'selected' : '' }}>
            {{ $group->name }}
        </option>
    @endforeach
</select>
    <div class="mb-3">
        <label>Phone</label>
        <input type="text" name="phone" value="{{ $student->phone }}" class="form-control">
    </div>
    <div class="mb-3">
        <label>Parent Name</label>
        <input type="text" name="parent_name" value="{{ $student->parent_name }}" class="form-control" required>
    </div>
    <div class="mb-3">
        <label>Parent Phone</label>
        <input type="text" name="parent_phone" value="{{ $student->parent_phone }}" class="form-control">
    </div>
    <button class="btn btn-primary">Update</button>
</form>
@endsection