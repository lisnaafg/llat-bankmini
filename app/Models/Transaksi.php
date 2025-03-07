<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    use HasFactory;

    public function nasabah()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    // Transaksi.php (Model)
public function user()
{
    return $this->belongsTo(User::class);  // Pastikan ada relasi dengan User menggunakan foreign key 'user_id'
}


}
