
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Bunga</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script> <!-- SweetAlert -->
    <style>
        .table {
            text-align: center;
            vertical-align: middle;
        }
        .table-secondary td {
            font-weight: bold;
            background-color: #f8f9fa !important;
        }
    </style>
</head>
<body>

<div class="container mt-4">
    <h3>Data Bunga</h3>

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
                @endphp
                <tr>
                    <td rowspan="{{ $t->bungaHistories->count() + 2 }}">{{ $loop->iteration }}</td>
                    <td rowspan="{{ $t->bungaHistories->count() + 2 }}">{{ $t->user->name }}</td>
                    <td rowspan="{{ $t->bungaHistories->count() + 2 }}">Rp {{ number_format($t->tabungan, 0, ',', '.') }}</td>
                </tr>
                @foreach ($t->bungaHistories as $history)
                    <tr>
                        <td>Rp {{ number_format($history->bunga, 0, ',', '.') }}</td>
                        <td>{{ $history->tanggal }}</td>
                    </tr>
                @endforeach
                <tr class="table-secondary">
                    <td colspan="2"><b>Total Bunga: Rp {{ number_format($totalBunga, 0, ',', '.') }}</b></td>
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
                confirmButtonColor: '#3085d6'
            });
        @endif

        @if(session('error'))
            Swal.fire({
                icon: 'error',
                title: 'Gagal!',
                html: {!! json_encode(session("error")) !!},
                confirmButtonColor: '#d33'
            });
        @endif
    });
</script>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
