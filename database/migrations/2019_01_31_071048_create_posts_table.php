<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title')->unique();
            $table->string('slug')->unique();
            $table->string('image')->nullable();
            $table->enum('purpose', ['sale', 'rent'])->default('sale');
            $table->string('address');
            $table->double('latitude', 9, 6);
            $table->double('longitude', 9, 6);
            $table->text('description')->nullable();
            $table->integer('area');
            $table->bigInteger('price');
            $table->enum('unit',['total_area','m2','month','year']);
            $table->tinyInteger('negotiable')->default(0);
            $table->enum('status', ['pending', 'published','blocked'])->default('pending');
            $table->integer('views')->unsigned()->default(0);
            $table->integer('type_id')->unsigned();
            $table->foreign('type_id')->references('id')->on('property_types')->onDelete('cascade');
            $table->integer('district_id')->unsigned();
            $table->foreign('district_id')->references('id')->on('districts')->onDelete('cascade');
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
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
        Schema::dropIfExists('posts');
    }
}
