<?php

namespace App\Http\Controllers;

use App\Models\Transaksi;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User;
use Barryvdh\DomPDF\Facade\Pdf;


class LaporanController extends Controller
{

   public function halamanNasabah()
   {
        $semuaTransaksi = Transaksi::where('user_id', auth()->user()->id)->get();
        return view('nasabah.index')->with('semuaTransaksi', $semuaTransaksi);
   }

   public function laporanNasabah()
   {
        $semuaTransaksi=Transaksi::where('user_id', auth()->user()->id)->get();
        return view('nasabah.laporan')->with('semuaTransaksi', $semuaTransaksi);
   }

   public function cetakLaporan()
    {
        $semuaTransaksi = Transaksi::where('user_id', auth()->user()->id)->get();
        $pdf = Pdf::loadView('nasabah.laporan', compact('semuaTransaksi'));
        return $pdf->download('Laporan Nasabah.pdf');
    }

    public function laporanTransaksiAdmin(){
        $semuaTransaksi = Transaksi::all();
        return view('admin.laporan')->with('semuaTransaksi', $semuaTransaksi);
    }
    public function cetakLaporanAdmin(){
        $semuaTransaksi = Transaksi::all();
        $pdf = Pdf::loadView('admin.laporan', ['semuaTransaksi'=> $semuaTransaksi]);
        return $pdf->stream('Laporan Transaksi.pdf');
    }
    public function cetakLaporanPilih($id)
{
    // Ambil data nasabah berdasarkan ID
    $nasabah = User::findOrFail($id);

    // Ambil semua transaksi dari nasabah tersebut
    $semuaTransaksi = Transaksi::where('user_id', $id)->get();

    // Generate PDF menggunakan view 'nasabah.laporan'
    $pdf = Pdf::loadView('nasabah.laporan', compact('nasabah', 'semuaTransaksi'));

    return $pdf->download('Laporan_Nasabah_'.$nasabah->name.'.pdf');
}


}
