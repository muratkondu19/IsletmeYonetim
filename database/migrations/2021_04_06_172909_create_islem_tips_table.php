<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIslemTipsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('islem_tips', function (Blueprint $table) {
            $table->id();
            $table->string('islemTipKod');
            $table->string('islemTipAd');
            $table->string('islemKaynak');
            $table->string('islemBA');
            $table->string('islemKartTip');
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
        Schema::dropIfExists('islem_tips');
    }
}
