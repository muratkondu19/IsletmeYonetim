<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIsmerkeziIstasyonsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ismerkezi_istasyons', function (Blueprint $table) {
            $table->id();
            $table->string('ismerkeziId');
            $table->string('ismerkeziIstasyonKod');
            $table->string('ismerkeziIstasyonAd');
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
        Schema::dropIfExists('ismerkezi_istasyons');
    }
}
