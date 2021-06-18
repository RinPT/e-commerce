<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrders extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            //Store info
            $table->bigInteger('store_id');
            $table->string('store_name');
            $table->string('store_tax_no');
            $table->string('store_country');
            $table->string('store_city');
            $table->text('store_address');
            $table->string('store_phone');
            $table->bigInteger('user_id');
            $table->string('name');
            $table->string('surname');
            $table->string('username');
            $table->string('email');
            $table->enum('gender',['male','female','other']);
            $table->text('products');
            $table->text('coupons');
            $table->decimal('total',50);
            $table->enum('order_status',['waiting', 'approved', 'cancel request', 'cancelled']);
            $table->string('currency_code');
            $table->string('currency_prefix');
            $table->string('currency_suffix');
            $table->string('ip_address',40);
            $table->text('user_agent');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
}
