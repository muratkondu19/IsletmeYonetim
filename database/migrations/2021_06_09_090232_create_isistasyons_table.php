<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIsistasyonsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('isistasyons', function (Blueprint $table) {
            $table->id();
            $table->string('isistasyonFirmaId');
            $table->string('isistasyonKod');
            $table->string('isistasyonAd');
            $table->string('ismerkeziKod');
            $table->string('ismerkeziAd');
            $table->string('isistasyonAciklama');
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
        Schema::dropIfExists('isistasyons');
    }
}
