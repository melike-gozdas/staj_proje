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
        Schema::create('haberresmi', function (Blueprint $table) {
            $table->increments("id");
            $table->unsignedInteger('HaberId')->nullable();
            $table->foreign('HaberId')->references('id')->on('haber');
            $table->string('resimAdi')->nullable();
            $table->string('resimUrl')->nullable();
            
            $table->dateTime('resimEklenmeTarihi')->nullable();
            $table->dateTime('resimGuncellenmeTarihi')->default(DB::raw('CURRENT_TIMESTAMP'))->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('haberresmi');
    }
};
