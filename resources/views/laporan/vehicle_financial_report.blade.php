<!DOCTYPE html>
<html>
<head>
    <title>Laporan Keuangan Kendaraan</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid black;
        }
        th, td {
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <h1>Laporan Keuangan Kendaraan</h1>
    <table>
        <thead>
            <tr>
                <th>Vehicle Type</th>
                <th>Plate Number</th>
                <th>Initial Entry Fee</th>
                <th>Increment Fee</th>
                <th>Max Flat Amount</th>
                <th>Transaction Amount</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $row)
            <tr>
            <td>{{ $row->vehicle_type }}</td>
            <td>{{ $row->plate_number }}</td>
                <td>{{ $row -> initial_entry_amount }}</td>
                <td>{{ $row -> increment }}</td>
                <td>{{ $row -> max_flat_amount }}</td>
                <td>{{ $row -> amount }}</td>
                <td>{{ $row -> status }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
