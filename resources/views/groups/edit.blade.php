@extends('layouts.app')

@section('content')
<h2>Edit Group</h2>

<form action="{{ route('groups.update', $group) }}" method="POST">
    @csrf
    @method('PUT')
    <div class="mb-3">
        <label>Group Name</label>
        <input type="text" name="name" value="{{ $group->name }}" class="form-control" required>
    </div>
    <div class="mb-3">
        <label>Subject</label>
        <select name="subject_id" class="form-control" required>
            @foreach($subjects as $subject)
            <option value="{{ $subject->id }}" {{ $group->subject_id == $subject->id ? 'selected' : '' }}>{{ $subject->name }}</option>
            @endforeach
        </select>
    </div>
    <div class="mb-3">
        <label>Teacher</label>
        <select name="teacher_id" class="form-control" required>
            @foreach($teachers as $teacher)
            <option value="{{ $teacher->id }}" {{ $group->teacher_id == $teacher->id ? 'selected' : '' }}>
                {{ $teacher->first_name }} {{ $teacher->last_name }}
            </option>
            @endforeach
        </select>
    </div>
    <div class="mb-3">
        <label>Level</label>
        <input type="text" name="level" value="{{ $group->level }}" class="form-control" required>
    </div>
    <div class="mb-3">
        <label>Schedule</label>
        <input type="text" name="schedule" value="{{ $group->schedule }}" class="form-control" required>
    </div>
    <button class="btn btn-primary">Update</button>
</form>
@endsection