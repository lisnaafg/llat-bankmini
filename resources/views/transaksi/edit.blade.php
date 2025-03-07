@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Edit Transaksi') }}</div>

                <div class="card-body">
                    @if (Auth::user()->peran == 'teller')
                    <a href="{{ route('transaksi.index') }}" class="btn btn-warning">Kembali</a>
                    <br><br>

                    @if($nasabah)
                        <div>
                            Nama : {{ $nasabah->name }} <br>
                            NIK : {{ $nasabah->nik }} <br>
                        </div>
                    @endif

                    <form action="{{ route('transaksi.update', $transaksi->id) }}" method="POST" id="form-nabung">
                        @csrf
                        @method('PUT')
                        <input type="hidden" name="user_id" value="{{ $transaksi->user_id }}">
                        <div class="form-group">
                            <label for="tabungan">Nominal</label>
                            <input type="number" name="tabungan" id="tabungan" class="form-control" value="{{ $transaksi->tabungan }}" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </form>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
