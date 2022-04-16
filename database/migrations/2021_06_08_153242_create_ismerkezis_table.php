<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIsmerkezisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ismerkezis', function (Blueprint $table) {
            $table->id();
            $table->string('ismerkeziFirmaId');
            $table->string('ismerkeziKod');
            $table->string('ismerkeziAd');
            $table->string('ismerkeziAciklama');
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
        Schema::dropIfExists('ismerkezis');
    }
}
