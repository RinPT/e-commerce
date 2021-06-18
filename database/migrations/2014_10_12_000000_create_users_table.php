<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
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
            $table->json('group');
            $table->tinyinteger('status')->default(0);
            $table->string('last_logged_ipaddress',40)->default("127.0.0.1");
            $table->rememberToken();
            $table->timestamp('email_verified_at')->nullable();
            $table->timestamps();
        });

        DB::table('users')->insert([
            'name' => 'User',
            'surname' => 'DEMO',
            'username' => 'user',
            'email' => 'user@user.com',
            'password' => \Illuminate\Support\Facades\Hash::make('user123'),
            'gender' => 'male',
            'photo' => '',
            'group' => '[2]',
            'status' => '1',
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now()
        ]);
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
