<?php

namespace App\Http\Controllers;

use App\Models\Transaksi;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User;
use Barryvdh\DomPDF\Facade\Pdf;

class LaporanController extends Controller
{
    // Halaman untuk Nasabah
    public function halamanNasabah()
    {
        $semuaTransaksi = Transaksi::where('user_id', auth()->user()->id)->get();
        return view('nasabah.index')->with('semuaTransaksi', $semuaTransaksi);
    }

    // Laporan untuk Nasabah
    public function laporanNasabah()
    {
        $semuaTransaksi = Transaksi::where('user_id', auth()->user()->id)->get();
        return view('nasabah.laporan')->with('semuaTransaksi', $semuaTransaksi);
    }

    // Cetak Laporan Nasabah
    public function cetakLaporan()
    {
        $semuaTransaksi = Transaksi::where('user_id', auth()->user()->id)->get();
        $pdf = Pdf::loadView('nasabah.laporan', compact('semuaTransaksi'));
        return $pdf->download('Laporan Nasabah.pdf');
    }

    // Laporan untuk Admin
    public function laporanTransaksiAdmin()
    {
        $semuaTransaksi = Transaksi::all();
        return view('admin.laporan')->with('semuaTransaksi', $semuaTransaksi);
    }

    // Cetak Laporan Transaksi Admin
    public function cetakLaporanAdmin()
    {
        $semuaTransaksi = Transaksi::all();
        $pdf = Pdf::loadView('admin.laporan', compact('semuaTransaksi')); // Perbaikan pada 'nasabah' ke 'semuaTransaksi'
        return $pdf->stream('Laporan Transaksi.pdf');
    }

    // Cetak Laporan Pilih (untuk Admin)
    // Cetak Laporan Pilih (untuk Admin)
public function cetakLaporanPilih($id)
{
    // Ambil data nasabah berdasarkan ID
    $nasabah = User::with('transaksi')->where('id', $id)->where('peran', 'nasabah')->first();

    // Cek apakah nasabah ditemukan
    if (!$nasabah) {
        return redirect()->back()->with('error', 'Nasabah tidak ditemukan');
    }

    // Ambil transaksi hanya untuk nasabah ini
    $semuaTransaksi = $nasabah->transaksi;

    // Generate PDF
    $pdf = Pdf::loadView('admin.laporan', compact('nasabah', 'semuaTransaksi'));

    return $pdf->stream('Laporan_' . $nasabah->name . '.pdf');
}

}
