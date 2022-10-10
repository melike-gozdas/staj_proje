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
        Schema::create('duyururesim', function (Blueprint $table) {
            $table->increments("id");
            $table->unsignedInteger('DuyuruId')->nullable();
            $table->string('dResimAdi')->nullable();
            $table->string('dResimUrl')->nullable();
            $table->foreign('DuyuruId')->references('id')->on('duyuru');
            $table->dateTime('dResimEklenmeTarihi')->nullable();
            $table->dateTime('dResimGuncellenmeTarihi')->default(DB::raw('CURRENT_TIMESTAMP'))->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('duyururesim');
    }
};
