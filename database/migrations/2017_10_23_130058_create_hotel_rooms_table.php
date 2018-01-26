<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHotelRoomsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hotel_rooms', function (Blueprint $table) {
            $table->increments('id');

            $table->string('reference')->unique();

            $table->integer('hotel_id')->unsigned();
            $table->foreign('hotel_id')->references('id')->on('hotels')->onDelete('cascade');

            // General Hotel Room info
            $table->string('name')->nullable();
            $table->integer('type')->nullable();

            // Financial Hotel Room info
            $table->integer('cost')->nullable(); // Should be stored in cents
            $table->integer('profit_margin')->nullable();
            $table->integer('comission_percentage')->nullable();
            $table->integer('fee_percentage')->nullable();
            $table->integer('tax_percentage')->nullable();

            // Additional Hotel Room info
            $table->jsonb('misc')->nullable();

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
        Schema::dropIfExists('hotel_rooms');
    }
}
