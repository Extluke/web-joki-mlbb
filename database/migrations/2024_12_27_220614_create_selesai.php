<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('selesai', function (Blueprint $table) {
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
            $table->string('status_pengerjaan')->default('menunggu konfirmasi');
            $table->timestamps();  // Kolom created_at dan updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('selesai');
    }
};
