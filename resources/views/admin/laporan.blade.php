<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        table{
            width: 100%;
            border-collapse: collapse;
        }
        td,
        th{
            border: 1px solid rgb(120, 225, 155);
            padding: 8px;
        }
    </style>
</head>
<body>
    <table class="table">
        <tr>
            <th>NO</th>
            <th>Tanggal Transaksi</th>
            <th>Nasabah</th>
            <th>Nominal</th>

        </tr>
        @foreach ($semuaTransaksi as $st)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $st->created_at }}</td>
                <td>{{ $st->user->name }}</td>
                <td>{{ $st->tabungan }}</td>
            </tr>
        @endforeach
    </table>
</body>
</html>
