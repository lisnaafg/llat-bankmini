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

    /* Input Field Styling */
    .form-group label {
        font-weight: 600;
    }
    .form-control {
        border-radius: 8px;
        padding: 10px;
        border: 2px solid #A67B5B;
        transition: all 0.3s ease-in-out;
    }
    .form-control:focus {
        border-color: #8B5E3C;
        box-shadow: 0 0 5px rgba(139, 94, 60, 0.5);
    }

    /* Table Styling */
    .info-table {
        width: 100%;
        background-color: white;
        border-radius: 10px;
        padding: 15px;
        margin-bottom: 20px;
        box-shadow: 2px 2px 10px rgba(0, 0, 0, 0.1);
    }
    .info-table th {
        text-align: left;
        width: 30%;
        color: #8B5E3C;
        font-weight: bold;
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
                <div class="card-header">{{ __('Edit Transaksi') }}</div>
                <div class="card-body">
                    @if (Auth::user()->peran == 'teller')
                        <div class="mb-3">
                            <a href="{{ route('transaksi.index') }}" class="btn btn-warning">Kembali</a>
                        </div>

                        @if ($nasabah)
                            <table class="info-table">
                                <tr>
                                    <th>Nama:</th>
                                    <td>{{ $nasabah->name }}</td>
                                </tr>
                                <tr>
                                    <th>NIK:</th>
                                    <td>{{ $nasabah->nik }}</td>
                                </tr>
                            </table>
                        @endif

                        <form action="{{ route('transaksi.update', $transaksi->id) }}" method="POST" id="form-nabung">
                            @csrf
                            @method('PUT')
                            <input type="hidden" name="user_id" value="{{ $transaksi->user_id }}">

                            <div class="form-group">
                                <label for="tabungan">Nominal</label>
                                <input type="number" name="tabungan" id="tabungan" class="form-control" value="{{ $transaksi->tabungan }}" required>
                            </div>

                            <button type="submit" class="btn btn-primary mt-3">Simpan</button>
                        </form>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
