<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Parkir</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #fff;
        }
        .container {
            padding: 20px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        table, th, td {
            border: 1px solid black;
        }
        th, td {
            padding: 8px 12px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
        h1 {
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Laporan Parkir</h1>
        <table>
            <thead>
                <tr>
                    <th>Vehicle Type</th>
                    <th>Initial Entry Amount</th>
                    <th>Capacity</th>
                    <th>Latitude</th>
                    <th>Longitude</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $row)
                <tr>
                    <td>{{ $row->vehicle_type }}</td>
                    <td>{{ $row->initial_entry_amount }}</td>
                    <td>{{ $row->capacity }}</td>
                    <td>{{ $row->latitude }}</td>
                    <td>{{ $row->longitude }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>
