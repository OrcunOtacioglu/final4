<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCartItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cart_items', function (Blueprint $table) {
            $table->increments('id');

            $table->string('reference');

            $table->integer('cart_id')->unsigned();
            $table->foreign('cart_id')->references('id')->on('carts')->onDelete('cascade');

            $table->string('type');
            $table->string('name');

            $table->jsonb('details')->nullable();

            $table->integer('quantity');
            $table->integer('cost');
            $table->integer('subtotal');

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
        Schema::dropIfExists('cart_items');
    }
}
