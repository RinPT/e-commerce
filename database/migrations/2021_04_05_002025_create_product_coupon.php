<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductCoupon extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_coupon', function (Blueprint $table) {
            $table->id();
            $table->foreignId('product_id')->constrained('products')->onDelete('cascade');
            $table->string('code')->unique();
            $table->integer('rate');
            $table->decimal('price',10);
            $table->dateTime('end_date');
            $table->timestamps();
        });
        DB::table('product_coupon')->insert([
            [
                'product_id' => 1,
                'code' => 'DISC10',
                'rate' => 10,
                'price' => 0,
                'end_date' => \Carbon\Carbon::create('2021','07','14'),
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
        Schema::dropIfExists('product_coupon');
    }
}
