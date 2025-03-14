<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaksi;
use App\Models\BungaHistory;
use Carbon\Carbon;

class BungaController extends Controller
{
    public function formBunga()
    {
        return view('bunga.bunga');
    }

    public function simpanBunga(Request $request)
    {
        $request->validate([
            'persentase' => 'required|numeric|min:0|max:100'
        ]);

        $tanggalSekarang = Carbon::now();

        // Cek apakah bunga sudah diterapkan bulan ini
        $bungaTerakhir = BungaHistory::whereMonth('tanggal', $tanggalSekarang->month)
            ->whereYear('tanggal', $tanggalSekarang->year)
            ->exists();

        if ($bungaTerakhir) {
            return redirect()->route('data_bunga')->with('error', "❌ Bunga hanya bisa ditambahkan sekali dalam sebulan!");
        }

        $persentaseBunga = $request->persentase;
        $persentaseDecimal = $persentaseBunga / 100;
        $tanggal = $tanggalSekarang->toDateString();
        $totalBungaDiberikan = 0;

        $transaksis = Transaksi::all();
        foreach ($transaksis as $transaksi) {
            $bungaBaru = $transaksi->tabungan * $persentaseDecimal;
            $totalBungaDiberikan += $bungaBaru;

            // Simpan history bunga
            BungaHistory::create([
                'transaksi_id' => $transaksi->id,
                'bunga' => $bungaBaru,
                'persentase' => $persentaseBunga,
                'tanggal' => $tanggal
            ]);

            // Update saldo tabungan
            $transaksi->update([
                'tabungan' => $transaksi->tabungan + $bungaBaru,
            ]);
        }

        return redirect()->route('data_bunga')->with(
            'success',
            "✅ Bunga sebesar {$persentaseBunga}% telah diterapkan ke semua nasabah!<br>
            💰 Total bunga yang diberikan: <b>Rp " . number_format($totalBungaDiberikan, 0, ',', '.') . "</b>"
        );
    }

    public function dataBunga()
    {
        $transaksis = Transaksi::with(['user', 'bungaHistories'])->get();
        return view('bunga.data_bunga', compact('transaksis'));
    }
}
