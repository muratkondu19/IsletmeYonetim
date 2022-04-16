<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUrunagacisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('urunagacis', function (Blueprint $table) {
            $table->id();
            $table->string('urunagaciFirmaKod');
            $table->string('urunagaciStokKod');
            $table->string('urunagaciStokAd');
            $table->string('urunagaciStokTakipBirim');
            $table->string('urunagaciStokGirişDepoAd');
            $table->string('urunagaciAciklama');
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
        Schema::dropIfExists('urunagacis');
    }
}
