<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSatinalmaTeklifIslemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('satinalma_teklif_islems', function (Blueprint $table) {
            $table->id();
            $table->string('satinalmaTeklifId');
            $table->string('satinalmaTeklifTip');
            $table->string('satinalmaTeklifDepoId');
            $table->string('satinalmaTeklifStokId');
            $table->string('satinalmaTeklifStokAd');
            $table->string('satinalmaTeklifBirim');
            $table->string('satinalmaTeklifMiktar');
            $table->string('satinalmaTeklifBirimFiyat');
            $table->string('satinalmaTeklifToplamTutar');
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
        Schema::dropIfExists('satinalma_teklif_islems');
    }
}
