<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Transaksi</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid #ddd;
            text-align: center;
            padding: 8px;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <h2 style="text-align: center;">Laporan Transaksi</h2>
    <table>
        <thead>
            <tr>
                <th>No.</th>
                <th>Waktu</th>
                <th>Nama Produk</th>
                <th>Kategori</th>
                <th>Tipe Transaksi</th>
                <th>Kuantitas</th>
                <th>Harga</th>
                <th>Status</th>
                <th>Catatan</th>
            </tr>
        </thead>
        <tbody>
            @foreach($laptrans as $index => $lapt)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ \Carbon\Carbon::parse($lapt->updated_at)->locale('id')->translatedFormat('d F Y, H:i') }}</td>
                <td>{{ $lapt->product->name }}</td>
                <td>{{ $lapt->product->category->name }}</td>
                <td>{{ $lapt->type }}</td>
                <td>{{ $lapt->quantity }}</td>
                <td>Rp. {{ number_format($lapt->total_price, 2, ',', '.') }}</td>
                <td>{{ $lapt->status }}</td>
                <td>{{ $lapt->notes }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>