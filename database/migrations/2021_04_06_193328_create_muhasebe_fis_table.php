<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMuhasebeFisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('muhasebe_fis', function (Blueprint $table) {
            $table->id();
            $table->string('miFirmaId');
            $table->string('miFisTipKod');
            $table->date('miFisTarih');
            $table->text('miAciklama');
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
        Schema::dropIfExists('muhasebe_fis');
    }
}
