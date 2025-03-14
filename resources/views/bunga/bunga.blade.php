@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h3 class="fw-bold text-brown"><i class="bi bi-coin"></i> Tambah Jasa/Bunga 💰</h3>
        <div>
            <a href="{{ route('home') }}" class="btn btn-outline-brown me-2 shadow-sm">
                <i class="bi bi-house-door"></i> Beranda
            </a>
            <a href="{{ route('data_bunga') }}" class="btn btn-outline-dark-brown shadow-sm">
                <i class="bi bi-table"></i> Lihat Data Bunga
            </a>
        </div>
    </div>

    <div class="card border-0 shadow-lg rounded-4 bg-cream">
        <div class="card-body p-5">
            <!-- SweetAlert Notifikasi -->
            @if (session('success'))
                <script>
                    Swal.fire({
                        icon: 'success',
                        title: 'Berhasil!',
                        html: "{{ session('success') }}",
                        confirmButtonColor: '#8B5E3C'
                    });
                </script>
            @endif

            @if (session('error'))
                <script>
                    Swal.fire({
                        icon: 'error',
                        title: 'Gagal!',
                        html: "{{ session('error') }}",
                        confirmButtonColor: '#D33'
                    });
                </script>
            @endif

            <form action="{{ route('simpan.bunga') }}" method="POST">
                @csrf
                <div class="mb-4">
                    <label for="persentase" class="form-label fw-semibold text-dark-brown">
                        <i class="bi bi-percent"></i> Persentase Bunga (%)
                    </label>
                    <input type="number" name="persentase" id="persentase"
                           class="form-control form-control-lg text-center border-2 shadow-sm bg-light-brown text-dark-brown"
                           required min="0" max="100"
                           placeholder="Masukkan persentase bunga"
                           style="border-radius: 10px;">
                </div>

                <button type="submit" class="btn btn-brown w-100 btn-lg shadow-sm" style="border-radius: 10px; transition: 0.3s;">
                    <i class="bi bi-check-circle"></i> Terapkan Bunga
                </button>
            </form>
        </div>
    </div>
</div>

<!-- Tambahkan Bootstrap Icons & Custom CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">

<style>
    /* Warna utama */
    .text-brown { color: #8B5E3C; }
    .text-dark-brown { color: #5C4033; }
    .bg-cream { background-color: #F5EFE6; }
    .bg-light-brown { background-color: #DFC8B5; }
    .btn-brown { background-color: #8B5E3C; color: white; }
    .btn-brown:hover { background-color: #5C4033; }
    .btn-outline-brown { border: 2px solid #8B5E3C; color: #8B5E3C; }
    .btn-outline-brown:hover { background-color: #8B5E3C; color: white; }
    .btn-outline-dark-brown { border: 2px solid #5C4033; color: #5C4033; }
    .btn-outline-dark-brown:hover { background-color: #5C4033; color: white; }
</style>
@endsection
