<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSatisFaturasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('satis_faturas', function (Blueprint $table) {
            $table->id();
            $table->string('satisfaturaFirmaId');
            $table->string('satisfaturaHareketKod');
            $table->date('satisfaturaBelgeTarih');
            $table->string('satisfaturaBelgeNumara');
            $table->string('satisfaturaHesapKod');
            $table->string('satisfaturaHesapAd');
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
        Schema::dropIfExists('satis_faturas');
    }
}
