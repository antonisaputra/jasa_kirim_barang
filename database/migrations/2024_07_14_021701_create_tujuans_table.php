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
        Schema::create('tujuans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_muatan');
            $table->string('no_urut');
            $table->string('no_resi');
            $table->string('pengirim');
            $table->string('alamat_pengirim');
            $table->string('hp_pengirim');
            $table->string('penerima');
            $table->string('alamat_penerima');
            $table->string('hp_penerima');
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
        Schema::dropIfExists('tujuans');
    }
};
