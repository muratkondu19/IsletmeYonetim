<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBankasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bankas', function (Blueprint $table) {
            $table->id();
            $table->string('bankaKod');
            $table->string('bankaAd');
            $table->string('bankaHN');
            $table->string('bankaIBAN');
            $table->string('bankaHesapAd');
            $table->string('bankaFirmaId');
            $table->string('bankaMHK');
            $table->string('bankaMHA');
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
        Schema::dropIfExists('bankas');
    }
}
