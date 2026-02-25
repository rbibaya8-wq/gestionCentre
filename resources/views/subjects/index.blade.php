@extends('layouts.app')

@section('content')
<h2>Subjects</h2>
<form action="{{ route('subjects.store') }}" method="POST" class="mb-3">
    @csrf
    <div class="input-group">
        <input type="text" name="name" placeholder="Subject Name" class="form-control" required>
        <button class="btn btn-primary">Add</button>
    </div>
</form>

<table class="table table-bordered">
    <thead>
        <tr>
            <th>Name</th>
            <th>Groups Count</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach($subjects as $subject)
        <tr>
            <td>{{ $subject->name }}</td>
            <td>{{ $subject->groups_count }}</td>
            <td>
                <form action="{{ route('subjects.destroy', $subject) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger btn-sm">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

{{ $subjects->links() }}
@endsection