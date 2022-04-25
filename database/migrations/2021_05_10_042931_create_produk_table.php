<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProdukTable extends Migration
{
    /**
     * Run the migrations. 
     *
     * @return void
     */
    public function up()
    {
        Schema::create('produk', function (Blueprint $table) {
            $table->id();
            $table->string('kode_produk');
            $table->string('nama');
            $table->string('handtag')->nullable();
            $table->string('kategori');
            $table->string('ukuran');
            $table->string('warna');
            $table->string('bahan')->nullable();
            $table->string('deskripsi');
            $table->bigInteger('harga');
            $table->bigInteger('jumlah_terjual')->nullable();
            $table->bigInteger('stok')->nullable();
            $table->string('gambar_produk');
            $table->string('gambar_produk_2');
            $table->string('gambar_produk_3');
            $table->string('gambar_produk_4');
            $table->string('slug')->nullable();
            $table->string('edited_by')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('produk');
    }
}
