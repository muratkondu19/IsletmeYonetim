<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUrunrotaIslemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('urunrota_islems', function (Blueprint $table) {
            $table->id();
            $table->string('urunrotaId');
            $table->string('urunrotaOperasyonKod');
            $table->string('urunrotaIsmerkezKod');
            $table->string('urunrotaIsistasyonKod');
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
        Schema::dropIfExists('urunrota_islems');
    }
}
