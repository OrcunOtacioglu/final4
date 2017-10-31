<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHotelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hotels', function (Blueprint $table) {
            $table->increments('id');

            $table->string('reference');
            $table->string('name');

            $table->integer('total_availability');
            $table->integer('online_availability')->nullable();
            $table->integer('box_office_availability')->nullable();

            $table->boolean('available_online');
            $table->boolean('available_box_office');

            $table->string('media_path');
            $table->integer('stars');
            $table->float('review_point');
            $table->integer('review_count');

            $table->string('location');
            $table->text('description');

            $table->jsonb('facilities')->nullable();

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
        Schema::dropIfExists('hotels');
    }
}
