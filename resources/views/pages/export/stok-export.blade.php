<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Stok Barang</title>
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
    <h2 style="text-align: center;">Laporan Stok Barang</h2>
    <table>
        <thead>
            <tr>
                <th>No.</th>
                <th>Foto</th>
                <th>Nama Produk</th>
                <th>SKU</th>
                <th>Kuantitas</th>
                <th>Stok Masuk</th>
                <th>Stok Keluar</th>
            </tr>
        </thead>
        <tbody>
            @foreach($lapstok as $index => $laps)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>
                    @if ($laps->image)
                        <img src="{{ public_path('storage/' . $laps->image) }}" alt="{{ $laps->name }}" style="width: 50px; height: 50px; object-fit: cover;">
                    @else
                        Tidak Ada Foto
                    @endif
                </td>
                <td>{{ $laps->name }}</td>
                <td>{{ $laps->sku }}</td>
                <td>{{ $laps->quantity - $laps->minimum_stock }}</td>
                <td>
                    @php
                        $masuk = $laps->masuk ?? 0;
                    @endphp
                    @if ($masuk > 0)
                        +{{ $masuk }}
                    @else
                        -
                    @endif
                </td>
                <td>
                    @php
                        $keluar = $laps->keluar ?? 0;
                    @endphp
                    @if ($keluar > 0)
                        -{{ $keluar }}
                    @else
                        -
                    @endif
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>