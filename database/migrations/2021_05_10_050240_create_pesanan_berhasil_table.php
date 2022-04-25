<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePesananBerhasilTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pesanan_berhasil', function (Blueprint $table) {
            $table->id();
            $table->foreignId('pesanan_id');
            $table->foreign('pesanan_id')->references('id')->on('pesanan');
            $table->string('kode_invoice');
            $table->string('invoice')->nullable();
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
        Schema::dropIfExists('pesanan_berhasil');
    }
}
