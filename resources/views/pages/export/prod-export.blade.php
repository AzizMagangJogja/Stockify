<!DOCTYPE html>
<html>
<head>
    <title>Data Produk</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid black;
            text-align: center;
            padding: 8px;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <h2 style="text-align: center;">Data Produk</h2>
    <table>
        <thead>
            <tr>
                <th>Foto</th>
                <th>Nama</th>
                <th>SKU</th>
                <th>Kategori</th>
                <th>Supplier</th>
                <th>Deskripsi</th>
                <th>Harga Beli</th>
                <th>Harga Jual</th>
            </tr>
        </thead>
        <tbody>
            @foreach($products as $prod)
            <tr>
                <td>
                    @if ($prod->image)
                        <img src="{{ public_path('storage/' . $prod->image) }}" alt="{{ $prod->name }}" style="width: 50px; height: 50px; object-fit: cover;">
                    @else
                        Tidak Ada Foto
                    @endif
                </td>
                <td>{{ $prod->name }}</td>
                <td>{{ $prod->sku }}</td>
                <td>{{ $prod->supplier->name }}</td>
                <td>{{ $prod->category->name }}</td>
                <td>{{ $prod->description }}</td>
                <td>Rp. {{ number_format($prod->purchase_price, 2, ',', '.') }}</td>
                <td>Rp. {{ number_format($prod->selling_price, 2, ',', '.') }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>