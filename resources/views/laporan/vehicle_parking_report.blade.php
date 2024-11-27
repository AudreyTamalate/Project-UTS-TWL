<!DOCTYPE html>
<html>
<head>
    <title>Laporan Kendaraan Terparkir</title>
    <style>
        table { width: 100%; border-collapse: collapse; }
        table, th, td { border: 1px solid black; }
        th, td { padding: 8px; text-align: left; }
    </style>
</head>
<body>
    <h1>Laporan Kendaraan Terparkir</h1>
    <table>
        <thead>
            <tr>
                <th>Vehicle Type</th>
                <th>Plate Number</th>
                <th>Status</th>
                <th>Latitude</th>
                <th>Longitude</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $row)
            <tr>
                <td>{{ $row->vehicle_type }}</td>
                <td>{{ $row->plate_number }}</td>
                <td>{{ $row->status }}</td>
                <td>{{ $row->latitude }}</td>
                <td>{{ $row->longitude }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
