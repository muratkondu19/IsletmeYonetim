<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSatinalmasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('satinalmas', function (Blueprint $table) {
            $table->id();
            $table->string('satinalmaSiparisFirmaId');
            $table->date('satinalmaSiparisTarih');
            $table->string('satinalmaSiparisBelgeNo');
            $table->string('satinalmaSiparisHareketKod');
            $table->string('satinalmaSiparisCariId');
            $table->text('satinalmaSiparisAciklama')->nullable();
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
        Schema::dropIfExists('satinalmas');
    }
}
