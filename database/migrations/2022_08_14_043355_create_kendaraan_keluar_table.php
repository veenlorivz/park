<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kendaraan_keluar', function (Blueprint $table) {
            $table->id();
            $table->string("no_plat");
            $table->string("merk_kendaraan");
            $table->datetime("waktu_masuk");
            $table->datetime("waktu_keluar");
            $table->integer("harga")->default(2000);
            $table->string("total_waktu");
            $table->string("total_harga");
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
        Schema::dropIfExists('kendaraan_keluars');
    }
};
