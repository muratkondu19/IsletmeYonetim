<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSatinalmaFaturasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('satinalma_faturas', function (Blueprint $table) {
            $table->id();
            $table->string('satinalmafaturaFirmaId');
            $table->string('satinalmafaturaHareketKod');
            $table->date('satinalmafaturaBelgeTarih');
            $table->string('satinalmafaturaBelgeNumara');
            $table->string('satinalmafaturaHesapKod');
            $table->string('satinalmafaturaHesapAd');
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
        Schema::dropIfExists('satinalma_faturas');
    }
}
