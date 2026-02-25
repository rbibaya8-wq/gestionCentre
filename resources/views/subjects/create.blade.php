@extends('layouts.app')

@section('content')
<h2>Add Subject</h2>

<form action="{{ route('subjects.store') }}" method="POST">
    @csrf
    <div class="mb-3">
        <label>Subject Name</label>
        <input type="text" name="name" class="form-control" required>
    </div>
    <button class="btn btn-primary">Save</button>
</form>
@endsection