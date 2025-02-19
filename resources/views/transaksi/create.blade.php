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
                    <form action="{{ route('transaksi.cari') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="nik">Nasabah</label>
                            <input type="text" name="nik" id="nik" class="form-control">
                        </div>
                        <button type="submit"  class="btn btn-primary">Cari</button>
                    </form>
                    <br>
                    <br>
                    @isset($nasabah)
                        Nama : {{ $nasabah->name}} <br>
                        NIK : {{$nasabah->nik }}
                        <br>
                        <br>
                        <form action="{{route('transaksi.store')}}" method="POST" id="form-nabung" name="form-nabung">
                            @csrf
                            <input type="hidden" name="user_id" value="{{ $nasabah->id }}">
                            <div class="form-group">
                                <label for="tabungan">Nominal</label>
                                <input type="number" name="tabungan" id="tabungan" class="form-control">


                            </div>
                            <button type="submit"  class="btn btn-primary">Simpan</button>
                        </form>

                    @else
                        <div class="alert alert-danger">
                            Nasabah tidak ditemukan, pastikan NIk benar dan coba ulang
                        </div>

                    @endisset

                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
