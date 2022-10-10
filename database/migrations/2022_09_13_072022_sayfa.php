5<?php

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
        Schema::create('sayfa', function (Blueprint $table) {
            $table->increments("id");
            $table->string('sayfaBaslik')->nullable();
            $table->text('sayfaUrl')->nullable();
            $table->text('sayfaIcerik')->nullable();
            $table->unsignedInteger('Grup_id');
            $table->foreign('Grup_id')->references('id')->on('grup');
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
        Schema::dropIfExists('sayfa');
    }
};
