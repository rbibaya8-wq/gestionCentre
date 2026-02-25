@extends('layouts.app')

@section('content')
<h2>Teachers</h2>

<div class="mb-3 d-flex justify-content-between">
    <a href="{{ route('teachers.create') }}" class="btn btn-success">Add Teacher</a>
    <a href="{{ route('teachers.export') }}" class="btn btn-danger">Export PDF</a>
</div>

<!-- 🔍 FILTER -->
<form method="GET" class="row mb-3">
    <div class="col-md-4">
        <input type="text" name="search" class="form-control"
               placeholder="Search by name or phone"
               value="{{ request('search') }}">
    </div>

    <div class="col-md-4">
        <select name="subject" class="form-control">
            <option value="">-- All Subjects --</option>
            @foreach($subjects as $subject)
                <option value="{{ $subject }}"
                    {{ request('subject') == $subject ? 'selected' : '' }}>
                    {{ $subject }}
                </option>
            @endforeach
        </select>
    </div>

    <div class="col-md-4">
        <button class="btn btn-primary">Filter</button>
        <a href="{{ route('teachers.index') }}" class="btn btn-secondary">Reset</a>
    </div>
</form>

<table class="table table-bordered">
    <thead>
        <tr>
            <th>Name</th>
            <th>Subject</th>
            <th>Phone</th>
            <th>Salary</th>
            <th>Groups</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @forelse($teachers as $teacher)
        <tr>
            <td>{{ $teacher->full_name }}</td>
            <td>{{ $teacher->subject_specialization }}</td>
            <td>{{ $teacher->phone }}</td>
            <td>{{ $teacher->salary }} DH</td>
            <td>{{ $teacher->groups_count }}</td>
            <td>
                <a href="{{ route('teachers.edit', $teacher) }}" class="btn btn-warning btn-sm">Edit</a>
                <form action="{{ route('teachers.destroy', $teacher) }}" method="POST" class="d-inline">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger btn-sm">Delete</button>
                </form>
            </td>
        </tr>
        @empty
        <tr>
            <td colspan="6" class="text-center">No teachers found</td>
        </tr>
        @endforelse
    </tbody>
</table>

{{ $teachers->links() }}
@endsection