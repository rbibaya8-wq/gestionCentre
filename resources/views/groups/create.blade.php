@extends('layouts.app')

@section('content')
<h2>Add Group</h2>

<form action="{{ route('groups.store') }}" method="POST">
    @csrf
    <div class="mb-3">
        <label>Group Name</label>
        <input type="text" name="name" class="form-control" required>
    </div>
    <div class="mb-3">
        <label>Subject</label>
        <select name="subject_id" class="form-control" required>
            @foreach($subjects as $subject)
            <option value="{{ $subject->id }}">{{ $subject->name }}</option>
            @endforeach
        </select>
    </div>
    <div class="mb-3">
        <label>Teacher</label>
        <select name="teacher_id" class="form-control" required>
            @foreach($teachers as $teacher)
            <option value="{{ $teacher->id }}">{{ $teacher->first_name }} {{ $teacher->last_name }}</option>
            @endforeach
        </select>
    </div>
    <div class="mb-3">
        <label>Level</label>
        <input type="text" name="level" class="form-control" required>
    </div>
    <div class="mb-3">
        <label>Schedule</label>
        <input type="text" name="schedule" class="form-control" placeholder="Mon 10:00-12:00" required>
    </div>
    <button class="btn btn-primary">Save</button>
</form>
@endsection