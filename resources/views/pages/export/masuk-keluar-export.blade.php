<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Barang Masuk & Keluar</title>
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
    <h2 style="text-align: center;">Laporan Barang Masuk & Keluar</h2>
    <table>
        <thead>
            <tr>
                <th>No.</th>
                <th>Tanggal</th>
                <th>Nama Produk</th>
                <th>SKU</th>
                <th>Tipe Transaksi</th>
                <th>Stok Awal</th>
                <th>Stok Masuk</th>
                <th>Stok Keluar</th>
                <th>Stok Saat Ini</th>
                <th>Status</th>
                <th>Catatan</th>
            </tr>
        </thead>
        <tbody>
            @foreach($lapbarang as $index => $lapb)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ \Carbon\Carbon::parse($lapb->updated_at)->locale('id')->translatedFormat('d F Y, H:i') }}</td>
                <td>{{ $lapb->product->name }}</td>
                <td>{{ $lapb->product->sku }}</td>
                <td>{{ $lapb->type }}</td>
                <td>{{ $lapb->product->minimum_stock }}</td>
                <td>{{ $lapb->stok_masuk }}</td>
                <td>{{ $lapb->stok_keluar }}</td>
                <td>{{ $lapb->product->quantity - $lapb->product->minimum_stock }}</td>
                <td>{{ $lapb->status }}</td>
                <td>{{ $lapb->notes }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>