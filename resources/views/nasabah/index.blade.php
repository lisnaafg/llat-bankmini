@extends('layouts.app')

@section('content')
<style>
    /* General Styling */
    body {
        background-color: #F5EFE6;
        font-family: 'Poppins', sans-serif;
        color: #5C4033;
    }

    /* Card Styling */
    .card {
        background: linear-gradient(145deg, #EADBC8, #D4BBA5);
        border-radius: 15px;
        box-shadow: 4px 4px 12px rgba(0, 0, 0, 0.1), -4px -4px 12px rgba(255, 255, 255, 0.5);
        border: none;
    }
    .card-header {
        background: linear-gradient(90deg, #8B5E3C, #A57C58);
        color: white;
        font-size: 1.3rem;
        border-radius: 15px 15px 0 0;
        padding: 15px;
        text-align: center;
        box-shadow: inset 0px -3px 5px rgba(0, 0, 0, 0.1);
    }
    .card-body {
        background-color: #FAF3E0;
        border-radius: 0 0 15px 15px;
        padding: 2rem;
    }

    /* Table Styling */
    .table {
        border-radius: 10px;
        overflow: hidden;
        background: white;
    }
    .table thead {
        background-color: #A67B5B;
        color: white;
    }
    .table tbody tr:hover {
        background-color: #F5F5DC;
        transition: all 0.2s ease-in-out;
    }
    .table th, .table td {
        padding: 12px;
        text-align: center;
        vertical-align: middle;
        border: 1px solid #D4BBA5;
    }

    /* Info Table Styling */
    .info-table {
        width: 100%;
        margin-bottom: 1rem;
    }
    .info-table th {

        color: rgb(111, 60, 32);
        padding: 12px;
        width: 30%;
        text-align: left;
        border-radius: 5px;
    }
    .info-table td {
        background: #FAF3E0;
        padding: 12px;
        border-radius: 5px;
    }

    /* Button Styling */
    .btn {
        padding: 10px 15px;
        border-radius: 8px;
        font-size: 0.95rem;
        transition: all 0.3s ease-in-out;
        box-shadow: 2px 2px 5px rgba(0, 0, 0, 0.2);
    }
    .btn:hover {
        transform: translateY(-3px);
        box-shadow: 3px 3px 8px rgba(0, 0, 0, 0.3);
    }
    .btn-warning {
        background: linear-gradient(145deg, #F3BC93, #E8A87C);
        color: white;
    }
    .btn-primary {
        background: linear-gradient(145deg, #B3D1DF, #87BFD3);
        color: white;
    }

    /* Responsiveness */
    @media (max-width: 768px) {
        .card-body {
            padding: 1.5rem;
        }
        .btn {
            width: 100%;
            margin-bottom: 5px;
        }
    }
</style>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Beranda Nasabah') }}</div>
                <div class="card-body">
                    @if (Auth::user()->peran == 'nasabah')
                        <div class="mb-3 d-flex justify-content-between">
                            <a href="{{ route('home') }}" class="btn btn-warning">Kembali</a>
                            <a href="{{ route('nasabah.cetak') }}" class="btn btn-primary" target="_blank">Cetak Laporan Nasabah</a>
                        </div>

                        <table class="info-table">
                            <tr>
                                <th>NIK</th>
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
                                <td>Rp {{ number_format(Auth::user()->transaksi->sum('tabungan'), 0, ',', '.') }}</td>
                            </tr>
                        </table>

                        <h4 class="mt-4 mb-3 text-center text-secondary">Riwayat Transaksi</h4>
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
                                        <td>{{ date('d-m-Y', strtotime($st->created_at)) }}</td>
                                        <td>Rp {{ number_format($st->tabungan, 0, ',', '.') }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @else
                        <h1 class="text-danger text-center">Anda tidak memiliki akses ke halaman ini</h1>
                        <div class="text-center mt-3">
                            <a href="{{ route('home') }}" class="btn btn-warning">Kembali</a>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
