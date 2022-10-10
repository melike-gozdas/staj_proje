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
        Schema::create('haber', function (Blueprint $table) {
            $table->increments("id");
            $table->string('baslik')->nullable();
            $table->string('resim')->nullable();
            $table->longtext('icerik')->nullable();
            $table->dateTime('yayinTarihi')->nullable();
            $table->boolean("durum")->nullable();
            $table->string("url")->nullable();
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
        Schema::dropIfExists('haber');
    }
};
