@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Beranda Nasabah') }}</div>


                <div class="card-body">
                    @if (Auth::user()->peran == 'admin')
                        <a href="{{ route('home') }}" class="btn btn-warning">kembali</a>
                        <a href="" class="btn btn-primary">Cetak laporan Nasabah</a>
                        <br>
                        <br>
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
                                        <td>
                                            <a href="{{ route('users.edit', $u->id)}}" class="btn btn-warning">Edit</a>
                                            <a href="{{ route('users.delete',$u->id )}}" class="btn btn-danger">Hapus</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>

                    </br></br>
                    @else
                        <h1> Anda tidak memiliki akses ke halaman ini</h1>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
