<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AdditionalFieldsToUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('surname')->after('name')->nullable();
            $table->string('phone')->after('email')->nullable();
            $table->string('citizenship')->after('phone')->nullable();
            $table->string('identification_number')->after('phone')->nullable();
            $table->text('address')->after('identifier')->nullable();
            $table->string('zip_code')->after('address')->nullable();
            $table->string('province')->after('zip_code')->nullable();
            $table->string('country')->after('province')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('surname');
            $table->dropColumn('phone');
            $table->dropColumn('citizenship');
            $table->dropColumn('identification_number');
            $table->dropColumn('address');
            $table->dropColumn('zip_code');
            $table->dropColumn('province');
            $table->dropColumn('country');
        });
    }
}
