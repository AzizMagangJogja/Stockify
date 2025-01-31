<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Aktivitas User</title>
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
    <h2 style="text-align: center;">Laporan Aktivitas User</h2>
    <table>
        <thead>
            <tr>
                <th>No.</th>
                <th>Nama</th>
                <th>Tanggal</th>
                <th>Jam</th>
                <th>Aktivitas</th>
                <th>Keterangan</th>
            </tr>
        </thead>
        <tbody>
            @foreach($useractivity as $index => $usav)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ $usav->user->name }}</td>
                <td>{{ \Carbon\Carbon::parse($usav->updated_at)->locale('id')->translatedFormat('d F Y') }}</td>
                <td>{{ \Carbon\Carbon::parse($usav->updated_at)->timezone('Asia/Jakarta')->format('H:i') }}</td>
                <td>{{ $usav->action }}</td>
                <td>{{ $usav->activity }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>