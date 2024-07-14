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
        Schema::create('barangs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_muatan');
            $table->foreignId('id_tujuan');
            $table->string('jenis_barang');
            $table->integer('kuantum');
            $table->string('unit');
            $table->string('jml_berat');
            $table->string('vol');
            $table->integer('ongkos');
            $table->integer('jumlah_ongkos');
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
        Schema::dropIfExists('barangs');
    }
};
