<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSatisTeklifsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('satis_teklifs', function (Blueprint $table) {
            $table->id();
            $table->string('satisTeklifFirmaId');
            $table->date('satisTeklifTarih');
            $table->string('satisTeklifBelgeNo');
            $table->string('satisTeklifHareketKod');
            $table->string('satisTeklifCariId');
            $table->text('satisTeklifAciklama')->nullable();
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
        Schema::dropIfExists('satis_teklifs');
    }
}
