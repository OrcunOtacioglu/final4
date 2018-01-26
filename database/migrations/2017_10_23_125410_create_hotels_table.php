<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHotelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hotels', function (Blueprint $table) {
            $table->increments('id');

            $table->string('reference')->unique();

            // General Hotel info
            $table->string('name')->nullable();
            $table->text('description')->nullable();
            $table->integer('stars')->nullable();
            $table->float('review_point')->nullable();
            $table->integer('review_count')->nullable();

            // Hotel location info
            $table->string('city')->nullable();
            $table->string('country')->nullable();
            $table->text('address')->nullable();
            $table->float('longitude')->nullable();
            $table->float('latitude')->nullable();

            // Hotel sales info
            $table->integer('total_availability')->nullable();
            $table->integer('online_availability')->nullable();
            $table->integer('box_office_availability')->nullable();

            $table->boolean('available_online')->nullable();
            $table->boolean('available_box_office')->nullable();

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
        Schema::dropIfExists('hotels');
    }
}
