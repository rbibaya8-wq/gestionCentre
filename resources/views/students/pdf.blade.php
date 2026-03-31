<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <style>
        body {
            font-family: DejaVu Sans, sans-serif;
            background: #f4f8ff;
            margin: 0;
            padding: 30px;
        }

        .container {
            background: #ffffff;
            border: 2px solid #1e3a8a;
            border-radius: 8px;
            padding: 25px;
        }

        .header {
            text-align: center;
            margin-bottom: 25px;
            border-bottom: 2px solid #1e3a8a;
            padding-bottom: 10px;
        }

        .header h2 {
            margin: 0;
            color: #1e3a8a;
            font-size: 24px;
            letter-spacing: 1px;
        }

        .sub-title {
            color: #2563eb;
            font-size: 13px;
            margin-top: 5px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 15px;
        }

        thead {
            background: #1e3a8a;
            color: white;
        }

        th {
            padding: 10px;
            font-size: 14px;
            text-align: left;
        }

        td {
            padding: 8px;
            border-bottom: 1px solid #dbeafe;
            font-size: 13px;
        }

        tbody tr:nth-child(even) {
            background: #eff6ff;
        }

        tbody tr:hover {
            background: #dbeafe;
        }

        .footer {
            margin-top: 30px;
            text-align: right;
            font-size: 12px;
            color: #1e3a8a;
        }

        .badge {
            position: absolute;
            top: 30px;
            right: 40px;
            background: #2563eb;
            color: white;
            padding: 6px 12px;
            font-size: 11px;
            border-radius: 20px;
        }
    </style>
</head>
<body>

<div class="container">

    <div class="badge">
        OFFICIAL DOCUMENT
    </div>

    <div class="header">
        <h2>Student List</h2>
        <div class="sub-title">Registered Students Overview</div>
    </div>

    <table>
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

    <div class="footer">
        Generated on: {{ now()->format('d/m/Y') }}
    </div>

</div>

</body>
</html>