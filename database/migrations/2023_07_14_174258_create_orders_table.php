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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users');
            $table->string('kode');
            $table->string('shipping');
            $table->decimal('total_shipping',15,0);
            $table->decimal('total_bayar',15,0);
            $table->enum('metode_pembayaran',['Transfer','COD']);
            $table->text('deskripsi_pengiriman');
            $table->string('no_resi')->nullable();
            $table->enum('status',['pending','dibayar','dipesankan','dikirim','sampai']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
