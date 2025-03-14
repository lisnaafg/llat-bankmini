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
        vertical-align: middle;
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
    .btn-danger {
        background: linear-gradient(145deg, #FF7309, #E85A00);
        color: white;
    }
    .btn-success {
        background: linear-gradient(145deg, #C0936D, #A67B5B);
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
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>
                <div class="card-body">
                    @if (Auth::user()->peran == 'admin')
                        <div class="mb-3 d-flex justify-content-between">
                            <a href="{{ route('home') }}" class="btn btn-warning">Kembali</a>
                            <a href="{{ route('users.create') }}" class="btn btn-primary">Tambah User/Nasabah</a>
                        </div>
                        <table class="table table-bordered table-striped text-center">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>NIK</th>
                                    <th>Nama</th>
                                    <th>Email</th>
                                    <th>Hp</th>
                                    <th>Peran</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $u)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $u->nik }}</td>
                                        <td>{{ $u->name }}</td>
                                        <td>{{ $u->email }}</td>
                                        <td>{{ $u->hp }}</td>
                                        <td>{{ $u->peran }}</td>
                                        <td>
                                            <div class="d-flex justify-content-center gap-2">
                                                <a href="{{ route('users.edit', $u->id) }}" class="btn btn-warning">Edit</a>
                                                <a href="{{ route('users.delete', $u->id) }}" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus pengguna ini?')">Hapus</a>
                                                @if ($u->peran == 'nasabah')
                                                    <a href="{{ route('admin.laporan.cetak.pilih', $u->id) }}" class="btn btn-success">Cetak</a>
                                                @endif
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @else
                        <h1 class="text-danger text-center">Anda tidak memiliki akses ke halaman ini</h1>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
