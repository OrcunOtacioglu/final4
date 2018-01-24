<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBookingItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('booking_items', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('booking_id')->unsigned();
            $table->foreign('booking_id')->references('id')->on('bookings')->onDelete('cascade');

            $table->integer('type');

            $table->string('name');
            $table->string('reference');

            $table->jsonb('details')->nullable();

            $table->decimal('profit_margin')->nullable();
            $table->decimal('minimum_profit_amount')->nullable();

            $table->integer('quantity');
            $table->decimal('unit_price');
            $table->decimal('subtotal');

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
        Schema::dropIfExists('booking_items');
    }
}
