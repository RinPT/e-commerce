<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProducts extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->foreignId('store_id')->constrained('store')->onDelete('cascade');
            $table->string('name');
            $table->foreignId('category_id')->constrained('categories')->onDelete('cascade');
            $table->text('description');
            $table->decimal('price','50');
            $table->decimal('cargo_price','50');
            $table->foreignId('currency_id')->constrained()->onDelete('cascade');
            $table->string('ar')->nullable();
            $table->timestamps();
        });

        DB::table('products')->insert([
            'store_id' => '1',
            'name' => "Converse Training Shoes",
            'category_id' => '1',
            'description' => "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. ",
            'price' => '25',
            'cargo_price' => '5',
            'currency_id' => '1',
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now()
        ]);

        DB::table('products')->insert([
            'store_id' => '3',
            'name' => 'Women Fashion Coat',
            'category_id' => '1',
            'description' => "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. ",
            'price' => '140',
            'cargo_price' => '5',
            'currency_id' => '2',
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now()
        ]);

        DB::table('products')->insert([
            'store_id' => '2',
            'name' => 'Women Fashion Bag',
            'category_id' => '1',
            'description' => "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. ",
            'price' => '70',
            'cargo_price' => '20',
            'currency_id' => '3',
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now()
        ]);

        DB::table('products')->insert([
            'store_id' => '3',
            'name' => '[AR] Chair',
            'category_id' => '4',
            'description' => "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. ",
            'price' => '110',
            'cargo_price' => '20',
            'currency_id' => '2',
            'ar' => '/AR/chair.usdz',
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
        Schema::dropIfExists('products');
    }
}
