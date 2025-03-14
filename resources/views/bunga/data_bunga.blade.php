<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Bunga</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script> <!-- SweetAlert -->
    <style>
        body {
            background-color: #F5EFE6;
            color: #5C4033;
            font-family: 'Arial', sans-serif;
        }
        .container {
            background: #E8D8C4;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        }
        .table {
            text-align: center;
            vertical-align: middle;
            border-color: #8B5E3C;
        }
        .table-light {
            background-color: #DFC8B5 !important;
        }
        .table-secondary td {
            font-weight: bold;
            background-color: #C8A888 !important;
            color: white;
        }
        .btn-light {
            background-color: #B08968;
            color: white;
            border: none;
        }
        .btn-light:hover {
            background-color: #8B5E3C;
        }
    </style>
</head>
<body>

<div class="container mt-4">
    <h3 class="text-center">Data Bunga</h3>

    <a href="{{ url()->previous() }}" class="btn btn-light mb-3">← Kembali</a>

    <table class="table table-bordered">
        <thead class="table-light">
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
                    // Jika bungaHistories kosong, hitung bunga berdasarkan tabungan (misalnya 2% per bulan)
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
