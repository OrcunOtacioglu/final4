<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateZonesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('zones', function (Blueprint $table) {
            $table->increments('id');

            $table->string('reference')->unique();

            $table->integer('seat_map_id')->unsigned();
            $table->foreign('seat_map_id')->references('id')->on('seat_maps')->onDelete('cascade');

            $table->string('name');
            $table->string('screen_name');
            $table->string('image_path')->nullable();

            $table->jsonb('objects')->nullable();
            $table->jsonb('previous_objects')->nullable();

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
        Schema::dropIfExists('zones');
    }
}
