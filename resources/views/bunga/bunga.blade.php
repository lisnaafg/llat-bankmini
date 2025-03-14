@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h3 class="fw-bold text-primary">Tambah Jasa/Bunga 💰</h3>
        <div>
            <a href="{{ route('home') }}" class="btn btn-primary me-2">
                <i class="bi bi-house-door"></i> Beranda
            </a>
            <a href="{{ route('data_bunga') }}" class="btn btn-success">
                <i class="bi bi-table"></i> Lihat Data Bunga
            </a>
        </div>
    </div>

    <div class="card border-0 rounded-4">
        <div class="card-body p-4">
            @if (session('success'))
                <script>
                    Swal.fire({
                        icon: 'success',
                        title: 'Berhasil!',
                        text: "{{ session('success') }}",
                        confirmButtonColor: '#205781'
                    });
                </script>
            @endif

            @if (session('error'))
                <script>
                    Swal.fire({
                        icon: 'error',
                        title: 'Gagal!',
                        text: "{{ session('error') }}",
                        confirmButtonColor: '#d33'
                    });
                </script>
            @endif

            <form action="{{ route('simpan.bunga') }}" method="POST">
                @csrf
                <div class="mb-4">
                    <label for="persentase" class="form-label fw-semibold">Persentase Bunga (%)</label>
                    <input type="number" name="persentase" id="persentase" class="form-control form-control-lg text-center" required min="0" max="100" placeholder="Masukkan persentase bunga" style="border-radius: 10px;">
                </div>
                <button type="submit" class="btn btn-primary w-100 btn-lg">
                    <i class="bi bi-check-circle"></i> Terapkan Bunga
                </button>
            </form>
        </div>
    </div>
</div>

<!-- Tambahkan Bootstrap Icons -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
@endsection
