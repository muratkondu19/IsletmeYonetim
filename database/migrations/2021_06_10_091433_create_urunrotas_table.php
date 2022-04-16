<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUrunrotasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('urunrotas', function (Blueprint $table) {
            $table->id();
            $table->string('urunrotaFirmaKod');
            $table->string('urunrotaRotaTip');
            $table->string('urunrotaStokKod');
            $table->string('urunrotaAciklama');
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
        Schema::dropIfExists('urunrotas');
    }
}
