<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUretimGirisMalzemesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('uretim_giris_malzemes', function (Blueprint $table) {
            $table->id();
            $table->string('uretimgirisId');
            $table->string('uretimmalzemeSatırTip');
            $table->string('uretimmalzemeStokKod');
            $table->string('uretimmalzemeStokAd');
            $table->string('uretimmalzemeOperasyon');
            $table->string('uretimmalzemeBirim');
            $table->string('uretimmalzemeMiktar');
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
        Schema::dropIfExists('uretim_giris_malzemes');
    }
}
