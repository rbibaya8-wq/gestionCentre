@extends('layouts.app')

@section('content')
<h2>{{ $group->name }} - Students</h2>

<h5>Enrolled Students</h5>
<table class="table table-bordered">
    <thead>
        <tr>
            <th>Name</th>
            <th>Enrollment Date</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach($group->students as $student)
        <tr>
            <td>{{ $student->first_name }} {{ $student->last_name }}</td>
            <td>{{ $student->enrollment_date ?? '-' }}</td>
            <td>
                <form action="{{ route('groups.removeStudent', [$group, $student]) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger btn-sm">Remove</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

<h5>Enroll New Student</h5>
<form action="{{ route('groups.enrollStudent', $group) }}" method="POST">
    @csrf
    <div class="input-group mb-3">
        <select name="student_id" class="form-control" required>
            <option value="">Select Student</option>
            @foreach($availableStudents as $student)
            <option value="{{ $student->id }}">{{ $student->first_name }} {{ $student->last_name }} - {{ $student->level }}</option>
            @endforeach
        </select>
        <button class="btn btn-primary">Enroll</button>
    </div>
</form>
@endsection