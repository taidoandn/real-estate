<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateConveniencesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('conveniences', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 100);
            $table->enum('type', ['interior', 'exterior']);
            $table->timestamps();
        });

        Schema::create('post_conveniences', function (Blueprint $table) {
            $table->integer('post_id')->unsigned();
            $table->foreign('post_id')->references('id')->on('posts')->onDelete('cascade');
            $table->integer('convenience_id')->unsigned();
            $table->foreign('convenience_id')->references('id')->on('conveniences')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('conveniences');
    }
}
