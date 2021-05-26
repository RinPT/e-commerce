<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStore extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('store', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('username')->unique();
            $table->string('email')->unique();
            $table->text('password');
            $table->text('logo')->nullable();
            $table->text('url');
            $table->string('tax_no')->unique();
            $table->foreignId('country_id')->constrained('countries')->onDelete('cascade');
            $table->string('city');
            $table->text('address');
            $table->string('phone');
            $table->tinyInteger('status')->default(0);
            $table->timestamps();
        });

        DB::table('store')->insert([
            'name' => 'store',
            'username' => 'store',
            'email' => 'store@store.com',
            'password' => \Illuminate\Support\Facades\Hash::make('store123'),
            'url' => 'www.store.com',
            'tax_no' => '123456',
            'country_id' => 1,
            'city' => 'denizli',
            'address' =>'Altıntop, Lise Cd. No:2, 20010 Merkez',
            'phone' => '+90 534 572 25 15',
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
        Schema::dropIfExists('store');
    }
}
