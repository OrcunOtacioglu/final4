<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rates', function (Blueprint $table) {
            $table->increments('id');

            $table->string('reference')->unique();

            $table->integer('event_id')->unsigned();
            $table->foreign('event_id')->references('id')->on('events')->onDelete('cascade');

            $table->string('name');
            $table->string('color_code')->nullable();

            $table->integer('cost'); // Should be stored in cents
            $table->integer('profit_margin');
            $table->integer('price'); // Face value. Will be deprecated
            $table->integer('minimum_profit_amount')->nullable();

            $table->string('zones')->nullable(); // Will be depracated if found a new way.
            $table->integer('available');

            $table->boolean('available_online');
            $table->boolean('available_box_office');

            $table->integer('online_fee_percentage');
            $table->integer('box_office_fee_percentage');

            $table->integer('online_comission_percentage');
            $table->integer('box_office_comission_percentage');

            $table->integer('tax_percentage');

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
        Schema::dropIfExists('rates');
    }
}
