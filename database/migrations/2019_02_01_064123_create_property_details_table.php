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
            $table->unsignedInteger('floor')->default(0);
            $table->unsignedInteger('bath')->default(0);
            $table->unsignedInteger('balcony')->default(0);
            $table->unsignedInteger('toilet')->default(0);
            $table->unsignedInteger('bed_room')->default(0);
            $table->boolean('dinning_room')->default(false);
            $table->boolean('living_room')->default(false);
            $table->unsignedInteger('post_id');
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
