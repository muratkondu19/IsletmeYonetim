<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCarisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('caris', function (Blueprint $table) {
            $table->id();
            $table->string("cariKod");
            $table->string("cariAd");
            $table->string("cariTip");
            $table->string("cariVKN")->nullable();
            $table->string("cariTCKN")->nullable();
            $table->string("cariVD");
            $table->string("cariFirmaId");
            $table->string("cariMHK");
            $table->string("cariMHA");
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
        Schema::dropIfExists('caris');
    }
}
