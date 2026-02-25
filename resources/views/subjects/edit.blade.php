@extends('layouts.app')

@section('content')
<h2>Edit Subject</h2>

<form action="{{ route('subjects.update', $subject) }}" method="POST">
    @csrf
    @method('PUT')
    <div class="mb-3">
        <label>Subject Name</label>
        <input type="text" name="name" value="{{ $subject->name }}" class="form-control" required>
    </div>
    <button class="btn btn-primary">Update</button>
</form>
@endsection