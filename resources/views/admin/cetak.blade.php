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
    @if($nasabah)  <!-- Ensure $nasabah exists -->
    <table>
            <tr>
                <th>Nama</th>
                <td>{{ $nasabah->name }}</td>
            </tr>
            <tr>
                <th>Nik</th>
                <td>{{ $nasabah->nik }}</td>
            </tr>
            <tr>
                <th>Email</th>
                <td>{{ $nasabah->email }}</td>
            </tr>
            <tr>
                <th>Saldo</th>
                <td>
                    @if($nasabah->transaksi->count() > 0)
                        {{ $nasabah->transaksi->sum('tabungan') }}
                    @else
                        0
                    @endif
                </td>
            </tr>
    </table>

    <h1> Detail Transaksi Nasabah </h1>
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
    @else
        <p>Nasabah not found</p>
    @endif
</body>
</html>
