<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSatisTeklifIslemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('satis_teklif_islems', function (Blueprint $table) {
            $table->id();
            $table->string('satisTeklifId');
            $table->string('satisTeklifTip');
            $table->string('satisTeklifDepoId');
            $table->string('satisTeklifStokId');
            $table->string('satisTeklifStokAd');
            $table->string('satisTeklifBirim');
            $table->string('satisTeklifMiktar');
            $table->string('satisTeklifBirimFiyat');
            $table->string('satisTeklifToplamTutar');
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
        Schema::dropIfExists('satis_teklif_islems');
    }
}
