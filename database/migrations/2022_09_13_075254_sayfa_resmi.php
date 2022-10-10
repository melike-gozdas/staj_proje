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
        Schema::create('sayfa_resmi', function (Blueprint $table) {
            $table->increments("id");
            $table->unsignedInteger('SayfaId')->nullable();
            $table->string('sfresimAdi')->nullable();
            $table->string('sfresimUrl')->nullable();
            $table->foreign('SayfaId')->references('id')->on('sayfa');
            $table->dateTime('sfresimEklenmeTarihi')->nullable();
            $table->dateTime('sfresimGuncellenmeTarihi')->default(DB::raw('CURRENT_TIMESTAMP'))->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sayfa_resmi');
    }
};
