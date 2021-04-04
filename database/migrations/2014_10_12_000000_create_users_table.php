<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('surname');
            $table->string('username')->unique();
            $table->string('email')->unique();
            $table->text('password');
            $table->enum('gender',['male','female','other']);
            $table->string('photo')->nullable();
            $table->json('group')->default("[]");
            $table->json('store')->default("[]");
            $table->tinyinteger('status')->default(0);
            $table->string('last_logged_ipaddress',40);
            $table->rememberToken();
            $table->timestamp('email_verified_at')->nullable();
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
        Schema::dropIfExists('users');
    }
}
