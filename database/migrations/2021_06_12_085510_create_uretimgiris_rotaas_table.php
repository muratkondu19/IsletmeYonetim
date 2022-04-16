<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUretimgirisRotaasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('uretimgiris_rotaas', function (Blueprint $table) {
            $table->id();
            $table->string('uretimgirisId');
            $table->string('uretimrotaIsistasyonKod');
            $table->string('uretimrotaOperasyonKod');
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
        Schema::dropIfExists('uretimgiris_rotaas');
    }
}
