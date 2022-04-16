<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSatinalmaIslemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('satinalma_islems', function (Blueprint $table) {
            $table->id();
            $table->string('satinalmaSiparisId');
            $table->string('satinalmaSiparisTip');
            $table->string('satinalmaSiparisDepoId');
            $table->string('satinalmaSiparisStokId');
            $table->string('satinalmaSiparisStokAd');
            $table->string('satinalmaSiparisBirim');
            $table->string('satinalmaSiparisMiktar');
            $table->string('satinalmaSiparisBirimFiyat');
            $table->string('satinalmaSiparisToplamTutar');
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
        Schema::dropIfExists('satinalma_islems');
    }
}
