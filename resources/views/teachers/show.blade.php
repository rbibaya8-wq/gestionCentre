@extends('layouts.app')

@section('content')
<h2>{{ $teacher->first_name }} {{ $teacher->last_name }}</h2>
<p>Subject: {{ $teacher->subject_specialization }}</p>
<p>Phone: {{ $teacher->phone }}</p>
<p>Salary: {{ $teacher->salary }}</p>

<h4>Groups Assigned</h4>
<ul>
    @foreach($teacher->groups as $group)
    <li>{{ $group->name }} ({{ $group->level }})</li>
    @endforeach
</ul>
@endsection