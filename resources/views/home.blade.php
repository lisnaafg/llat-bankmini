@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>


                <div class="card-body">
                    @if (Auth::user()->peran == 'admin')
                        <h1>Selamat Datang Admin</h1>
                        <a href="{{ route('users.index') }}" class="btn btn-primary">User/Nasabah</a>
                        <a href="{{route('admin.laporan')}}" class="btn btn-primary" target="_blank">laporan</a>

                    @elseif (Auth::user()->peran == 'teller')
                        <h1>Selamat Datang Teller</h1>
                        <a href="{{ route('transaksi.index')}}" class="btn btn-primary">Transaksi</a>

                    @elseif (Auth::user()->peran == 'nasabah')
                    <a href="{{ route('nasabah.index')}}" class="btn btn-primary">Nasabah</a>
                        <h1>Selamat Datang Nasabah</h1>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    /* General Reset */
    * {
        margin: 0;
        padding: 0;
        background: #fff8e8;
        box-sizing: border-box;
    }

    /* Card and Form Styling */
    .card {
        border: none;
        border-radius: 10px;
        background-color: #f8f1e1; /* Pastel beige background */
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
    }

    .card-header {
        background-color: #a57c58; /* Light brown for header */
        color: white;
        font-weight: bold;
    }

    .card-body {
        padding: 2rem;
    }

    /* Button Styling */
    .btn {
        background-color: #a57c58; /* Pastel brown */
        color: white;
        border-radius: 30px;
        padding: 10px 30px;
        font-size: 1.1rem;
        border: none;
        transition: all 0.3s ease;
    }

    .btn:hover {
        background-color: #8f5c3b; /* Darker brown on hover */
        border-color: #8f5c3b;
    }

    /* H1 Styling */
    h1 {
        color: #333;
        font-size: 2rem;
        margin-bottom: 1rem;
    }

    /* Responsive Adjustments */
    @media (max-width: 768px) {
        .card-body {
            padding: 1.5rem;
        }

        .btn {
            width: 100%;
        }

        h1 {
            font-size: 1.5rem;
        }
    }
</style>
@endsection