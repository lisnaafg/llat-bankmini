@extends('layouts.app')

@section('content')
<style>

    .card-header {
        background-color: #8b5e3c;
        color: white;
        font-weight: bold;
    }
    .card-body {
        background-color: #f8f1e3;
        padding: 20px;
    }
    .btn {
        padding: 10px 15px;
        border-radius: 8px;
        margin-right: 5px;
    }
    .form-group label {
        font-weight: bold;
        color: #5a3e1b;
    }
    .form-control {
        border-radius: 6px;
        border: 1px solid #a67b5b;
    }
</style>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header text-center">{{ __('Dashboard') }}</div>
                <div class="card-body">
                    @if (Auth::user()->peran == 'admin')
                        <div class="mb-3 d-flex justify-content-between">
                            <a href="{{ route('home') }}" class="btn btn-warning" style="background: #ffc57e">Kembali</a>
                            <a href="{{ route('users.create') }}" class="btn btn-primary" style="background: #5a3e1b">Tambah User</a>
                        </div>
                        <form action="{{ route('users.update', $edit->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="form-group mb-3">
                                <label for="nik">NIK</label>
                                <input type="text" name="nik" class="form-control" value="{{ $edit->nik }}" required>
                                @error('nik')<span class="text-danger">{{ $message }}</span>@enderror
                            </div>
                            <div class="form-group mb-3">
                                <label for="name">Nama</label>
                                <input type="text" name="name" class="form-control" value="{{ $edit->name }}" required>
                            </div>
                            <div class="form-group mb-3">
                                <label for="email">Email</label>
                                <input type="email" name="email" class="form-control" value="{{ $edit->email }}" required>
                            </div>
                            <div class="form-group mb-3">
                                <label for="password">Password</label>
                                <input type="password" name="password" class="form-control" value="{{ $edit->password }}" required>
                            </div>
                            <div class="form-group mb-3">
                                <label for="hp">HP</label>
                                <input type="text" name="hp" class="form-control" value="{{ $edit->hp }}" required>
                            </div>
                            <div class="form-group mb-3">
                                <label for="peran">Peran</label>
                                <select name="peran" class="form-control" required>
                                    <option @if ($edit->peran == 'admin') selected @endif value="admin">Admin</option>
                                    <option @if ($edit->peran == 'teller') selected @endif value="teller">Teller</option>
                                    <option @if ($edit->peran == 'nasabah') selected @endif value="nasabah">Nasabah</option>
                                </select>
                            </div>
                            <div class="text-end">
                                <button type="submit" class="btn btn-success"  style="background: #e0a966">Simpan</button>
                            </div>
                        </form>
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
