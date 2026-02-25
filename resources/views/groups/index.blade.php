@extends('layouts.app')

@section('content')
<h2>Groups</h2>
<form method="GET" class="row mb-3">
    <div class="col-md-4">
        <input type="text"
               name="name"
               class="form-control"
               placeholder="Search by group name"
               value="{{ request('name') }}">
    </div>

    <div class="col-md-4">
        <select name="level" class="form-control">
            <option value="">-- All Levels --</option>
            @foreach($levels as $level)
                <option value="{{ $level }}"
                    {{ request('level') == $level ? 'selected' : '' }}>
                    {{ $level }}
                </option>
            @endforeach
        </select>
    </div>

    <div class="col-md-4">
        <button class="btn btn-primary">Filter</button>
        <a href="{{ route('groups.index') }}" class="btn btn-secondary">Reset</a>
    </div>
</form>
<a href="{{ route('groups.create') }}" class="btn btn-success mb-2">Add Group</a>
<table class="table table-bordered">
    <thead>
        <tr>
            <th>Name</th>
            <th>Subject</th>
            <th>Teacher</th>
            <th>Level</th>
            <th>Schedule</th>
            <th>Students</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach($groups as $group)
        <tr>
            <td>{{ $group->name }}</td>
            <td>{{ $group->subject->name ?? '-' }}</td>
            <td>{{ $group->teacher->full_name ?? '-' }}</td>
            <td>{{ $group->level }}</td>
            <td>{{ $group->schedule }}</td>
            <td>{{ $group->students_count }}</td>
            <td>
                <a href="{{ route('groups.show', $group) }}" class="btn btn-info btn-sm">View</a>
                <a href="{{ route('groups.edit', $group) }}" class="btn btn-warning btn-sm">Edit</a>
                <form action="{{ route('groups.destroy', $group) }}" method="POST" class="d-inline">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger btn-sm">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
{{ $groups->links() }}
@endsection