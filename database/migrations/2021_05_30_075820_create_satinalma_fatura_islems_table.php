<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSatinalmaFaturaIslemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('satinalma_fatura_islems', function (Blueprint $table) {
            $table->id();
            $table->string('satinalmaDepoKod');
            $table->string('satinalmaMuhasebeKod');
            $table->string('satinalmaMuhasebeAd');
            $table->string('satinalmaBirim');
            $table->string('satinalmaBirimFiyat');
            $table->string('satinalmaToplamTutar');
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
        Schema::dropIfExists('satinalma_fatura_islems');
    }
}
