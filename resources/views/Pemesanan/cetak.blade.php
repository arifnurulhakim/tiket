<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <style>
        /* Gaya CSS untuk PDF */
        body {
            font-family: Arial, sans-serif;
        }
        h1 {
            font-size: 18px;
            text-align: center;
            margin-bottom: 20px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            padding: 8px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
    </style>
</head>
<body>
    <h1>Nota Pemesanan</h1>

    <table>
        <thead>
            <tr>
                <th>No.</th>
                <th>Kode Pemesanan</th>
                <th>Atas Nama</th>
                <th>Tanggal</th>
                <th>Kupon</th>
                <th>Quantity</th>
              
            </tr>
        </thead>
        <tbody>
            @foreach ($kode_pemesanan_data as $key => $item)
                <tr>
                    <td>{{ $key + 1 }}</td>
                    <td>{{ $item->kode_pemesanan }}</td>
                    <td>{{ $item->nama }}</td>
                    <td>{{ $item->tanggal_kunjungan }}</td>
                    <td>{{ $item->nama_kupon }}</td>
                    <td>{{ $item->quantity }}</td>
Quantity
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
