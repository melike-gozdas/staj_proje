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

            Schema::create('projeresim', function (Blueprint $table) {
            $table->increments("id");
            $table->unsignedInteger('pResimId');
            $table->string('pResimAdi')->nullable();
            $table->string('pResimUrl')->nullable();
            $table->foreign('pResimId')->references('id')->on('proje')->nullable();
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
        //
    }
};
