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

    /* Form Styling */
    .form-group {
        margin-bottom: 1rem;
    }
    .form-control {
        border-radius: 8px;
        padding: 10px;
        border: 1px solid #A67B5B;
        box-shadow: inset 2px 2px 5px rgba(0, 0, 0, 0.1);
        transition: all 0.3s ease-in-out;
    }
    .form-control:focus {
        border-color: #8B5E3C;
        box-shadow: 0 0 8px rgba(139, 94, 60, 0.5);
    }
    label {
        font-weight: bold;
        color: #5C4033;
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
                <div class="card-header">{{ __('Dashboard') }}</div>
                <div class="card-body">
                    @if (Auth::user()->peran == 'admin')
                        <div class="mb-3 d-flex justify-content-between">
                            <a href="{{ route('home') }}" class="btn btn-warning">Kembali</a>
                            <a href="{{ route('users.create') }}" class="btn btn-primary">Tambah User/Nasabah</a>
                        </div>

                        <form action="{{ route('users.store') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="nik">NIK</label>
                                <input type="text" name="nik" class="form-control" value="{{ old('nik') }}" required>
                                @error('nik')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="name">Nama</label>
                                <input type="text" name="name" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" name="email" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" name="password" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="hp">HP</label>
                                <input type="text" name="hp" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="peran">Peran</label>
                                <select name="peran" class="form-control" required>
                                    <option value="admin">Admin</option>
                                    <option value="teller">Teller</option>
                                    <option value="nasabah" selected>Nasabah</option>
                                </select>
                            </div>
                            <button type="submit" class="btn btn-primary mt-3 w-100">Simpan</button>
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
