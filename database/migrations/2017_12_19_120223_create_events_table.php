<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('events', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('seat_map_id')->unsigned()->nullable();
            $table->foreign('seat_map_id')->references('id')->on('seat_maps')->onDelete('set null');

            $table->string('name');
            $table->string('slug')->unique();
            $table->mediumText('description');
            $table->string('cover_photo');

            $table->dateTime('start_date');
            $table->dateTime('end_date');
            $table->dateTime('on_sale_date');

            $table->string('category');

            $table->integer('status');
            $table->integer('listing');
            $table->boolean('is_seated');
            $table->boolean('allow_only_ticket_purchase');

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
        Schema::dropIfExists('events');
    }
}
