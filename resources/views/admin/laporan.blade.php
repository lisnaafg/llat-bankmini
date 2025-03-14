<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
       <style>
        /* Global Styles */
        body {
            font-family: 'Poppins', sans-serif;
            margin: 20px;
            color: #333;
        }

        /* Table Styling */
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            background-color: #fff;
        }

        th, td {
            border: 1px solid #81C784;
            padding: 10px;
            text-align: left;
        }

        /* Table Header */
        th {
            background: linear-gradient(120deg, #66BB6A, #43A047);
            color: white;
            text-transform: uppercase;
            font-weight: bold;
        }

        /* Alternating Row Color */
        tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        /* Title */
        .title {
            text-align: center;
            font-size: 1.5rem;
            font-weight: bold;
            margin-bottom: 20px;
            color: #388E3C;
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
