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
            border: 1px solid salmon;
            padding: 8px;
        }
    </style>
</head>
<body>
    <h1> Detail Nasabah </h1>
    <table>
        <tr>
            <th>Nama</th>
            <td>{{Auth::user()->nama}}</td>
        </tr>
        <tr>
            <th>Nik</th>
            <td>{{Auth::user()->nik}}</td>
        </tr>
        <tr>
            <th>Email</th>
            <td>{{Auth::user()->email}}</td>
        </tr>
        <tr>
            <th>Saldo</th>
            <td>{{Auth::user()->transaksi->sum('tabungan') }}</td>
        </tr>
    </table>
    <table class="table table-bordered">
        <tr>
            <th>No</th>
            <th>Tanggal Transaksi</th>
            <th>Nominal</th>
        </tr>
        @foreach ($semuaTrans as $st)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $st->created_at }}</td>
                <td>{{ $st->tabungan }}</td>
            </tr>
        @endforeach
    </table>

</body>
</html>
