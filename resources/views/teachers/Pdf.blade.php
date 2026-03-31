<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Teachers List</title>

    <style>
        body {
            font-family: DejaVu Sans, sans-serif;
            background: #f4f8ff;
            padding: 30px;
            margin: 0;
        }

        .container {
            background: #ffffff;
            border: 2px solid #1e3a8a;
            border-radius: 8px;
            padding: 25px;
        }

        .header {
            text-align: center;
            border-bottom: 2px solid #1e3a8a;
            padding-bottom: 12px;
            margin-bottom: 20px;
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
            color: #ffffff;
        }

        th {
            padding: 10px;
            font-size: 14px;
            text-align: left;
        }

        td {
            padding: 8px;
            font-size: 13px;
            border-bottom: 1px solid #dbeafe;
        }

        tbody tr:nth-child(even) {
            background: #eff6ff;
        }

        .salary {
            font-weight: bold;
            color: #1d4ed8;
        }

        .groups-badge {
            background: #2563eb;
            color: #fff;
            padding: 4px 8px;
            border-radius: 12px;
            font-size: 11px;
            text-align: center;
            display: inline-block;
        }

        .footer {
            margin-top: 30px;
            font-size: 12px;
            color: #1e3a8a;
            text-align: right;
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
        OFFICIAL STAFF LIST
    </div>

    <div class="header">
        <h2>Teachers List</h2>
        <div class="sub-title">Registered Teaching Staff Overview</div>
    </div>

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
                <td class="salary">{{ number_format($teacher->salary, 2) }} DH</td>
                <td>
                    <span class="groups-badge">
                        {{ $teacher->groups_count }}
                    </span>
                </td>
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