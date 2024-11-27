<!DOCTYPE html>
<html>
<head>
    <title>Laporan Aktifitas</title>
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
    <h1>Laporan Aktifitas</h1>
    <table>
        <thead>
            <tr>
                <th>Vehicle Type</th>
                <th>Plate Number</th>
                <th>Check-In Time</th>
                <th>Transaction Time</th>
                <th>Transaction Amount</th>
                <th>Transaction Status</th>
                <th>Payment Amount</th>
                <th>Payment Status</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $row)
            <tr>
                <td>{{ $row->vehicle_type }}</td>
                <td>{{ $row->plate_number }}</td>
                <td>{{ $row->check_in_at }}</td>
                <td>{{ $row->transaction_at }}</td>
                <td>{{ $row->transaction_amount }}</td>
                <td>{{ $row->transaction_status }}</td>
                <td>{{ $row->payment_amount }}</td>
                <td>{{ $row->payment_status }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
