<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetailAnimesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detail_animes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('id_anime');
            $table->string('title_anime');
            $table->string('alternative_title');
            $table->text('summary_anime');
            $table->string('rating_anime', 10)->nullable($value = true);
            $table->string('status_anime', 50);
            $table->string('type_anime', 50);
            $table->string('total_anime', 50)->nullable($value = true);
            $table->text('genre_anime');
            $table->string('jadwal_anime', 50);
            $table->string('image_anime');
            $table->string('background_anime')->nullable($value = true);
            $table->string('author');
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
        Schema::dropIfExists('detail_animes');
    }
}
