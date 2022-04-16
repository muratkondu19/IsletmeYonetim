<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStokKartsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stok_karts', function (Blueprint $table) {
            $table->id();
            $table->string('stokKod');
            $table->string('stokAd');
            $table->string('stokBirim');
            $table->string('stokFirmaId');
            $table->string('stokMHK');
            $table->string('stokMHA');
            $table->string('stokTipKod');
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
        Schema::dropIfExists('stok_karts');
    }
}
