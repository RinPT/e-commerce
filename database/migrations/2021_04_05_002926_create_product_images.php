<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductImages extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_images', function (Blueprint $table) {
            $table->id();
            $table->foreignId('product_id')->constrained('products')->onDelete('cascade');
            $table->string('image');
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

        DB::table('product_images')->insert([
            [
                'product_id' => '1',
                'image' => '1-1.jpg',
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'product_id' => '1',
                'image' => '1-2.jpg',
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'product_id' => '1',
                'image' => '1-3.jpg',
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'product_id' => '1',
                'image' => '1-4.jpg',
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ],
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

        DB::table('product_images')->insert([
            [
                'product_id' => '2',
                'image' => '2-1.jpg',
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'product_id' => '2',
                'image' => '2-2.jpg',
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'product_id' => '2',
                'image' => '2-3.jpg',
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ],
        ]);
        DB::table('product_options')->insert([
            [
                'product_id' => 1,
                'name' => 'color',
                'value' => 'white',
                'is_stock_value' => 0,
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'product_id' => 1,
                'name' => 'color',
                'value' => 'black',
                'is_stock_value' => 0,
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'product_id' => 1,
                'name' => 'color',
                'value' => 'brown',
                'is_stock_value' => 0,
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'product_id' => 1,
                'name' => 'color',
                'value' => 'red',
                'is_stock_value' => 0,
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'product_id' => 1,
                'name' => 'size',
                'value' => 'small',
                'is_stock_value' => 1,
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'product_id' => 1,
                'name' => 'size',
                'value' => 'medium',
                'is_stock_value' => 1,
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'product_id' => 1,
                'name' => 'size',
                'value' => 'large',
                'is_stock_value' => 1,
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
        Schema::dropIfExists('product_images');
    }
}
