<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"rel="stylesheet">
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
    <table>
        <tr>
            <th>Nik</th>
            <td>{{ Auth::user()->nik }}</td>
        </tr>
        <tr>
            <th>Nama</th>
            <td>{{ Auth::user()->name }}</td>
        </tr>
        <tr>
            <th>Email</th>
            <td>{{ Auth::user()->email }}</td>
        </tr>
        <tr>
            <th>Saldo</th>
            <td>{{ Auth::user()->transaksi->sum('tabungan') }}</td>
        </tr>
    </table>

    <!-- Perbaiki tag tabble menjadi table -->
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>Tanggal Transaksi</th>
                <th>Nominal</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($semuaTransaksi as $st)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $st->created_at }}</td>
                    <td>{{ $st->tabungan }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

</body>
</html>
