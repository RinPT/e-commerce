<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductComplains extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_complains', function (Blueprint $table) {
            $table->id();
            $table->foreignId('sender_uid')->constrained('users')->onDelete('cascade');
            $table->foreignId('product_id')->constrained('products')->onDelete('cascade');
            $table->text('message');
            $table->tinyInteger('status');
            $table->timestamps();
        });

        DB::table('products')->insert([
            'store_id' => '1',
            'name' => 'ürün1',
            'category_id' => '1',
            'description' => 'buldan bezi',
            'price' => '25',
            'cargo_price' => '5',
            'currency_id' => '1',
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now()
        ]);

        DB::table('product_images')->insert([
            'product_id' => '1',
            'image' => 'dersler.png',
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now()
        ]);

        
        DB::table('products')->insert([
            'store_id' => '1',
            'name' => 'ürün2',
            'category_id' => '1',
            'description' => 'kumaş',
            'price' => '25',
            'cargo_price' => '5',
            'currency_id' => '1',
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now()
        ]);

        DB::table('product_images')->insert([
            'product_id' => '1',
            'image' => 'dersler.png',
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
        Schema::dropIfExists('product_complains');
    }

    
}
