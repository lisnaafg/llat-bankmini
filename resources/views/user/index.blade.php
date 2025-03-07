@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-9">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body p-6"> <!-- Mengurangi padding pada card-body -->
                    @if (Auth::user()->peran == 'admin')
                        <a href="{{ route('home') }}" class="btn btn-warning">Kembali</a>
                        <a href="{{ route('users.create') }}" class="btn btn-primary">Tambah User/Nasabah</a>
                        <br><br>
                        <table class="table table-bordered table-striped">
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
                                        <td class="text-right"> <!-- Menyusun tombol ke kanan -->
                                            <a href="{{ route('users.edit', $u->id) }}" class="btn btn-warning mr-2">Edit</a>
                                            <a href="{{ route('users.delete', $u->id) }}" class="btn btn-danger mr-2" onclick="return confirm('Apakah Anda yakin ingin menghapus pengguna ini?')">Hapus</a>
                                            @if ($u->peran == 'nasabah')
                                                <a href="{{ route('admin.laporan.cetak.pilih', $u->id) }}" class="btn btn-success">Cetak</a>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </br></br>
                    @else
                        <h1>Anda tidak memiliki akses ke halaman ini</h1>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
