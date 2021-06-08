<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductOptions extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_options', function (Blueprint $table) {
            $table->id();
            $table->foreignId('product_id')->constrained('products')->onDelete('cascade');
            $table->string('name');
            $table->text('value');
            $table->tinyInteger('is_stock_value');
            $table->timestamps();
        });
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
        Schema::dropIfExists('product_options');
    }
}
