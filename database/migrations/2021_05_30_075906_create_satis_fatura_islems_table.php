<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSatisFaturaIslemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('satis_fatura_islems', function (Blueprint $table) {
            $table->id();
            $table->string('satisDepoKod');
            $table->string('satisMuhasebeKod');
            $table->string('satisMuhasebeAd');
            $table->string('satisBirim');
            $table->string('satisBirimFiyat');
            $table->string('satisToplamTutar');
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
        Schema::dropIfExists('satis_fatura_islems');
    }
}
