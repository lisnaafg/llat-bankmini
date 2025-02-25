<?php

namespace App\Http\Controllers;

use App\Models\Transaksi;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;


class LaporanController extends Controller
{

   public function halamanNasabah()
   {
        $semuaTrans = Transaksi::where('user_id', auth()->user()->id)->get();
        return view('nasabah.index')->with('semuaTrans', $semuaTrans);
   }

   public function laporanNasabah()
   {
        $semuaTrans=Transaksi::where('user_id', auth()->user()->id)->get();
        return view('nasabah.laporan')->with('semuaTrans', $semuaTrans);
   }

   public function cetakLaporan()
    {
        $semuaTrans = Transaksi::where('user_id', auth()->user()->id)->get();

        // Membuat PDF dari view dan mengirim data 'semuaTrans' ke view
        $pdf = Pdf::loadView('nasabah.laporan', compact('semuaTrans'));

        // Men-download PDF dengan nama 'Laporan Nasabah.pdf'
        return $pdf->download('Laporan Nasabah.pdf');
    }
}
