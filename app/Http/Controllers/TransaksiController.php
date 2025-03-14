<?php

namespace App\Http\Controllers;

use App\Models\Transaksi;
use App\Models\User;
use Illuminate\Http\Request;

class TransaksiController extends Controller
{
    public function index(){

        $semuaTransaksi = Transaksi::all();
        return view ('transaksi.index')->with('semuaTransaksi',
        $semuaTransaksi);
    }



    public function tambahTrans(){
        return view('transaksi.create');
    }

    public function cariNasabah(Request $request){
        // Cari data nasabah berdasarkan NIK
        $nasabah = User::where('nik', $request->nik)->where('peran', 'nasabah')->first();

        // Pastikan data nasabah sudah ditemukan sebelum mengirimnya ke view
        if ($nasabah) {
            return view('transaksi.create')->with('nasabah', $nasabah);
        } else {
            return back()->with('error', 'Nasabah tidak ditemukan');
        }
    }

    public function simpanTrans(Request $request)
    {
        $transaksi = new Transaksi();
        $transaksi->user_id = $request->user_id;
        $transaksi->tabungan = $request->tabungan;
        $transaksi->save();
        return redirect()->route('transaksi.index');

    }

    public function hapusTrans($id){
        $transaksi = Transaksi::find($id);
        $transaksi->delete();
        return redirect()->route('transaksi.index');
    }

    public function editTrans($id){
        $transaksi = Transaksi::findOrFail($id);  // Ambil transaksi berdasarkan ID
        $nasabah = $transaksi->user;  // Ambil data nasabah yang terkait dengan transaksi

        return view('transaksi.edit', compact('transaksi', 'nasabah'));  // Kirim variabel ke view
    }

    public function updateTrans(Request $request,$id){
        $transaksi = Transaksi::find($id);
        $transaksi->user_id = $request->user_id;
        $transaksi->tabungan = $request->tabungan;
        $transaksi->save();
        return redirect()->route('transaksi.index');
    }

    public function laporanTransaksiAdmin(){
        $semuaTransaksi = Transaksi::all(); // Variabel ini sudah dideklarasikan
        return view('admin.laporan')->with('semuaTransaksi', $semuaTransaksi); // Pastikan nama variabel konsisten
    }

}
