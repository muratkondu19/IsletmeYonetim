<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIsemrisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('isemris', function (Blueprint $table) {
            $table->id();
            $table->string('isemriFirmaKod');
            $table->string('isemriNumara');
            $table->date('isemriTarih');
            $table->string('isemriStokKod');
            $table->string('isemriMiktar');
            $table->string('isemriBirim');
            $table->string('isemriCariKod');
            $table->string('isemriGirisDepoKod');
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
        Schema::dropIfExists('isemris');
    }
}
