@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('transaksi') }}</div>



                <div class="card-body">
                    @if (Auth::user()->peran == 'teller')
                    <a href="{{route('home')}}" class="btn btn-warning">Kembali</a>
                    <a href="{{ route('transaksi.create') }}" class="btn btn-primary">Tambah Transaksi</a>

                    @endif
                </div>

                <table class ="table">
                    <tr>
                        <th>No</th>
                        <th>Tannggal transaksi</th>
                        <th>Nasabah</th>
                        <th>Nominal</th>
                        <th>Aksi</thtd>
                    </tr>
                    @foreach ($semuaTransaksi as $st)
                    <tr>
                        <th>{{$loop->iteration}}</th>
                        <th>{{$st->created_at}}</th>
                        <th>{{$st->user_id}}</th>
                        <th>{{$st->tabungan}}</th>
                        <td>
                            <a href="{{ route('transaksi.delete', $st->id) }}" class="btn btn-danger">Hapus</a>
                            <a href="{{ route('transaksi.edit', $st->id) }}" class="btn btn-warning">Edit</a>
                        </td>
                        </td>
                    </tr>
                    @endforeach
            </div>
        </div>
    </div>
</div>
@endsection
