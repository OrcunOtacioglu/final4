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

            $table->string('name');
            $table->string('color_code')->nullable();

            $table->decimal('cost');
            $table->decimal('profit_margin');
            $table->decimal('price')->nullable();
            $table->decimal('minimum_profit_amount')->nullable();

            $table->string('zones')->nullable();
            $table->integer('available');

            $table->boolean('available_online');
            $table->boolean('available_box_office');

            $table->float('online_fee')->nullable();
            $table->float('box_office_fee')->nullable();

            $table->float('online_comission')->nullable();
            $table->float('box_office_comission')->nullable();

            $table->float('tax_percentage');

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
