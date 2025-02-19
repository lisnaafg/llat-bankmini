@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Transaksi') }}</div>



                <div class="card-body">
                    @if (Auth::user()->peran == 'teller')
                    <a href="{{route('transaksi.index')}}" class="btn btn-warning">Kembali</a>

                    <br>
                    <br>
                        Nama : {{ $nasabah->user->name}} <br>
                        NIK : {{$nasabah->user->nik }}
                        <form action="" method="POST" id="form-nabung" name="form-nabung">
                            <form action="{{ route('transaksi.update', $transaksi->id) }}" method="POST" id="form-nabung" name="form-nabung">

                            @csrf
                            <input type="hidden" name="user_id" value="{{ $transaksi->user_id }}">
                            <div class="form-group">
                                <label for="tabungan">Nominal</label>
                                <input type="number" name="tabungan" id="tabungan" class="form-control"
                                    value="{{$transaksi->tabungan}}">
                            </div>
                            <button type="submit"  class="btn btn-primary">Simpan</button>
                        </form>

                    @else
                        <div class="alert alert-danger">
                            Nasabah tidak ditemukan, pastikan NIk benar dan coba ulang
                        </div>

                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
