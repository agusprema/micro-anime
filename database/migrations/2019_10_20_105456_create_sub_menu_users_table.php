<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubMenuUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sub_menu_users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('menu_id', 11);
            $table->integer('group_id', 11);
            $table->string('title');
            $table->string('url');
            $table->string('icon');
            $table->integer('is_active', 1);
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
        Schema::dropIfExists('sub_menu_users');
    }
}
