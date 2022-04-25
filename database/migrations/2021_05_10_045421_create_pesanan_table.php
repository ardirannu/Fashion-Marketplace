<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePesananTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pesanan', function (Blueprint $table) {
            $table->id();
            $table->string('kode_pesanan');
            $table->foreignId('user_id');
            $table->foreign('user_id')->references('id')->on('users'); 
            $table->foreignId('user_alamat_id');
            $table->foreign('user_alamat_id')->references('id')->on('users_alamat');
            $table->string('total_pembayaran');
            $table->string('resi_pembayaran')->nullable();
            $table->string('status')->nullable();
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
        Schema::dropIfExists('pesanan');
    }
}
