<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMuhasebeFisIslemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('muhasebe_fis_islems', function (Blueprint $table) {
            $table->id();
            $table->string('miIslemTipKod');
            $table->string('miIslemTipAd');
            $table->string('miMHK');
            $table->string('miMHA');
            $table->string('miBA');
            $table->string('miTutar');
            $table->string('miBorc');
            $table->string('miAlacak');
            $table->string('miFark');
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
        Schema::dropIfExists('muhasebe_fis_islems');
    }
}
