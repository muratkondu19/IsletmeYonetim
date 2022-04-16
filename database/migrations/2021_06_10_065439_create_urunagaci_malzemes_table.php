<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUrunagaciMalzemesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('urunagaci_malzemes', function (Blueprint $table) {
            $table->id();
            $table->string('urunagaciId');
            $table->string('urunagacimalzemeSatırTip');
            $table->string('urunagacimalzemeStokKod');
            $table->string('urunagacimalzemeStokAd');
            $table->string('urunagacimalzemeOperasyonAd');
            $table->string('urunagacimalzemeBirim');
            $table->string('urunagacimalzemeMiktar');
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
        Schema::dropIfExists('urunagaci_malzemes');
    }
}
