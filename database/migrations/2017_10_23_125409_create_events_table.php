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

            $table->string('reference')->unique();

            // General Event info
            $table->string('name');
            $table->string('subtitle')->nullable();
            $table->string('slug')->unique();
            $table->mediumText('description')->nullable();
            $table->string('category')->nullable();
            $table->integer('listing')->nullable();
            $table->string('contact')->nullable();
            $table->integer('status')->nullable();

            $table->dateTime('start_date')->nullable();
            $table->dateTime('end_date')->nullable();
            $table->dateTime('on_sale_date')->nullable();

            $table->boolean('is_seated')->nullable();
            $table->integer('seat_map_id')->unsigned()->nullable();
            $table->foreign('seat_map_id')->references('id')->on('seat_maps')->onDelete('set null');


            $table->boolean('allow_only_ticket_purchase')->nullable();
            $table->string('refund_policy')->nullable();

            // Event location info
            $table->string('city')->nullable();
            $table->string('country')->nullable();
            $table->text('address')->nullable();

            $table->float('longitude')->nullable();
            $table->float('latitude')->nullable();
            $table->string('timezone')->nullable();

            $table->string('cover_photo')->nullable();
            $table->string('category_map_photo')->nullable();

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
