<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFinansFisIslemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('finans_fis_islems', function (Blueprint $table) {
            $table->id();
            $table->string('fiFisId');
            $table->string('fiIslemTipKod');
            $table->string('fiIslemTipAd');
            $table->string('fiMHK');
            $table->string('fiMHA');
            $table->string('fiBA');
            $table->string('fiTutar');
            $table->string('fiBorc');
            $table->string('fiAlacak');
            $table->string('fiFark');
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
        Schema::dropIfExists('finans_fis_islems');
    }
}
