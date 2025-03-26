<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Selesai extends Model
{
    use HasFactory;

    protected $table = 'selesai'; 

    // Kolom yang bisa diisi
    protected $fillable = [
        'user_id', 
        'order_id',
        'nama', 
        'email', 

        'wa', 
        'email_game', 
        'password_game', 
        'catatan',
        'login_via',
        'dibeli', 
        'jumlah_dibeli', 
        'total', 
        'status_pembayaran', 
        'tanggal_dipesan',
        'status_pengerjaan'
    ];

}
