<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFinansFisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('finans_fis', function (Blueprint $table) {
            $table->id();
            $table->string('fiFisNo');
            $table->string('fiFirmaId');
            $table->string('fiFisTipKod');
            $table->date('fiFisTarih');
            $table->text('fiAciklama');
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
        Schema::dropIfExists('finans_fis');
    }
}
