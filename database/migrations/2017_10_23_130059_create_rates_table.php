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

            $table->string('name')->nullable();
            $table->string('color_code')->nullable();

            $table->integer('cost')->nullable(); // Should be stored in cents
            $table->integer('profit_margin')->nullable();
            $table->integer('price')->nullable(); // Face value. Will be deprecated

            $table->string('zones')->nullable(); // Will be depracated if found a new way.
            $table->integer('available')->nullable();

            $table->boolean('available_online')->nullable();
            $table->boolean('available_box_office')->nullable();

            $table->integer('fee_percentage')->nullable();
            $table->integer('comission_percentage')->nullable();
            $table->integer('tax_percentage')->nullable();

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
