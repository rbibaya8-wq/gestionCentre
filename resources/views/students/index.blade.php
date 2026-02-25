@extends('layouts.app')

@section('content')
<h2>Students</h2>
<a href="{{ route('students.create') }}" class="btn btn-success mb-2">Add Student</a>
<a href="{{ route('students.export') }}" class="btn btn-secondary mb-2">Export PDF</a>
<form method="GET" class="row mb-3">

    <div class="col-md-4">
        <input type="text" name="search"
               class="form-control"
               placeholder="Search student..."
               value="{{ request('search') }}">
    </div>

    <div class="col-md-4">
        <select name="group" class="form-control">
            <option value="">All Groups</option>
            @foreach($groups as $group)
                <option value="{{ $group->id }}"
                    {{ request('group') == $group->id ? 'selected' : '' }}>
                    {{ $group->name }}
                </option>
            @endforeach
        </select>
    </div>

    <div class="col-md-4">
        <button class="btn btn-primary">Filter</button>
    </div>

</form>
<table class="table table-bordered">
    <thead>
        <tr>
            <th>Name</th>
            <th>Level</th>
            <th>Phone</th>
            <th>Parent</th>
            <th>Group</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach($students as $student)
        <tr>
            <td>{{ $student->first_name }} {{ $student->last_name }}</td>
            <td>{{ $student->level }}</td>
            <td>{{ $student->phone }}</td>
            <td>{{ $student->parent_name }}</td>
            <td>{{ $student->group->name ?? '-' }}</td>
            <td>
                <a href="{{ route('students.edit', $student) }}" class="btn btn-warning btn-sm">Edit</a>
                <form action="{{ route('students.destroy', $student) }}" method="POST" class="d-inline">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger btn-sm">Delete</button>
                </form>
                <a href="{{ route('students.show', $student->id) }}" class="btn btn-info btn-sm">View</a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection