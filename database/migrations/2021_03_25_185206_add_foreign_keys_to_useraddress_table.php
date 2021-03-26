<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToUseraddressTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('user_address', function (Blueprint $table) {
            $table->unsignedbiginteger('user_id');
            $table->foreign('user_id')->references('user_id')->on('users'); // we built a foreign key for user table's id and put a foreign key constraint to it.
            $table->unsignedbiginteger('country_id');
            $table->foreign('country_id')->references('country_id')->on('countries');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('user_address', function (Blueprint $table) {
            $table->dropColumn('user_id');
            $table->dropColumn('country_id');
        });
    }
}
