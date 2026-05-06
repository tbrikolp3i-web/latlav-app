<!DOCTYPE html>
<html>
<head>
    <title>Laporan Produk</title>
    <style>
        body {
            font-family: sans-serif;
        }
        h2 {
            text-align: center;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid black;
            padding: 6px;
            text-align: center;
        }
        img {
            width: 60px;
        }
    </style>
</head>
<body>

<h2>Laporan Data Produk</h2>

<table>
    <tr>
        <th>No</th>
        <th>Gambar</th>
        <th>Nama</th>
        <th>Harga</th>
        <th>Stok</th>
        <th>Deskripsi</th>
    </tr>

    @foreach($products as $index => $p)
    <tr>
        <td>{{ $index + 1 }}</td>

        <td>
            @if($p->gambar)
                <img src="{{ public_path('images/'.$p->gambar) }}">
            @endif
        </td>

        <td>{{ $p->nama }}</td>
        <td>Rp {{ number_format($p->harga) }}</td>
        <td>{{ $p->stok }}</td>
        <td>{{ $p->deskripsi }}</td>
    </tr>
    @endforeach

</table>

</body>
</html>