<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransaksiTable extends Migration
{
    /**
     * Jalankan migration untuk membuat tabel.
     *
     * @return void
     */
    public function up()
    {
            Schema::create('transaksi', function (Blueprint $table) {
                $table->id();  // Kolom id sebagai primary key
                $table->foreignId('user_id')->constrained()->onDelete('cascade');  // Relasi dengan tabel users
                $table->string('order_id')->unique();
                $table->string('nama');
                $table->string('email');
                $table->string('wa', 20);
                $table->string('email_game');
                $table->string('password_game');
                $table->text('catatan')->nullable();
                $table->text('login_via');
                $table->string('dibeli');
                $table->integer('jumlah_dibeli');
                $table->decimal('total', 10, 2);
                $table->enum('status_pembayaran', ['dibayar','belum dibayar'])->default('belum dibayar');
                $table->date('tanggal_dipesan');
                $table->enum('status_pengerjaan', ['menunggu konfirmasi', 'sedang dikerjakan', 'selesai'])->default('menunggu konfirmasi');
                $table->timestamps();  // Kolom created_at dan updated_at
            });
    }

    /**
     * Membalikkan perubahan yang dilakukan oleh method up.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transaksi');
    }
}