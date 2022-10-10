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
        Schema::create('sliderimage', function (Blueprint $table) {
            $table->increments("id");
            $table->unsignedInteger('sliderimageid');
            $table->foreign('sliderimageid')->references('id')->on('slider');
            $table->string('position');
            $table->string('background-position');
            $table->string('background-size');
            $table->unsignedInteger('opacity');
            $table->unsignedInteger('bottom');
            $table->unsignedInteger('top');
            $table->unsignedInteger('left');
            $table->unsignedInteger('right');
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
        Schema::dropIfExists('sliderimage');
    }
};
