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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('umur');
            $table->float('harga');
            $table->foreignId('id_brand')->constrained('brands')->onDelete('restrict')->onUpdate('cascade');
            $table->foreignId('id_type_kulit')->constrained('type_kulits')->onDelete('restrict')->onUpdate('cascade');
            $table->foreignId('id_masalah_kulit')->constrained('masalah_kulits')->onDelete('restrict')->onUpdate('cascade');
            $table->foreignId('id_kategori')->constrained('kategoris')->onDelete('restrict')->onUpdate('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
