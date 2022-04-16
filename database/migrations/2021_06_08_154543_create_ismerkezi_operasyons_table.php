<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIsmerkeziOperasyonsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ismerkezi_operasyons', function (Blueprint $table) {
            $table->id();
            $table->string('ismerkeziId');
            $table->string('ismerkeziOperasyonKod');
            $table->string('ismerkeziOperasyonAd');
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
        Schema::dropIfExists('ismerkezi_operasyons');
    }
}
