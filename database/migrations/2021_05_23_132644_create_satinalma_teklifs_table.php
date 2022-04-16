<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSatinalmaTeklifsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('satinalma_teklifs', function (Blueprint $table) {
            $table->id();
            $table->string('satinalmaTeklifFirmaId');
            $table->date('satinalmaTeklifTarih');
            $table->string('satinalmaTeklifBelgeNo');
            $table->string('satinalmaTeklifHareketKod');
            $table->string('satinalmaTeklifCariId');
            $table->text('satinalmaTeklifAciklama')->nullable();
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
        Schema::dropIfExists('satinalma_teklifs');
    }
}
