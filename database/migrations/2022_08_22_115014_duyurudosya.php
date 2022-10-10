<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('duyurudosya', function (Blueprint $table) {
            $table->increments("id");
            $table->longtext('dDosyaUrl')->nullable();
            $table->string('dDosyaAdi')->nullable();
            $table->unsignedInteger('DuyuruId')->nullable();
            $table->foreign('DuyuruId')->references('id')->on('duyuru');
            $table->dateTime('dDosyaBaslangicTarihi')->nullable();
            $table->dateTime('dDosyaBitisTarihi')->nullable();
            $table->dateTime('dDosyaGuncellemeTarihi')->default(DB::raw('CURRENT_TIMESTAMP'))->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('duyurudosya');
    }
};
