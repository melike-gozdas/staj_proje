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
        Schema::create('sayfadosya', function (Blueprint $table) {
            $table->increments("id");
            $table->longtext('sfdosyaUrl')->nullable();
            $table->string('sfdosyaAdi')->nullable();
            $table->unsignedInteger('SayfaId')->nullable();
            $table->foreign('SayfaId')->references('id')->on('sayfa');
            $table->dateTime('sfdosyaEklenmeTarihi')->nullable();
            $table->dateTime('sfdosyaGuncellemeTarihi')->default(DB::raw('CURRENT_TIMESTAMP'))->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sayfadosya');
    }
};
