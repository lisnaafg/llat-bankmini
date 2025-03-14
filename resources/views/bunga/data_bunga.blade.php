<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Bunga</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script> <!-- SweetAlert -->
    <style>
        /* Warna dasar */
        body {
            background-color: #F5EFE6;
            color: #5C4033;
            font-family: 'Arial', sans-serif;
        }
        .container {
            background: #E8D8C4;
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0px 4px 12px rgba(0, 0, 0, 0.15);
        }
        h3 {
            font-weight: bold;
            color: #8B5E3C;
            text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.1);
        }

        /* Tabel */
        .table {
            text-align: center;
            vertical-align: middle;
            border-color: #8B5E3C;
        }
        .table-light {
            background-color: #DFC8B5 !important;
            font-weight: bold;
        }
        .table-striped tbody tr:nth-of-type(odd) {
            background-color: #F0E0D6;
        }
        .table-hover tbody tr:hover {
            background-color: #E5C9B5 !important;
            transition: 0.3s ease-in-out;
        }

        /* Warna Header (th) */
        thead th {
            background-color: #8B5E3C !important; /* Coklat tua */
            color: white !important; /* Teks putih */
            font-weight: bold;
            text-transform: uppercase;
            padding: 12px;
        }
        thead th:hover {
            background-color: #5C4033 !important; /* Lebih gelap saat hover */
            transition: 0.3s ease-in-out;
        }

        /* Tombol */
        .btn-brown {
            background-color: #8B5E3C;
            color: white;
            border-radius: 8px;
            padding: 10px 15px;
        }
        .btn-brown:hover {
            background-color: #5C4033;
        }
    </style>
</head>
<body>

<div class="container mt-4">
    <h3 class="text-center"><i class="bi bi-cash-coin"></i> Data Bunga</h3>

    <a href="{{ url()->previous() }}" class="btn btn-brown mb-3 shadow-sm">
        <i class="bi bi-arrow-left"></i> Kembali
    </a>

    <table class="table table-bordered table-striped table-hover">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Nasabah</th>
                <th>Tabungan</th>
                <th>Bunga</th>
                <th>Tanggal</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($transaksis as $t)
                @php
                    $totalBunga = $t->bungaHistories->sum('bunga');
                    if ($t->bungaHistories->isEmpty()) {
                        $totalBunga = $t->tabungan * 0.02;
                    }
                @endphp
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $t->user->name }}</td>
                    <td>Rp {{ number_format($t->tabungan, 0, ',', '.') }}</td>
                    <td>Rp {{ number_format($totalBunga, 0, ',', '.') }}</td>
                    <td>{{ now()->format('Y-m-d') }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

<!-- SweetAlert -->
<script>
    document.addEventListener("DOMContentLoaded", function () {
        @if(session('success'))
            Swal.fire({
                icon: 'success',
                title: 'Berhasil!',
                html: {!! json_encode(session("success")) !!},
                confirmButtonColor: '#8B5E3C'
            });
        @endif

        @if(session('error'))
            Swal.fire({
                icon: 'error',
                title: 'Gagal!',
                html: {!! json_encode(session("error")) !!},
                confirmButtonColor: '#D33'
            });
        @endif
    });
</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
