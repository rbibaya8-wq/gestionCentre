@extends('layouts.app')

@section('content')
<h2>Add Student</h2>

<form action="{{ route('students.store') }}" method="POST">
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
        <label>Level</label>
        <input type="text" name="level" class="form-control" required>
    </div>
    <div class="mb-3">
    <label>Group</label>
    <select name="group_id" class="form-control">
        <option value="">-- Choose Group --</option>
        @foreach($groups as $group)
            <option value="{{ $group->id }}">
                {{ $group->name }} ({{ $group->level }})
            </option>
        @endforeach
    </select>
</div>
    <div class="mb-3">
        <label>Phone</label>
        <input type="text" name="phone" class="form-control">
    </div>
    <div class="mb-3">
        <label>Parent Name</label>
        <input type="text" name="parent_name" class="form-control" required>
    </div>
    <div class="mb-3">
        <label>Parent Phone</label>
        <input type="text" name="parent_phone" class="form-control">
    </div>
    <button class="btn btn-primary">Save</button>
</form>
@endsection