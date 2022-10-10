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
        Schema::create('slidercontainer', function (Blueprint $table) {
            $table->increments("id");
            $table->string('position');
            $table->unsignedInteger("slicontainerid");
            $table->foreign('slicontainerid')->references('id')->on('slider');
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
        Schema::dropIfExists('slidercontainer');
    }
};
