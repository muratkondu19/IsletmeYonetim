<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStokHareketsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stok_harekets', function (Blueprint $table) {
            $table->id();
            $table->string('stokHareketId');
            $table->string('stokHareketTip');
            $table->string('stokHareketDepo');
            $table->string('stokHareketAd');
            $table->string('stokHareketBirim');
            $table->string('stokHareketMiktar');
            $table->string('stokHareketBirimFiyat');
            $table->string('stokHareketToplamTutar');
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
        Schema::dropIfExists('stok_harekets');
    }
}
