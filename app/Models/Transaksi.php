<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    use HasFactory; 

    protected $table = 'transaksi'; 

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

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            if (empty($model->tanggal_dipesan)) {
                $model->tanggal_dipesan = now()->format('Y-m-d');
            }
        });
    }

    /**
     * Relasi ke model User
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
