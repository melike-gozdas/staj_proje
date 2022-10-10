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
        Schema::create('iletisim_bilgileri', function (Blueprint $table) {
            $table->increments("id");
            $table->string('adi')->nullable();
            $table->string('soyAdi')->nullable();
            $table->string('email')->nullable();
            $table->string('adres')->nullable();
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
