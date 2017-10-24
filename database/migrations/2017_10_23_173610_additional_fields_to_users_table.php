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
            $table->boolean('is_admin')->after('password');
            $table->string('phone')->after('email');
            $table->string('citizenship')->after('phone');
            $table->string('identifier')->after('phone');
            $table->text('address')->after('identifier');
            $table->string('zip_code')->after('address');
            $table->string('province')->after('zip_code');
            $table->string('country')->after('province');
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
            $table->dropColumn('is_admin');
            $table->dropColumn('phone');
            $table->dropColumn('citizenship');
            $table->dropColumn('identifier');
            $table->dropColumn('address');
            $table->dropColumn('zip_code');
            $table->dropColumn('province');
            $table->dropColumn('country');
        });
    }
}
