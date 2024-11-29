<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Keuangan Per Hari</title>
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
        .total-revenue {
            font-weight: bold;
        }
    </style>
</head>
<body>
    <h1>Laporan Keuangan Per Hari</h1>
    
    @foreach ($totalsPerDay as $total)
        <h3>Total Pendapatan untuk Tanggal: {{ $total->transaction_date }}</h3>

        <table>
            <thead>
                <tr>
                    <th>Tipe Kendaraan</th>
                    <th>Nomor Plat</th>
                    <th>Jumlah Transaksi</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $row)
                    @if ($row->transaction_date == $total->transaction_date)
                        <tr>
                            <td>{{ $row->vehicle_type }}</td>
                            <td>{{ $row->plate_number }}</td>
                            <td>{{ number_format($row->amount, 0, ',', '.') }}</td>
                            <td>{{ $row->status }}</td>
                        </tr>
                    @endif
                @endforeach
            </tbody>
        </table>

        <div class="total-revenue">
            <p>Total Pendapatan untuk Tanggal {{ $total->transaction_date }}: {{ number_format($total->total_revenue, 0, ',', '.') }}</p>
        </div>

        <br><br>
    @endforeach

</body>
</html>
