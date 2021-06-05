<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductDiscount extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_discount', function (Blueprint $table) {
            $table->id();
            $table->foreignId('product_id')->unique()->constrained('products')->onDelete('cascade');
            $table->integer('store_discount')->default(0);
            $table->integer('main_discount')->default(0);
            $table->text('description');
            $table->dateTime('start_date');
            $table->dateTime('end_date');
            $table->timestamps();
        });

        DB::table('product_discount')->insert([
            'product_id' => '1',
            'store_discount' => '5',
            'main_discount' => '5',
            'description' => 'New Year Discount',
            'start_date' => \Carbon\Carbon::today(),
            'end_date' => \Carbon\Carbon::create('2021','06','31'),
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now()
        ]);

        DB::table('store_discount')->insert([
            'store_id' => '1',
            'store_discount' => '3',
            'main_discount' => '3',
            'description' => 'New Year Discount',
            'start_date' => \Carbon\Carbon::today(),
            'end_date' => \Carbon\Carbon::create('2021','06','31'),
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now()
        ]);

        DB::table('category_discount')->insert([
            'category_id' => '1',
            'store_discount' => '2',
            'main_discount' => '2',
            'description' => 'New Year Discount',
            'start_date' => \Carbon\Carbon::today(),
            'end_date' => \Carbon\Carbon::create('2021','06','31'),
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
        Schema::dropIfExists('product_discount');
    }
}
