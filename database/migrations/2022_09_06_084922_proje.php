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
            Schema::create('proje', function (Blueprint $table) {
            $table->increments("id");
            $table->dateTime('pBaslamaTarihi')->nullable();
            $table->dateTime('pBitisTarihi')->nullable();
            $table->string('pAdi')->nullable();
            $table->text('pYazisi')->nullable();
            $table->string('pResim')->nullable();
            $table->string('pDosya')->nullable();
            $table->unsignedInteger('pKategoriId');
            $table->foreign('pKategoriId')->references('id')->on('projekategori');
            $table->boolean('pKategoriAdi')->nullable();
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
        //
    }
};
