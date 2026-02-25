<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Teachers List</title>
    <style>
        table { width:100%; border-collapse: collapse; }
        th, td { border:1px solid #000; padding:6px; }
        th { background:#f0f0f0; }
    </style>
</head>
<body>

<h2>Teachers List</h2>

<table>
    <thead>
        <tr>
            <th>Name</th>
            <th>Subject</th>
            <th>Phone</th>
            <th>Salary</th>
            <th>Groups</th>
        </tr>
    </thead>
    <tbody>
        @foreach($teachers as $teacher)
        <tr>
            <td>{{ $teacher->full_name }}</td>
            <td>{{ $teacher->subject_specialization }}</td>
            <td>{{ $teacher->phone }}</td>
            <td>{{ $teacher->salary }} DH</td>
            <td>{{ $teacher->groups_count }}</td>
        </tr>
        @endforeach
    </tbody>
</table>

</body>
</html>