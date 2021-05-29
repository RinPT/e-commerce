<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateAuthors extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('authors', function (Blueprint $table) {
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
            $table->timestamps();
        });

        DB::table('authors')->insert([
            'name' => 'Admin',
            'surname' => 'DEMO',
            'username' => 'admin',
            'email' => 'admin@admin.com',
            'password' => \Illuminate\Support\Facades\Hash::make('admin123'),
            'gender' => 'male',
            'photo' => '',
            'group' => '[1]',
            'status' => 1,
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now()
        ]);
        DB::table('authors')->insert([
            'name' => 'Support',
            'surname' => 'DEMO',
            'username' => 'support',
            'email' => 'support@support.com',
            'password' => \Illuminate\Support\Facades\Hash::make('support123'),
            'gender' => 'male',
            'photo' => '',
            'group' => '[4]',
            'status' => 1,
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
        Schema::dropIfExists('authors');
    }
}
