<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEpisodeAnimesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('episode_animes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('id_anime');
            $table->string('episode');
            $table->string('video');
            $table->string('download');
            $table->string('next');
            $table->string('prev');
            $table->string('from_micro',1);
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
        Schema::dropIfExists('episode_animes');
    }
}
