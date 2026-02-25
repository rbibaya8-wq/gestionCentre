<h2>Student List</h2>
<table border="1" cellpadding="5" cellspacing="0">
    <thead>
        <tr>
            <th>Name</th>
            <th>Level</th>
            <th>Phone</th>
            <th>Parent</th>
            <th>Parent Phone</th>
        </tr>
    </thead>
    <tbody>
        @foreach($students as $student)
        <tr>
            <td>{{ $student->first_name }} {{ $student->last_name }}</td>
            <td>{{ $student->level }}</td>
            <td>{{ $student->phone }}</td>
            <td>{{ $student->parent_name }}</td>
            <td>{{ $student->parent_phone }}</td>
        </tr>
        @endforeach
    </tbody>
</table>