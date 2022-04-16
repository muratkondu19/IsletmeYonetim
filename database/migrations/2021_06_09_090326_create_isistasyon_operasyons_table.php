<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIsistasyonOperasyonsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('isistasyon_operasyons', function (Blueprint $table) {
            $table->id();
            $table->string('isistasyonId');
            $table->string('isistasyonOperasyonKod');
            $table->string('isistasyonOperasyonAd');
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
        Schema::dropIfExists('isistasyon_operasyons');
    }
}
