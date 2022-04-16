<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSatisSiparisIslemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('satis_siparis_islems', function (Blueprint $table) {
            $table->id();
            $table->string('satisSiparisId');
            $table->string('satisSiparisTip');
            $table->string('satisSiparisDepoId');
            $table->string('satisSiparisStokId');
            $table->string('satisSiparisStokAd');
            $table->string('satisSiparisBirim');
            $table->string('satisSiparisMiktar');
            $table->string('satisSiparisBirimFiyat');
            $table->string('satisSiparisToplamTutar');
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
        Schema::dropIfExists('satis_siparis_islems');
    }
}
