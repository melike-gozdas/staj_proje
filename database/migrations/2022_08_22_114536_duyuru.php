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
        Schema::create('duyuru', function (Blueprint $table) {
            $table->increments("id");$table->string('baslik')->nullable();
            $table->string('resim')->nullable();
            $table->text('icerik')->nullable();
            $table->boolean("durum")->nullable();
            $table->dateTime('baslamaTarihi')->nullable();
            $table->dateTime('bitisTarihi')->nullable();
            $table->string('url')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('duyuru');
    }
};
