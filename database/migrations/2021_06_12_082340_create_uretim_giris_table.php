<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUretimGirisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('uretim_giris', function (Blueprint $table) {
            $table->id();
            $table->string('uretimgirisFirmaKod');
            $table->string('uretimgirisIsEmriKod');
            $table->string('uretimgirisStokKod');
            $table->string('uretimgirisBaslangıcTarih');
            $table->string('uretimgirisBitisTarih');
            $table->string('uretimgirisBaslangicSaat');
            $table->string('uretimgirisBitisSaat');
            $table->string('uretimgirisMiktar');
            $table->string('uretimgirisBirim');
            $table->string('uretimgirisDepoKod');
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
        Schema::dropIfExists('uretim_giris');
    }
}
