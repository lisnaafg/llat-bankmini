@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-lg border-0 rounded-4">
                <div class="card-header text-center text-white fw-bold">
                    <i class="bi bi-person-circle"></i> Dashboard
                </div>

                <div class="card-body text-center">
                    @if (Auth::user()->peran == 'admin')
                        <h1 class="welcome-text">Selamat Datang, Admin</h1>
                        <a href="{{ route('users.index') }}" class="btn btn-brown"><i class="bi bi-people"></i> User/Nasabah</a>
                        <a href="{{ route('admin.laporan') }}" class="btn btn-brown" target="_blank"><i class="bi bi-file-earmark-text"></i> Laporan</a>
                        <a href="{{ route('tambah.bunga') }}" class="btn btn-brown"><i class="bi bi-people"></i> Tambah Jasa/Bunga</a>

                    @elseif (Auth::user()->peran == 'teller')
                        <h1 class="welcome-text">Selamat Datang, Teller</h1>
                        <a href="{{ route('transaksi.index') }}" class="btn btn-brown"><i class="bi bi-cash-coin"></i> Transaksi</a>

                    @elseif (Auth::user()->peran == 'nasabah')
                        <h1 class="welcome-text">Selamat Datang, Nasabah</h1>
                        <a href="{{ route('nasabah.index') }}" class="btn btn-brown"><i class="bi bi-wallet"></i> Nasabah</a>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    /* Warna Dasar */
    body {
        background-color: #F5EFE6;
        color: #5C4033;
        font-family: 'Arial', sans-serif;
    }

    /* Card Styling */
    .card {
        background-color: #E8D8C4;
        border-radius: 15px;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
    }
    .card-header {
        background-color: #8B5E3C;
        color: white;
        font-size: 1.3rem;
        border-radius: 15px 15px 0 0;
        padding: 15px;
    }
    .card-body {
        padding: 2rem;
    }

    /* Tombol */
    .btn-brown {
        background-color: #8B5E3C;
        color: white;
        border-radius: 30px;
        padding: 10px 25px;
        font-size: 1.1rem;
        border: none;
        transition: all 0.3s ease-in-out;
    }
    .btn-brown:hover {
        background-color: #5C4033;
    }

    /* H1 Styling */
    .welcome-text {
        font-size: 1.8rem;
        font-weight: bold;
        color: #5C4033;
        margin-bottom: 20px;
    }

    /* Responsiveness */
    @media (max-width: 768px) {
        .card-body {
            padding: 1.5rem;
        }

        .btn {
            width: 100%;
        }

        .welcome-text {
            font-size: 1.5rem;
        }
    }
</style>
@endsection
