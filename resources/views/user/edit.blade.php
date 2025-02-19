@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>


                <div class="card-body">
                    @if (Auth::user()->peran == 'admin')
                        <a href="{{ route('home') }}" class="btn btn-warning">kembali</a>
                        <a href="{{ route('users.create') }}" class="btn btn-primary">Edit User</a>
                        <form action="{{route('users.update', $edit->id)}}" method="POST">

                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="nik">nik</label>
                            <input type="text" name="nik" class="form-control" value="{{ $edit->nik }}" required>
                            @error('nik')
                                <span class="text-danger">{{ $message }}</span>

                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="name">Nama</label>
                            <input type="text" name="name" class="form-control" value="{{ $edit->name }}" required>
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="text" name="email" class="form-control" value="{{ $edit->email }}" required>
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" name="password" class="form-control" value="{{ $edit->password }}"  required>
                        </div>
                        <div class="form-group">
                            <label for="hp">HP</label>
                            <input type="text" name="hp" class="form-control" value="{{ $edit->hp }}" required>
                        </div>
                        <div class="form-group">
                            <label for="peran">Peran</label>
                                <select name="peran" class="form-control" value="{{ $edit->peran }}" required>
                                    <option @if ($edit->peran == 'admin') selected @endif value="admin">Admin</option>
                                    <option @if ($edit->peran == 'teller') selected @endif value="teller">Teller</option>
                                    <option @if ($edit->peran == 'nasabah') selected @endif value="nasabah">Nasabah</option>
                                </select>
                        </div>
                        <button type="submit" class="btn btn-primary mt-3">Simpan</button>
                     </form>
                    @else
                        <h1> Anda tidak memiliki akses ke halaman ini</h1>
                        <a href="{{ route('home') }}" class=btn btn-warning></a>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
