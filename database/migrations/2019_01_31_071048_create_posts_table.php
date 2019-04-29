<?php

use Carbon\Carbon;
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
            $table->string('title',100)->unique();
            $table->string('slug')->unique();
            $table->string('image')->nullable();
            $table->enum('purpose', ['sale', 'rent'])->default('sale');
            $table->string('address');
            $table->double('latitude', 9, 6);
            $table->double('longitude', 9, 6);
            $table->text('description')->nullable();
            $table->unsignedInteger('area');
            $table->bigInteger('price');
            $table->enum('unit',['total_area','m2','month','year']);
            $table->tinyInteger('negotiable')->default(0);
            $table->enum('status', ['pending', 'published','expired'])->default('pending');
            $table->unsignedInteger('views')->default(0);
            $table->unsignedInteger('property_type_id');
            $table->foreign('property_type_id')->references('id')->on('property_types')->onDelete('cascade');
            $table->unsignedInteger('district_id');
            $table->foreign('district_id')->references('id')->on('districts')->onDelete('cascade');
            $table->unsignedInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->unsignedInteger('type_id');
            $table->foreign('type_id')->references('id')->on('post_types')->onDelete('cascade');
            $table->date('start_date');
            $table->date('end_date');
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
