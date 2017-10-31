<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSeatsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('seats', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('rate_id')->unsigned()->nullable();
            $table->foreign('rate_id')->references('id')->on('rates')->onDelete('cascade');

            $table->integer('zone_id')->unsigned();
            $table->foreign('zone_id')->references('id')->on('zones')->onDelete('cascade');

            $table->integer('order_id')->unsigned()->nullable();
            $table->foreign('order_id')->references('id')->on('orders')->onDelete('cascade');

            $table->string('reference');
            $table->string('category');
            $table->string('row');
            $table->string('seat');

            $table->string('top');
            $table->string('left');

            $table->integer('status');
            $table->decimal('cost');

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
        Schema::dropIfExists('seats');
    }
}
