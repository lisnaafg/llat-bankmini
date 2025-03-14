@extends('layouts.app')

@section('content')
<style>
    .table thead {
        background-color: #a67b5b;
        color: white;
    }
    .table tbody tr:hover {
        background-color: #f5f5dc;
    }
    .card-header {
        background-color: #8b5e3c;
        color: white;
        font-weight: bold;
    }
    .card-body {
        background-color: #f8f1e3;
    }
    .btn {
        padding: 10px 15px;
        border-radius: 8px;
        margin-right: 5px;
    }
</style>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>
                <div class="card-body p-4">
                    @if (Auth::user()->peran == 'admin')
                        <div class="mb-3 d-flex justify-content-between">
                            <a href="{{ route('home') }}" class="btn btn-warning" style="background:#f3bc93">Kembali</a>
                            <a href="{{ route('users.create') }}" class="btn btn-primary" style="background:#b3d1df">Tambah User/Nasabah</a>
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
                                            <div class="d-flex justify-content-start gap-2">
                                                <a href="{{ route('users.edit', $u->id) }}" class="btn btn-warning" style="background:#f8cba9">Edit</a>
                                                <a href="{{ route('users.delete', $u->id) }}" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus pengguna ini?')" style="background:#ff7309">Hapus</a>
                                                @if ($u->peran == 'nasabah')
                                                    <a href="{{ route('admin.laporan.cetak.pilih', $u->id) }}" class="btn btn-success" style="background:#c0936d">Cetak</a>
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
