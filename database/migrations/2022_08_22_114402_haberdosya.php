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
        Schema::create('haberdosya', function (Blueprint $table) {
            $table->increments("id");
            $table->longtext('dosyaUrl')->nullable();
            $table->string('dosyaAdi')->nullable();
            $table->unsignedInteger('HaberId')->nullable();
            $table->foreign('HaberId')->references('id')->on('haber');
            $table->dateTime('dosyaEklenmeTarihi')->nullable();
            $table->dateTime('dosyaGuncellemeTarihi')->default(DB::raw('CURRENT_TIMESTAMP'))->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('haberdosya');
    }
};
