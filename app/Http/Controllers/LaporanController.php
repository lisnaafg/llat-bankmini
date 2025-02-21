<?php

namespace App\Http\Controllers;

use App\Models\Transaksi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


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
        $pdf = pdf::where('nasabah.laporan', ['semuaTrans', => $semuaTrans]);
        return $pdf->download('Laporan Nasabah.pdf');
   }
}
