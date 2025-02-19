<?php

namespace App\Http\Controllers;

use App\Models\Transaksi;
use App\Models\User;
use Illuminate\Http\Request;

class LaporanController extends Controller
{
    public function halamanNasabah(){

        $semuaTrans = Transaksi::where('user_id', auth()->user()->id)->get();
        return view('nasabah.index')->with('semuaTrans', $semuaTrans);
    }
}
