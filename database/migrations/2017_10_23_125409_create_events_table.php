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

            // Event location info
            $table->string('city');
            $table->string('country');
            $table->text('address');

            $table->float('longitude');
            $table->float('latitude');
            $table->string('timezone');

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
