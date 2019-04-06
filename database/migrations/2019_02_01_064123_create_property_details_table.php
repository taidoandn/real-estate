<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePropertyDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('property_details', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('floor')->default(0);
            $table->integer('bath')->default(0);
            $table->integer('balcony')->default(0);
            $table->integer('toilet')->default(0);
            $table->integer('bed_room')->default(0);
            $table->boolean('dinning_room')->default(false);
            $table->boolean('living_room')->default(false);
            $table->integer('post_id')->unsigned();
            $table->foreign('post_id')->references('id')->on('posts')->onDelete('cascade');
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
        Schema::dropIfExists('property_details');
    }
}
