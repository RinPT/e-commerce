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
            $table->text('url')->nullable();
            $table->string('tax_no')->unique();
            $table->foreignId('country_id')->constrained('countries')->onDelete('cascade');
            $table->foreignId('product_cat_id')->constrained('categories')->onDelete('cascade');
            $table->string('city');
            $table->text('address');
            $table->string('phone');
            $table->tinyInteger('status')->default(0);
            $table->timestamps();
        });

        DB::table('store')->insert([
            [
                'name' => 'Store DEMO',
                'username' => 'store',
                'email' => 'store@store.com',
                'password' => \Illuminate\Support\Facades\Hash::make('store123'),
                'logo' => '1.png',
                'url' => 'www.store.com',
                'tax_no' => '123456',
                'country_id' => 224,
                'product_cat_id' => 1,
                'city' => 'denizli',
                'address' =>'Altıntop, Lise Cd. No:2, 20010 Merkez',
                'phone' => '+90 534 572 25 15',
                'status' => 1,
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Store 2 DEMO',
                'username' => 'store2',
                'email' => 'store2@store.com',
                'password' => \Illuminate\Support\Facades\Hash::make('store123'),
                'logo' => '2.png',
                'url' => 'www.store.com',
                'tax_no' => '1234567',
                'country_id' => 120,
                'product_cat_id' => 1,
                'city' => 'denizli',
                'address' =>'Altıntop, Lise Cd. No:2, 20010 Merkez',
                'phone' => '+90 534 572 25 15',
                'status' => 1,
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Store 3 DEMO',
                'username' => 'store3',
                'email' => 'store3@store.com',
                'password' => \Illuminate\Support\Facades\Hash::make('store123'),
                'logo' => '3.png',
                'url' => 'www.store.com',
                'tax_no' => '12345678',
                'country_id' => 157,
                'product_cat_id' => 6,
                'city' => 'denizli',
                'address' =>'Altıntop, Lise Cd. No:2, 20010 Merkez',
                'phone' => '+90 534 572 25 15',
                'status' => 1,
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Store 4 DEMO',
                'username' => 'store4',
                'email' => 'store4@store.com',
                'password' => \Illuminate\Support\Facades\Hash::make('store123'),
                'logo' => '4.png',
                'url' => 'www.store.com',
                'tax_no' => '123456789',
                'country_id' => 205,
                'product_cat_id' => 4,
                'city' => 'denizli',
                'address' =>'Altıntop, Lise Cd. No:2, 20010 Merkez',
                'phone' => '+90 534 572 25 15',
                'status' => 1,
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ]
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
