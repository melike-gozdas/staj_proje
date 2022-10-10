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
        Schema::create('haberiletisim', function (Blueprint $table) {
            $table->id();
            $table->text('subeadi')->nullable();
            $table->longtext('iletisimbilgileri')->nullable();
            $table->dateTime('hIletisimGuncellemeTarihi')->default(DB::raw('CURRENT_TIMESTAMP'))->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('haberiletisim');
    }
};
