<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRotaTipsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rota_tips', function (Blueprint $table) {
            $table->id();
            $table->string('rotatipFirmaId');
            $table->string('rotatipKod');
            $table->string('rotatipAd');
            $table->string('rotatipAciklama');
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
        Schema::dropIfExists('rota_tips');
    }
}
