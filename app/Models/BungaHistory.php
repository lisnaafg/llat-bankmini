<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class BungaHistory extends Model
{
    use HasFactory;

    protected $fillable = ['transaksi_id', 'bunga', 'tanggal'];

    public function transaksi()
    {
        return $this->belongsTo(Transaksi::class);
    }
}
