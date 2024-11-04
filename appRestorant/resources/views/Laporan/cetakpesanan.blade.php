<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Pesanan</title>
    <style>
        body { font-family: Arial, sans-serif; }
        table { width: 100%; border-collapse: collapse; }
        th, td { padding: 8px; text-align: left; border: 1px solid #ddd; }
    </style>
</head>
<body>
    <h2>Laporan Pesanan</h2>
    <table>
        <thead>
            <tr>
                <th>Nomor Meja</th>
                <th>Nama Pelanggan</th>
                <th>Nama Menu</th>
                <th>Kuantitas</th>
                <th>Harga Menu</th>
                <th>Harga Total</th>
                <th>Status Pesanan</th>
            </tr>
        </thead>
        <tbody>
            @foreach($data as $row)
            <tr>
                    <td>{{ $row->table_number }}</td>
                    <td>{{ $row->name }}</td>
                    <td>{{ $row->menu_name }}</td>
                    <td>{{ $row->quantity }}</td>
                    <td>{{ $row->price }}</td>
                    <td>{{ $row->total_price }}</td>
                    <td>{{ $row->status }}</td>
                </tr>
            @endforeach

        </tbody>
    </table>
</body>
</html>
